<?php

class Visitor {

  // Pull all data from database
  public static function findAll() {
    $query_result = mysql_query('select id, name, location, message, tinyurl, generatedid from visitors');
    return new Visitor($query_result);
  }

  // Pull row by generated id
  public static function findByGeneratedId($generatedId) {
    $query_result = mysql_query("select id, name, location, message, tinyurl from visitors where generatedid='{$generatedId}'");
    return new Visitor($query_result);
  }

  // Create row
  public static function create($name, $location, $message, $tinyUrl = null) {
    $visitor = new Visitor(null);
    $visitor->setName($name);
    $visitor->setLocation($location);
    $visitor->setMessage($message);
    $visitor->setTinyUrl($tinyUrl);
    $visitor->setGeneratedId($visitor->generateId());
    $visitor->setId($visitor->save());
    return $visitor;
  }

  // Data
  private $id;
  private $name;
  private $location;
  private $message;
  private $tinyUrl;
  private $generatedId;

  // Query result for iteration
  private $query_result;

  // Private constructor for iteration on query result
  private function __construct($query_result) {
    $this->query_result = $query_result;
  }

  // Get next result row - false if no more results
  public function nextRow() {
    if( $row = mysql_fetch_assoc($this->query_result) ) {
      $this->setId($row['id']);
      $this->setName($row['name']);
      $this->setLocation($row['location']);
      $this->setMessage($row['message']);
      $this->setTinyUrl($row['tinyurl']);
      $this->setGeneratedId($row['generatedid']);
      return true;
    } else {
      return false;
    }
  }
  
  // Save this object to db
  public function save() {
    $query = ( empty($this->id) ) ? $this->createQuery() : $this->updateQuery();
    mysql_query($query);
    return mysql_insert_id();
  }

  // Build query for row creation
  private function createQuery() {
    $query = 'insert into visitors (name, location, message, tinyurl, generatedid) values (';
    $query .= "'{$this->getName()}', ";
    $query .= "'{$this->getLocation()}', ";
    $query .= "'{$this->getMessage()}', ";
    $query .= "'{$this->getTinyUrl()}', ";
    $query .= "'{$this->getGeneratedId()}')";
    return $query;
  }

  // Build query for row update
  private function updateQuery() {
    $query = 'update visitors set ';
    $query .= "name='{$this->getName()}', ";
    $query .= "location='{$this->getLocation()}', ";
    $query .= "message='{$this->getMessage()}', ";
    $query .= "tinyurl='{$this->getTinyUrl()}' ";
    $query .= "where id={$this->getId()}";
    return $query;
  }

  private function generateId() {
    $random= "";
    srand((double)microtime()*1000000);
    $char_list = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $char_list .= "abcdefghijklmnopqrstuvwxyz";
    $char_list .= "1234567890";
    for($i = 0; $i < 7; $i++) {
      $random .= substr($char_list,(rand()%(strlen($char_list))), 1);
    }
    return $random;
  } 

  // Setters
  // id and generatedId setters are private - they can never be set, only pulled from database  
  private function setId($id) {
    $this->id = $id;
  }

  private function setGeneratedId($generatedId) {
    $this->generatedId = $generatedId;
  }

  public function setName($name) {
    $this->name = $name;
  }

  public function setLocation($location) {
    $this->location = $location;
  }

  public function setMessage($message) {
    $this->message = $message;
  }

  public function setTinyUrl($tinyUrl) {
    $this->tinyUrl = $tinyUrl;
  }

  // Getters
  public function getId() {
    return $this->id;
  }

  public function getName() {
    return $this->name;
  }

  public function getLocation() {
    return $this->location;
  }

  public function getMessage() {
    return $this->message;
  }

  public function getTinyUrl() {
    return $this->tinyUrl;
  }

  public function getGeneratedId() {
    return $this->generatedId;
  }
}

?>
