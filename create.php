<?php 
    session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="text/javascript" href="jquery.js">
    <title>Registration</title>
  </head>
  <body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <h4 class="text-center"> Registration Form</h4> 
                    </div>
                    <div class="card-body">
                        
                      <span aria-hidden="true">&times;</span>
                        <?php 
                            if(isset($_SESSION['status']) && $_SESSION != '')
                            {
                                ?>
                                
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    </button>
                                </div>

                                
                                <?php
                                unset($_SESSION['status']);
                            }
                        ?> 

                        <form action="code.php" method="POST" onsubmit ="return validation()" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Name</label>
                          <input type="text" name="stud_name" id="name" class="form-control" autocomplete="off" placeholder="Enter Name" />
                            <span id="username" class="text-danger font-weight-bold" ></span>
                        </div>
                        <div class="form-group">
                            <label for="">Eamil</label>
                          <input type="text" name="stud_email" id="email" class="form-control" autocomplete="off" placeholder="Enter Email" />
                          <span id="useremail" class="text-danger font-weight-bold" ></span>
                        </div>
                        <div class="form-group">
                            <label for="">Phone</label>
                          <input type="text" name="stud_phone" id="phone" class="form-control" autocomplete="off"  placeholder="Enter Phone Number" />
                          <span id="userphone" class="text-danger font-weight-bold" ></span>
                        </div>

                        <div class="mt-2 mb-2">
                            <label class="pr-5">Gender</label>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="stud_gender" id="inlineRadio1" value="Male">
                                <label class="form-check-label" for="inlineRadio1">Male</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="stud_gender" id="inlineRadio2" value="Female">
                                <label class="form-check-label" for="inlineRadio2">Female</label>
                              </div>    
                        </div>
                        <div class="mb-3">
                        <label class="pr-5">Area of Intrest</label>
                        <div class="mb-1 form-check">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1" name="display[]" value="dance">
                          <label class="form-check-label" for="exampleCheck1">Dance</label>
                        </div>
                        <div class="mb-1 form-check">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1" name="display[]" value="singing">
                          <label class="form-check-label" for="exampleCheck1">Singing</label>
                        </div>
                        <div class="mb-3 form-check">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1" name="display[]" vlaue="sports">
                          <label class="form-check-label" for="exampleCheck1">Sports</label>
                        </div>
                        </div>

                        <?php
                          $dbHost     = "localhost"; 
                          $dbUsername = "root"; 
                          $dbPassword = ""; 
                          $dbName     = "studentsdb"; 
                          
                          // Create database connection 
                          $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName); 
                          $query = "SELECT * FROM countries";
                          $result = $db->query($query);
                          ?>

                            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

                          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                          <select id="country" name="country">
                              <option value="">Select Country</option>
                              <?php
                              if ($result->num_rows > 0) {
                                  while ($row = $result->fetch_assoc()) {
                                      echo '<option value="' . $row['country_id'] . '">' . $row['country_name'] . '</option>';
                                  }
                              } else {
                                  echo '<option value="">Sorry brother no country</option>';
                              }
                              ?>
                          </select>

                          <select id="state" name="state">
                              <option value="">Select country first</option>
                          </select>

                          <select id="city" name="city">
                              <option value="">Select state first</option>
                          </select>
                          <!-- <button type="submit">Submit</button> -->
                          <script>
                          $(document).ready(function() {
                              $('#country').on('change', function() {
                                  var countryID = $(this).val();
                                  if (countryID) {
                                      $.ajax({
                                          type: 'POST',
                                          url: 'ajax.php',
                                          data: 'country_id=' + countryID,
                                          
                                          success: function(html) {
                                              $('#state').html(html);
                                              $('#city').html('<option value="">Select state first</option>');
                                          }
                                      });
                                      console.log('country_id=' + countryID);
                                  } else {
                                      $('#state').html('<option value="">Select country first</option>');
                                      $('#city').html('<option value="">Select state first</option>');
                                  }
                              });

                              $('#state').on('change', function() {
                                  var stateID = $(this).val();
                                  if (stateID) {
                                      $.ajax({
                                          type: 'POST',
                                          url: 'ajax.php',
                                          data: 'state_id=' + stateID,
                                          success: function(html) {
                                              $('#city').html(html);
                                          }
                                      });
                                  } else {
                                      $('#city').html('<option value="">Select state first</option>');
                                  }
                              });
                          });
                          </script>
                        

                        <div class="form-group">
                            <label for="">Image</label>
                          <input type="file" name="stud_image" class="form-control" placeholder="Enter Name" />
                        </div>
                        <div class="form-group">
                            <button type="submit" name="save_stud" value="submit" class="btn btn-primary">Submit</button>
                        </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
      function validation()
      {
        var name = document.getElementById('name').value;
        var email = document.getElementById('email').value;
        var phone = document.getElementById('phone').value;
        

        if(name=="")
        {
          document.getElementById('username').innerHTML = "**Please fill the name";
          return false;
        }
        if((name.length <= 2) || (name.length > 20)){
          document.getElementById('username').innerHTML = "**Name length must be in between 2 and 20 ";
          return false;
        }
        if(!isNaN(name)){
          document.getElementById('username').innerHTML = "**Only characters are allowed";
          return false;
        }

        if(email=="")
        {
          document.getElementById('useremail').innerHTML = "**Please fill email address";
          return false;
        }
        if(email.indexOf('@') <= 0){
          document.getElementById('useremail').innerHTML = "** Invalid position of @ ";
          return false;
        }
        if((email.charAt(email.length-4)!='.' ) && (email.charAt(email.length-3)!='.' )){
          document.getElementById('useremail').innerHTML = "** Invalid position of .";
          return false;
        }

        if(phone=="")
        {
          document.getElementById('userphone').innerHTML = "**Please fill contact number";
          return false;
        }
        if(isNaN(phone)){
          document.getElementById('userphone').innerHTML = "**Must write digits only";
          return false;
        }
        if(phone.length != 10){
        document.getElementById('userphone').innerHTML = "**Mobile number must be of 10 digits only";
          return false;
        }
      }
    </script>
<script>
  $(document).ready(function() {
        $('#country').on('change', function() {
            var countryID = $(this).val();
            if (countryID) {
                $.ajax({
                    type: 'POST',
                    url: 'ajax.php',
                    data: 'country_id=' + countryID,
                    
                    success: function(html) {
                        $('#state').html(html);
                        $('#city').html('<option value="">Select state first</option>');
                    }
                });
                console.log('country_id=' + countryID);
            } else {
                $('#state').html('<option value="">Select country first</option>');
                $('#city').html('<option value="">Select state first</option>');
            }
        });

        $('#state').on('change', function() {
            var stateID = $(this).val();
            if (stateID) {
                $.ajax({
                    type: 'POST',
                    url: 'ajax.php',
                    data: 'state_id=' + stateID,
                    success: function(html) {
                        $('#city').html(html);
                    }
                });
            } else {
                $('#city').html('<option value="">Select state first</option>');
            }
        });
    });
</script>
  
  
    
    
    <!-- Option 2: Separate Popper and Bootstrap JS --> 


    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" ></script>
   
  </body>
</html>