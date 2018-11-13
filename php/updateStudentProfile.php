<?php 
    require_once('connect.php');
     //print_r($_POST);
     //echo $_SESSION['id'];
     //cho $_POST['submit'];

     if (isset($_POST['submit'])) {
         $id = $_POST['student_id'];
         $sql_update = "UPDATE tbl_student SET  
                    student_title_th = '".$_POST['title_name_th']."', 
                    student_fname_th = '".$_POST['fname_th']."', 
                    student_lname_th = '".$_POST['lname_th']."', 
                    student_title_eng = '".$_POST['title_name_eng']."',
                    student_fname_eng = '".$_POST['fname_eng']."',
                    student_lname_eng = '".$_POST['lname_eng']."', 
                    student_email = '".$_POST['email']."',
                    student_phone = '".$_POST['phone']."',
                    student_birthday = '".$_POST['hbd']."',
                    student_country = '".$_POST['country']."',
                    student_address = '".$_POST['adds']."',
                    student_grad_from = '".$_POST['grad-from']."',
                    student_workplace = '".$_POST['workplace']."'
                    WHERE student_id = '".$_POST['student_id']."'
                    ";
        $result = $conn->query($sql_update);
        if ($result) {
            echo "<script> alert('แก้ไขข้อมูลสำเร็จแล้ว')</script>";
            header("Refresh:0; url=../student_profile.php?id=$id");
        }else {
            echo $sql_update ;
            echo "<script> alert('แก้ไขข้อมูลไม่สำเร็จ โปรดตรวจสอบข้อมูล')</script>";
            //header("location:javascript://history.go(-1)");
            header("Refresh:0; url=../student_profile_edit.php?id=$id");
        }
         
     }else {
         header('location:../login.php');
     }




?>