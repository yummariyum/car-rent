<?php

class Connection{
	private $objConnection;

	public function __construct(){
		$config=parse_ini_file("config.ini");
		$this->objConnection=new PDO("mysql:host=$config[Hostname];dbname=$config[Database]",$config["User"],$config["Password"]);
		$this->objConnection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}

	public function getConnection(){
		return $this->objConnection;
	}
}

?>