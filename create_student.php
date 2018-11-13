<?php
require_once('php/connect.php');
    
if(!isset($_SESSION['id'])){
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>เพิ่มข้อมูลนักศึกษา</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/font-awesome5/css/fontawesome-all.css">
</head>
<body>
<?php include_once('includes/navbar.php');?>
    <div class="container ">
        <div class="row py-5">
            <div class=" col-md-12 mt-5" >
                <div class="card">
                    <h5 class="card-header text-center">เพิ่มข้อมูลนักศึกษา</h5>
                    <div class="card-body">
                            <form class="form" id="createStudent" name="createStudent" action="php/createStudent.php" method="post" >
                                <div class="row"> 
                                    <div class="form-group col-md-3">
                                            <label for="student_id">รหัสนักศึกษา*</label>
                                            <input type="text" class="form-control" id="student_id" name="student_id" placeholder="รหัสนักศึกษา" value="" >
                                    </div>
                                </div>
                                <div class="form-row">
                                        <div class="form-group col-md-2">
                                                <label for="title_name_eng">คำนำหน้าชื่อ(Eng)*</label>
                                                <select class="form-control" id="title_name_eng" name="title_name_eng">
                                                    <option value="Mr.">Mr.</option>
                                                    <option value="Miss">Miss</option>
                                                    <option value="Mrs.">Mrs.</option>
                                                </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                                <label for="fname_eng">ชื่อ(Eng)*</label>
                                                <input type="text" class="form-control" id="fname_eng" name="fname_eng" placeholder="ชื่อ(ภาษาอังกฤษ)" >
                                        </div>
                                        <div class="form-group col-md-6">
                                                <label for="lname_eng">นามสกุล(Eng)*</label>
                                                <input type="text" class="form-control" id="lname_eng" name="lname_eng" placeholder="นามสกุล(ภาษาอังกฤษ)">
                                        </div>
                                </div>
                                <div class="form-row">
                                        <div class="form-group col-md-2">
                                                <label for="title_name_th">คำนำหน้าชื่อ(ไทย)</label>
                                                <select class="form-control" id="title_name_th" name="title_name_th">
                                                    <option value="">เลือก</option>
                                                    <option value="นาย">นาย</option>
                                                    <option value="นาง">นาง</option>
                                                    <option value="นางสาว">นางสาว</option>
                                                </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                                <label for="fname_th">ชื่อ(ไทย)</label>
                                                <input type="text" class="form-control" id="fname_th" name="fname_th" placeholder="ชื่อ(ภาษาไทย)"  >
                                        </div>
                                        <div class="form-group col-md-6">
                                                <label for="lname_th">นามสกุล(ไทย)</label>
                                                <input type="text" class="form-control" id="lname_th" name="lname_th" placeholder="นามสกุล(ภาษาไทย)"  >
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="email">E-mail</label>
                                            <input type="email" class="form-control"  id="email" name="email" placeholder="E-mail"  >
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="phone">โทรศัพท์</label>
                                            <input type="text" class="form-control"  id="phone"  name="phone" placeholder="โทรศัพท์"  >
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="phone">วัน-เดือน-ปี เกิด</label>
                                            <input type="date"  data-date=""  class="form-control"  id="hbd" name="hbd"  >
                                        </div>
                                        <div class="form-group col-md-6">
                                                <label for="country">ประเทศ</label>
                                                <select class="form-control" id="country" name="country">
                                                    <option value="">เลือกประเทศ</option>
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
                                            <textarea class="form-control"  id="adds" name="adds" rows="5" placeholder="ที่อยู่ที่ปัจจุบันที่สามารถติดต่อได้"  value=" "></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="grad-from">สถานศึกษาที่จบ</label>
                                            <input type="text" class="form-control" id="grad-from" name="grad-from" placeholder="สถานศึกษาที่จบ"  value=" " >
                                        </div>
                                        <div class="form-group">
                                            <label for="workplace">สถานที่ทำงานปัจจุบัน</label>
                                            <input type="text" class="form-control"  id="workplace" name="workplace" placeholder="สถานที่ทำงานปัจจุบัน(ถ้ามี)"  value=" ">
                                        </div>
                                        <!-- <input type="hidden" name="aa" value="1"> -->
                                    <input type="submit" name="submit"  class="btn btn-primary mb-2 col-2 offset-5" value="บันทึกข้อมูล">       
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/popper.js/dist/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/jquery-validation/dist/jquery.validate.min.js"></script>

    <script>
        //frmRegis
        $( document ).ready(function(){
            $('#createStudent').validate({
                rules:{
                    student_id: {
                        required: true,
                        number: true,
                        maxlength: 7
                    },
                    fname_eng: 'required',
                    lname_eng: 'required',
                    email: {
                        email: true
                    }
                },
                messages:{
                    student_id: {
                        required: 'โปรดระบุรหัสนักศึกษา' ,
                        number: 'โปรดกรอกตัวเลขเท่านั้น',
                        maxlength: 'โปรดกรอกตัวเลขไม่เกิน 7 ตัวอักษร'
                    },
                    fname_eng: 'โปรดกรอกชื่อนักศึกษา',
                    lname_eng: 'โปรดกรอกนามสกุลนักศึกษา',
                    email: {
                        email: 'โปรดกรอก Email ให้ถูกต้อง'
                    }
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
        })

        
    </script>
</body>
</html>