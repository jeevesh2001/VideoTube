<?php

class VideoPlayer
{
  public function __construct($video)
  {
    $this->video = $video;
  }

  public function create($autoPlay)
  {
    if ($autoPlay) {
      $autoPlay = "autoplay";
    } else {
      $autoPlay = "";
    }

    $filePath = $this->video->getFilePath();
    return "<video class='videoPlayer' controls $autoPlay poster=''> 
              <source src='$filePath' type='video/mp4'>
              Your browser does not support the video type
            </video>";
  }
}
