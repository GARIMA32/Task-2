
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
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-warning">
                    <h4> EDIT DETAILS</h4> 
                    </div>
                    <div class="card-body">
                        <?php
                        
                            $id = $_GET['id'];
                            
                            $query = "SELECT * FROM student where id='$id' ";
                            $query_run = mysqli_query($conn, $query);
							while($row = mysqli_fetch_assoc($query_run))
							{
                      

                            // if(mysqli_num_rows($query_run) > 0)
                            // {
                            //     foreach($query_run as $row)
                            //     {
                            //         echo $row['id'];
                            //     }
                            // }
                            // else{
                            //     echo "No record available";
                            // }
                        ?>

                        <form action="code.php" method="POST" enctype="multipart/form-data">

                        <input type="hidden" name="stud_id" value="<?php echo $row['id']; ?>"  />
                        <div class="form-group">
                            <label for="">Name</label>
                          <input type="text" name="stud_name" value="<?php echo $row['stud_name']; ?>" required class="form-control" placeholder="Enter Name" />
                        </div>
                        <div class="form-group">
                            <label for="">Eamil</label>
                          <input type="text" name="stud_email" value="<?php echo $row['stud_email']; ?>"  required class="form-control" placeholder="Enter Email" />
                        </div>
                        <div class="form-group">
                            <label for="">Phone</label>
                          <input type="text" name="stud_phone" value="<?php echo $row['stud_phone']; ?>"  required class="form-control" placeholder="Enter Phone Number" />
                        </div>

                        <div class="mt-2 mb-2">
                            <label class="pr-5">Gender</label>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio"   name="stud_gender" id="inlineRadio1" value="Male"
                                 <?php
                                  if($row['gender']=='Male')
                                  {
                                    echo "checked";
                                  }
                                  ?>>
                                <label class="form-check-label" for="inlineRadio1">Male
                                  
                                </label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="stud_gender" id="inlineRadio2" value="Female" 
                                <?php
                                  if($row['gender']=='Female')
                                  {
                                    echo "checked";
                                  }
                                  ?>>
                                <label class="form-check-label" for="inlineRadio2">Female
                                
                                </label>
                              </div>    
                        </div>

                        <div class="mb-3">
                        <label class="pr-5">Area of Intrest</label>
                        <div class="mb-1 form-check">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1" name="display[]" value="dance" 
                          <?php
                          $a = $row['course'];
                          $subject = explode(",", $a); 
                          if(in_array("dance", $subject))
                          {
                              echo "checked";
                          }
                          ?>
                          >
                          <label class="form-check-label" for="exampleCheck1">Dance</label>
                        </div>
                        <div class="mb-1 form-check">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1" name="display[]" value="singing"
                          <?php
                          $a = $row['course'];
                          $subject = explode(",", $a); 
                          if(in_array("singing", $subject))
                          {
                              echo "checked";
                          }
                          ?>
                          >
                          <label class="form-check-label" for="exampleCheck1">Singing</label>
                        </div>
                        <div class="mb-3 form-check">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1" name="display[]" vlaue="sports"
                          <?php
                          $a = $row['course'];
                          $subject = explode(",", $a); 
                          if(in_array("sports", $subject))
                          {
                              echo "checked";
                          }
                          ?>
                          >
                          <label class="form-check-label" for="exampleCheck1">Sports</label>
                        </div>
                        </div>


                        <div class="form-group">
          <label for="">Country</label>
          <select name="country" id="country" class="form-control" onchange="FetchState(this.value)"  required>
            <option value="<?php echo $row['country']?>">Select Country</option>
        <?php
        
        $conn = mysqli_connect("localhost","root","","studentsdb");

        $query1 = "SELECT * FROM countries Order by country_name";
        //$result = $db->query($query1);
        $result=mysqli_query($conn,$query1);
      
           if ($result->num_rows > 0 ) {
              while ($row = $result->fetch_assoc()) {
               echo '<option value='.$row['country_id'].'>'.$row['country_name'].'</option>';
               }
            }
          ?>
        
          </select>
        <div class="form-group">
          <label for="">State</label>
          <select name="state" id="state" class="form-control" onchange="FetchCity(this.value)"  required>
            <option>Select State</option>
          </select>
        </div>

        <div class="form-group">
          <label for="">City</label>
          <select name="city" id="city" class="form-control">
            <option>Select City</option>
          </select>
        </div>
       



                        <div class="form-group">
                            <label for="">Image</label>
                          <input type="file" name="stud_image" class="form-control" placeholder="Enter Name" />
                            <input type="hidden" name="stud_image_old" value="<?php echo $row['stud_image']; ?>" />
                        </div>
<img src="<?php echo "upload/".$row['stud_image']; ?>" width="100px" alt="images">

                        <?php }  ?>
                        <div class="form-group">
                            <button type="submit" name="update_stud" class="btn btn-primary">Update Data</button>
                        </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script type="text/javascript">
  function FetchState(id){
      console.log(id);
    $('#state').html('');
    $('#city').html('<option>Select City</option>');
    $.ajax({
      type:'post',
      url: 'ajax.php',
      data : { country_id : id},
      success : function(data){
         if(data){
            $('#state').html(data);
         }
         else{
             alert ("no data found");
         }
      }

    })
  }
  

  function FetchCity(id){ 
    $('#city').html('');
    $.ajax({
      type:'post',
      url: 'ajax.php',
      data : { state_id : id},
      success : function(data){
         $('#city').html(data);
      }

    })
  }
  </script>


    
    <!-- Option 2: Separate Popper and Bootstrap JS --> 
    
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" ></script>
   
  </body>
</html>
