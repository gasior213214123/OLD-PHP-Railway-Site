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
        <li><a href="?a=admin_routes">Zarzadzanie trasami</a></li>
        <li><a href="?a=admin_transport">Zarzadzanie kursami</a></li>
        <li><a href="?a=admin_users">Zarzadzanie uzytkownikami</a></li>
        <li><a href="?a=admin_news">Zarzadzanie aktualnosciami</a></li>
        <li class="active"><a href="?a=admin_comments">Zarzadzanie komentarzami</a></li>
        <li><a href="?a=admin_contact">Przegladanie wiadomosci</a></li>
        <li><a href="?a=logout">Wyloguj</a></li>
      </ul>
    </div>
    <div class="col-md-10 content">
          <div class="row">
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">Komentarze</h3>
                <div class="pull-right">
                    <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filtr</button>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr class="filters">
                        <th><input type="text" class="form-control" placeholder="#" disabled></th>                        
                        <th><input type="text" class="form-control" placeholder="Id uzytkownika" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Id artykulu" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Data" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Tresc" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Modyfikuj" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Usun" disabled></th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $res=mysql_query("SELECT * FROM comments");
                        while($row=mysql_fetch_array($res)){
                ?>
                    <tr>
                        <td><?php echo $row['Id'] ?></td>
                        <td><?php echo $row['User_ID'] ?></td>
                        <td><?php echo $row['News_ID'] ?></td>
                        <td><?php echo $row['date'] ?></td>
                        <td><?php echo $row['Content'] ?></td>
                        <td><?php echo "<a href=\"modify_comment.php?id=".$row['Id']."\">Edytuj</a>"; ?></td>
                        <td><?php echo "<a href=\"delete_comment.php?id=".$row['Id']."\">Usun</a>"; ?></td>
                    </tr>
                    <?php } ?>

                    <tr>
                        <form class="" method="post" action="?a=admin_comments">
                        <td> #</td>
                        <td>  
                            <div class="form-group">
                                <input type="text" class="form-control" name="User_ID" id="User_ID" placeholder="ID uzytkownika">
                            </div>
                        </td>
                        <td>  
                            <div class="form-group">
                                <input type="text" class="form-control" name="News_ID" id="News_ID" placeholder="ID artukulu">
                            </div>
                        </td>
                        <td>  
                            <div class="form-group">
                                <input type="text" class="form-control" name="date" id="date" placeholder="yyyy/mm/dd">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control" name="content" id="content" placeholder="Tresc">
                            </div>
                        </td>
                        <td></td>
                        <td>
                            <div class="form-group">
                            <input type="submit" id="button" class="btn-primary" aria-hidden="true" value="Dodaj Komentarz"></button>
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
    $User_ID = $_POST['User_ID'];
    $News_ID = $_POST['News_ID'];
    $date = $_POST['date'];
    $content = $_POST['content'];

        if(isset($User_ID) && isset($News_ID) && isset($date) && isset($content)){
            if($User_ID && $News_ID && $date && $content){
                    $userid = mysql_num_rows(mysql_query("SELECT * FROM users WHERE id='".$User_ID."'"));
                    if($userid != 0) {
                        $newsid = mysql_num_rows(mysql_query("SELECT * FROM news WHERE id='".$News_ID."'"));
                        if($newsid != 0) {
                            mysql_query("INSERT INTO comments (`User_ID`, `News_ID`, `date`, `Content`) VALUES ('".$User_ID."','".$News_ID."','".$date."','".$content."')") or die(mysql_error());
                    

                        if(mysql_num_rows(mysql_query("SELECT * FROM comments WHERE User_ID='".$User_ID."' AND Content='".$content."'")) != 0) {
                        echo "Dodano komentarz, odswiez strone";
                        } else  echo "Wystąpił błąd, spróbuj ponownie";
                    } else  echo "brak podanego artykulu";
            } else echo "brak podanego uzytkownika";
        } else echo "Podaj wszystkie dane";
    } else echo "Podaj wszystkie dane";
}       
} ?>
    </div>
  </div>

