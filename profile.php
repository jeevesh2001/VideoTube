<?php require_once("includes/header.php"); ?>
<?php require_once("includes/classes/ProfileGenerator.php"); ?>



<?php

if (isset($_GET["username"]) && $_GET["username"] != "") {
  $profileUsername = $_GET["username"];
} else {
  echo "Channel not found";
  exit();
}


$profileGenerator = new ProfileGenerator($con, $userLoggedInObj, $profileUsername);
echo $profileGenerator->create();

?>
<?php require_once("includes/footer.php"); ?>
