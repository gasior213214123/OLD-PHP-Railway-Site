      <script type="text/javascript" src="js/search.js"></script>
        <div class="container-fluid main-container">
    <?php 
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
    <div class="col-md-2 sidebar">
      <ul class="nav nav-pills nav-stacked">
        <li><a href="?a=admin_routes">Trasy</a></li>
        <li><a href="?a=admin_transport">Kursy</a></li>
        <li class="active"><a href="?a=admin_users">Uzytkownicy</a></li>
        <li><a href="?a=admin_news">News</a></li>
        <li><a href="?a=admin_comments">Komentarze</a></li>
        <li><a href="?a=admin_contact">Kontakt</a></li>
        <li><a href="?a=logout">Wyloguj</a></li>
      </ul>
    </div>
    <div class="col-md-10 content">
          <div class="row">
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">Uzytkownicy</h3>
                <div class="pull-right">
                    <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filtr</button>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr class="filters">
                        <th><input type="text" class="form-control" placeholder="#" disabled></th>                        
                        <th><input type="text" class="form-control" placeholder="Nazwa Uzytkownika" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Imie" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Email" disabled></th>
                        <th><input type="text" class="form-control" placeholder="haslo" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Modyfikuj" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Usun" disabled></th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $res=mysql_query("SELECT * FROM users");
                        while($row=mysql_fetch_array($res)){
                ?>
                    <tr>
                        <td><?php echo $row['Id'] ?></td>
                        <td><?php echo $row['UserName'] ?></td>
                        <td><?php echo $row['Name'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['password'] ?></td>
                        <td><?php echo "<a href=\"modify_user.php?id=".$row['Id']."\">Edytuj</a>"; ?></td>
                        <td><?php echo "<a href=\"delete_user.php?id=".$row['Id']."\">Usun</a>"; ?></td>
                    </tr>
                    <?php } ?>

                    <tr>
                        <form class="" method="post" action="?a=admin_users">
                        <td> #</td>
                        <td>  
                            <div class="form-group">
                                <input type="text" class="form-control" name="UserName" id="UserName" placeholder="Nazwa Uzytkownika">
                            </div>
                        </td>
                        <td>  
                            <div class="form-group">
                                <input type="text" class="form-control" name="Name" id="Name" placeholder="Nazwa Uzytkownika">
                            </div>
                        </td>
                        <td>  
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email Uzytkownika">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control" name="password" id="password" placeholder="Haslo Uzytkownika">
                            </div>
                        </td>
                        <td></td>
                        <td>
                            <div class="form-group">
                            <input type="submit" id="button" class="btn-primary" aria-hidden="true" value="Dodaj uzytkownika"></button>
                            </div>
                        </td>
                        </form>
                    </tr>
             </table>
        </div>

    </div>
    <div align="center">                    
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
                    mysql_query("INSERT INTO users (`Username`, `Name`, `email`, `password`) VALUES ('".$UserName."','".$Name."','".$email."','".$password."')") or die(mysql_error());
                

                    if(mysql_num_rows(mysql_query("SELECT * FROM users WHERE email='".$email."' AND password='".$password."'")) != 0) {
                    echo "Dodano uzytkownika, prosze odswiezyc strone";
                    } else  echo "Wystąpił błąd, spróbuj ponownie";
                } else  echo "Podany email juz jest zarejestrowany";
        } else echo "Podaj wszystkie dane";
    } else echo "Podaj wszystkie dane";
}       
} ?>
    </div>
  </div>

