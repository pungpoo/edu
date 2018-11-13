<?php 
    require_once('php/connect.php');
    if(!isset($_SESSION['id'])){
        header('location:login.php');
    }
        $sql = "SELECT * FROM tbl_student WHERE student_id = '".$_GET['id']."' ";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        $sql_program = "SELECT * FROM tbl_student_program WHERE student_id = '".$_GET['id']."' ";
        $result_program = $conn->query($sql_program);
        $row_program = $result_program->fetch_assoc();
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
        .text-bold{
            font-weight: bold;
        }
    </style>
</head>
<body>
    <?php 
        include_once('includes/navbar.php');
    ?>

    <section class="jumbotron jumbotron-fluid text-center">
        <div class="container my-5 my-sm-1">
            <h1 class=""><?php echo $row['student_title_eng'].$row['student_fname_eng']." ".$row['student_lname_eng']; ?></h1>
        </div>
    </section>
    
    <!-- accordion --> 
    <section class="container my-3">
        <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header" style="background-color: #4169E1;" id="profile">
                    <h5 class="mb-0" >
                        <button class="btn text-bold" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        ประวัติส่วนตัว
                        </button> 
                    </h5>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="profile" data-parent="#accordionExample">
                    <div class="row">
                        <div class="col-12 ">
                            <div class="card-body">
                                <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="username">ชื่อ(Eng)</label>
                                            <input type="text" class="form-control" id="fname" value=" <?php echo  $row['student_title_eng'].$row['student_fname_eng'] ; ?>" disabled>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="fname">นามสกุล(Eng)</label>
                                            <input type="text" class="form-control" id="lname" value="<?php echo $row['student_lname_eng'] ; ?>"  disabled>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="username">ชื่อ(th)</label>
                                            <input type="text" class="form-control" id="fname" value=" <?php echo  $row['student_title_th'].$row['student_fname_th'] ; ?>" disabled>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="fname">นามสกุล(th)</label>
                                            <input type="text" class="form-control" id="lname" value="<?php echo $row['student_lname_th'] ; ?>"  disabled>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="lname">E-mail</label>
                                            <input type="text" class="form-control"  id="lname" value="<?php echo $row['student_email'] ; ?>"  disabled>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="mail">Phone</label>
                                            <input type="email" class="form-control"  id="mail" value="<?php echo $row['student_phone'] ; ?>"  disabled>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="phone">วัน/เดือน/ปี เกิด</label>
                                            <input type="text" class="form-control"  id="phone" value="<?php echo $row['student_birthday'] ; ?>"  disabled>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="phone">ประเทศ</label>
                                            <input type="text" class="form-control"  id="country" value="<?php echo $row['student_country'] ; ?>"  disabled>
                                        </div>
                                </div>

                                        <div class="form-group">
                                            <label for="adds">ที่อยู่</label>
                                            <textarea class="form-control"  id="adds" rows="5" disabled><?php echo $row['student_address'] ; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="adds">จบการศึกษา</label>
                                            <input type="text" class="form-control"  id="adds" rows="5" value="<?php echo $row['student_grad_from'] ; ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="adds">สถานที่ทำงานปัจจุบัน</label>
                                            <input type="text" class="form-control"  id="adds" rows="5" value="<?php echo $row['student_workplace'] ; ?>" disabled>
                                        </div>
                                            <?php  $sent_id = $row['student_id'] ;?> 
                                            <a href="student_profile_edit.php?id=<?php echo $sent_id;?>" class="btn btn-warning float-right"> <b> EDIT </b></a><br/>
                                        </div>
                            </div>
                        </div>       
                    </div>
                </div>
            </div>
            <!-- *********************************************************************************************************************************************-->
             <div class="card py-3">
                <div class="card-header" style="background-color: #4169E1;" id="Study_program">
                    <h5 class="mb-0">
                        <button class="btn text-bold" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        ข้อมูลการศึกษา
                        </button> 
                    </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="Study_program" >
                    <div class="row">
                        <div class="col-12 ">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="username">ระดับการศึกษา</label>
                                        <input type="text" class="form-control" value=" <?php echo $row_program['program_study']; ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="fname">ทุน</label>
                                        <input type="text" class="form-control" id="lname" value="<?php echo $row_program['program_scholarship'] ; ?>"  disabled>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label for="username">GPA</label>
                                        <input type="text" class="form-control" id="fname" value=" <?php echo  $row_program['program_GPA'] ; ?>" disabled>
                                    </div>
                                    <div class="form-group col-md-10">
                                        <label for="fname">คะแนนสอบภาษาอังกฤษ</label>
                                        <input type="text" class="form-control" id="lname" value="<?php echo $row_program['program_eng_test'] ; ?>"  disabled>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="lname">วันที่เข้ารับการศึกษา</label>
                                        <input type="text" class="form-control"  id="lname" value="<?php echo $row_program['program_start_date'] ; ?>"  disabled>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="mail">วันที่สอบ QE</label>
                                        <input type="email" class="form-control"  id="mail" value="<?php echo $row_program['program_qe_date'] ; ?>"  disabled>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="phone">วันที่แต่งตั้งอาจารย์ที่ปรึกษา</label>
                                        <input type="text" class="form-control"  id="phone" value="<?php echo $row_program['program_create_advisor_date'] ; ?>"  disabled>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="phone">วันที่สอบโครงร่างวิทยานิพนธ์</label>
                                        <input type="text" class="form-control"  value="<?php echo $row_program['program_proposal_test_date'] ; ?>"  disabled>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="mail">วันที่แต่งตั้งชื่อวิทยานิพนธ์</label>
                                        <input type="email" class="form-control"  id="mail" value="<?php echo $row_program['program_create_thesis_date'] ; ?>"  disabled>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="phone">วันที่สอบวิทยานิพนธ์</label>
                                        <input type="text" class="form-control"  id="phone" value="<?php echo $row_program['program_defence_test_date'] ; ?>"  disabled>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="phone">วันที่สำเร็จการศึกษา</label>
                                        <input type="text" class="form-control"  id="phone" value="<?php echo $row_program['program_grad_date'] ; ?>"  disabled>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="adds">ปีที่สำเร็จการศึกษา</label>
                                        <input type="text" class="form-control"   value="<?php echo $row_program['program_year_end'] ; ?>"  disabled>                                    
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="adds">สถานะการศึกษา</label>
                                        <input type="text" class="form-control"   value="<?php echo $row_program['program_status'] ; ?>"  disabled>
                                    </div>

                                </div>

                                <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="adds">หมายเหตุ</label>
                                            <input type="text" class="form-control"  disabled><?php echo $row_program['program_remark'] ; ?>
                                        </div>
                                </div>  
                                        <?php  $sent_id = $row_program['program_id'] ;?> 
                                        <a href="student_program_edit.php?id=<?php echo $sent_id;?>" class="btn btn-warning float-right"><b> EDIT </b></a> 
                                </div>
                            </div>
                        </div>       
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