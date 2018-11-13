<?php 
     require_once('php/connect.php');
     
     if(!isset($_SESSION['id'])){
         header('location:login.php');
     }
     $sql = "SELECT * FROM tbl_student_program WHERE student_id = '".$_GET['id']."' ";
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
    
    <section class="container">
        <div class="row">
            <div class="col-12 ">
                <!-- <img src="assets/images/<?php echo $row['image']; ?>" class="my-3 img-profile rounded-circle img-thumbnail" alt="Image Profile"> -->

                <div class="card">
                <div class="card-header" style="background-color: #4169E1;" id="Study_program">
                    <h5 class="mb-0">
                        <button class="btn text-bold" type="button" >
                        ข้อมูลการศึกษา
                        </button> 
                    </h5>
                </div>
                <div class="row">
                        <div class="col-12 mb-3">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="username">ระดับการศึกษา</label>
                                        <select class="form-control" id="program_study" name="program_study">
                                                    <option value="M" <?php if($row['program_study'] == "M") echo "selected"; ?> >ปริญญาโท</option>
                                                    <option value="D" <?php if($row['program_study'] == "D") echo "selected"; ?> >ปริญญาเอก</option>
                                                    <option value="DM" <?php if($row['program_study'] == "DM") echo "selected";?> >ปริญญาโท+ปริญญาเอก</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="fname">ทุน</label>
                                        <input type="text" class="form-control" id="lname" value="<?php echo $row['student_lname_eng'] ; ?>"  >
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label for="username">GPA</label>
                                        <input type="text" class="form-control" id="fname" value=" <?php echo  $row['program_GPA']; ?>" >
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="fname">คะแนนสอบภาษาอังกฤษ</label>
                                        <input type="text" class="form-control" id="lname" value="<?php echo $row['student_lname_th'] ; ?>"  >
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="lname">วันที่เข้ารับการศึกษา</label>
                                        <input type="date"  data-date="" data-date-format="DD MMMM YYYY" class="form-control"  id="hbd" name="hbd"  value="<?php echo $row['student_birthday'] ; ?>"  >
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="mail">วันที่สอบ QE</label>
                                        <input type="date"  data-date="" data-date-format="DD MMMM YYYY" class="form-control"  id="hbd" name="hbd"  value="<?php echo $row['student_birthday'] ; ?>"  >
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="phone">วันที่แต่งตั้งอาจารย์ที่ปรึกษา</label>
                                        <input type="date"  data-date="" data-date-format="DD MMMM YYYY" class="form-control"  id="hbd" name="hbd"  value="<?php echo $row['student_birthday'] ; ?>"  >
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="phone">วันที่สอบโครงร่างวิทยานิพนธ์</label>
                                        <input type="date"  data-date="" data-date-format="DD MMMM YYYY" class="form-control"  id="hbd" name="hbd"  value="<?php echo $row['student_birthday'] ; ?>"  >
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="mail">วันที่แต่งตั้งชื่อวิทยานิพนธ์</label>
                                        <input type="date"  data-date="" data-date-format="DD MMMM YYYY" class="form-control"  id="hbd" name="hbd"  value="<?php echo $row['student_birthday'] ; ?>"  >
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="phone">วันที่สอบวิทยานิพนธ์</label>
                                        <input type="date"  data-date="" data-date-format="DD MMMM YYYY" class="form-control"  id="hbd" name="hbd"  value="<?php echo $row['student_birthday'] ; ?>"  >
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="phone">วันที่สำเร็จการศึกษา</label>
                                        <input type="date"  data-date="" data-date-format="DD MMMM YYYY" class="form-control"  id="hbd" name="hbd"  value="<?php echo $row['student_birthday'] ; ?>"  >
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="adds">ปีที่สำเร็จการศึกษา</label>
                                        <input type="text" class="form-control"  id="adds" rows="5" ><?php echo $row['student_grad_from'] ; ?>                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="adds">สถานะการศึกษา</label>
                                        <input type="text" class="form-control"  id="adds" rows="5" ><?php echo $row['student_grad_from'] ; ?>
                                    </div>

                                </div>

                                <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="adds">หมายเหตุ</label>
                                            <input type="text" class="form-control"  id="adds" rows="5" ><?php echo $row['student_workplace'] ; ?>
                                        </div>
                                </div>  
                                        <?php  $sent_id = $row['student_id'] ;?> 
                                        <a href="student_program_edit.php?id=<?php echo $sent_id;?>" class="btn btn-warning float-right"><b> EDIT </b></a> 
                                </div>
                            </div>
                        </div>       
                    </div>
                
                </div>
            </div>
        </div>
    </section>
    <br>

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