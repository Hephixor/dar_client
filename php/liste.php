<html>
   <head>
      <title>Stock d'images</title>
   </head>
   <body>
      <?php
         include ("connection.php");
         $req = "SELECT nomImage, idImage " .
                "FROM images ORDER BY nomImage";
         $ret = mysqli_query ($cnx,$req) or die (mysql_error ());
         while ( $col = mysqli_fetch_row ($ret) )
         {
             echo "<a href=\"apercu.php?id=" . $col[1] . "\">" . $col[0] . "</a><br />";
         }
      ?>
   </body>
</html>
