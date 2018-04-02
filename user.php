<?php
class user{
	private $UserId, $UserName,$UserGameId,$UserPassword,$UserGameOpponent;
	
	public function getUserId(){
		return $this->UserId;
	}
	public function setUserId($UserId){
		return $this->UserId=$UserId;
	}
	
	public function getUserName(){
		return $this->UserName;
	}
	public function setUserName($UserName){
		return $this->UserName=$UserName;
	}
	
	public function getUserPassword(){
		return $this->UserPassword;
	}
	public function setUserPassword($UserPassword){
		return $this->UserPassword=$UserPassword;
	}
	
	public function getUserGameId(){
		return $this->UserGameId;
	}
	public function setUserGameId($UserGameId){
		return $this->UserGameId=$UserGameId;
	}
	public function getUserGameOpponent(){
		return $this->UserGameOpponent;
	}
	public function setUserGameOpponent($UserGameOpponent){
		return $this->UserGameOpponent=$UserGameOpponent;
	}
	
public function UserLogin(){
		include "connect.php";
		$UserRequest=$_db->prepare("SELECT * FROM users WHERE UserName=:UserName AND UserPassword=:UserPassword");
		$UserRequest->execute(array(
		'UserName'=>$this->getUserName(), 
		'UserPassword'=>$this->getUserPassword()  
		));	
		if($UserRequest->rowCount()==0){
			//header("Location: index.php");
			return false;
		} else {
			while($row=$UserRequest->fetch()){
				$this->setUserId($row['UserID']);
				$this->setUserGameId($row['GameId']);
				$this->setUserGameOpponent($row['GameOpponent']);
				$this->setUserGameId($row['GameId']);
				$_SESSION["GameId"]=$row["GameId"];
				if ($row["GameId"] != 0) {
					$_SESSION['GameId']="";
					header("Location: Ch/index.php");
					exit();
				}  
				return true;
			}
		} 
}

public function InGame(){
	include "connect.php";
$UserReq=$_db->prepare("SELECT * FROM users WHERE UserName=?");
$UserReq->execute(array($_SESSION['UserName']));
		$existCount = $UserReq->rowCount();
		if ($existCount == 0) { // evaluate the count
			return false;
		}
		if ($existCount > 0) {
			while($row = $UserReq->fetch(PDO::FETCH_ASSOC)){
				$name = $row["UserName"];
				$token = $row["GameId"];
				if($row["UserName"] == $_SESSION['UserName']) { 
					if($token!=0)
					{
						$_SESSION['GameId']=$token;
						$_SESSION['GameOpponent']=$row["GameOpponent"];
						return true;
					}
				}
			return false;
}	
}
}
public function DisplayAvailablePlayers(){
include "connect.php";
$UserReq=$_db->query("SELECT * FROM users ORDER BY UserID");
		$existCount = $UserReq->rowCount();
		if ($existCount == 0) { // evaluate the count
			return "";
		}
		if ($existCount > 0) {
			while($row = $UserReq->fetch(PDO::FETCH_ASSOC)){
				$name = $row["UserName"];
				$token = $row["GameId"];
				if($row["UserName"] != $_SESSION['UserName']) { 
					if ($row["GameId"] != 0) {
						$available = "not available";
					}else {
						$available = "available";
					}
				
					if ($token==0){
							$token=rand(10000, 10000000);
					}
					if ($row["GameId"] != 0) {
						?>
						<span style="color:red"> <?php echo $name;?>	</br>				
						</span>
						<?php
					} else {
						?>
						<span style="color:#00FF00"onclick="parent.location='redirect.php?id=<?php echo $token;?>&name=<?php echo $name;?>';"> <?php echo $name;?></br>	
						</span>
						<?php
					}
				}		
				
			}
		}
	}
	public function DeleteGame($id){
		include "connect.php";
		$token=0;
		$null=0;
		
		$UserReq=$_db->query("SELECT * FROM users ORDER BY UserID");
		$existCount = $UserReq->rowCount();
		if ($existCount == 0) { // evaluate the count
			return "";
		}
		if ($existCount > 0) {
			while($row = $UserReq->fetch(PDO::FETCH_ASSOC)){
				$gameID = $row["GameId"];			
				if($gameID == $id) {
					$GameOpponent="";
					$GameIdInsert =$_db->prepare("UPDATE users SET GameId=?, GameOpponent=?, p11=? ,p12=?, p13=?, p21=?, p22=?, p23=?, p31=?, p32=?, p33=?, wins=?, loses=?, draws=? WHERE GameId=?");
					$GameIdInsert->execute(array($token,$GameOpponent,0,0,0,0,0,0,0,0,0,0,0,0,$id));
					
					
				}
			}
		}
	}
}

?>