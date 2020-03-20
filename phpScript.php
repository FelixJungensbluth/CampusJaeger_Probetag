<?php
error_reporting(1);
$pdo = new PDO('mysql:host=localhost;dbname=eagle', 'root', '1234');
$url = $_POST["url"];
$html = file_get_contents($url);
libxml_use_internal_errors(true);
$doc = new DOMDocument; $doc->loadHTML($html);
$xpath = new DOMXpath($doc);
$node = $xpath->query('//div[@class="artikelPreis"]');
$info = $xpath->query('//div[@class="artikelBeschreibung"]');
$name = $xpath->query('//div[@class="artikel"]');

$sql = "SELECT count(*) FROM camera";
$result = $pdo->prepare($sql); 
$result->execute(); 
$number_of_rows = $result->fetchColumn(); 

if($number_of_rows==0){
    echo "Please submit an URL <br>" ;
}else{
    echo "Submit an URL to update the Information <br>";
}


for ($i=0;$i<1;$i++) {
    $test = $node->item($i)->nodeValue;
    $infoStr = $info->item($i)->nodeValue;
    $nameStr = $name->item($i)->nodeValue;

    $statement = $pdo->prepare("INSERT INTO camera (model,price,info) VALUES (?,?,?)");
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $statement->execute(array($test,$infoStr ,$nameStr));
        echo "Saved ";
    }
}

?>