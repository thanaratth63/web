<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
    body {
        background-color:#479E6D;
    }
    div{
        background-color:white;
    }
    </style>
</head>
<body class="container" >

<nav class="navbar navbar-default navbar-static-top">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="indexa.php">Admin Manage</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
            <li ><a href="indexa.php">Product <span class="sr-only">(current)</span></a></li>
            <li ><a href="orderadmin.php">Order <span class="sr-only">(current)</span></a></li>
            <li ><a href="customer.php">Customer<span class="sr-only">(current)</span></a></li>
            <li ><a href="admin.php">Admin<span class="sr-only">(current)</span></a></li>
            <!-- <li ><a href="sport.php">ประเภทกีฬา <span class="sr-only">(current)</span></a></li> -->
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
        <a href="logout.php" class="bn8 btn-lg pull-right"><i class="glyphicon glyphicon-log-out"></i> Log out</a>

        <!-- <a href="logout.php" class="btn btn-danger" style="margin-left: 10px">Log out</a> -->
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

</body>
</html>