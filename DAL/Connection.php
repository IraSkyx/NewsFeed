<?php

/**
 * Created by PhpStorm.
 * User: adlenoir
 * Date: 17/11/2017
 * Time: 15:14
 */

class Connection extends PDO {

  private $stmt;

  public function __construct() {
    global $dsn,$login,$password;
    parent::__construct($dsn,$login,$password);
    $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  /**
  * @param string $query
  * @param array $parameters *
  * @return bool Returns `true` on success, `false` otherwise
  */
  public function executeQuery(string $query, array $parameters = []) : bool {
  	$this->stmt = parent::prepare($query);

  	foreach ($parameters as $name => $value) {
  	 $this->stmt->bindValue($name, $value[0], $value[1]);
  	}

  	return $this->stmt->execute();
  }

  /**
  * @return array Returns all results from the last query return
  */
  public function getResults() : array {
   	return $this->stmt->fetchAll();
  }

  /**
  * @return array Returns the first result from the last query return
  */
  public function getFirst() {
   	return $this->stmt->fetch();
  }
}
