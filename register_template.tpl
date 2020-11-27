<!DOCTYPE html>
<html lang="en">
<head>
  <title>REGISTER TEMPLATE</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
  .navbar-nav > li{
  margin-left:10px;
  margin-right:10px;
}

</style>

<body>

<!-- Navbar -->

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <ul class="navbar-nav">
      <a class="navbar-brand" href="#">The Beautiful Game</a>
    <li class="nav-item">
      <a class="nav-link" href="{$href0}">{$Menu0}</a>
    </li>

  </ul>
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" href="#">{$Menu1}</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="{$href1}">{$Menu2}</a>
    </li>
  </ul>
</nav>



<!-- Sign Up-->

  <div class="card" style="margin-top:2%; margin-left:15%; margin-right:15%; border: none;">
  <h2 class="text-center"> Register</h2>
  <form action= "register_action.php" method="POST">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="name" class="form-control" placeholder="Enter name" id="name" value="{Name}" required>
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" placeholder="Enter email" id="email" value="{Email}" required>
    </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" placeholder="Enter password" id="pwd" value="{pwd}" required>
  </div>
  <div class="form-group">
    <label for="pwd_cf">Confirm Password:</label>
    <input type="password" class="form-control" placeholder="Type again password" id="pwd_cf" value="{pwd_cf}" required>
  </div>
  <div class="form-group container" style="text-align: center;">
   <a href="#" class="btn btn-success btn-success" role="button" type="submit">
    <i class="fa fa-check"></i> &nbsp;Confirm</a>
    
   <a href="#" class="btn btn-success btn-danger" role="button"><i class="fa fa-trash"></i> &nbsp;Clear</a>
  </div>
</form>
</div>
<!-- Error Message -->
    {if $isError eq 1 }
    <div class="alert alert-danger">
      <p style="text-align: center">{$Error}</p>
    </div>
    {/if}
</body>
</html>