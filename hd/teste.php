<?
date_default_timezone_set('America/Sao_Paulo');
$current_dayname = date("l");

//echo $date = date("Y-m-d",strtotime('today')).' To '.date("Y-m-d",strtotime("last week"));
//echo date("Y-m-d", strtotime("today"))."<br>";
//echo date("Y-m-d", strtotime("1 day ago"))."<br>";
//echo date("Y-m-d", strtotime("2 days ago"))."<br>";
//echo date("Y-m-d", strtotime("3 days ago"))."<br>";
//echo date("Y-m-d", strtotime("4 days ago"))."<br>";
//echo date("Y-m-d", strtotime("5 days ago"))."<br>";
//echo date("Y-m-d", strtotime("6 days ago"))."<br>";


$datas[0] = date("Y-m-d", strtotime("today"))."<br>";
for($i = 1; $i < 7; $i++){
    $datas[$i] = date("Y-m-d", strtotime("$i days ago"));
}

echo "<pre>";
var_dump($datas);
echo "</pre>";

?>