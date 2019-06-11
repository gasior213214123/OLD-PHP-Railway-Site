<?php 
if($LOGGED) { header('Location: index.php'); exit(); } 
?>
<div class="container">
     <div class="row main">
        <div class="main-login main-center">
        <h5>Zarejestruj sie</h5>


          <form class="" method="post" action="?a=register" autocomplete="off">
            
            <div class="form-group">
              <label for="name" class="cols-sm-2 control-label">Twoje imie</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="name" id="name"  placeholder="Wpisz swoje imie"/>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="email" class="cols-sm-2 control-label">Twój Email</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i></span>
                  <input type="email" class="form-control" name="email" id="email"  placeholder="Wpisz swój Email"/>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="username" class="cols-sm-2 control-label">Nazwa użytkownika</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-eye-open" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="username" id="username"  placeholder="Wpisz swoją nazwe użytkownika"/>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="password" class="cols-sm-2 control-label">Hasło</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-lock" aria-hidden="true"></i></span>
                  <input type="password" class="form-control" name="password" id="password"  placeholder="Wpisz swoje hasło"/>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="confirm" class="cols-sm-2 control-label">Potwierdź hasło</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-lock" aria-hidden="true"></i></span>
                  <input type="password" class="form-control" name="confirm" id="confirm"  placeholder="Potwierdź swoje haslo"/>
                </div>
              </div>
            </div>

            <div class="form-group"> 
              <input type="submit" target="_blank"  id="button" class="btn btn-primary btn-lg btn-block login-button" value="Zarejestruj"/>
            </div>         
          </form>
        </div>
<div align="center">
<?php 
	if($_POST){
	$email = $_POST['email'];
	$username = $_POST['username'];
	$name = $_POST['name'];
	$password = $_POST['password'];
	$confirm = $_POST['confirm'];


		if(isset($password) && isset($confirm) && isset($email) && isset($name) && isset($username)){
			if($password && $confirm && $email && $name && $username){
				if($password==$confirm) {
					$emails = mysql_num_rows(mysql_query("SELECT * FROM users WHERE email='".$email."'"));
					if($emails==0) {
						mysql_query("INSERT INTO users (`Username`, `Name`, `email`, `password`) VALUES ('".$username."','".$name."','".$email."','".$password."')") or die(mysql_error());
					

						if(mysql_num_rows(mysql_query("SELECT * FROM users WHERE email='".$email."' AND password='".$password."'")) != 0) {
						echo "Sukces, mozesz sie teraz zalogowac";
						} else  echo "Wystąpił błąd, spróbuj ponownie";
					} else  echo "Zarejestrowano już użytkownika z takim adresem email, wybierz inny";
				} else  echo "Podane hasła są od siebie różne";
			} else echo "Podaj wszystkie dane";
		} else echo "Podaj wszystkie dane";
	}		
?>
</div>
      </div>
</div>
