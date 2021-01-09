<?php


class ProfileData
{
  private $con, $profileUserObj;

  public function __construct($con, $profileUsername)
  {
    $this->con = $con;
    $this->profileUserObj = new User($con, $profileUsername);
  }

  public function getProfileUsername()
  {
    return $this->profileUserObj->getUsername();
  }

  public function userExists()
  {
    $query = $this->con->prepare("SELECT * FROM users WHERE username = :username");
    $profileUsername = $this->getProfileUsername();
    $query->bindParam(":username", $profileUsername);
    $query->execute();
    return $query->rowCount() > 0;
  }

  public function getProfileUserObj()
  {
    return $this->profileUserObj;
  }

  public function getCoverPhoto()
  {
    return "assets/images/coverPhoto/default-cover-photo.jpg";
  }

  public function getProfileUserFullName()
  {
    return $this->profileUserObj->getName();
  }
  public function getProfilePic()
  {
    return $this->profileUserObj->getProfilePic();
  }

  public function getSubscriberCount()
  {
    return $this->profileUserObj->getSubscriberCount();
  }

  public function getUserVideos($userLoggedInObj)
  {
    $username = $this->profileUserObj->getUsername();
    $query = $this->con->prepare("SELECT * FROM videos WHERE uploadedBy=:uploadedBy ORDER BY uploadDate DESC");
    $query->bindParam(":uploadedBy", $username);
    $query->execute();

    $videos = array();
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
      $videos[] = new Video($this->con, $row, $userLoggedInObj);
    }
    return $videos;
  }

  public function getAllUserDetails()
  {
    return array(
      "Name" => $this->getProfileUserFullName(),
      "Username" => $this->getProfileUsername(),
      "Subscribers" => $this->getSubscriberCount() . " subscribers",
      "Total views" => $this->getTotalViews() . " views",
      "Sign up date" => $this->getSignUpDate()
    );
  }
  private function getTotalViews()
  {
    $username = $this->getProfileUsername();
    $query = $this->con->prepare("SELECT SUM(views) FROM videos WHERE uploadedBy=:uploadedBy");
    $query->bindParam(":uploadedBy", $username);
    $query->execute();
    return $query->fetchColumn();
  }

  private function getSignUpDate()
  {
    $date = $this->profileUserObj->getSignUpDate();
    return date("F j, Y", strtotime($date));
  }
}
