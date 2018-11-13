<?php   
 require_once('php/connect.php');
    
 if(!isset($_SESSION['id'])){
     header('location:login.php');
 }
 $sql = "SELECT * FROM tbl_user WHERE user_id = '".$_SESSION['id']."' ";
 $result = $conn->query($sql);
 $row = $result->fetch_assoc();

 if (!$result->num_rows) {
     header('location:login.php');
 }

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/font-awesome5/css/fa-solid.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/jquery.dataTables.css"/>
   

    <style>
        .bg-grey {
            background-color: #f6f6f6;
        }
    </style>
 
</head>
<body>

        <?php  include_once('includes/navbar.php'); ?>

        <div class="jumbotron jumbotron-fluid text-center">
            <div class="container">
                <h1 class="display-3">IL Education Database</h1>
            </div>
        </div>

    <section class="container py-5">
        <div class="row">
        
            <!--
            <div class="col-12">
                <div class="embed-responsive embed-responsive-16by9">
                     <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/V5M2WZiAy6k" ></iframe> 
                </div>
            </div>
            -->
            <div class="card-deck">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        </div>
                        <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                        </div>
                        <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                        </div>
                        <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                        </div>
                        <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>
            </div>   
        </div>
    </section>
    <section class="container py-3 bg-grey" >
        <div><a href="create_student.php" class="btn btn-info my-3"> เพิ่มข้อมูลนักศึกษา </a></div>
        <table id="table_student" class="table table-responsive display responsive no-wrap">
            <thead>
                <tr>
                    <th>Student_ID</th>
                    <th>Name</th>
                    <th width=20%>E-mail</th>
                    <th>Country</th>
                    <th>Program</th>
                    <th>Status</th>
                    <th> </th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $sql_student="SELECT 
                                A.student_id,A.student_title_eng,A.student_fname_eng,A.student_lname_eng,A.student_country,A.student_email,A.student_phone,B.program_study,B.program_status
                                FROM tbl_student A 
                                LEFT JOIN tbl_student_program B ON  A.student_id = B.student_id 
                                order by A.student_id DESC";
                $result_student = $conn->query($sql_student);
                //$row_student= $result_student->fetch_array();
                while ($row = $result_student->fetch_array(MYSQLI_ASSOC)) { 
                    $sent_id = $row['student_id'] ;
                ?>
                    <tr>
                    <td align=center><?php echo $row['student_id'];?></td>
                    <td><?php echo $row['student_title_eng'].$row['student_fname_eng']." ".$row['student_lname_eng'] ;?></td>
                    <td><?php echo $row['student_email'];?></td>
                    <td align=center><?php echo $row['student_country'];?></td>
                    <td align=center><?php echo $row['program_study'];?></td>
                    <td><?php echo $row['program_status'];?></td>
                    <td> <a href="student_profile.php?id=<?php echo $sent_id;?>" class="btn btn-info">ประวัติ</a></td>
                   
                </tr>
                <?php  } ?>
                </tbody>
        </table>
        
    </section>


    <footer class="card bg-dark text-center py-3 text-white">
                        CopyRight 2018  <a href="#">Footer</a>         
    </footer>
<script src="node_modules/jquery/dist/jquery.min.js"></script> 
<script src="node_modules/popper.js/dist/popper.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script> 
<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.js"></script>

<script>
    $(document).ready(function() {
        $('#table_student').DataTable( {
            "order": [[ 0, "desc" ]]
            
   
        });
    } );

</script>

</body>
</html>