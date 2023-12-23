<?php
namespace sphereerp\utils;
use \PDO;

class db{
	public $handle=['conn'=>false,'connected'=>false,'message'=>''];
  
	function __construct($user=dbUser,$password=dbPassword,$host=dbHost,$charset='utf8mb4',$database=dbSchema){
		try{
			$this->handle['conn']=new PDO("mysql:host=$host;dbname=$database;charset=$charset",$user,$password,
			[PDO::MYSQL_ATTR_USE_BUFFERED_QUERY=>true,PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::ATTR_EMULATE_PREPARES=>true,
			PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_BOTH]);
			$this->handle['connected']=true;
		}
		catch(PDOException $e){
			$this->handle['message']=$e->getMessage();
		}
	}

	function sql($query,$values=[],$usedb=null){
		try{
			$pdo=$this->handle['conn'];if($usedb!=null){$pdo->query("USE $usedb");}
			$stmt=$pdo->prepare($query);
			if($stmt!==false){$stmt->execute($values);}
			$rowCount=$stmt->rowCount();
		}
		catch(Throwable $e){$error=$e->getMessage();}
		return ['result'=>$stmt??false,'row_count'=>$rowCount??false,'error'=>$error??false];
	}

	function fetch($object,$return=1,$type=PDO::FETCH_BOTH){
		//$type PDO::FETCH_NUM, PDO::FETCH_BOTH, PDO::FETCH_OBJ, PDO::FETCH_LAZY, PDO::FETCH_ASSOC, 
		//list=PDO::FETCH_COLUMN, key_pair=PDO::FETCH_KEY_PAIR, unique=PDO::FETCH_UNIQUE, grouped=PDO::FETCH_GROUP
		try{
			if($return==1)
			$res=$object->fetch($type);      
			if($return=='all')
			$res=$object->fetchAll($type);
			if($return=='col')
			$res=$object->fetchColumn();
		}
		catch(Throwable $e){$error=$e->getMessage();}
		return ['result'=>$res??false,'error'=>$error??false];
	}

	function __destruct(){
		try{
			//$this->handle['conn']->query('KILL CONNECTION_ID()');
			//$this->handle['conn']=false;
		}
		catch(Throwable $e){}
	}
}
