<?php
include("config.php");
$id = $_GET['id'];
        if(!$LOGGED) {
    ?>
            <div class="row">
                <h3 style="color:#2365a3;" align="center">Nie jestes zalogowany</h3>
            </div>
    <?php
            } elseif ($u['Id'] != 1) {
    ?>   
                <div class="row">
                    <h3 style="color:#2365a3;" align="center">Nie masz uprawnien</h3>
                </div>
    <?php } else { ?>

   
    <form class="" method="post" action="">      
            <div class="form-group">
              <label for="User_ID">Pseudonim</label>
                <div class="input-group">
                  <input type="text" class="form-control" name="UserName" id="UserName"  placeholder="Pseudonim uzytkownika"/>
              </div>
            </div>

            <div class="form-group">
              <label for="News_ID">Imie</label>
                <div class="input-group">
                  <input type="text" class="form-control" name="Name" id="Name"  placeholder="Imie uzytkownika"/>
                </div>
            </div>

            <div class="form-group">
              <label for="date">Email</label>
                <div class="input-group">
                  <input type="email" class="form-control" name="email" id="email"  placeholder="Wpisz Email"/>
                </div>
            </div>

            <div class="form-group">
              <label for="date">Haslo</label>
                <div class="input-group">
                  <input type="text" class="form-control" name="password" id="password"  placeholder="Wpisz haslo"/>
                </div>
            </div>

            <div class="form-group"> 
              <input type="submit" id="button" value="Edytuj artykul"/>
            </div>         
    </form>
<?php
    if($_POST){
    $UserName = $_POST['UserName'];
    $Name = $_POST['Name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

 
         if(isset($UserName) && isset($Name) && isset($email) && isset($password)){
            if($UserName && $Name && $email && $password){
              $emails = mysql_num_rows(mysql_query("SELECT * FROM users WHERE email='".$email."'"));
              if($emails==0) {
                mysql_query("UPDATE users SET UserName='".$UserName."', name='".$Name."', email='".$email."', password='".$password."' WHERE Id='".$id."'") or die(mysql_error());
                    

                    if(mysql_num_rows(mysql_query("SELECT * FROM users WHERE email='".$email."' AND password='".$password."'")) != 0) {
                    echo "Zmodyfikowano uzytkownika, prosze wrocic na strone glowna";
                    } else  echo "Wystąpił błąd, spróbuj ponownie";
                } else  echo "Podany email juz jest zarejestrowany";
        } else echo "Podaj wszystkie dane";
    } else echo "Podaj wszystkie dane";
}       
} ?>

</br>
<a href=index.php>wroc na strone glowna</a>