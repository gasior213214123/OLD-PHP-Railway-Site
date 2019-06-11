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
                        <th><input type="text" class="form-control" placeholder="Z miasta" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Do miasta" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Przystanki" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Czas przejazdu" disabled></th>                        
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
                    </tr>
                    <?php } ?>                    
                </tbody>
            </table>
        </div>
    </div>
</div>
