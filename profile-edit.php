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
<?php include_once('includes/navbar.php'); ?>

    <section class="jumbotron jumbotron-fluid text-center">
        <div class="container my-5 my-sm-1">
            <h1>Profile</h1>
        </div>
    </section>
    
    <section class="container my-3">
        <div class="row">
            <div class="col-12 profile-top">
                <img src="assets/images/<?php echo $_SESSION['image'];?>" class="img-profile rounded-circle img-thumbnail" alt="Image Profile">

                <!-- Button trigger modal -->
                    <button type="button" class="btn mx-auto d-block btn-primary my-3" data-toggle="modal" data-target="#exampleModal">
                    เปลี่ยนรูป
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Upload รูป</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="php/updateImg.php" method="POST" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="file" id="customFile" aria-describedby="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                        <figure class="figure text-center d-none">
                                            <img id="imgUpload" class="figure-img img-fluid rounded mt-2" alt="">
                                        </figure>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                <div class="card">
                    <div class="card-body">

                        <form id="frmUpdate" method="POST" action="php/updateProfile.php"> 
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="username">UserName</label>
                                    <input type="text" class="form-control" name="username" id="username" value=" <?php echo $row['username'] ; ?>" disabled >
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="fname">ชื่อ</label>
                                    <input type="text" class="form-control"  name="fname" id="fname" value="<?php echo $row['name'] ; ?>"  >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lname">สกุล</label>
                                    <input type="text" class="form-control"   name="lname" id="lname" value="<?php echo $row['lastname'] ; ?>"  >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="mail">E-Mail</label>
                                    <input type="email" class="form-control"   name="email" id="email" value="<?php echo $row['email'] ; ?>"  >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control"   name="phone" id="phone" value="<?php echo $row['phone'] ; ?>"  >
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="adds">ที่อยู่</label>
                                <textarea class="form-control"  name="adds"  id="adds" rows="5" ><?php echo $row['username'] ; ?></textarea>
                            </div>

                            <a href="profile.php" class="btn btn-warning float-left"> BACK </a>

                            <input type="submit" name="submit" class="btn btn-primary float-right" value="SAVE">
                        </form>

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
    <script src="node_modules/jquery-validation/dist/jquery.validate.min.js"></script>

    <script>
        
        $( document ).ready(function(){
            $('#frmUpdate').validate({
                rules:{
                    fname: 'required',
                    lname: 'required',
                    email: {
                        required: true,
                        email: true
                    },
                    phone: {
                        required: true,
                        number: true,
                        maxlength: 20
                    },
                    adds: 'required'
                },
                messages:{
                    fname:'โปรดกรอกชื่อ',
                    lname:'โปรดกรอกนามสกุล',
                    email: {
                        required: 'โปรดกรอก Email',
                        email: 'โปรดกรอก Email ให้ถูกต้อง'
                    },phone: {
                        required: 'โปรดระบุ' ,
                        number: 'โปรดกรอกตัวเลขเท่านั้น',
                        minlength: 'โปรดกรอกตัวเลขไม่เกิน 20 ตัวอักษร'
                    },
                    adds: 'โปรดกรอกที่อยู่'
                    
                },
                errorElement: 'div',
                errorPlacement: function ( error, element ){
                    error.addClass( 'invalid-feedback' )
                    error.insertAfter( element )
                },
                highlight: function (element, errorClass, validClass){
                    $( element ).addClass( 'is-invalid' ).removeClass( 'is-valid' )
                },
                unhighlight: function (element, errorClass, validClass){
                    $( element ).addClass( 'is-valid' ).removeClass( 'is-invalid' )
                }
            });
        });

        $('.custom-file-input').on('change', function(){
            var fileName = $(this).val().split('\\').pop()
            $(this).siblings('.custom-file-label').html(fileName)
            if (this.files[0]){
                var reader = new FileReader()
                $('.figure').addClass('d-block')
                reader.onload = function(e){ 
                    $('#imgUpload').attr('src', e.target.result)
                }
                reader.readAsDataURL(this.files[0])
            }
        });
    </script>
    
</body>
</html>