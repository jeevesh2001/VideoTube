<?php
class SettingsFormProvider
{

  public function createUserDetailsForm($firstName, $lastName, $email)
  {
    $firstNameInput = $this->createFirstNameInput($firstName);
    $lastNameInput = $this->createLastNameInput($lastName);
    $emailInput = $this->createEmailInput($email);
    $saveButton = $this->createSaveUserDetailsButton();

    return "
      <form action='settings.php' method='POST' enctype='multipart/form-data'>
        <span class='title'>User Details</span>  
        $firstNameInput
        $lastNameInput
        $emailInput
        $saveButton 
      </form>
    ";
  }

  public function createPasswordForm()
  {
    $oldPasswordInput = $this->createPasswordInput("oldPassword", "Old password");
    $newPasswordInput = $this->createPasswordInput("newPassword", "New password");
    $newPassword2Input = $this->createPasswordInput("newPassword2", "Confirm new password");
    $saveButton = $this->createSavePasswordButton();

    return "
      <form action='settings.php' method='POST' enctype='multipart/form-data'>
        <span class='title'>Update password</span>  
        $oldPasswordInput
        $newPasswordInput
        $newPassword2Input
        $saveButton 
      </form>
    ";
  }

  private function createFirstNameInput($value)
  {
    if ($value == null) $value = "";
    return "
    <div class='form-group'>
      <input type='text' class='form-control' placeholder='First name' name='firstName' value='$value' required>
    </div>
    ";
  }
  private function createLastNameInput($value)
  {
    if ($value == null) $value = "";
    return "
    <div class='form-group'>
      <input type='text' class='form-control' placeholder='Last name' name='lastName' value='$value' required>
    </div>
    ";
  }
  private function createEmailInput($value)
  {
    if ($value == null) $value = "";
    return "
    <div class='form-group'>
      <input type='email' class='form-control' placeholder='Email' name='email' value='$value' required>
    </div>
    ";
  }

  private function createSaveUserDetailsButton()
  {
    return "<button name='saveDetailsButton' type='submit' class='btn btn-primary'>Save</button>";
  }

  private function createPasswordInput($name, $placeholder)
  {
    return "
      <div class='form-group'>
        <input type='password' class='form-control' placeholder='$placeholder' name='$name'  required>
      </div>
    ";
  }

  private function createSavePasswordButton()
  {
    return "<button name='savePasswordButton' type='submit' class='btn btn-primary'>Save</button>";
  }
}
