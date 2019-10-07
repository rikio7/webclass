<?php
include 'conn.php';

$std_name=$_POST['std_name'];
$std_email=$_POST['std_email'];
$std_address=$_POST['std_address'];
$std_dob=$_POST['std_dob'];
$std_phno=$_POST['std_phno'];


$query="INSERT INTO `students`(`std_name`,`std_email`,`std_address`,`std_dob`,`std_phno`) VALUES ('$std_name','$std_email','$std_address','$std_dob','$std_phno')";

$result=mysqli_query($con,$query);

if($result)
    {
	echo "Successfully inserted";
	//header("Location:form.html")
    }
    else
    {
    	echo "Failed to insert";
    }
?>