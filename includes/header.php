<?php require_once("includes/config.php"); ?>
<?php require_once("includes/classes/User.php"); ?>
<?php require_once("includes/classes/Video.php"); ?>
<?php require_once("includes/classes/ButtonProvider.php"); ?>
<?php require_once("includes/classes/VideoGrid.php"); ?>
<?php require_once("includes/classes/VideoGridItem.php"); ?>
<?php require_once("includes/classes/SubscriptionsProvider.php"); ?>
<?php require_once("includes/classes/NavigationMenuProvider.php"); ?>


<?php

$usernameLoggedIn = User::isLoggedIn() ? $_SESSION["userLoggedIn"] : "";
$userLoggedInObj = new User($con, $usernameLoggedIn);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>VideoTube</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <!-- JS, Popper.js, and jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <script src="assets/js/commonActions.js"></script>
  <script src="assets/js/userActions.js"></script>


</head>

<body>
  <div id="pageContainer">
    <div id="mastHeadContainer">
      <button class="navShowHide">
        <img src="assets/images/icons/menu.png" alt="">
      </button>
      <a class="logoContainer" href="index.php">
        <img src="assets/images/icons/VideoTubeLogo.png" alt="site logo" title="logo">
      </a>
      <div class="searchBarContainer">
        <form action="search.php" method="GET">
          <input type="text" class="searchBar" name="term" placeholder="Search">
          <button class="searchButton">
            <img src="assets/images/icons/search.png" alt="">
          </button>
        </form>
      </div>

      <div class="rightIcons">
        <a href="upload.php">
          <img src="assets/images/icons/upload.png" alt="" class="upload">
        </a>
        <?php echo ButtonProvider::createUserProfileNavigationButton($con, $userLoggedInObj->getUsername()); ?>

      </div>
    </div>


    <div id="sideNavContainer" style="display: none;">
      <?php
      $navigationMenuProvider = new NavigationMenuProvider($con, $userLoggedInObj);
      echo $navigationMenuProvider->create();

      ?>
    </div>
    <div id="mainSectionContainer">
      <div id="mainContentContainer">