<?php

session_start();

if (isset($_POST['start'])) {
  $_SESSION['id'] = rand(1, 5);
  include "views/welcome.php";
} else if (isset($_POST['close'])) {
  session_unset();
  session_destroy();
  include "views/welcome.php";
} else {
  include "views/welcome.php";
}

print_r('<pre>');
echo 'SESSION' . "\n";
print_r($_SESSION);
echo 'POST' . "\n";
print_r($_POST);
echo 'GET' . "\n";
print_r($_GET);
print_r('</pre>');
