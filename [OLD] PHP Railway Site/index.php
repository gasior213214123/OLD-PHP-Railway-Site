<?php
include("config.php");
error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT);
$a = $_GET['a'];
error_reporting(E_ALL & ~E_STRICT);
?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Koleje">
    <meta name="author" content="Szczepan Lis">
    <link rel="icon" href="img/icon.ico">
    <title>Koleje.pl</title>
    <link href="css/layout.css" rel="stylesheet">
    <link href="css/wizard.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <!-- Bootstrap -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->

<!-- end of navbar -->
  </head>
  <body>
  <!-- navbar-->
<div id="header">
    <div class="container-fluid">
      <nav class="navbar navbar-inverse">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-2">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Koleje.pl</a>
          </div> 
          <div class="collapse navbar-collapse" id="navbar-collapse-2">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="?a=timetable">Rozklad jazdy</a></li>
              <li><a href="?a=details">Szczegóły tras</a></li>
              <li><a href="?a=news">Aktualności</a></li>
              <li><a href="?a=about">O nas</a></li>
              <li><a href="?a=stops">Dworce</a></li>
              <li><a href="?a=contact">Kontakt</a></li>
              <li>
              <?php if(!$LOGGED) { ?>
                <a class="btn btn-default btn-outline btn-circle collapsed"  data-toggle="collapse" href="#nav-collapse2" aria-expanded="false" aria-controls="nav-collapse2">Zaloguj się</a>
              <?php } else { ?>
                <a class="btn btn-default btn-outline btn-circle collapsed"  data-toggle="collapse" href="#nav-collapse3" aria-expanded="false" aria-controls="nav-collapse2"><?php echo $u['email']?></a>
              <?php } ?>
              </li>
            </ul>
            <div class="collapse nav navbar-nav nav-collapse slide-down" id="nav-collapse2">
              <form class="navbar-form navbar-right form-inline" role="form" action="?a=login" method="post">
                <div class="form-group">
                  <label class="sr-only" for="Email">Email</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email" autofocus required />
                </div>
                <div class="form-group">
                  <label class="sr-only" for="Password">Hasło</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Hasło" required />
                </div>
                <button type="submit" class="btn btn-success">Zaloguj</button>
                <a href="?a=register"><button type="button" class="btn btn-success">Zarejestruj</button></a>
              </form>
            </div>
            <div class="collapse nav navbar-nav nav-collapse slide-down" id="nav-collapse3">
              <ul class="nav navbar-nav navbar-left">
                <?php if($u['Id'] == 1){ ?>
                  <li><a href="?a=admin_routes" role="button" aria-expanded="false">Panel Administratora</a></li>
                <?php } ?>
                <li><a href="?a=account" role="button" aria-expanded="false">Ustawienia</a></li>
                <li><a href="?a=logout" role="button" aria-expanded="false">Wyloguj</a></li>
              </ul>
              </div>
          </div>
        </div>
      </nav>
    </div>  

    <?php
      if(is_file('inc/'.$a.'.php') && file_exists('inc/'.$a.'.php'))
        include('inc/'.$a.'.php');
      else
        include('inc/main.php');
      ?>
    </div>

    <!--footer-->
    <div id="footer" class="container text-center">
      <hr />
      <div class="row">
        <div class="col-lg-12">
          <div class="col-md-3">
            <ul class="nav nav-pills nav-stacked">
              <li><a href="?a=terms">Polityka cookies</a></li>
            </ul>
          </div>
          <div class="col-md-3">
            <ul class="nav nav-pills nav-stacked">
              <li><a href="?a=contact">Pomoc</a></li>
            </ul>
          </div>
          <div class="col-md-3">
            <ul class="nav nav-pills nav-stacked">
              <li><a href="?a=account">Twoje Konto</a></li>
            </ul>
          </div>
          <div class="col-md-3">
            <ul class="nav nav-pills nav-stacked">
              <li><a href="?a=contact">Zgłoś Uwagi</a></li>
            </ul>
          </div>  
        </div>
      </div>
      <hr>
        <div id="clock" class="row">
            <div class="col-lg-12">
                <ul class="nav nav-pills nav-justified">
                    <li><a href="#">Szczepan Lis @ <?php echo date('Y',mktime()); ?> || Aktualny czas: <time></time></a></li>
                    <li><a href="?a=terms">Regulamin</a></li>
                    <li><a href="#">Prywatność</a></li>
                </ul>
            </div>
      </div>
  </div>

    <!--end footer-->









    <!-- Bootstrap core JavaScript -->
    <!-- ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
