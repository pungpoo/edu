<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Regis</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/font-awesome5/css/fontawesome-all.css">
</head>
<body>
<?php include_once('includes/navbar.php');?>
    <div class="container">
        <div class="row">
            <div class="offset-md-3 col-md-6 mt-5" >
                <div class="card">
                    <h5 class="card-header text-center">Registration</h5>
                    <div class="card-body">
                        <form class="form" id="frmRegis" method="post" action="php/createMember.php">
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                                </div>
                                <input type="text" class="form-control" id="fname" name="fname" placeholder="ชื่อ">
                            </div>

                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                                </div>
                                <input type="text" class="form-control" id="lname" name="lname" placeholder="นามสกุล">
                            </div>
                        
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                                </div>
                                <input type="email" class="form-control" id="mail" name="mail" placeholder="E-mail">
                            </div>
                            
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                                </div>
                                <input type="text" class="form-control" id="phone" name="phone"  placeholder="Phone">
                            </div>

                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-key"></i></div>
                                </div>
                                <input type="text" class="form-control" id="username" name="username"  placeholder="username">
                            </div>

                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-key"></i></div>
                                </div>
                                <input type="password" class="form-control" id="password" name="password"  placeholder="Password">
                            </div>
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-key"></i></div>
                                </div>
                                <input type="password" class="form-control" id="conf_password" name="conf_password" placeholder="Comfirm-Password">
                            </div>
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="6LdJqW8UAAAAABGqb23lwkxLdJh6gn6eonylnACm"></div>
                            </div>
                            <button type="submit" name="submit" id="submit" disabled class="btn btn-primary mb-2  btn-block">Regis</button>
                            <span class="float-right">Login <a href="#">Click</a></span>

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
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script>
        //frmRegis
        $( document ).ready(function(){
            $('#frmRegis').validate({
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
                    username: {
                        required: true,
                        minlength: 4
                    },
                    password: {
                        required: true,
                        minlength: 4
                    },
                    conf_password: {
                        required: true,
                        minlength: 4,
                        equalTo: '#password'
                    }

                },
                messages:{
                    fname:'โปรดกรอกชื่อ',
                    lname:'โปรดกรอกนามสกุล',
                    email: {
                        required: 'โปรดกรอก Email',
                        email: 'โปรดกรอก Email ให้ถูกต้อง'
                    },
                    phone: {
                        required: 'โปรดระบุ' ,
                        number: 'โปรดกรอกตัวเลขเท่านั้น',
                        minlength: 'โปรดกรอกตัวเลขไม่เกิน 20 ตัวอักษร'
                    },
                    username: {
                        required: 'โปรดกรอก Usermane',
                        minlength: 'โปรดกรอก Usermane มากกว่า 4 ตัวอักษร'
                    },
                    password: {
                        required: 'โปรดกรอก Password',
                        minlength: 'โปรดกรอก Usermane มากกว่า 4 ตัวอักษร'
                    },
                    conf_password: {
                        required: 'โปรดกรอก Password',
                        minlength: 'โปรดกรอก Usermane มากกว่า 4 ตัวอักษร',
                        equalTo: 'ยืนยัน Password ไม่ถูกต้อง'
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

        function recaptchaCallback(){
            $('#submit').removeAttr('disabled');
        }

        
    </script>
</body>
</html>