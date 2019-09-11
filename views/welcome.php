<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link href="css/musically.css" rel="stylesheet">
  <title>Musically | Welcome</title>
  <link rel="icon" type="image/x-icon" href="/favicon.ico">
  <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body class="body">
  <section class="main">
    <section class="header">
      <span class="material-icons menu-icon" style="font-size:24px;">menu</span>
      <span class="app-title text-center"><a href="/">MUSICALLY</a></span>
      <span class="material-icons menu-profile" style="<?php if (isset($_SESSION['userId'])) {
                                                          echo 'color:green';
                                                        } ?>">person</span>
    </section>
    <?php
    if (!isset($_SESSION['userId'])) {
      include $_SERVER['DOCUMENT_ROOT'] . '/views/layouts/login.php';
    } else {
      include $_SERVER['DOCUMENT_ROOT'] . '/views/layouts/sessionOptions.php';
    }
    ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/views/layouts/sideMenu.php'; ?>
    <!-- <form action="/" method="post">
      <input class="btn btn-primary align-items-center" type="submit" name="start" value="START">
      <?php if (isset($_SESSION['id'])) {
        echo '<input class="btn btn-secondary" type="submit" name="close" value="CLOSE">';
      } else {
        1;
      }
      ?>
      <div id="chat-messages">
      </div>
      <div id="chat">
        <span style="color:green">Message</span><br />
        <textarea id="chat-content" name="chat-content"></textarea>
      </div>
    </form> -->
  </section>
  <script async type="text/javascript" src="js/musically.js" defer></script>
</body>

</html>