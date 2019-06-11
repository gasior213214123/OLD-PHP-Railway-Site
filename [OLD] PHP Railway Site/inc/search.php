      <script type="text/javascript" src="js/search.js"></script>
<div class="container">
       <div class="row">
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">Rozkład</h3>
                <div class="pull-right">
                    <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filtr</button>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr class="filters">  
                        <th><input type="text" class="form-control" placeholder="Trasa" disabled></th>                                          
                        <th><input type="text" class="form-control" placeholder="Z miasta" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Do miasta" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Czas" disabled></th>                    
                        <th><input type="text" class="form-control" placeholder="Godzina wyjazdu" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Data" disabled></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    if($_POST){
                        $hour = $_POST['hour'];
                        $city_from = $_POST['city_from'];
                        $city_to = $_POST['city_to'];
                        $date = $_POST['date'];

                        if(isset($hour) && isset($city_from) && isset($city_to) && isset($date)) {
                            if($hour && $city_from && $city_to && $date) {
                                $res=mysql_query("SELECT r.City_From, r.City_To, r.Time_Needed, r.Route_Name, c.StartTime, c.Date  FROM routes r, courses c WHERE
                                    r.Id = c.Route_ID
                                    AND c.Date = '".$date."'
                                    AND c.StartTime > '".$hour."'
                                    AND r.City_From = '".$city_from."'
                                    AND r.City_To = '".$city_to."'");
                                while($row=mysql_fetch_array($res)){
                ?>
                    <tr>
                        <td><?php echo $row['Route_Name'] ?></td>                    
                        <td><?php echo $row['City_From'] ?></td>
                        <td><?php echo $row['City_To'] ?></td>
                        <td><?php echo $row['Time_Needed'] ?></td>
                        <td><?php echo $row['StartTime'] ?></td>
                        <td><?php echo $row['Date'] ?></td>
                    </tr>     
                 <?php 
                                }
                            }
                        }
                    }
                ?>    
                  </tbody>
            </table>
        </div>
    </div>
</div>



