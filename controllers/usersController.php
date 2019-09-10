<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/class/User.php';

define('USER_NOT_FOUND', 'User not found');
define('USER_ALREADY_EXISTS', 'User already exists');
define('PASSWORD_ERROR', 'Please, read the password requirements');
session_start();

function validatePassword($password, $repeatedPassword)
{
  $pattern = "/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/";
  $patternMatch = preg_match($pattern, $password);
  $passwordMatch = $password == $repeatedPassword;
  if (!$patternMatch || !$passwordMatch) {
    header('HTTP/1.1 422 Unprocessable Entity');
    die(json_encode(array('message' => PASSWORD_ERROR)));
  }
}

if (isset($_POST['loginButton'])) {
  try {
    $user = User::getUser($_POST['username'], sha1($_POST['password']));
    $_SESSION['userId'] = $user->getId();
  } catch (\Throwable $th) {
    header('HTTP/1.1 404 Not Found');
    die(json_encode(array('message' => USER_NOT_FOUND)));
  }
}

if (isset($_POST['registerButton'])) {
  try {
    validatePassword($_POST['password'], $_POST['repeatedPassword']);
    $user = new User();
    $user->setName($_POST['username']);
    $user->setPassword(sha1($_POST['password']));
    $user->save();
    $_SESSION['userId'] = $user->getId();
  } catch (\Throwable $th) {
    if (strpos($th->getMessage(), 'Duplicate entry')) {
      header('HTTP/1.1 422 Unprocessable Entity');
      die(json_encode(array('message' => USER_ALREADY_EXISTS)));
    }
  }
}

if (isset($_POST['logoutButton'])) {
  session_unset();
  session_destroy();
}