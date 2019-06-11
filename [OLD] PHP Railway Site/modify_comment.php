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
              <label for="User_ID">ID uzytkownika</label>
                <div class="input-group">
                  <input type="text" class="form-control" name="User_ID" id="User_ID"  placeholder="Wpisz ID uzytkownika"/>
              </div>
            </div>

            <div class="form-group">
              <label for="News_ID">ID artykulu</label>
                <div class="input-group">
                  <input type="text" class="form-control" name="News_ID" id="News_ID"  placeholder="Wpisz ID artykulu"/>
                </div>
            </div>

            <div class="form-group">
              <label for="date">Data</label>
                <div class="input-group">
                  <input type="text" class="form-control" name="date" id="date"  placeholder="yyyy/mm/dd"/>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="content">Tresc</label>
                <div class="input-group">
                  <input type="text" class="form-control" name="content" id="content"  placeholder="Wpisz tresc"/>
              </div>
            </div>


            <div class="form-group"> 
              <input type="submit" id="button" value="Edytuj komentarz"/>
            </div>         
    </form>
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
                            mysql_query("UPDATE comments SET User_ID='".$User_ID."', News_ID='".$News_ID."', date='".$date."', content='".$content."' WHERE Id='".$id."'") or die(mysql_error());
                    

                        if(mysql_num_rows(mysql_query("SELECT * FROM comments WHERE User_ID='".$User_ID."' AND Content='".$content."'")) != 0) {
                        echo "Edytowano komentarz, wróc do strony glownej";
                        } else  echo "Wystąpił błąd, spróbuj ponownie";
                    } else  echo "brak podanego artykulu";
            } else echo "brak podanego uzytkownika";
        } else echo "Podaj wszystkie dane";
    } else echo "Podaj wszystkie dane";
}       
} ?>

</br>
<a href=index.php>wroc na strone glowna</a>