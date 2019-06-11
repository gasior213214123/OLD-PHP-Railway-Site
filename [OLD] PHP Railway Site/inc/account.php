<div class="container"> 
    <?php 
                        if(!$LOGGED) {
                ?>
                    <div class="row">
                        <h3 style="color:#2365a3;" align="center">Nie jestes zalogowany</h3>
                    </div>
    <?php
            } else {
    ?>


    <div class="col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h1 class="panel-title">Twoje dane</h1>
            </div>

                <div>
                    <h3 style="color:#2365a3;"><span class="glyphicon glyphicon-user"></span>Imię:</h3>
                    <h3><?php echo $u['Name'] ?></h3>
                </div>
                <div>
                    <h3 style="color:#2365a3;"><span class="glyphicon glyphicon-envelope"></span>Email:</h3>
                    <h3><?php echo $u['email'] ?></h3>
                </div>
                <div>
                    <h3 style="color:#2365a3;"><span class="glyphicon glyphicon-eye-open"></span>Nazwa Użytkownika:</h3>
                    <h3><?php echo $u['UserName'] ?></h3>
                </div>
                <div>
                    <h3 style="color:#2365a3;"><span class="glyphicon glyphicon-user"></span>Hasło</h3>
                    <h3><?php echo $u['password'] ?></h3>
                </div>
        </div>

    </div>
    <div class="col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h1 class="panel-title">Zmodyfikuj dane</h1>
            </div>
        <form class="form-group" method="post" action="?a=account">

            <div class="form-group">
              <label for="name" style="color:#2365a3;" class="cols-sm-2 control-label">Twoje imie</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="name" id="name"  placeholder="Wpisz swoje nowe imie"/>
                </div>
            </div>

            <div class="form-group">
              <label for="name" style="color:#2365a3;" class="cols-sm-2 control-label">Twoj Email</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i></span>
                  <input type="email" class="form-control" name="email" id="email"  placeholder="Wpisz swoj nowy Email"/>
                </div>
            </div>


            <div class="form-group">
              <label for="username" style="color:#2365a3;" class="cols-sm-2 control-label">Twoja Nazwa użytkownika</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-eye-open" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="username" id="username"  placeholder="Wpisz swoją nową nazwe użytkownika"/>
              </div>
            </div>

            <div class="form-group">
              <label for="password" style="color:#2365a3;" class="cols-sm-2 control-label">Hasło</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-lock" aria-hidden="true"></i></span>
                  <input type="password" class="form-control" name="password" id="password"  placeholder="Wpisz swoje nowe hasło"/>
                </div>
            </div>

            <div class="form-group"> 
              <input type="submit" target="_blank"  id="button" class="btn btn-lg btn-primary login-button btn-block" value="Zmodyfikuj"/>
            </div>    
        </form>        
    </div>
</div>
    <?php } ?>
</div>
<div align="center">       
<?php 
    if($_POST){
    $email = $_POST['email'];
    $username = $_POST['username'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $id = $u['Id'];

        if(isset($password) && isset($email) && isset($name) && isset($username)){
            if($password && $email && $name && $username){
                    $emails = mysql_num_rows(mysql_query("SELECT * FROM users WHERE email='".$email."'"));
                    if($emails==0) {
                        mysql_query("UPDATE users SET email='".$email."', UserName='".$username."', Name='".$name."', password='".$password."' WHERE Id='".$id."'") or die(mysql_error());
                    

                        if(mysql_num_rows(mysql_query("SELECT * FROM users WHERE email='".$email."' AND password='".$password."'")) != 0) {
                        echo "Zmodyfikowano pomyslnie, mozesz sie zalogowac ponownie";
                        } else  echo "Wystąpił błąd, spróbuj ponownie";
                    } else  echo "Zarejestrowano już użytkownika z takim adresem email, wybierz inny";
            } else echo "Podaj wszystkie dane";
        } else echo "Podaj wszystkie dane";
    }       
?>
</div>