<?php 
echo "<h1> REFRESH PAGE </h1>" ; 

$file = 'count.txt' ; 

// Create file if not exists
if(!file_exists($file)){
    file_put_contents($file, "0");
}

$c = (int)file_get_contents($file) ; 
$c = $c + 1;
file_put_contents($file, $c); 

echo "The number of users visited : ".$c ; 
?>
