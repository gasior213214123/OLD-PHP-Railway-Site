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
        <li class="active"><a href="?a=admin_transport">Kursy</a></li>
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
                <h3 class="panel-title">Kursy</h3>
                <div class="pull-right">
                    <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filtr</button>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr class="filters">
                        <th><input type="text" class="form-control" placeholder="#" disabled></th>                        
                        <th><input type="text" class="form-control" placeholder="ID Trasy" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Czas Wyjazdu" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Data" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Modyfikuj" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Usun" disabled></th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $res=mysql_query("SELECT * FROM courses");
                        while($row=mysql_fetch_array($res)){
                ?>
                    <tr>
                        <td><?php echo $row['Id'] ?></td>
                        <td><?php echo $row['Route_ID'] ?></td>
                        <td><?php echo $row['StartTime'] ?></td>
                        <td><?php echo $row['Date'] ?></td>
                        <td><?php echo "<a href=\"modify_course.php?id=".$row['Id']."\">Edytuj</a>"; ?></td>
                        <td><?php echo "<a href=\"delete_course.php?id=".$row['Id']."\">Usun</a>"; ?></td>
                    </tr>
                    <?php } ?>

                    <tr>
                        <form class="" method="post" action="?a=admin_transport">
                        <td> #</td>
                        <td>  
                            <div class="form-group">
                                <input type="text" class="form-control" name="Route_ID" id="Route_ID" placeholder="ID Trasy">
                            </div>
                        </td>
                        <td>  
                            <div class="form-group">
                                <input type="text" class="form-control" name="StartTime" id="StartTime" placeholder="Czas Wyjazdu">
                            </div>
                        </td>
                        <td>  
                            <div class="form-group">
                                <input type="text" class="form-control" name="date" id="date" placeholder="Data">
                            </div>
                        </td>
                           <td></td>
                        <td>
                            <div class="form-group">
                            <input type="submit" id="button" class="btn-primary" aria-hidden="true" value="Dodaj Kurs"></button>
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
    $Route_ID = $_POST['Route_ID'];
    $StartTime = $_POST['StartTime'];
    $date = $_POST['date'];
 

         if(isset($Route_ID) && isset($StartTime) && isset($date)){
            if($Route_ID && $StartTime && $date){
                $routeid = mysql_num_rows(mysql_query("SELECT * FROM routes WHERE id='".$Route_ID."'"));
                if($routeid != 0) {
                    mysql_query("INSERT INTO courses (`Route_ID`, `StartTime`, `Date`) VALUES ('".$Route_ID."','".$StartTime."','".$date."')") or die(mysql_error());
                

                    if(mysql_num_rows(mysql_query("SELECT * FROM courses WHERE Route_ID='".$Route_ID."' AND StartTime='".$StartTime."' AND Date='".$date."'")) != 0) {
                    echo "Dodano Kurs, prosze odswiezyc strone";
                    } else  echo "Wystąpił błąd, spróbuj ponownie";
                } else  echo "Nie ma podanej trasy";
        } else echo "Podaj wszystkie dane";
    } else echo "Podaj wszystkie dane";
}       
} ?>
    </div>
  </div>

