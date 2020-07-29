<?php
$username=$_POST['Username'];
$email=$_POST['email'];
$password=$_POST['password'];  

if( !empty($username) || !empty($email) || !empty($password))
{
$host ="localhost";
$dbUsername="root";
$dbPassword="";
$dbname="formdb";


//create connection

$conn= new mysqli($host,$dbUsername,$dbPassword,$dbname);

if(mysqli_connect_error()){
die('connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
} else {
$SELECT ="SELECT email FROM formdb Where email = ? Limit 1";
$INSERT ="INSERT Into formdb (Username,email,password) values(?,?,?)";

//prepare statement

$stmt =$conn->prepare($SELECT);
$stmt->bind_param("s",$email);
$stmt->execute();
$stmt->bind_result($email);
$stmt->store_result();
$rnum=$stmt->num_rows; 

if($rnum==0) 
{
  $stmt->close();

  $stmt=$conn->prepare($INSERT);
  $stmt->bind_param("sss",$username,$email,$password);

  $stmt->execute();

  echo "Email registered successfully!!";
}
else
{
echo "This email already exists!!";
}
$stmt->close();
$conn->close();
}

}else {
echo "All fields are required!!";
die();
}
?>