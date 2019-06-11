<?php
include("config.php");
$id = $_GET['id'];
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

   
    <form class="" method="post" action="">      
            <div class="form-group">
              <label for="User_ID">Data</label>
                <div class="input-group">
                  <input type="text" class="form-control" name="date" id="date"  placeholder="yyyy/mm/dd"/>
              </div>
            </div>
            <div class="form-group">
              <label for="User_ID">Tytul</label>
                <div class="input-group">
                  <input type="text" class="form-control" name="title" id="title"  placeholder="Tytul"/>
              </div>
            </div>

            <div class="form-group">
              <label for="News_ID">Zawartosc</label>
                <div class="input-group">
                  <input type="text" class="form-control" name="content" id="content"  placeholder="Wpisz nowa tresc artykulu"/>
                </div>
            </div>

            <div class="form-group">
              <label for="date">Naglowek</label>
                <div class="input-group">
                  <input type="text" class="form-control" name="header" id="header"  placeholder="Wpisz nowy naglowek artykulu"/>
                </div>
              </div>


            <div class="form-group"> 
              <input type="submit" id="button" value="Edytuj artykul"/>
            </div>         
    </form>
<?php
    if($_POST){
    $date = $_POST['date'];
    $content = $_POST['content'];
    $header = $_POST['header'];
    $title = $_POST['title'];

        if(isset($header) && isset($date) && isset($content) && isset($title)){
            if($date && $content && $header && $title){
              mysql_query("UPDATE news SET date='".$date."', content='".$content."', header='".$header."', title='".$title."' WHERE Id='".$id."'") or die(mysql_error());
                    
              if(mysql_num_rows(mysql_query("SELECT * FROM news WHERE header='".$header."' AND Content='".$content."' AND title='".$title."'")) != 0) {
                echo "Edytowano artykul, wróc do strony glownej";
              } else  echo "Wystąpił błąd, spróbuj ponownie";
        } else echo "Podaj wszystkie dane";
    } else echo "Podaj wszystkie dane";
}       
} ?>

</br>
<a href=index.php>wroc na strone glowna</a>