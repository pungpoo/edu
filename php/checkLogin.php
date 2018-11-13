<?php 
    require_once('connect.php');
    $username=$_POST['username'];
    $password=$_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM tbl_user WHERE user_username = ? ") ;
    $stmt->bind_param('s', $username); // s = string
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if(!empty($row)){
        if($password == $row['user_password']){
           $_SESSION['id'] = $row['user_id'];
           $_SESSION['name'] = $row['user_fname'];
           //$_SESSION['image'] = $row['image'];

           echo "<script> alert('Login Complete'); </script>";
           header('Refresh:0; url=../index.php');

           //header('location:../index.php');
        }else{
            echo "<script> alert('Password Error'); </script>";
            header('Refresh:0; url=../login.php');
 
        }
    }else{
        echo "<script> alert('Login Error'); </script>";
        header('Refresh:0; url=../login.php');
    }

?>