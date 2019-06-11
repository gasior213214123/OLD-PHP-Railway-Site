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
        <li><a href="?a=admin_users">Uzytkownicy</a></li>
        <li class="active"><a href="?a=admin_news">News</a></li>
        <li><a href="?a=admin_comments">Komentarze</a></li>
        <li><a href="?a=admin_contact">Kontakt</a></li>
        <li><a href="?a=logout">Wyloguj</a></li>
      </ul>
    </div>
    <div class="col-md-10 content">
          <div class="row">
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">Aktualnosci</h3>
                <div class="pull-right">
                    <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filtr</button>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr class="filters">
                        <th><input type="text" class="form-control" placeholder="#" disabled></th>                        
                        <th><input type="text" class="form-control" placeholder="Data" disabled></th>                        
                        <th><input type="text" class="form-control" placeholder="Tytul" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Naglowek" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Tresc" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Modyfikuj" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Usun" disabled></th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $res=mysql_query("SELECT * FROM news");
                        while($row=mysql_fetch_array($res)){
                ?>
                    <tr>
                        <td><?php echo $row['Id'] ?></td>
                        <td><?php echo $row['Date'] ?></td>
                        <td><?php echo $row['title'] ?></td>
                        <td><?php echo $row['Header'] ?></td>
                        <td><?php echo $row['Content'] ?></td>
                        <td><?php echo "<a href=\"modify_news.php?id=".$row['Id']."\">Edytuj</a>"; ?></td>
                        <td><?php echo "<a href=\"delete_news.php?id=".$row['Id']."\">Usun</a>"; ?></td>
                    </tr>
                    <?php } ?>

                    <tr>
                        <form class="" method="post" action="?a=admin_news">
                        <td> #</td>
                        <td>  
                            <div class="form-group">
                                <input type="text" class="form-control" name="date" id="date" placeholder="yyyy/mm/dd">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control" name="title" id="title" placeholder="Tytul">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control" name="header" id="header" placeholder="Naglowek">
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
                            <input type="submit" id="button" class="btn-primary" aria-hidden="true" value="Dodaj aktualnosc"></button>
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
    $date = $_POST['date'];
    $content = $_POST['content'];
    $header = $_POST['header'];
    $title = $_POST['title'];

        if(isset($header) && isset($date) && isset($content) && isset($title)){
            if($header && $date && $content && $content){
                mysql_query("INSERT INTO news (`date`, `content`, `header`, `title`) VALUES ('".$date."','".$content."','".$header."','".$title."')") or die(mysql_error());
                    

                if(mysql_num_rows(mysql_query("SELECT * FROM news WHERE header='".$header."' AND Content='".$content."' AND title='".$title."'")) != 0) {
                echo "Dodano nowy artykul, odswiez strone";
                } else  echo "Wystąpił błąd, spróbuj ponownie";
        } else echo "Podaj wszystkie dane";
    } else echo "Podaj wszystkie dane";
}       
} ?>
    </div>
  </div>

