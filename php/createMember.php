<?php 
    //print_r($_POST);
    require_once('connect.php');
    if (isset($_POST['submit'])) {
        $secretKey = "6LdJqW8UAAAAAKOamvmvbAvwPTTFdrtGZkMvZO8w";
        $responseKey = $_POST['g-recaptcha-response'];
        $remoteIP = $_SERVER['REMOTE_ADDR'];
        $url ="https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$remoteIP";  
        $response = json_decode(file_get_contents($url));
        if( $response->success){
            //echo '<pre>',print_r($_POST),'</pre>';

            $check_sql ="SELECT * FROM tbl_member WHERE username = '".$_POST[username]."' ";
            $check_user  = $conn->query($check_sql) or die($conn->error);

            if(!$check_user->num_rows){
                $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $sql_insert = "INSERT INTO `tbl_member` (`name`, `lastname`, `email`, `phone`, `username`, `password`, `create_at`)
                             VALUES ('".$_POST['fname']."', 
                                     '".$_POST['lname']."', 
                                     '".$_POST['mail']."', 
                                     '".$_POST['phone']."', 
                                     '".$_POST[username]."', 
                                     '".$hashed_password."', 
                                     '".date("Y-m-d")."'); 
                                     ";
                $result = $conn->query($sql_insert) or die ($conn->error);
                if ($result) {
                    echo "<script> alert('สมัครสมาชิก สำเร็จ'); </script>";
                    redirect('index');
                }else{
                    echo "<script> alert('สมัครสมาชิกไม่สำเร็จ'); </script>";
                    redirect('regis');
                }


            }else {
                echo "<script> alert('User ซ้ำ'); </script>";
                redirect('regis');
            }




        }else{
            echo "<script> alert('Verification Failed'); </script>";
            redirect('regis');
        }

    }else{
        redirect('regis');
    }

    function redirect($path) {
        header('Refresh:0; url=../'.$path.'.php');
    }
?>