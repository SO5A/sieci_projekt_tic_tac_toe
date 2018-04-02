var moves=new Array();
var image1=new Image(); image1.src="ex.gif";
var image2=new Image(); image2.src="oh.gif";
function setbutton(cellnum){
	if(moves[cellnum]==0){
	document.images['rc'+cellnum].src="ex.gif";
	moves[cellnum]=1;
	//game[done]=cellnum;
	//done++;
	}else alert('You cannot move here!');
	}
}

function startGame(){
document.turn="X";
document.winner =null;
setMessage(document.turn + "get to start");
}

function setMessage(msg){
document.getElementById("message").innerText=msg;
}	
function nextMove(square){
	if(square.innerText ==""){
	square.innerText=document.turn;
	switchTurn();
	{else{
		setMessage("That square is already used");
}
function switchTurn(){
	if(checkForWinner(document.turn)){
		setMassage("Congratulations,"+document.turn+"! You win!");
	}
	else if(document.turn =="X"){
		document.turn="O";
	}else{
		document.turn="X";
	}
	setMessage("It's "+document.turn+"turn!");
}
function checkForWinner(move){
	var result=false;
	if(checkRow(1,2,3,move)||
	checkRow(4,5,6,move)||
	checkRow(7,8,9,move)||
	checkRow(1,4,7,move)||
	checkRow(2,5,8,move)||
	checkRow(3,6,9,move)||
	checkRow(1,5,9,move)||
	checkRow(3,5,7,move)){
	result=true}
	return result;
}
	
function checkRow(a,b,c,move){
	var result =false;
	if(getBox(a)==move && getBox(b)==move && getBox(c)==move){
		result=true;
	}
	return result;
}

function getBox(number){
	return document.getElementById("s"+number).innerText;
}