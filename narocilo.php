<?php

require 'header.php';
error_reporting(0);

$idTaco = $_GET['idTaco'];

$sql = "SELECT nameTaco, priceTaco, descTaco FROM taco WHERE idTaco = $idTaco";
$result = mysqli_query($conn, $sql);

echo "<div class='wrapper-main'>";
echo "<br><br>";
echo "<h1>Vaše naročilo</h1>";
echo "<br><br>";
echo '<form action = "Includes\narocilo.inc.php?idTaco='.$idTaco.'method="post">';
echo "<table>";
echo "<tr>";
echo "<td><b> NAME </b></td>&nbsp<td><b> PRICE </b></td>&nbsp<td><b> DESCRIPTION </b></td>";
echo "</tr>";

while($row = mysqli_fetch_array($result)) {

    echo "<tr>";
    echo "</tr>";
    echo "<tr>";
    echo '<td>'.$row['nameTaco']."</td><td>".$row['priceTaco']."</td><td>".$row['descTaco'].'</td>';
    echo "</tr>";
    echo "<tr>";
    echo "</tr>";
    echo "<tr>";
    echo "</tr>";
    echo "<tr>";
    echo '<td><button type="narocilo-submit" value="Submit">Potrdi</button></td><td></td><td></td>';
    echo "</tr>";
    }

echo "</table>";
echo "</form>";
echo "<br>";

?>


</div>
<?php
  require 'footer.php';
?>
