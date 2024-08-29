<?php
session_start();
require 'dbcon.php';


if(isset($_POST['delete_student']))
{
    $student_id=mysqli_real_escape_string($con,$_POST['delete_student']);
    $query="DELETE FROM students WHERE id='$student_id'";
    $query_run=mysqli_query($con,$query);
    if($query_run)
    {
        $_SESSION['message']="student id deleted sucessfully";
        header("location:index.php");
        exit(0);
    } else  
    {
        $_SESSION['message']="student id not deleted";
        header("location:index.php");
        exit(0);
    }
     
   
}

if(isset($_POST['update_student']))
{
    $student_id=mysqli_real_escape_string($con,$_POST['student_id']);
    $name=mysqli_real_escape_string($con,$_POST['name']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $phone=mysqli_real_escape_string($con,$_POST['phone']);
    $course=mysqli_real_escape_string($con,$_POST['course']);
    $query=" UPDATE students SET name='$name', email='$email', phone='$phone',course='$course' WHERE id='$student_id'";
    $query_run=mysqli_query($con,$query);

    if($query_run)
    {
        $_SESSION['message']="student id updated sucessfully";
        header("location:index.php");
        exit(0);
    } else  
    {
        $_SESSION['message']="student id not updated ";
        header("location:index.php");
        exit(0);
    }
     
}

if(isset($_POST['save_student']))
{
    $name=mysqli_real_escape_string($con,$_POST['name']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $phone=mysqli_real_escape_string($con,$_POST['phone']);
    $course=mysqli_real_escape_string($con,$_POST['course']);
    $query=" INSERT students (name, email, phone, course) VALUES ('$name','$email','$phone','$course')";
   
    $query_run = mysqli_query($con ,$query);
    if($query_run)
    {
        $_SESSION['message']="student id created sucessfully";
        header("location:student.php");
        exit(0);

    }else
      {
  
        $_SESSION['message']="student id not created";
        header("location:student.php");
        exit(0);
   
    }
    
}
?>