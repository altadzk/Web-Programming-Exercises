<?php
function buatBintangLagi($n){
  	echo "<pre>";
 	for($i=0; $i<$n; $i++){
 		for($j=$n; $i<$j; $j--){
  			echo "* ";
 		}
  		echo "\n";
 	}
  	echo "</pre>";
}

buatBintangLagi(4);
buatBintangLagi(5);
?> 