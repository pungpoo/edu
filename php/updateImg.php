<?php 
    require_once('connect.php');
    if (isset($_POST['submit'])) {
        $tmp = explode('.',$_FILES['file']['name']);
        $new_name = round(microtime(true)*99).'.'.end($tmp);
        $url = '../assets/images/'.$new_name ;

        if(move_uploaded_file($_FILES['file']['tmp_name'], $url)) {
           $sql = "UPDATE tbl_member SET image = '".$new_name."' WHERE id = '".$_SESSION['id']."' ";
           $result = $conn->query($sql) or die($conn->error);
           if($result){
                $_SESSION['image'] = $new_name;
                echo '<script> alert("Update IMG Complete")</script>';
                header('Refresh:0; url=../profile.php');
           }
        }
        
    }else{
        header('location:../index.php');
    }
?>