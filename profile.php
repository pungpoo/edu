<?php 
   
    require_once('php/connect.php');
    
    if(!isset($_SESSION['id'])){
        header('location:login.php');
    }
    $sql = "SELECT * FROM tbl_member WHERE id = '".$_SESSION['id']."' ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if (!$result->num_rows) {
        header('location:login.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/font-awesome5/css/fontawesome-all.css">
    <style>
        .img-profile{
            width: 150px;
            height: 150px;
            margin: 0 auto;
            display: block;
        }
        .profile-top{
            margin-top: -100px;

        }
    </style>
</head>
<body>
    <?php 
        include_once('includes/navbar.php');
    ?>

    <section class="jumbotron jumbotron-fluid text-center">
        <div class="container my-5 my-sm-1">
            <h1 class="">Profile</h1>
        </div>
    </section>
    
    <section class="container my-3">
        <div class="row">
            <div class="col-12 profile-top">
                <img src="assets/images/<?php echo $row['image']; ?>" class="my-3 img-profile rounded-circle img-thumbnail" alt="Image Profile">

                <div class="card">
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="username">UserName</label>
                                <input type="text" class="form-control" id="username" value=" <?php echo $row['username'] ; ?>" disabled>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="fname">ชื่อ</label>
                                <input type="text" class="form-control" id="fname" value="<?php echo $row['name'] ; ?>"  disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lname">สกุล</label>
                                <input type="text" class="form-control"  id="lname" value="<?php echo $row['lastname'] ; ?>"  disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mail">E-Mail</label>
                                <input type="email" class="form-control"  id="mail" value="<?php echo $row['email'] ; ?>"  disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control"  id="phone" value="<?php echo $row['phone'] ; ?>"  disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="adds">ที่อยู่</label>
                            <textarea class="form-control"  id="adds" rows="5" disabled><?php echo $row['address'] ; ?></textarea>
                        </div>

                        <a href="profile-edit.php" class="btn btn-warning float-right"> EDIT </a>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>


    <footer class="card bg-dark text-center py-3 text-white">
                        CopyRight 2018  <a href="#">Footer</a> 
                        
    </footer>


    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/popper.js/dist/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    
</body>
</html>