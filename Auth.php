<?php


class MySQLSessionHandler implements SessionHandlerInterface

{
	
	
	private $link;
	public function __construct()
	{
		$this->link = new PDO("mysql:host=localhost;dbname=codexam","root","");
	}
	public function open($savePath, $sesionName)
	{
		if($this->link)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function read($sessionId)
	{
		
		try
		{
			$sql ="SELECT session_data FROM session WHERE session_id=:session_id";
			$stmt=$this->link->prepare($sql);
			$stmt->bindParam(":session_id",$sessionId);
			$stmt->execute();
			$stmt->bindColumn('session_data', $sessionData);
			#$stmt->bindColumn(1, $sessionData);	
			$stmt->fetch(PDO::FETCH_BOUND);		
			return $sessionData ? $sessionData: '';
		}
	
		catch(PDOException $e)
		{
			return '';
		}
	}
	public function write($sessionId, $sessionData)
	{
		
		try
		{
			$time = time();
			$token = self::create_token(20);
			
			$sql ="REPLACE INTO session(session_id, created, session_data, session_token) VALUES (:session_id, :created, :session_data, :session_token)";

			$stmt=$this->link->prepare($sql);
			
			$stmt->bindParam(":session_id", $sessionId);
			$stmt->bindParam(":created",$time);
			$stmt->bindParam(":session_data", $sessionData);
			$stmt->bindParam(":session_token", $token);
			$stmt->execute();
			$stmt->closeCursor();
		
			return true;
		}
		catch(PDOException $e)
		{
			return false;
		}
	}
	public function destroy($sessionId)
	{
		try
		{
			$sql="DELETE FROM session WHERE session_id=:session_id";
			$stmt=$this->link->prepare($sql);
			$stmt->execute(array(":session_id"=>$sessionId));
			
			return true;
		}
		catch(PDOException $e)
		{
			return false;
		}
	}
	public function gc($maxlifetime)
	{
		try
		{
			$past = time()-$maxlifetime;
			$sql = "DELETE FROM sessions WHERE created < ? ";
			$stmt->execute();
			$stmt->bindParam("i",$past);
			$stmt->execute();
			$stmt->closeCursor();
			return true;
		}
		catch(PDOException $e)
		{
			return false;
		}
	}
	public function close()
	{
		unset($this->link);
	}
	static function create_token($length)
	{
		$token = array
		(
			range(0,9),
			range('a','z'),
			range('A','Z')

		);

		$char = array();
		foreach ($token as $key => $value) {
			foreach ($value as $k => $v) {
				$char[]=$v;
			}
		}
		$token = null;
		for ($i=0; $i <=$length ; $i++) { 
			$token .=$char[rand($i, count($char)-1)];
		}

		return $token;
	}

}

?>
