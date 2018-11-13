<?php 
    require_once('connect.php');
     //print_r($_POST);
     //echo $_SESSION['id'];
     //cho $_POST['submit'];

     if (isset($_POST['submit']) && isset($_SESSION['id'])) {
         $sql = "UPDATE tbl_member SET 
                    name = '".$_POST['fname']."' ,
                    lastname = '".$_POST['lname']."' ,
                    email = '".$_POST['email']."' ,
                    phone = '".$_POST['phone']."' ,
                    address = '".$_POST['adds']."' 
                    WHERE id = '".$_SESSION['id']."'
                    ";
        $result = $conn->query($sql);
        if ($result) {
            $_SESSION['name'] = $_POST['fname'];
            echo "<script> alert('แก้ไขข้อมูลสำเร็จแล้ว')</script>";
            header('Refresh:0; url=../profile.php');
        }else {
            echo "<script> alert('แก้ไขข้อมูลไม่สำเร็จ  โปรดเช็คข้อมูล')</script>";
            header('Refresh:0; url=../profile.php');
        }
         
     }else {
         //header('location:../login.php');
     }

     //$sql ="UPDATE `tbl_member` SET `name` = '".$_POST['name']."', `lastname` = '".$_POST['lastname']."' WHERE `tbl_member`.`id` = '".$_SESSION['id']."' ";
    // $result = $conn->query($sql);


?>