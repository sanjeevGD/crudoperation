<?php
session_start();
require 'dbcon.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud opertaion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
    <?php include('message.php');?>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit student
                        <a href="index.php" class="btn btn-danger float-end">Back</a>
                    </h4>
                    <div class="card-body">
                        <?php
                         if(isset($_GET['id']))
                        {
                             $student_id=mysqli_real_escape_string($con,$_GET['id']);
                             $query="SELECT *FROM students WHERE id='$student_id'";
                             $query_run=mysqli_query($con,$query);
                             if(mysqli_num_rows($query_run)>0)
                             {
                                $student=mysqli_fetch_array($query_run);
                             ?>
                                    <form action="code.php"  method="post">
                                        <input type="hidden"  name="student_id" value="<?= $student['id'];?>">
                       <div class="mb-3">
                            <label> Student name</label>
                            <input type="text" name="name" value="<?= $student['name'];?>" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label> Student email</label>
                            <input type="text" name="email"value="<?= $student['email'];?>" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label> Student phone</label>
                            <input type="text" name="phone"value="<?= $student['phone'];?>" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label> Student course</label>
                            <input type="text" name="course"value="<?= $student['course'];?>" class="form-control">
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="update_student" class="btn btn-primary">Update student</button>
                        </div>
                       </form>
                             <?php
                             }
                             else{
                                echo "<h4>NO SUCH ID FOUND</h4>";
                             }

                        }
                        ?>
                
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>