<?php 
    require_once('connect.php');
    //print_r($_POST);

    if(isset($_POST['submit'])) {
            
            /*if ($_POST['title_name_th'] === '') {
                $_POST['title_name_th'] = 'NULL'; // or 'NULL' for SQL
            }*/
            $id = $_POST['student_id'];
            $check_sql ="SELECT * FROM tbl_student WHERE student_id = '".$_POST['student_id']."' ";
            $check_user  = $conn->query($check_sql) or die($conn->error);

            if(!$check_user->num_rows){
                //$hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $sql_insert = "INSERT INTO `tbl_student` (`student_id`,`student_title_th`, `student_fname_th`, `student_lname_th`,`student_title_eng`,`student_fname_eng`,`student_lname_eng`,`student_email`, `student_phone`,`student_birthday`,`student_country`,`student_address`,`student_grad_from`,`student_workplace`,`student_createDate`)
                             VALUES ('".$_POST['student_id']."', 
                                     '".$_POST['title_name_th']."', 
                                     '".$_POST['fname_th']."', 
                                     '".$_POST['lname_th']."', 
                                     '".$_POST['title_name_eng']."',
                                     '".$_POST['fname_eng']."',
                                     '".$_POST['lname_eng']."', 
                                     '".$_POST['email']."',
                                     '".$_POST['phone']."',
                                     '".$_POST['hbd']."',
                                     '".$_POST['country']."',
                                     '".$_POST['adds']."',
                                     '".$_POST['grad-from']."',
                                     '".$_POST['workplace']."',
                                     '".date("Y-m-d")."' ); 
                                     ";
                $sql_insert_program = "INSERT INTO tbl_student_program (student_id)
                                    VALUES ('".$_POST['student_id']."');
                                    ";
                                     //echo $sql_insert;
                $result = $conn->query($sql_insert) or die ($conn->error);
                $result_insert_program = $conn->query($sql_insert_program) or die ($conn->error);
                if ($result && $result_insert_program) {
                    echo "<script> alert('สมัครสมาชิก สำเร็จ'); </script>";
                    //echo"window.location='../student_profile.php?id=".mysql_insert_id()."';";
                    header("Refresh:0; url=../student_profile.php?id=$id");
                    //redirect('index'); ?id=".mysql_insert_id()."
                }else{
                    echo "<script> alert('สมัครสมาชิกไม่สำเร็จ กรุณาตรวจสอบอีกครั้ง'); </script>";
                    //header('Refresh:0; url=../create_student.php');
                }
            }else {
                echo "<script> alert('รหัสนักศึกษาซ้ำกับในระบบ'); </script>";
                //header('Location: ' . $_SERVER['HTTP_REFERER']);
                header('Refresh:0; url=../create_student.php');
               //header("location:javascript://history.go(-1)");
            }
    }else{
        echo "<script> alert('submit fail'); </script>";
        //header('Refresh:0; url=../create_student.php');
    }
   /* function redirect($path) {
        header('Refresh:0; url=../'.$path.'.php');
    }*/
?>