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
        <li><a href="?a=admin_news">News</a></li>
        <li><a href="?a=admin_comments">Komentarze</a></li>
        <li class="active"><a href="?a=admin_contact">Kontakt</a></li>
        <li><a href="?a=logout">Wyloguj</a></li>
      </ul>
    </div>
    <div class="col-md-10 content">
          <div class="row">
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">Wiadomosci</h3>
                <div class="pull-right">
                    <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filtr</button>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr class="filters">
                        <th><input type="text" class="form-control" placeholder="#" disabled></th>                        
                        <th><input type="text" class="form-control" placeholder="Imię" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Nazwisko" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Email" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Firma" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Kraj" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Telefon" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Tresc" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Usun" disabled></th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $res=mysql_query("SELECT * FROM contact");
                        while($row=mysql_fetch_array($res)){
                ?>
                    <tr>
                        <td><?php echo $row['Id'] ?></td>
                        <td><?php echo $row['Name'] ?></td>
                        <td><?php echo $row['Surname'] ?></td>
                        <td><?php echo $row['Email'] ?></td>
                        <td><?php echo $row['Firm'] ?></td>
                        <td><?php echo $row['Country'] ?></td>
                        <td><?php echo $row['PhoneNumber'] ?></td>
                        <td><?php echo $row['Content'] ?></td>
                        <td><?php echo "<a href=\"delete_contact.php?id=".$row['Id']."\">Usun</a>"; ?></td>
                    </tr>
                    <?php } } ?>
            </table>
        </div>
    </div>
    </div>
  </div>

