<?php

session_start();
if ($_POST['goTo'] == 'contact') {
  include "views/contact.php";
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
