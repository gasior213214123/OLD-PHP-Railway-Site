<div class="container">
<div class="row">
      <div class="col-md-2"> </div>
      <div class="col-md-8">
        <h1>Skontaktuj się z nami</h1>
        <p class="lead">Masz jakieś pytanie lub chcesz bardziej szczegółowych informacji?</p>
        
        <p>Wypełnij formularz i postaramy sie Ci odpowiedzieć jak szybko to możliwe</p> <br> 
         
        <!-- BEGIN DOWNLOAD PANEL -->
        <div class="panel">
          <div class="panel-body">
            <form action="?a=contact" class="form-horizontal track-event-form bv-form" data-goaltype="”General”" data-formname="”ContactUs”" method="post" id="contact-us-all" novalidate="novalidate">
              <input name="elqSiteId" type="hidden" value="928">
              <input name="sFDCLastCampaignID" type="hidden" value="701400000012Lql">
              <input name="elqFormName" type="hidden" value="EMEAAllContactUsSubmissions">
              <input name="nexturl" type="hidden" value="">
              <input name="Partner" type="hidden" value="">
              <input name="language" type="hidden" value="en">

              <div class="form-group">               
                <div class="col-sm-6">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="glyphicon glyphicon-user"></i>
                            </div>
                    <input type="text" class="form-control" id="exampleInputFirstName" placeholder="Twoje imie" name="C_FirstName" data-bv-field="C_FirstName">
                        </div>
                    <small data-bv-validator="notEmpty" data-bv-validator-for="C_FirstName" class="help-block" style="display: none;">Required</small></div>                
                <div class="col-sm-6">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="glyphicon glyphicon-user"></i>
                            </div>
                    <input type="text" class="form-control" id="exampleInputLastName" placeholder="Twoje nazwisko" name="C_LastName" data-bv-field="C_LastName"></div>
                        <small data-bv-validator="notEmpty" data-bv-validator-for="C_LastName" class="help-block" style="display: none;">Required</small></div>
                        </div>

              <div class="form-group">               
                          <div class="col-sm-6">
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="glyphicon glyphicon-envelope"></i>
                            </div>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Twój Email" name="C_EmailAddress" data-bv-field="C_EmailAddress">
                        </div>
                    <small data-bv-validator="notEmpty" data-bv-validator-for="C_EmailAddress" class="help-block" style="display: none;">Required</small></div>                
                          <div class="col-sm-6">
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="glyphicon glyphicon-briefcase"></i>
                            </div>
                            <input type="text" class="form-control" id="exampleInputCompany" placeholder="Twoja Firma" name="C_Company">
                  </div>
                        </div>
              </div>
                      
                       <div class="form-group">
                        <div class="col-sm-6">
                          <div class="input-group">
                              <div class="input-group-addon">
                      <i class="glyphicon glyphicon-globe"></i>          
                              </div>                        
                        
                    <input type="text" placeholder="Państwo" class="C_Country_Modal form-control" id="C_Country" name="C_Country" data-bv-field="C_Country">
                  </div>
                      <small data-bv-validator="callback" data-bv-validator-for="C_Country" class="help-block" style="display: none;">Choose one</small></div>
      
                        <div class="col-sm-6">
                          <div class="input-group" style="display: none;">
                    <div class="input-group-addon">
                      <i class="glyphicon glyphicon-planet"></i>          
                              </div> 
                          </div>
                        </div>
                      </div>                 
              
              <div class="form-group">
                <div class="col-sm-12">
                  <div class="input-group">
                              <div class="input-group-addon">
                      <i class="glyphicon glyphicon-phone"></i>                      
                    </div>
                    <input type="text" class="form-control" id="C_BusPhone" placeholder="Telefon" name="C_BusPhone">
                  </div>                                    
                </div>
                      </div>
                
                      <div class="form-group">
                        <div class="col-sm-12">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="glyphicon glyphicon-comment fa-2"></i>                
                    </div>                  
                    <textarea class="form-control" name="Comments" id="Comments" rows="5" style="width:99.9%" placeholder="Tutaj wpisz swoją wiadomość"></textarea>
                  </div>                                    
                </div>
                      </div>
                      
                      <div class="form-group">
                        <div class="col-sm-12">
                  <button id="contacts-submit" type="submit" class="btn btn-primary pull-right" style="background: darkblue;">SKONTAKTUJ SIĘ</button>
                        </div>
                      </div>
            <input type="hidden" value=""></form>
          </div>
        </div>
      </div>
        </div>
</div>


<div align="center">
<?php 
  if($_POST){
  $FirstName = $_POST['C_FirstName'];
  $LastName = $_POST['C_LastName'];
  $EmailAddress = $_POST['C_EmailAddress'];
  $Company = $_POST['C_Company'];
  $Country = $_POST['C_Country'];
  $BusPhone = $_POST['C_BusPhone'];
  $Comments = $_POST['Comments'];


    if(isset($FirstName) && isset($LastName) && isset($EmailAddress) && isset($Company) && isset($Country) && isset($BusPhone) && isset($Comments)){
      if($FirstName && $LastName && $EmailAddress && $Company && $Country && $BusPhone && $Comments){
            mysql_query("INSERT INTO Contact (`Name`, `Surname`, `Email`, `Firm`, `Country`, `PhoneNumber`, `Content`) VALUES ('".$FirstName."','".$LastName."','".$EmailAddress."','".$Company."','".$Country."','".$BusPhone."','".$Comments."')") or die(mysql_error());
          

            if(mysql_num_rows(mysql_query("SELECT * FROM contact WHERE email='".$EmailAddress."' AND surname='".$LastName."'")) != 0) {
            echo "Twoja wiadomosc zostala wyslana";
            } else  echo "Wystąpił błąd, spróbuj ponownie";
      } else echo "Podaj wszystkie dane";
    } else echo "Podaj wszystkie dane";
  }   
?>
</div>
