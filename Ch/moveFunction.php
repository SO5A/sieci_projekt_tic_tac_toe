
<?php

function move($where){
		include "../connect.php";
		$id=$_SESSION['GameId'];
		$UserReq=$_db->query("SELECT * FROM users ORDER BY whoisTurn");
		$existCount = $UserReq->rowCount();
		if( isset($_SESSION['XorO']) )
		{
			$move=1;
		}else $move=2;
		if ($existCount == 0) { 
			return "";
		}
		if ($existCount > 0) {
			while($row = $UserReq->fetch(PDO::FETCH_ASSOC)){
				if($id==$row["GameId"])
				{
					if($row["whoisTurn"]==0 and $row["UserName"]==$_SESSION['UserName']){
						echo "<script language='javascript'>alert('Teraz ruch ma ".$_SESSION['GameOpponent']."!');</script>"; 
						break;
					}
					if ($row["p$where"]==2 or $row["p$where"]==1)  
					{
						echo "<script language='javascript'>alert('ERROR!To pole jest juz wypełnione!');</script>"; 
						break;
						}
				
					 if($row["whoisTurn"]==1 and $row["UserName"]==$_SESSION['UserName']){
							$changemove =$_db->prepare("UPDATE users SET p$where=?,whoisTurn=? WHERE UserName=?");
							$changemove->execute(array($move,0,$_SESSION['UserName']));
							$changemove_opponent =$_db->prepare("UPDATE users SET p$where=?,whoisTurn=? WHERE UserName=?");
							$changemove_opponent->execute(array($move,1,$_SESSION['GameOpponent']));
							checkboard();
							}
							
					}
				}
			}	
}			
		
	function checkboard(){
		include "../connect.php";
		$UserReq=$_db->prepare("SELECT * FROM users WHERE GameId=?");
$UserReq->execute(array($_SESSION['GameId']));
		$existCount = $UserReq->rowCount();
		if ($existCount == 0) { 
			return false;
		}
		if ($existCount > 0) {
			while($row = $UserReq->fetch(PDO::FETCH_ASSOC)){
			if((
			($row["p11"]==1 and $row["p12"]==1 and $row["p13"]==1) or ($row["p11"]==2 and $row["p12"]==2 and $row["p13"]==2) or
			($row["p21"]==1 and $row["p22"]==1 and $row["p23"]==1) or ($row["p21"]==2 and $row["p22"]==2 and $row["p23"]==2) or 
			($row["p31"]==1 and $row["p32"]==1 and $row["p33"]==1) or ($row["p31"]==2 and $row["p32"]==2 and $row["p33"]==2) or
			($row["p11"]==1 and $row["p21"]==1 and $row["p31"]==1) or ($row["p11"]==2 and $row["p21"]==2 and $row["p31"]==2) or
			($row["p12"]==1 and $row["p22"]==1 and $row["p32"]==1) or ($row["p12"]==2 and $row["p22"]==2 and $row["p32"]==2) or
			($row["p13"]==1 and $row["p23"]==1 and $row["p33"]==1) or ($row["p13"]==2 and $row["p23"]==2 and $row["p33"]==2) or
			($row["p11"]==1 and $row["p22"]==1 and $row["p33"]==1) or ($row["p11"]==2 and $row["p22"]==2 and $row["p33"]==2) or
			($row["p31"]==1 and $row["p22"]==1 and $row["p13"]==1) or ($row["p31"]==2 and $row["p22"]==2 and $row["p13"]==2)
			)and $row["UserName"]==$_SESSION['UserName'])
			{
				$newwins=$row["wins"]+1;
				$addwinner=$_db->prepare("UPDATE users SET wins=?, whoisTurn=?, p11=? ,p12=?, p13=?, p21=?, p22=?, p23=?, p31=?, p32=?, p33=? WHERE UserName=?");
				$addwinner->execute(array($newwins,0,0,0,0,0,0,0,0,0,0,$_SESSION['UserName']));
				$addloses=$_db->prepare("UPDATE users SET loses=?, whoisTurn=?, p11=? ,p12=?, p13=?, p21=?, p22=?, p23=?, p31=?, p32=?, p33=?WHERE UserName=?");
				$addloses->execute(array($newwins,1,0,0,0,0,0,0,0,0,0,$_SESSION['GameOpponent']));
				
			}
			if(
			($row["p11"]==1 or $row["p11"]==2) and 
			($row["p12"]==1 or $row["p12"]==2) and 
			($row["p13"]==1 or $row["p13"]==2) and 
			($row["p21"]==1 or $row["p21"]==2) and 
			($row["p22"]==1 or $row["p22"]==2) and 
			($row["p23"]==1 or $row["p23"]==2) and 
			($row["p31"]==1 or $row["p31"]==2) and 
			($row["p32"]==1 or $row["p32"]==2) and 
			($row["p33"]==1 or $row["p33"]==2) and 
			$row["UserName"]==$_SESSION['UserName'])
			{
				$newdraws=$row["draws"]+1;
				$adddraws=$_db->prepare("UPDATE users SET draws=?, whoisTurn=?, p11=? ,p12=?, p13=?, p21=?, p22=?, p23=?, p31=?, p32=?, p33=? WHERE UserName=?");
				$adddraws->execute(array($newdraws,0,0,0,0,0,0,0,0,0,0,$_SESSION['UserName']));
				$adddrawsOpponent=$_db->prepare("UPDATE users SET draws=?, whoisTurn=?, p11=? ,p12=?, p13=?, p21=?, p22=?, p23=?, p31=?, p32=?, p33=?WHERE UserName=?");
				$adddrawsOpponent->execute(array($newdraws,1,0,0,0,0,0,0,0,0,0,$_SESSION['GameOpponent']));
				
			}
			}
				
	}
	}
		?>