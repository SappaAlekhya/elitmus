<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    $name = $_POST["name"];
    $pwd = $_POST["password"];

// check if user is logged in and is an admin
if( $name == 'admin'&& $pwd=='Admin@12') {
  
  // your code to display the leaderboard
  echo "<h1 align='center'>Leaderboard</h1>";
  $host = 'localhost';
    $uname = 'root';
    $password = "";
    $dbname = "form";
    $conni = mysqli_connect($host, $uname, $password, $dbname);
  $s="select * from elitmusadmin order by total desc";
    $res=mysqli_query($conni,$s);
    if($s)
    {
        echo "<table border=1 align='center' style='background-color:pink'>
        <tr><th>Player name</th>
        <th>Score at level-1</th>
        <th>Score at level-2</th>
        <th>Score at level-3</th>
        <th>Score at level-4</th>
        <th>Final score</th>
    </tr>";
      while($row=mysqli_fetch_assoc($res))
        {
    echo "<tr><td>".$row['player']."</td>";
    echo "<td>".$row['s1']."</td>";
    echo "<td>".$row['s2']."</td>";
    echo "<td>".$row['s3']."</td>";
    echo "<td>".$row['s4']."</td>";
    echo "<td>".$row['total']."</td></tr>";
    //echo "<td>".$row['religions']."</td></tr>";
   }
}
echo "</table>";






  
}
else{
    $host = 'localhost';
    $uname = 'root';
    $password = "";
    $dbname = "form";
    $conn = mysqli_connect($host, $uname, $password, $dbname);
    if ($conn) {
        //echo "<b>Connection successful</b>.";
    } else {
        echo "Connection Failed.";
        die("Connection Failed:" . mysqli_connect_error());
    }
    $sql = "select * from elitmus where id='$name' and password='$pwd'";
    $res = mysqli_query($conn, $sql);
    if (mysqli_num_rows($res) > 0) {
        //session_start();

        $_SESSION['btn']=time();
        $unix_timestamps = strtotime($_SESSION['btn']); // convert the timestamp to a Unix timestamp

$second = date('s', $unix_timestamp); // extract the seconds
$minute = date('i', $unix_timestamp); // extract the minutes
$hour = date('H', $unix_timestamp);
        $_SESSION['name'] = $name;
        header('Location:clue1.php');
    } else {
        echo "<script>alert('invalid Credentials');</script>";
        //header('Location:loginpage.php');
        echo "<script>location.replace('loginpage.php');</script>";
    }
}
}
?>