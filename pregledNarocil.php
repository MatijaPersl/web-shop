<?php

require 'header.php';
error_reporting(0);

if($_SESSION['uid'] == 'admin') {
  $sql = "SELECT * FROM narocila ORDER BY idNarocilo ASC";
  $result = mysqli_query($conn, $sql);

  echo "<br>";

  if(isset($_GET["order"])){
    if($_GET["order"] == "delete"){
      echo '<p class = "signuperror"><b>NAROČILO JE BILO IZBRISANO!</b></p>';
      echo "<br>";
    }
  }
  if (mysqli_num_rows($result) > 0) { ?>

  <h1>Prejeta Naročila</h1>
  <br><br>
    <table class = "wrapper-main">
      <td><b>JED</b></td><td><b>CENA</b></td><td><b>NAROČNIK</b></td>
      <tr></tr><tr></tr>
      <?php while ($row = mysqli_fetch_assoc($result)) {?>
        <tr></tr>
        <tr>
          <td><?php echo $row["nameNarocilo"] ?></td><td><?php echo $row["priceNarocilo"]?></td><td><?php echo $row["nameNarocnik"]?></td>
          <td><a href = 'Includes/delete.inc.php?idTaco=<?php echo $row["idNarocilo"]?>'>Zavrni</a></td>

        <?php }
      } else {
          echo '<p class = "signuperror"><b>NI NAROČIL!<b></p>';
        }; ?>
    </table>
<?php } else { ?>
   <p class = "signuperror"><b>DOSTOP ZAVRNJEN!<b></p>
   <p class = "signuperror"><b>Prijavite se kot admin<b></p>
<?php  }

require 'footer.php';
?>
