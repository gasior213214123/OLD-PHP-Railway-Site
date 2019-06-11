    <script type="text/javascript" src="js/search.js"></script>
    <div class="container">
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
                        <th><input type="text" class="form-control" placeholder="Nazwa Trasy" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Godzina" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Data" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Przystanki" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Czas przejazdu" disabled></th>                        
                    </tr>
                </thead>
                <tbody>
                    <?php 
                         $res=mysql_query("SELECT c.Id, r.Route_Name, c.StartTime, c.Date, r.Stops, r.Time_Needed FROM courses c, routes r WHERE r.ID=c.Route_ID");
                            while($row=mysql_fetch_array($res)){

                    ?>
                    <tr>
                        <td><?php echo $row['Id'] ?></td>
                        <td><?php echo $row['Route_Name'] ?></td>
                        <td><?php echo $row['StartTime'] ?></td>
                        <td><?php echo $row['Date'] ?></td>
                        <td><?php echo $row['Stops'] ?></td>
                        <td><?php echo $row['Time_Needed'] ?></td>                        
                    </tr>
                    <?php }  ?>                    
                </tbody>
            </table>
        </div>
    </div>
</div>
