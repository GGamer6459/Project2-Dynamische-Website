<!doctype html>
<html lang="nl">

<head>
    <link rel="stylesheet" type="text/css" href="opmaak.css" />
    <meta name="author" content="Matin Arja" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>gar-type-met-eigenaar2.php</title>
</head>

<body>
    <h1>Type Auto met Eigenaar</h1>
    <p>Dit document wordt gebruikt om klant gegevens van een bepaalde type auto te zien.</p>
<?php
error_reporting(0);
require_once "gar-connect.php";

$autotype = $_POST["autotypevak"];
 
$autos = $conn->prepare("SELECT k.klantnaam, a.autokenteken, a.automerk, a.autotype, k.klantid, a.autokmstand FROM klant k 
                         INNER JOIN auto a ON k.klantid = a.klantid WHERE a.autotype = :autotype");

$autos->execute(["autotype"=>$autotype]);

echo "<table>";
echo "<tr>";
echo "<td>" . "ID" . "</td>";
echo "<td>" . "Naam" . "</td>";
echo "<td>" . "Kenteken" . "</td>" . "<br/>";
echo "<td>" . "Type" . "</td>" ;
echo "<td>" . "Merk" . "</td>";
echo "<td>" . "Kilometerstand" . "</td>";
echo "</tr>";

foreach($autos as $auto) {
    echo "<tr>";
    echo "<td>" . $auto["klantid"] . "</td>";
    echo "<td>" . $auto["klantnaam"] . "</td>";
    echo "<td>" . $auto["autokenteken"] . "</td>";
    echo "<td>" . $auto["autotype"] . "</td>";
    echo "<td>" . $auto["automerk"] . "</td>";
    echo "<td>" . $auto["autokmstand"] . "</td>";
    echo "<tr>";
}
echo "</table>";

echo "<br/><a href='gar-menu.php'>[Terug naar het menu]</a>";
?>
</body>

</html>