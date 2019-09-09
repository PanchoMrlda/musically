<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/class/Message.php';

session_start();

if (isset($_GET['chatMessages'])) {
  $message = new Message();
  $messages = array_map(function ($message) {
    return $message->getText();
  }, $message->getMessages());
}

if (isset($_POST['chatContent'])) {
  $message = new Message();
  $message->setText($_POST['chatContent']);
  $message->save();
  // $message->setChatUserId($_SESSION['UserId']);
  // $message->setChatGameId($_SESSION['GameId']);
  // $message->setChatText($_POST['ChatText']);
  // $message->InsertChatMessage();
}
