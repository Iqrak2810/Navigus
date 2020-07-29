<?php
if($_POST)
{
$host="localhost";
$dbUsername="root";
$dbPassword="";
$dbname="formdb";
     $email=$_POST['email'];
     $password=$_POST['password'];
   $conn=mysqli_connect($host,$dbUsername,$dbPassword,$dbname);
     $query="SELECT * from formdb where email='$email' and password='$password'";
   
     $result=mysqli_query($conn,$query);

     if(mysqli_num_rows($result)==1)
   {
       session_start();
       $_SESSION['formdb']='true';
       header('location:abcd.php');
   }
   else
    {
      echo 'OOOOOOPSYYY!!Wrong Username or Password :/';
        
    }
}
 
?>