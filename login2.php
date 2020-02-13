<?php
include('common.php');
$nam = $_POST["names"];$reg = $_POST["regno"];$emai = $_POST["email"];$pass = $_POST["password"];
$sql = "SELECT regno from info_acc where regno='$reg'";
include('emailauth.php');
$res = $conn->query($sql);
if($res->num_rows==0)
{
    if($_POST['cat'] == 'invalid')
    {
        $sql = "INSERT INTO info_acc VALUES ('$nam','$reg','$pass','$emai','NULL')";
    }
    else
    {
        $var = $_POST['cat'];
        $nam = "Prof. ".$nam;
        $sql = "INSERT INTO info_acc VALUES ('$nam','$reg','$pass','$emai','$var')";
    }
    if ($conn->query($sql) === TRUE) 
    { 
        echo "New record created successfully";
        header("Refresh:2 ; URL='loginto.html'");
    }       
    else 
    {
        echo "Error";
        header("Refresh:2 ; URL='loginto.html'");
    }
 }
else
{
    echo "User Already Exits Please login";
    header("Refresh:2 ; URL='loginto.html'");
}
?>