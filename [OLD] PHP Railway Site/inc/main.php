

    <div class="container">
      <div class="row main">
        <div class="connection-search main-center col-md-4">
        <h5>Wyszukaj Połączenie</h5>
          <form class="form-group" method="post" action="?a=search">
            <div class="form-group">
              <label for="city_from" class="cols-sm-2 control-label">Z:</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i></span>
                  <input type="text" placeholder="Z miasta" class="form-control" id="city_from" name="city_from">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="city_to" class="cols-sm-2 control-label">Do:</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i></span>
                  <input type="text" placeholder="Do miasta" class="form-control" id="city_to" name="city_to">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="passager_count" class="cols-sm-2 control-label">Godzina:</label>
                <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-time" aria-hidden="true"></i></span>
                  <input type="number" placeholder="O godzinie" class="form-control" id="hour" name="hour">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="date" class="cols-sm-2 control-label">Data:</label>
              <div class="cols-sm-10">
                <div class="input-group date" id="datepicker">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar" aria-hidden="true"></i></span>
                  <input type="text"  class="form-control" name="date" id="date" name="date" placeholder="yyyy/mm/dd">
                </div>
              </div>
            </div>

            <div class="form-group">
              <button type="reset" class="btn-custom pull-left" aria-hidden="true"><span class="glyphicon glyphicon-repeat"></span></button>
              <button type="submit" class="btn-custom pull-right" aria-hidden="true"><i class="glyphicon glyphicon-ok"></i></button><br>
            </div>
          </form>
        </div>
<!-- end of connection search -->
<!-- news -->
    <div class="col-sm-offset-4 news-news">
      <h2 class="news">Najnowsze zmiany</h2>
    </div>
    <?php 
      $res=mysql_query("SELECT * FROM news LIMIT 2");
        while($row=mysql_fetch_array($res)){

      ?>
      <div class="col-sm-8 blogShort">
         <h1><?php echo $row['title'] ?></h1>
         <img src="img/news-icon.png" alt="post img" class="pull-left img-responsive thumb margin10 img-thumbnail">
         <article><p>
          <?php echo $row['Header'] ?>
          </p></article>
         <a class="btn btn-blog pull-right marginBottom10" style="background:darkblue;" href="?a=news">Czytaj więcej</a> 
     </div>
     <?php } ?>
      <div class="col-sm-offset-7 top-buffer">
               <a class="btn btn-blog pull right maginBottom10" style="background:darkblue" href="?a=news">Więcej nowości</a>
      </div>
     </div>
<!-- news-->

<!--boxes-->

      <div class="col-sm-4 top-buffer">
      <div class="box ">             
        <div class="icon">
          <div class="image"><i class="glyphicon glyphicon-thumbs-up"></i></div>
          <div class="info">
            <h3 class="title">Poznaj nas!</h3>
            <p>
              Jesteśmy z wami już 85 lat! Poznaj ją i dowiedz się, jak wyglądała nasza droga do sukcesu!
            </p>
            <div class="more">
              <a href="?a=about" title="Title Link">
                Czytaj więcej <i class="glyphicon glyphicon-share-alt"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="space"></div>
      </div> 
    </div>
      
        <div class="col-sm-4 top-buffer">
      <div class="box">             
        <div class="icon">
          <div class="image"><i class="glyphicon glyphicon-flag"></i></div>
          <div class="info">
            <h3 class="title">Skontaktuj się!</h3>
              <p>
              Staramy się dostarczyć najwyższej jakości uslugi dla naszych klientow.
            </p>
            <div class="more">
              <a href="?a=contact" title="Title Link">
                Czytaj więcej <i class="glyphicon glyphicon-share-alt"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="space"></div>
      </div> 
    </div>
      
      <div class="col-sm-4 top-buffer">
      <div class="box">             
        <div class="icon">
          <div class="image"><i class="glyphicon glyphicon-globe"></i></div>
          <div class="info">
            <h3 class="title">Nasze przystanki!</h3>
              <p>
              Posiadamy przystanki we wszystkich większych miastach w Polsce!
            </p>
            <div class="more">
             <a href="?a=stops" title="Title Link">
                Czytaj więcej <i class="glyphicon glyphicon-share-alt"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="space"></div>
      </div> 
</div>
