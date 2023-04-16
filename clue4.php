<?php
session_start(); 
$_SESSION['clue']=time();
$_SESSION['clue4']=$_SESSION['clue3']+10;
$_SESSION['score']=($_SESSION['clue']-$_SESSION['btn'])+$_SESSION['clue4'];
//echo $_SESSION['btn'];?><h3>hi</h3><?php
//echo $_SESSION['clue'];?><h3>hlooo</h3><?php
//echo $_SESSION['score'];?><h3>hlooo</h3><?php
//echo $_SESSION['clue4'];

//$login_timestamp = $_SESSION['login_timestamp']; // assuming the timestamp is stored in the session
$unix_timestamp = strtotime($_SESSION['clue']); // convert the timestamp to a Unix timestamp

$seconds = date('s', $unix_timestamp); // extract the seconds
$minutes = date('i', $unix_timestamp); // extract the minutes
$hours = date('H', $unix_timestamp); // extract the hours in 24-hour format



?>
<h3 align="center" id="h1">Welcome to final level
    <?php
    echo $_SESSION['name'];
    $host = 'localhost';
    $uname = 'root';
    $password = "";
    $dbname = "form";
    $connni = mysqli_connect($host, $uname, $password, $dbname);
    if ($connni) {
        //echo "<script>alert('You are signed up Successfully!')</script>";
        $sql = "delete from elitmusadmin where s1='0'";
    }
        if (mysqli_query($connni, $sql)) 
	 {
		//echo "<script>alert('You are signed up Successfully!')</script>";
        
	 }
        //echo $_SESSION['name'];
     else {
        echo $_SERVER['score'];
        die("Connection Failed:" . mysqli_connect_error());
    }
    ?></h3>
<!DOCTYPE html>
<html>
    <head>
        <style>
            img{
                display: block;
                margin-left: auto;
                margin-right: auto;
            }
            input{
                text-align:center;
                margin:auto;
                display:block;
                width: 20%;
                height:15%;
            }
            button{
                margin:auto;
                display:block;
                background-color: #04AA6D;
                color: white;
                padding: 16px 32px;
                text-decoration: none;
                cursor: pointer;
            }
            body{
                background-image:url('https://cdn.pixabay.com/photo/2015/06/10/18/10/chest-805006__480.jpg'); 
                background-position:center;
                background-size:1550px 850px;
                background-repeat:no-repeat;
                
            }
            </style>
</head>
<body>
<div>
<h1 align="center">crack the Pirate code!</h1>
</div>

<img src="https://3.bp.blogspot.com/-yGqQN4BOZNg/WyjIf4rQZgI/AAAAAAABexc/KC-OmiLnwGER0xI2rDHjm8alGHj14rrPACLcBGAs/s1600/crack-the-code-puzzle.png" width="500" height="400">
<br>
<input align="center" type="text" id="inputBox" placeholder="enter your answer">
<br>
<br>

<button onclick="checkAnswer()">Submit</button>

<script>
    let open = new Audio("assets_open-chest.mp3");
function checkAnswer() {
  var answer = document.getElementById("inputBox").value;
  
  if (answer.toLowerCase() === "164") {
    open.play();
    alert("Correct!");
    location.replace('final.php');
  } else {
    open.play();
    alert("Wrong. Please try again.");
  }
}
</script>

</body>
</html>