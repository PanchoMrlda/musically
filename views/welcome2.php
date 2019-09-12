<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Music Player</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel='stylesheet prefetch' href='http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css'>
  <link rel='stylesheet prefetch' href='http://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.0/animate.min.css'>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="container">
    <div class="top">
      <div class="menu float-r">
        <a href="#"><span></span></a>
        <a href="#"><span></span></a>
        <a href="#"><span></span></a>
      </div>
    </div>
    <div class="side-menu">
      <a href="#" class="close"><i class="fa fa-angle-left"></i></a>
      <ul>
        <li><a href="#" class="side-search"><i class="fa fa-search fa-fw"></i> Search</a></li>
        <li class="active"><a href="#" class="side-currently-playing"><i class="fa fa-headphones fa-fw"></i> Currently Playing</a></li>
        <li><a href="#" class="side-popular-music"><i class="fa fa-list-ol fa-fw"></i> Popular Music</a></li>
        <li><a href="#" class="side-your-playlist"><i class="fa fa-music fa-fw"></i> Your Playlists</a></li>
        <li><a href="#" class="side-your-profile"><i class="fa fa-user fa-fw"></i> Your Profile</a></li>
        <li><a href="#" class="side-settings"><i class="fa fa-cog fa-fw"></i> Settings</a></li>
      </ul>
      <div class="side-menu-background"></div>
    </div>
    <div class="center">
      <div class="nav">
        <a href="#" class="side-menu-trigger"><i class="fa fa-bars"></i></a>
      </div>
      <div class="cover">
        <div class="jcarousel">
          <ul>
            <li><img src="https://upload.wikimedia.org/wikipedia/en/6/64/The-Days-Nights-EP-by-Avicii.jpg" alt="" /></li>
            <li><img src="https://i1.sndcdn.com/artworks-000110285449-17viu6-t500x500.jpg" alt="" /></li>
            <li><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/308622/bmth-tts.jpg" alt="" /></li>
          </ul>
        </div>

        <!-- <img src="https://upload.wikimedia.org/wikipedia/en/6/64/The-Days-Nights-EP-by-Avicii.jpg" alt="" /> -->
      </div>
      <ul class="jcarousel-pagination"></ul>
      <div class="info">
        <div class="name">
          <h3 class="song">The Nights</h3>
          <p class="artist">Avicii</p>
        </div>
      </div>
    </div>
    <div class="bottom">
      <div class="action">
        <a href="#" class="previous jcarousel-prev"><i class="fa fa-step-backward"></i></a>
        <a href="#" class="play"><i class="fa fa-play fa-fw"></i></a>
        <a href="#" class="next jcarousel-next"><i class="fa fa-step-forward"></i></a>
      </div>
      <div class="length">
        <label for="fader">1:00</label>
        <input type="range" min="0" max="100" value="40" id="fader" step="1">
        <output for="fader" class="duration"></output>
      </div>
      <div class="options">
        <a href="#" class="shuffle active"><i class="fa fa-random"></i></a>
        <a href="#" class="replay"><i class="fa fa-refresh"></i></a>
        <a href="#" class="volume"><i class="fa fa-volume-up"></i></a>
        <a href="#" class="favorite active"><i class="fa fa-heart"></i></a>
      </div>
      <div class="volume-slider">
        <a href="#" class="close"><i class="fa fa-chevron-down"></i></a>
        <div class="volume-slider-inner">
          <i class="fa fa-volume-down"></i>
          <input class="volume-slider" type=range min=0 max=100 value=0 id=fader step=1 oninput="outputUpdate(value)">
          <i class="fa fa-volume-up"></i>
        </div>
      </div>
    </div>
    <div class="overlay-image the-nights active"></div>
    <div class="overlay-image dont-look-down"></div>
    <div class="overlay-image avalanche"></div>
    <div class="overlay"></div>
  </div>

  <audio class="audio-avalanche" src="http://emilcarlsson.se/assets/bring-me-the-horizon-avalanche.mp3" type="audio/mpeg">
    Your browser does not support the audio tag!
  </audio>

  <audio class="audio-dont-look-down" src="http://emilcarlsson.se/assets/Martin Garrix feat. Usher - Don't Look Down (Lyric Video).mp3" type="audio/mpeg">
    Your browser does not support the audio tag!
  </audio>

  <audio class="audio-the-nights" src="http://emilcarlsson.se/assets/Avicii - The Nights.mp3" type="audio/mpeg">
    Your browser does not support the audio tag!
  </audio>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jcarousel/0.3.1/jquery.jcarousel.min.js'></script>

  <script src="js/index.js"></script>

</body>

</html>