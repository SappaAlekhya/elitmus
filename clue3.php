<?php
session_start(); 
$_SESSION['clue3']=$_SESSION['clue2']+10;?>
<h3 align="center" id="h1">Welcome to level-3
    <?php
    echo $_SESSION['name'];
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
                width: 30%;
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
                background-image:url('https://previews.123rf.com/images/pazhyna/pazhyna1710/pazhyna171000009/87811626-opened-treasure-chest-and-ancient-paper-scroll-on-wooden-background-concept-of-travel-and-adventure.jpg'); 
                background-position:center;
                background-size:1550px 1150px;
                background-repeat:no-repeat;
                
            }
            </style>
</head>
<body>
<div>
<h1 align="center">crack the Pirate code!</h1>
</div>

<h2 align="center">to answer me you must watch the video!</h2>
<br>
<br>

<button><a href="https://youtube.com/shorts/UEOolSliaUc?feature=share">click on me to watch!</a></button>
<br>
<br>
<button onclick="displayText()">Click me for question!</button>

    <h3 id="text" align="center"></h3>
    <input align="center" type="text" id="inputBox" placeholder="enter your answer">
<br>
<br>
<button onclick="checkAnswer()">Submit</button>

<script>
    let open = new Audio("assets_open-chest.mp3");
    function displayText() {
        const textElement = document.getElementById("text");
        textElement.innerHTML = "what is the expression in september month?";
      }
function checkAnswer() {
  var answer = document.getElementById("inputBox").value;
  
  if (answer.toLowerCase() === "active") {
    open.play();
    alert("Correct!");
    location.replace('clue4.php');
  } else {
    open.play();
    alert("Wrong. Please try again.");
  }
}
</script>

</body>
</html>
