<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/css.css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <title>Oferte</title>
  </head>
  <body>
    <div class="mainbar">
      <a href="Despre_noi.html"  style="text-decoration: none; padding-right: 5%; font-size: 100%; color:yellow;"><i class='fas fa-ambulance' style="color:blue; padding-right: 10px;"></i>DOCCAR</a>
      <a href="index.php" class="link selected">Oferte</a>
      <a href="Despre_noi.html" class="link">Despre noi</a>
      <a href="Service.html" class="link">Service auto</a>
      <!-- <a href="Vinde_masina.html" class="link">Vinde masina</a> -->
      <a href="Contact.html" class="link">Contact</a>
    </div>
  </body>
</html>
<?php
$pdo = new PDO("mysql:host=localhost;dbname=id18276962_parcautodatabase", "id18276962_padb", "5MJhR&|rUFinLFO+");
$i = 1;
$stmt = $pdo->query('SELECT * FROM masini');
echo "<div class='wholeindex'>";
foreach ($stmt as $row){
  $stmt2 = $pdo->query('SELECT poza FROM poze WHERE ID='.$i);
    echo "<div class='slideshow-container'>";
    foreach ($stmt2 as $row2) {
        echo  "
          <div class='mySlides".$i."'>
            <img src='poze/".$row2["poza"].".jpg' style='height:168px; width:100% ;margin-top:5px; border: 2px solid black; border-radius: 5%' ;>
          </div>
          ";
          }
      echo "
    <a class='prev' onclick='plusSlides(-1, ".($i-1).")'>&#10094;</a>
  <a class='next' onclick='plusSlides(1, ".($i-1).")'>&#10095;</a>
  </div>
    ";
    echo "
    <div class='details'>
    <h1>".$row["Marca"]." ".$row["Model"]." ".$row["An_fabricatie"]."<br>".$row["Pret"]."\xE2\x82\xAc</h1><br>
    <table>
      <tr>
          <th>Combustibil</th>
          <th>Putere</th>
          <th>Cutie viteze</th>
          <th>Transmisie</th>
          <th>Detalii</th>
      <tr class='tabeldate'>
          <td>".$row["Combustibil"]."</th>
          <td>".$row["Putere"]."</th>
          <td>".$row["Cutie_viteze"]."</th>
          <td>".$row["Transmisie"]."</th>
          <td>".$row["Detalii"]."</th>
  </table>
  </div>
    ";
      echo "<br>";
    $i++;
    }
    echo "</div>";
 ?>
 <script>
     var slideIndex = [];
     var slideId = [];
     for (i = 0; i < <?php echo $i-1 ?>; i++) {
       slideIndex[i] = 1;
       slideId[i] = 'mySlides'+(i+1);
       showSlides(1,i);
     }
  function plusSlides(n, no) {
    showSlides(slideIndex[no] += n, no);
  }

  function showSlides(n, no) {
    var x = document.getElementsByClassName(slideId[no]);
    if (n > x.length) {slideIndex[no] = 1}
    if (n < 1) {slideIndex[no] = x.length}
    for (var i = 0; i < x.length; i++) {
      x[i].style.display = "none";
    }
    x[slideIndex[no]-1].style.display = "block";
  }
</script>
