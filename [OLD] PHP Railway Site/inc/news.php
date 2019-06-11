   
<h2 style="color:#2365a3;" class="news">Aktualności</h2>
<?php 
 $res=mysql_query("SELECT * FROM news");
    while($row=mysql_fetch_array($res)){

?>
  <div class="container">          
    <div class="row main">
      <div class="col-md-10 news-news">
    </div>
      <div class="col-md-11 blogShort">
        <h1><?php echo $row['title'] ?></h1>
        <img src="img/news-icon.png" alt="post img" class="pull-left img-responsive thumb margin10 img-thumbnail">
        <article><p>
        <?php echo $row['Header'] ?>
        </p></article>
        <?php echo $row['Date'] ?>
        <div class="btn btn-default pull-right marginBottom10"">
        <?php echo "<a href=\"read_news.php?id=".$row['Id']."\">Czytaj Wiecej</a>"; ?>
        </div>
     </div>   
    </div>
  </div>
<?php } ?>