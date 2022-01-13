<?php
$mysql = mysqli_connect("localhost","root","","doccar");
// Verificarea conexiunii
 if($mysql === false){
    die("ERROR: Conexiunea nu a putut fi realizata." . mysqli_connect_error());
}
// Pregatirea unei instructiuni de inserare
$sql = "INSERT INTO service(nume, prenume, vin, descriere) VALUES (?,?,?,?)";
if($stmt = mysqli_prepare($mysql, $sql)){
    //Legarea variabilele la instrucțiunile pregătite ca parametri
    mysqli_stmt_bind_param($stmt, "ssss", $nume, $prenume, $vin, $descriere);
    // Setarea parametrilor
    $nume = $_POST['nume'];
    $prenume = $_POST['prenume'];
    $vin = $_POST['vin'];
    $descriere = $_POST['descriere'];
    // Executatea instructiunii pregatite mai sus
    if(mysqli_stmt_execute($stmt)){
        echo "Datele au fost salvate.";
    } else{
        echo "ERROR: Nu a putut fi executat: $sql. " . mysqli_error($mysql);
    }
} else{
    echo "ERROR: Nu a putut fi pregatit: $sql. " . mysqli_error($mysql);
}
// Inchiderea declaratiei
mysqli_stmt_close($stmt);
// Inchiderea conexiunii
mysqli_close($mysql); ?>
