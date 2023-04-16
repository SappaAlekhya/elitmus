<?php
session_start(); 
?>
<h3 align="center" id="h1">Thank you for playing! 
    <?php
    echo $_SESSION['name'];
    ?></h3>
<h3 align="center" id="h1">your score-
    <?php
    echo $_SESSION['score'];
    //echo $_SESSION['clue1'];
    //echo $_SESSION['clue2'];

    $player=$_SESSION['name'];
    $s1=$_SESSION['clue1'];
    $s2=$_SESSION['clue2'];
    $s3=$_SESSION['clue3'];
    $s4=$_SESSION['clue4'];
    $total=$_SESSION['score'];

    $host = 'localhost';
    $uname = 'root';
    $password = "";
    $dbname = "form";
    $connn = mysqli_connect($host, $uname, $password, $dbname);
    if ($connn) {
        //echo "<script>alert('You are signed up Successfully!')</script>";
        $sql = "INSERT INTO elitmusadmin VALUES ('$player','$s1','$s2','$s3','$s4','$total')";
        if (mysqli_query($connn, $sql)) 
	 {
		//echo "<script>alert('You are signed up Successfully!')</script>";
	 }
        //echo $_SESSION['name'];
    } else {
        echo $_SERVER['score'];
        die("Connection Failed:" . mysqli_connect_error());
    }
    //$sql = "INSERT INTO elitmusadmin(player,s1,s2,s3,s4,total) VALUES ('$player','$s1','$s2','$s3','$s4','$total')";
    ?>
</h3>
<html>
    <head>
        <style>
            img{
                display: block;
                margin-left: auto;
                margin-right: auto;
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
                background-color:lavender;
            }
            
            </style>
</head>
    <body>
        <h1 align="center" style="color:lavender">Congrats bravo!! You found the chest!</h1>
        <img src="https://static.wixstatic.com/media/539f7e_d10a17afcf33452ebdb360285d7a7771~mv2.gif">
        <h2 align="center">Game over!<h2>
        <form action="logout.php" method="post" align="center">
<table align="center">
    <tr>
        <td>
    <input align="center" type="submit" name="logout" value="logout here">
</td>
</tr>
</table>
</form>

</body>
    </html>