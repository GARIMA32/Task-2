<?php
session_start();
$conn = mysqli_connect("localhost","root","","studentsdb");
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
//   }
//   echo "Connected successfully";

    if(isset($_POST['save_stud']))
    {
        $name = $_POST['stud_name'];
        $email = $_POST['stud_email'];
        $phone = $_POST['stud_phone'];
        $gender = $_POST['stud_gender'];
        $a = $_POST['display'];
        $course = implode(',',$a);
        $country = $_POST['country'];
        $state = $_POST['state'];
        $city = $_POST['city'];
        $image = $_FILES['stud_image']['name'];
        
        $query = "INSERT INTO student (stud_name,stud_email,stud_phone,gender,course,country,state,city,stud_image) VALUES ('$name','$email','$phone','$gender','$course','$country','$state','$city','$image')";
        $query_run = mysqli_query($conn, $query);

        if($query_run){
            move_uploaded_file($_FILES["stud_image"]["tmp_name"], "upload/".$_FILES["stud_image"]["name"]);
            $_SESSION['status'] = "data insert successfully";
            header('Location: index.php');
        }else{
            $_SESSION['status'] = "data not inserted";
            header('Location: index.php');
        }
    }

if(isset($_POST['update_stud']))
{
    $stud_id = $_POST['stud_id'];

    $name= $_POST['stud_name'];
    $email= $_POST['stud_email'];
    $phone= $_POST['stud_phone'];
    $gender= $_POST['stud_gender'];
    $b = $_POST['display'];
    $course = implode(",", $b);

    $new_image = $_FILES['stud_image']['name'];
    $old_image= $_FILES['stud_image_old'];

    if($new_image != '')
    {
        $update_filename = $_FILES['stud_image']['name'];
    }
    else
    {
        $update_filename = $old_image;
    }

    
        //Updating
        $query = "UPDATE student SET stud_name='$name', stud_email='$email', stud_phone='$phone', gender='$gender', course='$course', stud_image='$update_filename' WHERE id='$stud_id' ";
        $query_run = mysqli_query($conn, $query);

        if($query_run){
            move_uploaded_file($_FILES["stud_image"]["tmp_name"], "upload/".$_FILES["stud_image"]["name"]);
            $_SESSION['status'] = "data insert successfully";
            header('Location: index.php');
        }else{
            $_SESSION['status'] = "data not inserted";
            header('Location: index.php');
        }
   
}


if(isset($_POST['delete_stud']))
{
    $id= $_POST['delete_id'];
    $stud_image = $_POST['del_stud'];

    $query = "DELETE FROM student WHERE ID='$id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        unlink("upload/".$stud_image);
        $_SESSION['status'] = "data deleted successfully";
            header('Location: index.php');
    }
    else
    {
        $_SESSION['status'] = "data not deleted";
            header('Location: index.php');
    }
}

?>
