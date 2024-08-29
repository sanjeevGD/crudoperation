<?php
session_start();
require  'dbcon.php';

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
        <?php include "message.php" ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 >Student Deatils
                            <a href="student.php" class="btn btn-primary float-end">ADD Students</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                         <tr>
                              <th>Id</th>
                                <th>Student name</th>
                              <th>Email</th>
                               <th>Phone</th>
                               <th>Course</th>
                               <th>Action</th>
                         </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query="SELECT * FROM students";
                                $query_run=mysqli_query($con,$query);
                                if(mysqli_num_rows($query_run) > 0)
                                {
                                    foreach($query_run as $student)
                                    {
                                      ?>
                                        <tr>
                                        <td><?=$student['id'];?></td>
                                        <td><?=$student['name'];?></td>
                                        <td><?=$student['email'];?></td>
                                        <td><?=$student['phone'];?></td>
                                        <td><?=$student['course'];?></td>
                                        <td>
                                            <a href="edit.php?id=<?=$student['id']?>"class="btn btn-success btn-sm ">Edit</a>
                                            <a href="edit.php?id=<?=$student['id']?>"class="btn btn-info btn-sm ">View</a>

                                            <form action="code.php" method="POST" class="d-inline">
                                                <button type="submit" name="delete_student" value="<?=$student['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                           
                                        </td>
                                        </tr>
                                    <?php
                                    }
                                    
                                }
                                else{
                                    echo "<h4>no record found</h4>";
                                }
                                ?>

                           
                      
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>