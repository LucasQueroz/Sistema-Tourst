<?php

abstract class ClassConexao {
	
	protected function conectaDB() {
		try{
			$connect = mysqli_connect("localhost", "Admin", "admin", "base_dados_loja");
			mysqli_set_charset($connect, "utf8");
			return $connect;
		}catch(Exception $erro){
			return $erro->getMessage();
		}
	}
}