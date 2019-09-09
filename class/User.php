<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/class/Db.php';

class User
{
  private $id;
  private $name;
  private $password;
  private $createdAt;

  public function __construct($name = null, $password = null, $createdAt = null)
  {
    $this->name = $name;
    $this->password = $password;
    $this->createdAt = date('Y-m-d H:i:s');
  }

  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    return $this->id = $id;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setName($name)
  {
    return $this->name = $name;
  }

  public function getPassword()
  {
    return $this->password;
  }

  public function setPassword($password)
  {
    return $this->password = $password;
  }

  public function getCreatedAt()
  {
    return $this->createdAt;
  }

  public function setCreatedAt($createdAt)
  {
    return $this->createdAt = $createdAt;
  }

  public function save()
  {
    $connection = Db::getConnection();
    $query = 'INSERT INTO users (name, password, createdAt)
               values (:name, :password, :createdAt)';
    $insertion = $connection->prepare($query);
    $process = $insertion->execute(array(
      ':name' => $this->getName(),
      ':password' => $this->getPassword(),
      ':createdAt' => $this->getCreatedAt()
    ));
    if ($process) {
      $this->setId($connection->lastInsertId());
    }
    $connection = null;
    return $process;
  }

  static function getUser($name, $password)
  {
    $connection = Db::getConnection();
    $query = 'SELECT users.* FROM users WHERE users.name = :name
              AND users.password = :password LIMIT 1';
    $select = $connection->prepare($query);
    $select->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'User');
    $select->execute(array(':name' => $name, ':password' => $password));
    $user = $select->fetch();
    $connection = null;
    return $user;
  }
}