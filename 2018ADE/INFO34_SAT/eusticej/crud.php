<?php

//Copied from previous school work, made by Andrew Pate

/**
 * Generic PDO Connection class
 *
 * @author arp
 */

class Crud {

	//Class vars
	public $conn = null;

    public function connect($db_host, $db_name, $db_username, $db_password){

        date_default_timezone_set("Australia/Melbourne");

        $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
        try
        {
            $this->conn = new PDO("mysql:host={$db_host};dbname={$db_name};charset=utf8", $db_username, $db_password, $options);
        }
        catch(PDOException $ex)
        {
            die("Failed to connect to the database: " . $ex->getMessage());
        }

        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

		ini_set('display_errors', 1);
		error_reporting(E_ALL);

    }

    public function query($sql){
            return $this->conn->query($sql);
    }

    public function create($table, $arValues, $arFields=NULL){
		//insert a record
		$sql = "INSERT INTO `$table` (";
		$values = "values(";
		if($arFields == NULL){
			foreach($arValues as $field => $value){
				$sql .= "`".$field."` ,";
				$values .= "'".addslashes($value)."' ,";
			}

		}else{
			for($i=0;$i<count($fields);$i++){
				$sql .= "`".$arFields[$i]."` ,";
				$values .= "'".$arValues[$i]."' ,";
			}
		}
		$sql = substr($sql, 0, -2); //remove last , and space
		$values = substr($values, 0, -2); //remove last , and space
		$sql .= ") ".$values.")";
		return $this->conn->query($sql);
    }

    public function read($sql){

		if(strstr($sql, "SELECT")){
			return $this->conn->query($sql);
		}else{
			die("READ function only for SELECT queries");
		}
    }

	public function update($table, $id, $arValues, $arFields=NULL ){

		$sql = "UPDATE `$table` SET ";
		if($arFields == NULL){ //then passed in key/value pairs
			foreach($arValues as $field => $value){
				$sql .= "`".$field."`='".$value."', ";
			}
		}else{
			for($i=0;$i<count($arFields);$i++){
				$sql .= "`".$arFields[$i]."`='".$arValues[$i]."', ";
			}
		}
		$sql = substr($sql, 0, -2); //remove last , and space
		$sql .= " WHERE `id`='".$id."'";
		return $this->conn->query($sql);
	}
    public function delete($table, $id){

		$sql = "DELETE from $table WHERE `id`=$id";
		if(strstr($sql, "DELETE")){
			return $this->conn->query($sql);
		}else{
			die("delete function only for DELETE queries");
		}
    }

}
