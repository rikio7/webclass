<?php
  
  echo "yayyy"."<br><br>";

  $a = 7;
  $z = 9;
  $k = 3.9;
  $d = true;

  $arr=[1,4,5,"asdf",7];

   for ($i=0; $i < count($arr) ; $i++) { 
   	echo $arr[$i]."<br><br>";
   }
   if ($d) {
   	  echo "inside true";
   }
   else
   {
   	echo "inside false";
   }

?>