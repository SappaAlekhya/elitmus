<html>
    <body>
<?php
$errors=array();

$email=$_POST["email"];
$username=$_POST["name"];
$password=$_POST["pwd"];
$uc=preg_match('@[A-Z]@',$password);
$lc=preg_match('@[A-Z]@',$password);
$number=preg_match('@[A-Z]@',$password);
$server_name="localhost";
$usernames="root";
$passwords="";
$database_name="form";


$conn=mysqli_connect($server_name,$usernames,$passwords,$database_name);

if(empty($username)||is_numeric($username))
{
    $e1="please insert your name and not numeric values";
    array_push($errors,$e1);
}
if(empty($email)||(!filter_var($email,FILTER_VALIDATE_EMAIL)))
{
    $e2="please insert your valid email mus end with @gmail.com";
    array_push($errors,$e2);
}
if(!$uc||!$lc||!$number||strlen($password)<5)

{
    $e7="please insert a strong password which contains atleast one lowercase letter,uppercase letter,number and >5";
    array_push($errors,$e7);
}

if(isset($conn) and empty($errors))
{
    echo "batabase connected"."<br>";
    
        $sql_query = "INSERT INTO elitmus(email,id,password) VALUES ('$email','$username','$password')";
     if (mysqli_query($conn, $sql_query)) 
	 {
		echo "<script>alert('You are signed up Successfully!')</script>";
	 } 
    }

if(empty($errors))
{
    echo "you signed in successfully"."<br>";
   header('location:loginpage.php');
}
else if($errors)
{
    foreach($errors as $e)
    {
        echo $e."<br>";
    }
    echo "<h3><i>please enter correct details! click here to sign in again<i></h3>";
    //echo "<a href='formvalid.php'>sign up</a>";
    header('location:signup.php');
}


?>
    </body>
</html>