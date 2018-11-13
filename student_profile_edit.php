<?php 
     require_once('php/connect.php');
     
     if(!isset($_SESSION['id'])){
         header('location:login.php');
     }
     $sql = "SELECT * FROM tbl_student WHERE student_id = '".$_GET['id']."' ";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>แก้ไขข้อมูลสว่นตัว</title>
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
            <h1 class="">แก้ไขข้อมูลนักศึกษา</h1>
        </div>
    </section>
    
    <section class="container my-3">
        <div class="row">
            <div class="col-12 ">
                <!-- <img src="assets/images/<?php echo $row['image']; ?>" class="my-3 img-profile rounded-circle img-thumbnail" alt="Image Profile"> -->

                <div class="card">
                    <div class="card-header text-bold">
                         <?php echo $row['student_title_eng'].$row['student_fname_eng']." ".$row['student_lname_eng']." ( ID: ".$row['student_id']." )" ;  ?>
                    </div>
                    <div class="card-body">
                            <form  class="form" action="php/updateStudentProfile.php" method="post" name = "frm_update">
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label for="title_name_eng">คำนำหน้าชื่อ(Eng)</label>
                                        <select class="form-control" id="title_name_eng" name="title_name_eng">
                                                    <option value="<?php echo $row['student_title_eng']; ?>"><?php echo $row['student_title_eng']; ?></option>
                                                    <option value="Mr.">Mr.</option>
                                                    <option value="Miss">Miss</option>
                                                    <option value="Mrs.">Mrs.</option>
                                        </select>
                                        <!-- <input type="text" class="form-control" id="title_name_eng" name="title_name_eng" value="<?php echo $row['student_title_eng']; ?>" > -->
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="fname_eng">ชื่อ(Eng)</label>
                                        <input type="text" class="form-control" id="fname_eng" name="fname_eng"  value="<?php echo $row['student_fname_eng'];?>" >
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="lname_eng">นามสกุล(Eng)</label>
                                        <input type="text" class="form-control" id="lname_eng" name="lname_eng"  value="<?php echo $row['student_lname_eng'];?>"  >
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="title_name_th">คำนำหน้าชื่อ(ไทย)</label>
                                        <select class="form-control" id="title_name_th" name="title_name_th">
                                                    <option value="<?php echo $row['student_title_th'];?>"><?php echo $row['student_title_th'];?></option>
                                                    <option value="นาย">นาย</option>
                                                    <option value="นาง">นาง</option>
                                                    <option value="นางสาว">นางสาว</option>
                                                </select>
                                        <!-- <input type="text" class="form-control" id="title_name_th" name="title_name_th"  value="<?php echo $row['student_title_th'];?>" > -->
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="fname_th">ชื่อ(ไทย)</label>
                                        <input type="text" class="form-control" id="fname_th" name="fname_th"  value="<?php echo $row['student_fname_th'];?>" >
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="lname_th">นามสกุล(ไทย)</label>
                                        <input type="text" class="form-control" id="lname_th" name="lname_th"  value="<?php echo $row['student_lname_th'];?>"  >
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="email">E-mail</label>
                                        <input type="email" class="form-control"  id="email" name="email"  value="<?php echo $row['student_email'] ; ?>"  >
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control"  id="phone" name="phone"  value="<?php echo $row['student_phone'] ; ?>"  >
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="hbd">วัน/เดือน/ปี เกิด</label>
                                        <input type="date"  data-date="" data-date-format="DD MMMM YYYY" class="form-control"  id="hbd" name="hbd"  value="<?php echo $row['student_birthday'] ; ?>"  >
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="country">ประเทศ</label>
                                        <!-- <input type="text" class="form-control"  id="country" name="country"  value="<?php echo $row['student_country'] ; ?>"  > -->
                                            <select class="form-control" id="country" name="country">
                                                <option value="<?php echo $row['student_country'] ; ?>"><?php echo $row['student_country'] ; ?></option>
                                                    <?php
                                                            $thSQL= "SELECT * FROM tbl_country";
                                                            $thQuery= $conn->query($thSQL) or die($conn->error);
                                                            while($thARR=mysqli_fetch_array($thQuery)){
                                                            echo("<option value='$thARR[ct_nameENG]'>$thARR[ct_nameENG]</option>");
                                                            }
                                                    ?>
                                            </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="adds">ที่อยู่</label>
                                    <textarea class="form-control"  id="adds" name="adds"  rows="5" ><?php echo $row['student_address'] ; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="grad">จบการศึกษา</label>
                                    <input type="text" class="form-control" id="grad-from" name="grad-from"  value="<?php echo $row['student_grad_from'] ; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="workplace">สถานที่ทำงานปัจจุบัน</label>
                                    <input type="text" class="form-control" id="workplace" name="workplace"  value="<?php echo $row['student_workplace'] ; ?>" >
                                </div>
                                <input type="hidden" name="student_id" value="<?php echo $row['student_id'] ; ?>">
                                <input type="submit" name="submit"  class="btn btn-primary mb-2 col-2 offset-5" value="SAVE">
                                
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>

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