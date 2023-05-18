<?php 
    require_once 'header.php';
?>
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
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
</head>
<body>
      <!--Main Navigation-->
  <header>

    <style>
        .divider:after,
        .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        background: #eee;
        }
        .h-custom {
            height: calc(100% - 73px);
        }
        @media (max-width: 450px) {
            .h-custom {
                height: 100%;
            }
        }
    </style>

    <section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
            class="img-fluid" alt="Sample image">
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="email" id="txtemail" class="form-control form-control-lg"
                placeholder="Enter a valid email address" />
                <label class="form-label" for="txtemail">Email address</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-3">
                <input type="password" id="txtpwd" class="form-control form-control-lg"
                placeholder="Enter password" />
                <label class="form-label" for="txtpwd">Password</label>
            </div>

            <div class="text-center text-lg-start mt-4 pt-2">
                <button type="button" id="btnlogin" class="btn btn-primary btn-lg"
                style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a id="btnreg" href="#!"
                    class="link-danger">Register</a></p>
            </div>
        </div>
        </div>
    </div>
    <div
        class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">

        <div class="text-white mb-3 mb-md-0">
        Copyright © 2020. All rights reserved.
        </div>

        <div>
        <a href="#!" class="text-white me-4">
            <i class="fab fa-facebook-f"></i>
        </a>
        <a href="#!" class="text-white me-4">
            <i class="fab fa-twitter"></i>
        </a>
        <a href="#!" class="text-white me-4">
            <i class="fab fa-google"></i>
        </a>
        <a href="#!" class="text-white">
            <i class="fab fa-linkedin-in"></i>
        </a>
        </div>

    </div>
</section>

  </header>
</body>
<!-- MDB -->
<script type="text/javascript" src="js/mdb.min.js"></script>
<!-- Custom scripts -->
<script type="text/javascript" src="js/script.js"></script>
<script>

    $('#btnlogin').click(function(){
        $.ajax({
            url: "services/serv.data.php?spcall=CALL userlogin('"+$('#txtemail').val()+"', '"+$('#txtpwd').val()+"', '"+$('#txtemail').val()+"', '<?php echo $_SERVER['REMOTE_ADDR']?>')",
            success: function(response) {
                var data = JSON.parse(response);
                if(data.object[0].rscode==0){
                    alert(data.object[0].msg);
                }else{
                    alert(data.object[0].msg+' redirect');
                    uid = data.object[0].uid;
                    document.location.href = 'r.php?page=userprofile&id='+data.object[0].uid;
                }
            }
        });
    })

    $('#btnreg').click(function(){
        document.location.href = 'r.php?page=register'
    })
</script>
</html>