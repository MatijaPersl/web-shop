<?php
  require 'header.php';
  error_reporting(0);
?>

<main>
<?php
  /* if (isset($_POST['submit']){
    header ("Location: narocilo.php");
    exit();
  }
*/
  if(isset($_GET["order"])){
    if($_GET["order"] == "success"){
      echo '<p class = "signupsuccess"><b>NAROČILO DODANO V KOŠARICO! :)</b></p>';
      echo "<br>";
    }
    else {
      echo '<p class = "signuperror"><b>NAROČILO NI BILO SPREJETO! :(</b></p>';
      echo "<br>";
    }
  }

  if (isset($_SESSION['uid'])) {

    echo '<h1>Naroci svoj taco!</h1>';
    echo "<br><br>";

    $sql = "SELECT * FROM taco ORDER BY idTaco ASC";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      echo "<form action = '' method = 'POST' class = 'wrapper-main'>";
      echo '<table>';
      echo "<td><b>ID</b></td><td><b>NAME</b></td><td><b>PRICE</b></td><td><b>DESCRIPTION</b></td>";
      echo "<tr></tr><tr></tr>";
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr></tr>";
        echo "<tr>";
        echo "<td>".$row["idTaco"]."</td><td>".$row["nameTaco"]."</td><td>".$row["priceTaco"]."</td><td>".$row["descTaco"]."</td>";
        ?><td><a href = 'Includes/dodajVKosarico.inc.php?idTaco=<?php echo $row["idTaco"]?>'>Izberi</a></td>
        </tr>
<?php
      }

      echo "</table>";
      echo "<button type = 'submit'>Potrdi</button>";
      echo "</form>";
    }

    else {
      echo "Trenutno smo zaprti :(";
    }

  }
  else {
    echo '<p class="login-status">Please Login</p>';
  }
?>

</main>

<?php
  require 'footer.php';
?>
