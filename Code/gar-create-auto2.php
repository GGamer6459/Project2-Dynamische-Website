<!doctype html>
<html lang="nl">

<head>
    <link rel="stylesheet" type="text/css" href="opmaak.css" />
    <link rel="shortcut icon" type="image/x-icon" href="https://www.telefoonboek.nl/bedrijf/logo/t3495775/rotterdam/garage-ertan/">
    <meta name="author" content="Matin Arja" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>gar-create-auto2.php</title>
</head>

<div>
<body>
    <h1>Garage Create Auto</h1>
    <p>Een auto toevoegen aan de tabel auto in de database garage.</p>
    <div class="klantauto">
<?php
error_reporting(0);
$autokenteken = $_POST["autokentekenvak"]; 
$automerk = $_POST["automerkvak"];
$autotype = $_POST["autotypevak"];
$autokmstand = $_POST["autokmstandvak"];
$klantid = $_POST["klantidvak"];

require_once "gar-connect.php";
    
$sql = $conn->prepare("INSERT INTO auto VALUES (:autokenteken, :automerk, :autotype, :autokmstand, :klantid)");

if(!empty($klantid)) {
    try {                      
        $sql->execute (["autokenteken"=>$autokenteken, "automerk"=>$automerk, "autotype"=>$autotype, "autokmstand"=>$autokmstand, "klantid"=>$klantid]);
         echo "<br/>De auto is toegevoegd.";
        }
    catch(Exception $e) {
        echo "<br/>Deze klant ID bestaat niet.";
    }
}
else {
    echo "<br/>Vul een klant ID in.";
}

echo "<br/><a href='gar-menu.php'><br/>[Terug naar het menu]</a>";
?>
</div>

</body>
</div>

</html>