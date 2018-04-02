<?php
session_start();


include "../connect.php";
$UserReq=$_db->prepare("SELECT * FROM users WHERE UserName=?");
$UserReq->execute(array($_SESSION['UserName']));
		$existCount = $UserReq->rowCount();
		if ($existCount == 0) { // evaluate the count
			return false;
		}
		if ($existCount > 0) {
			while($row = $UserReq->fetch(PDO::FETCH_ASSOC)){	
				$_SESSION['wins']=$row["wins"];
				$_SESSION['loses']=$row["loses"];
				$_SESSION['draws']=$row["draws"];
				$_SESSION['GameId']=$row["GameId"];
				if($row["p11"]==1) $_SESSION['p11url']="ex.gif";
				else if($row["p11"]==2) $_SESSION['p11url']="oh.gif";
				else $_SESSION['p11url']="nothing.gif";
				
				if($row["p12"]==1) $_SESSION['p12url']="ex.gif";
				else if($row["p12"]==2) $_SESSION['p12url']="oh.gif";
				else $_SESSION['p12url']="nothing.gif";
				
				if($row["p13"]==1) $_SESSION['p13url']="ex.gif";
				else if($row["p13"]==2) $_SESSION['p13url']="oh.gif";
				else $_SESSION['p13url']="nothing.gif";
				
				if($row["p21"]==1) $_SESSION['p21url']="ex.gif";
				else if($row["p21"]==2) $_SESSION['p21url']="oh.gif";
				else $_SESSION['p21url']="nothing.gif";
				
				if($row["p22"]==1) $_SESSION['p22url']="ex.gif";
				else if($row["p22"]==2) $_SESSION['p22url']="oh.gif";
				else $_SESSION['p22url']="nothing.gif";
		
				if($row["p23"]==1) $_SESSION['p23url']="ex.gif";
				else if($row["p23"]==2) $_SESSION['p23url']="oh.gif";
				else $_SESSION['p23url']="nothing.gif";
		
				if($row["p31"]==1) $_SESSION['p31url']="ex.gif";
				else if($row["p31"]==2) $_SESSION['p31url']="oh.gif";
				else $_SESSION['p31url']="nothing.gif";
				
				if($row["p32"]==1) $_SESSION['p32url']="ex.gif";
				else if($row["p32"]==2) $_SESSION['p32url']="oh.gif";
				else $_SESSION['p32url']="nothing.gif";
				
				if($row["p33"]==1) $_SESSION['p33url']="ex.gif";
				else if($row["p33"]==2) $_SESSION['p33url']="oh.gif";
				else $_SESSION['p33url']="nothing.gif";
			}		
}

		?>
		<h2>Witam <span style="color:green"><?php echo $_SESSION['UserName'];?></span>! Grasz z  <span style="color:red"><?php echo $_SESSION['GameOpponent'];
?></span>!
		</h2>	
		<table cellpadding="0" cellspacing="0" border="5" bordercolor="black" bordercolorlight="gray" bgcolor="white" align="center"><tr>
			<td width="55" ><a href="?move=11"><img src="<?php echo $_SESSION['p11url'];?>" border="0" ></a></td>
			<td width="55"><a href="?move=12"><img src="<?php echo $_SESSION['p12url'];?>" border="0"></a></td>
			<td width="55"><a href="?move=13"><img src="<?php echo $_SESSION['p13url'];?>" border="0"></a></td>
		</tr><tr>
			<td width="55"><a href="?move=21"><img src="<?php echo $_SESSION['p21url'];?>" border="0"></a></td>
			<td width="55"><a href="?move=22"><img src="<?php echo $_SESSION['p22url'];?>" border="0"></a></td>
			<td width="55"><a href="?move=23"><img src="<?php echo $_SESSION['p23url'];?>" border="0"></a></td>
		</tr><tr>
			<td width="55"><a href="?move=31"><img src="<?php echo $_SESSION['p31url'];?>" border="0"></a></td>
			<td width="55"><a href="?move=32"><img src="<?php echo $_SESSION['p32url'];?>" border="0"></a></td>
			<td width="55"><a href="?move=33"><img src="<?php echo $_SESSION['p33url'];?>" border="0"></a></td>
		</tr></table>
		<h2>
		Tabela wyników:</h2><h3> WIN:<span style="color:green"> <?php echo $_SESSION['wins'];?> </span>  DRAWS: <?php echo $_SESSION['draws'];?>   
		LOSES:   <span style="color:red"><?php echo $_SESSION['loses'];?></span></h3>
		
		