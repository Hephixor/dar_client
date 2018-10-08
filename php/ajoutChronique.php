 <?php
require_once("header_html.php");
require_once("sidebar1.html");
?>



 <div class="content">
<center> <h1>Ajouter une chronique</h1> </center>
   <div class="container">
    <br/><br/>

     <form enctype="multipart/form-data" action="retChronique.php" method="post">
    <br/><label for="Nom Album" tabindex="1" >Nom album</label>
   <?php
 include ("./php/connection.php");
        
        $req2 = "select idAlbum,titreAlbum from albums";
$ret = mysqli_query($cnx, $req2);
     if ($ret) {

     echo "<select name=\"nomAlbum\">";
     while ( $options = mysqli_fetch_row ($ret) )
         { 

        echo "<option value=".$options[0]." selected=\"selected\">"; 
         echo $options[1];
         echo "</option>";
     }
 echo "</select>";
} else {
    echo "Error: " . $req2 . "<br>" . mysqli_error($cnx);
}
?>
<br/>
    
  <label for="date" tabindex="2" > Date de sortie : </label>
    <?php
     require('calendar/tc_calendar.php');
      // Call the calendar constructor - use the desired form and format, according to the instructions/samples provided on triconsole.com
      $myCalendar = new tc_calendar("date1", true);
      $myCalendar->setIcon("calendar/images/iconCalendar.gif");
      $myCalendar->setDate(date('d'), date('m'), date('Y'));
      $myCalendar->setPath("calendar/");
      $myCalendar->zindex = 150; //default 1
      $myCalendar->setYearInterval(1960, date('Y'));
      $myCalendar->dateAllow('1960-03-01', date('Y-m-d'));
      //$myCalendar->autoSubmit(true, "calendar");
      $myCalendar->disabledDay("sat");
      $myCalendar->disabledDay("sun");
      $myCalendar->setAlignment('right', 'bottom'); //optional
      $myCalendar->writeScript();
      ?>
<br/>



    
 <label for="Artiste" tabindex="3" > Artiste : </label>
  <?php
 include ("./php/connection.php");
        
        $req2 = "select idArtiste,nomArtiste from artistes";
$ret = mysqli_query($cnx, $req2);
     if ($ret) {

     echo "<select name=\"artiste\">";
     while ( $options = mysqli_fetch_row ($ret) )
         { 

        echo "<option value=".$options[0]." selected=\"selected\">"; 
         echo $options[1];
         echo "</option>";
     }
 echo "</select>";
} else {
    echo "Error: " . $req2 . "<br>" . mysqli_error($cnx);
}
?>
<br/>
    
  <label for="Label" tabindex="4" >Label :</label>  
   <?php
 include ("./php/connection.php");
        
        $req2 = "select idLabel,nomLabel from labels";
$ret = mysqli_query($cnx, $req2);
     if ($ret) {

     echo "<select name=\"label\">";
     while ( $options = mysqli_fetch_row ($ret) )
         { 

        echo "<option value=".$options[0]." selected=\"selected\">"; 
         echo $options[1];
         echo "</option>";
     }
 echo "</select>";
} else {
    echo "Error: " . $req2 . "<br>" . mysqli_error($cnx);
}
?>
<br/>
    
  <label for="Chronique" tabindex="5" > Chronique : </label>  
    <input type="textearea"  name="chronique" value="" required="required" placeholder="Chronique" maxlength="200" >  <br/>
  
<input name="submit" type="submit" value="ajouter" /> 
<input name="reset" type="reset"  value="annuler"  />
</form>
<br/>
<input type="button" name="lien1" value="Retour" onclick="self.location.href='ajout.php'"/>
<br/><br/>
<center>
<img src=".\images\logo.jpg" alt="header_logo" width="50%" height="90" id="header_logo" style="background-color: #8090AB; display:block;" />
</center>
</div>



    <!-- end .content --></div>

<?php 
require_once("sidebar2.php");
require_once("footer.html");
?>




  <!-- end .container --></div>


</body>
</html>
