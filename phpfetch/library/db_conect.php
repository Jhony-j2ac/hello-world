<?php

class db_conect{

	private $db_host;
	private $db_name;
	private $db_user;
	private $db_pass;

	private $db_pst;
	private $db_con;


	public function __construct(){
		$this->db_host = DB_HOST;
		$this->db_user = DB_USER;
		$this->db_name = DB_NAME;
		$this->db_pass = DB_PASS;

		$ctl = "mysql:host=" . $this->db_host . ";dbname=" . $this->db_name;

		$config = array(
			PDO::ATTR_PERSISTENT => true,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		);
		try{
			$this->db_con = new PDO($ctl, $this->db_user, $this->db_pass, $config);
			$this->db_con->exec("set names utf8");
		}catch(PDOException $e){
			echo $e->getMessage();
		}
		
	}

	public function query($sql){
		$this->db_pst = $this->db_con->prepare($sql);
	}

	public function value($param, $value, $tipo = null){
		if(is_null($tipo)){
			switch(true){
				case is_int($value):
				$tipo = PDO::PARAM_INT;
				break;

				case is_bool($value):
				$tipo = PDO::PARAM_BOOL;
				break;

				case is_null($value):
				$tipo = PDO::PARAM_NULL;
				break;

				default:
				$tipo = PDO::PARAM_STR;
				break;
			}
		}
		$this->db_pst->bindValue($param, $value, $tipo);
	}

	public function registros(){
		$this->db_pst->execute();
		return $this->db_pst->fetchAll(PDO::FETCH_OBJ);
	}


}