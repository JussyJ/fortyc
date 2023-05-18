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

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">

    <script
  src="https://code.jquery.com/jquery-3.7.0.min.js"
  integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g="
  crossorigin="anonymous"></script>

 
</head>
<body>
  <header>

  <section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="http://localhost/fortyc/">Logout</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">Message</a></li>
            <li class="breadcrumb-item">User Profile</li>
          </ol>
        </nav>
      </div>
    </div>
    <div id="divmsglst"></div>
    
          





  </div>
</section>


  </header>
</body>

<!-- MDB -->
<script type="text/javascript" src="js/mdb.min.js"></script>
<!-- Custom scripts -->
<script type="text/javascript" src="js/script.js"></script>

<script>
    $.ajax({
        url: "services/serv.data.php?spcall=CALL getmsg()",
        success: function(response) {
            var data = JSON.parse(response);
            // console.log(response)
            data.object.map((k,i)=>{
                $('#divmsglst').append('<div class="row" ><div class="col-lg-12"><div class="card mb-4"><div class="card-body"><div class="row"><div class="col-sm-12"><p class="text-muted mb-0">'+k.message+'</p></div></div></div></div></div></div>');
            })
            
        }
    });
</script>
</html>


