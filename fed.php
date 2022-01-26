<html>
<body>

<?php

function specificstat($statname){
    echo "<table cellpadding=30 border=1>";
    echo "<CAPTION>".$statname."</CAPTION>";
       for($i=1;$i<=10;$i++){ 
      echo "<tr>";
       echo "<td>".$i."</td>";
      echo '<td>test</td>';
      echo "</tr>";
}
 }

 ?>

<div style="position: absolute; top: 20%; left:20%;">

 <?php
 specificstat("Points");
   ?>
</div>

      <div style="position: absolute; top: 20%; left:40%;">


 <?php
 specificstat("Goals");
 ?>

</div>

 </body>
</html>