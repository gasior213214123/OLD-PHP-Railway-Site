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
              <label for="User_ID">Nazwa Trasy</label>
                <div class="input-group">
                  <input type="text" class="form-control" name="Route_Name" id="Route_Name"  placeholder="Podaj Nazwe Trasy"/>
              </div>
            </div>

            <div class="form-group">
              <label for="News_ID">Miasto Poczatkowe</label>
                <div class="input-group">
                  <input type="text" class="form-control" name="City_From" id="City_From"  placeholder="Podaj Miasto Poczatkowe"/>
                </div>
            </div>

            <div class="form-group">
              <label for="News_ID">Miasto Koncowe</label>
                <div class="input-group">
                  <input type="text" class="form-control" name="City_To" id="City_To"  placeholder="Podaj Miasto Koncowe"/>
                </div>
            </div>

            <div class="form-group">
              <label for="date">Przystanki</label>
                <div class="input-group">
                  <input type="text" class="form-control" name="Stops" id="Stops"  placeholder="Podaj Przystanki"/>
                </div>
            </div>

            <div class="form-group">
              <label for="date">Czas Przejazdu</label>
                <div class="input-group">
                  <input type="number" class="form-control" name="Time_Needed" id="Time_Needed"  placeholder="Podaj Czas Trwania"/>
                </div>
            </div>


            <div class="form-group"> 
              <input type="submit" id="button" value="Edytuj Trase"/>
            </div>         
    </form>
<?php
    if($_POST){
    $Route_Name = $_POST['Route_Name'];
    $City_From = $_POST['City_From'];
    $City_To = $_POST['City_To'];
    $Stops = $_POST['Stops'];
    $Time_Needed = $_POST['Time_Needed'];
 

         if(isset($Route_Name) && isset($City_From) && isset($City_To) && isset($Stops) && isset($Time_Needed)) {
            if($Route_Name && $City_From && $City_To && $Stops && $Time_Needed){
                $sameroutes = mysql_num_rows(mysql_query("SELECT * FROM routes WHERE Route_Name='".$Route_Name."' AND Stops='".$Stops."'"));
                if($sameroutes == 0) {
                  mysql_query("UPDATE routes SET Route_Name='".$Route_Name."', City_From='".$City_From."', City_To='".$City_To."', Stops='".$Stops."', Time_Needed='".$Time_Needed."' WHERE Id='".$id."'") or die(mysql_error());
                    


                  if(mysql_num_rows(mysql_query("SELECT * FROM routes WHERE Route_Name='".$Route_Name."' AND Stops='".$Stops."'")) != 0) {
                  echo "Dodano trase, prosze odswiezyc strone";
                  } else  echo "Wystąpił błąd, spróbuj ponownie";
                } else  echo "Juz podana trasa istnieje";
        } else echo "Podaj wszystkie dane";
    } else echo "Podaj wszystkie dane";
}        
} ?>

</br>
<a href=index.php>wroc na strone glowna</a>