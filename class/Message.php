<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/class/Db.php';

class Message
{
  private $id;
  private $text;
  private $userId;

  public function __construct($text = null, $userId = null)
  {
    $this->text = $text;
    $this->userId = $userId;
  }

  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    return $this->id = $id;
  }

  public function getText()
  {
    return $this->text;
  }

  public function setText($text)
  {
    return $this->text = $text;
  }

  public function getUserId()
  {
    return $this->userId;
  }

  public function setUserId($userId)
  {
    return $this->userId = $userId;
  }

  public function save()
  {
    $connection = Db::getConnection();
    $query = 'INSERT INTO chats (text, user_id, createdAt)
               values (:text, :user_id, :createdAt)';
    $insertion = $connection->prepare($query);
    $process = $insertion->execute(array(
      ':text' => $this->getText(),
      ':user_id' => $this->getUserId(),
      ':createdAt' => $this->getCreatedAt()
    ));
    if ($process) {
      $this->setId($connection->lastInsertId());
    }
    $connection = null;
    return $process;
  }

  public function getMessages()
  {
    $connection = Db::getConnection();
    $query = 'SELECT chats.* FROM chats';
    $select = $connection->prepare($query);
    $select->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Message');
    $select->execute();
    $messages = $select->fetchAll();
    $connection = null;
    return $messages;
  }
}
