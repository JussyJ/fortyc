<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Material Design for Bootstrap</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
    <!-- Custom styles -->
    <link rel="stylesheet" href="css/style.css" />
    <script
  src="https://code.jquery.com/jquery-3.7.0.min.js"
  integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g="
  crossorigin="anonymous"></script>
</head>
<body>
  <header>

    <style>
        .sError{
            color: red; font-size: 12px; font-style: italic;font-weight: bold; float: right;padding-left: 5px;
        }
    </style>
    <form name="paForm" action="r.php?page=post" method="POST" data-abide>

        <section class="vh-100" style="background-color: #eee;">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                            <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Register</p>

                            <form class="mx-1 mx-md-4">

                            <div class="d-flex flex-row align-items-center mb-4">
                                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                <div class="form-outline flex-fill mb-0">
                                <input type="text" id="txtname" class="form-control" />
                                <label class="form-label" for="txtname">Name <span id="sName" class="sError"></span></label>
                                </div>
                            </div>

                            <div class="d-flex flex-row align-items-center mb-4">
                                <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                <div class="form-outline flex-fill mb-0">
                                <input type="email" id="txtemail" class="form-control" />
                                <label class="form-label" for="txtemail">Email <span id="sEmail" class="sError"></span></label>
                                </div>
                            </div>

                            <div class="d-flex flex-row align-items-center mb-4">
                                <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                <div class="form-outline flex-fill mb-0">
                                <input type="password" id="txtpwd" class="form-control" />
                                <label class="form-label" for="txtpwd">Password <span id="sPwd" class="sError"></span></label>
                                </div>
                            </div>

                            <div class="d-flex flex-row align-items-center mb-4">
                                <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                <div class="form-outline flex-fill mb-0">
                                <input type="password" id="txtconfirmpwd" class="form-control" />
                                <label class="form-label" for="txtconfirmpwd">Confirm password <span id="sConfirmpwd" class="sError"></span></label>
                                </div>
                            </div>

                            <!-- <div class="form-check d-flex justify-content-center mb-5">
                                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" />
                                <label class="form-check-label" for="form2Example3">
                                I agree all statements in <a href="#!">Terms of service</a>
                                </label>
                            </div> -->

                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                <button type="button" id="btnreg" class="btn btn-primary btn-lg">Register</button>
                            </div>

                            </form>

                        </div>
                        <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                            <img src="img/reg.webp"
                            class="img-fluid" alt="Sample image">

                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </section>

    </form>
  </header>
</body>

<!-- MDB -->
<script type="text/javascript" src="js/mdb.min.js"></script>
<!-- Custom scripts -->
<script type="text/javascript" src="js/script.js"></script>

<script>

    var noerr;
    $('#sName, #sEmail, #sPwd, #sConfirmpwd').text('*');
    $('#txtname').keyup(function(){
        if(!$(this).val()){
            $('#sName').text('*');
        }else{
            $('#sName').text('');
            if($(this).val().length>=21){
                $('#sName').text('Too Long');
            }else if($(this).val().length>=5){
                $('#sName').text('');
            }else{
                $('#sName').text('Too Short');
            }
        }
    })

    $('#txtemail').keyup(function(){
        if(!$(this).val()){
            $('#sEmail').text('*');
        }else{
            if(validateEmail($(this).val())==1){
                $.ajax({
                    url: "services/serv.data.php?spcall=CALL validateEmail('"+$(this).val()+"')",
                    success: function(response) {
                        var data = JSON.parse(response);
                        $('#sEmail').text(data.object[0].msg);
                    }
                });
            }else{
                $('#sEmail').text('Invalid Email');
            }
        }
    })

    function validateEmail(email) {
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        if( !emailReg.test( email ) ) {
            return 0;
        } else {
            return 1;
        }
    }

    $('#txtpwd').keyup(function(){
        if(!$(this).val()){
            $('#sPwd').text('*');
        }else{
            $('#sPwd').text('');
        }
    })

    $('#txtconfirmpwd').keyup(function(){
        if(!$(this).val()){
            $('#sConfirmpwd').text('*');
        }else{
            if($(this).val()==$('#txtpwd').val()){
                $('#sConfirmpwd').text('');
            }else{
                $('#sConfirmpwd').text('Password not Match.');
            }
        }
        
    })

    $('#btnreg').click(function(){
        noerr = 0;
        $('.sError').each(function () {
            if($(this).text()==''){
                noerr = noerr + 1
            }
        })
        
        if(noerr==4){
            $.ajax({
                url: "services/serv.data.php?spcall=CALL usermngt(1,'"+$('#txtname').val()+"','"+$('#txtemail').val()+"','"+$('#txtconfirmpwd').val()+"','"+$('#txtemail').val()+"', '<?php echo $_SERVER['REMOTE_ADDR']?>')",
                success: function(response) {
                    var data = JSON.parse(response);
                    alert(data.object[0].msg);
                    $(location).prop('href', 'r.php?page=registerw')
                }
            });
        }else{
            alert('Please check inputs')
        }
    })
</script>
</html>