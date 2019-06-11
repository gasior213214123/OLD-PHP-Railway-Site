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
        <li class="active"><a href="?a=admin_routes">Trasy</a></li>
        <li><a href="?a=admin_transport">Kursy</a></li>
        <li><a href="?a=admin_users">Uzytkownicy</a></li>
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
                <h3 class="panel-title">Trasy</h3>
                <div class="pull-right">
                    <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filtr</button>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr class="filters">
                        <th><input type="text" class="form-control" placeholder="#" disabled></th>                        
                        <th><input type="text" class="form-control" placeholder="Nazwa trasy" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Miasto Poczatkowe" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Miasto Koncowe" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Przystanki" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Wymagany czas" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Modyfikuj" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Usun" disabled></th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $res=mysql_query("SELECT * FROM routes");
                        while($row=mysql_fetch_array($res)){
                ?>
                    <tr>
                        <td><?php echo $row['Id'] ?></td>
                        <td><?php echo $row['Route_Name'] ?></td>
                        <td><?php echo $row['City_From'] ?></td>
                        <td><?php echo $row['City_To'] ?></td>
                        <td><?php echo $row['Stops'] ?></td>
                        <td><?php echo $row['Time_Needed'] ?></td>
                        <td><?php echo "<a href=\"modify_route.php?id=".$row['Id']."\">Edytuj</a>"; ?></td>
                        <td><?php echo "<a href=\"delete_route.php?id=".$row['Id']."\">Usun</a>"; ?></td>
                    </tr>
                    <?php } ?>

                    <tr>
                        <form class="" method="post" action="?a=admin_routes">
                        <td> #</td>
                        <td>  
                            <div class="form-group">
                                <input type="text" class="form-control" name="Route_Name" id="Route_Name" placeholder="Nazwa Trasy">
                            </div>
                        </td>
                        <td>  
                            <div class="form-group">
                                <input type="text" class="form-control" name="City_From" id="City_From" placeholder="Miasto Poczatkowe">
                            </div>
                        </td>
                        <td>  
                            <div class="form-group">
                                <input type="text" class="form-control" name="City_To" id="City_To" placeholder="Miasto Koncowe">
                            </div>
                        </td>
                        <td>  
                            <div class="form-group">
                                <input type="text" class="form-control" name="Stops" id="Stops" placeholder="Przystanki">
                            </div>
                        </td>
                        <td>  
                            <div class="form-group">
                                <input type="number" class="form-control" name="Time_Needed" id="Time_Needed" placeholder="Czas Trwania">
                            </div>
                        </td>
                           <td></td>
                        <td>
                            <div class="form-group">
                            <input type="submit" id="button" class="btn-primary" aria-hidden="true" value="Dodaj Trase"></button>
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
    $Route_Name = $_POST['Route_Name'];
    $City_From = $_POST['City_From'];
    $City_To = $_POST['City_To'];
    $Stops = $_POST['Stops'];
    $Time_Needed = $_POST['Time_Needed'];
 

         if(isset($Route_Name) && isset($City_From) && isset($City_To) && isset($Stops) && isset($Time_Needed)) {
            if($Route_Name && $City_From && $City_To && $Stops && $Time_Needed){
                $sameroutes = mysql_num_rows(mysql_query("SELECT * FROM routes WHERE Route_Name='".$Route_Name."' AND Stops='".$Stops."'"));
                if($sameroutes == 0) {
                    mysql_query("INSERT INTO routes (`Route_Name`, `City_From`, `City_To`, `Stops`, `Time_Needed`) VALUES ('".$Route_Name."','".$City_From."','".$City_To."','".$Stops."','".$Time_Needed."')") or die(mysql_error());
                

                    if(mysql_num_rows(mysql_query("SELECT * FROM routes WHERE Route_Name='".$Route_Name."' AND Stops='".$Stops."'")) != 0) {
                    echo "Dodano trase, prosze odswiezyc strone";
                    } else  echo "Wystąpił błąd, spróbuj ponownie";
                } else  echo "Juz podana trasa istnieje";
        } else echo "Podaj wszystkie dane";
    } else echo "Podaj wszystkie dane";
}       
} ?>
    </div>
  </div>

