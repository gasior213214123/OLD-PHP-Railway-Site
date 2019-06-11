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
              <label for="User_ID">ID Trasy</label>
                <div class="input-group">
                  <input type="text" class="form-control" name="Route_ID" id="Route_ID"  placeholder="Podaj ID trasy"/>
              </div>
            </div>

            <div class="form-group">
              <label for="News_ID">Czas Wyjazdu</label>
                <div class="input-group">
                  <input type="text" class="form-control" name="StartTime" id="StartTime"  placeholder="Podaj Czas Wyjazdu"/>
                </div>
            </div>

            <div class="form-group">
              <label for="date">Data</label>
                <div class="input-group">
                  <input type="text" class="form-control" name="date" id="date"  placeholder="yyyy/mm/dd"/>
                </div>
            </div>


            <div class="form-group"> 
              <input type="submit" id="button" value="Edytuj kurs"/>
            </div>         
    </form>
<?php
    if($_POST){
    $Route_ID = $_POST['Route_ID'];
    $StartTime = $_POST['StartTime'];
    $date = $_POST['date'];

 
         if(isset($Route_ID) && isset($StartTime) && isset($date)){
            if($Route_ID && $StartTime && $date){
              $routeid = mysql_num_rows(mysql_query("SELECT * FROM routes WHERE id='".$Route_ID."'"));
              if($routeid != 0) {
                mysql_query("UPDATE courses SET Route_ID='".$Route_ID."', StartTime='".$StartTime."', Date='".$date."' WHERE Id='".$id."'") or die(mysql_error());
                    


                    if(mysql_num_rows(mysql_query("SELECT * FROM courses WHERE Route_ID='".$Route_ID."' AND StartTime='".$StartTime."' AND Date='".$date."'")) != 0) {
                    echo "Zmodyfikowano kurs, prosze wrocic na strone glowna";
                    } else  echo "Wystąpił błąd, spróbuj ponownie";
                } else  echo "Nie ma podanej trasy";
        } else echo "Podaj wszystkie dane";
    } else echo "Podaj wszystkie dane";
}            
} ?>

</br>
<a href=index.php>wroc na strone glowna</a>