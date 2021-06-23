<?php
session_start(); 
$conn = mysqli_connect("localhost","root","","studentsdb");
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Registration</title>
  </head>
  <body>
    
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-16">
                <div class="card">
                    <div class="card-header bg-info">
                        <h4 class="text-white ml-5 text-center"> PHP CRUD : - Manage Student Details </h4>
                    </div>
                    <div class="card-body">
                    <?php 
                            if(isset($_SESSION['status']) && $_SESSION != '')
                            {
                                ?>
                                
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                
                                <?php
                                unset($_SESSION['status']);
                            }
                        ?>
                    
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NAME</th>
                                    <th>EMAIL</th>
                                    <th>PHONE</th>
                                    <th>GENDER</th>
                                    <th>INTREST</th>
                                    <th>COUNTRY</th>
                                    <th>STATE</th>
                                    <th>CITY</th>
                                    <th>IMAGE</th>
                                    <th>EDIT</th>
                                    <th>DELETE</th>
                                </tr>
                            </thead>
                            <?php
                                $query = "select * from student";
                                $query_run = mysqli_query($conn, $query);

                                $i=1;
									while($row = mysqli_fetch_assoc($query_run))
									{
                            ?>
                            <tbody>
                            
                                        <tr>
                                        <!-- <td><?php echo $i++; ?></td> -->
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['stud_name']; ?></td>
                                            <td><?php echo $row['stud_email']; ?></td>
                                            <td><?php echo $row['stud_phone']; ?></td>
                                            <td><?php echo $row['gender']; ?></td>
                                            <td><?php echo $row['course']; ?></td>

                                            <td>
                                            <?php $query2="SELECT * FROM countries WHERE country_id='".$row['country']."'";
                                            
                                            $result2=mysqli_query($conn,$query2);
                                            while($row1=mysqli_fetch_assoc($result2)){
                                            echo $row1['country_name'];
                                            }
                                            ?>
                                            </td>
                                            <td>  <?php $query4="SELECT * FROM states WHERE state_id='".$row['state']."'";
                                            
                                            $result4=mysqli_query($conn,$query4);
                                            while($row3=mysqli_fetch_assoc($result4)){
                                            echo $row3['state_name'];
                                            }
                                            ?></td>
                                            <td>  <?php $query3="SELECT * FROM cities WHERE city_id='".$row['city']."'";
                                            
                                            $result3=mysqli_query($conn,$query3);
                                            while($row2=mysqli_fetch_assoc($result3)){
                                            echo $row2['city_name'];
                                            }
                                            ?></td>


                                            <td>
                                            <img src="<?php echo "upload/".$row['stud_image']; ?>" width="100px" alt="image">
                                            </td>
                                            <td>
                                            <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-info">EDIT</a>
                                            </td>
                                            <td>
                                            <!-- <a href="" class="btn btn-danger">DELETE</a> -->
                                            <form action="code.php" method="POST">
                                                <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>" />
                                                <input type="hidden" name="del_stud" value="<?php echo $row['stud_image']; ?>" />
                                                <button class="btn btn-danger" name="delete_stud" type="submit">Delete</button>
                                            </form>
                                            </td>
                                        </tr>
                                        </tbody>
                                       <?php } ?>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
   
  </body>
</html>