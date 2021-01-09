<?php require_once("includes/header.php"); ?>
<?php require_once("includes/classes/TrendingProvider.php"); ?>

<?php

$trendingProvider = new TrendingProvider($con, $userLoggedInObj);
$videos = $trendingProvider->getVideos();
$videoGrid = new VideoGrid($con, $userLoggedInObj);

?>

<div class="largeVideoGridContainer">
  <?php
  if ($videos > 0) {
    echo $videoGrid->createLarge($videos, "Trending videos uplaoded in the last week", false);
  } else {
    echo "No trending videos to show";
  }
  ?>
</div>

<?php require_once("includes/footer.php"); ?>