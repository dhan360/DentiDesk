<?php

function connectMysql(){
    $hostname = 'mysql:dbname=dentidesk;host=localhost';
    $usuario = 'dentiadmin';
    $contrasena = 'Nbc.stY8iMm).4KE';
    $conn = new PDO($hostname, $usuario, $contrasena);
    //$conn = mysqli_connect("localhost", "dentiadmin", "Nbc.stY8iMm).4KE", "dentidesk");
    // Check connection
    if (!$conn) {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}

function insertTransaction($type, $detail, $value, $date){
    $conn = connectMysql();
    $query = "INSERT INTO transactions (detail, value, date, type) values ('".$detail."', ".$value.", '".$date."', ".$type.");";
    $result = '';
    if ($conn->query($query) != NULL) {
        $result = 'Ingresado';
    } else {
        $result = "Error: " . $query . "<br>" . $conn->error;
    }
    $conn = null;
    $query = null;
    return $result;
}

function getTransaction(){
    $conn = connectMysql();
    $query = "SELECT * FROM `transactions`order by date DESC;";
    $transactions = $conn->query($query);
    $table = "";
    if ($transactions->rowCount() > 0) {
        $count = 1;
        foreach($transactions->fetchAll() as $row) {
            $type = $row["type"] == "0" ? "Ingreso" : "Egreso";
            $table .= '<tr><th scope="row">'.$count.'</th><td>'.$row["date"].'</td><td>'.$type.'</td><td>'.$row["detail"].'</td><td>'.$row["value"].'</td></tr>';
            $count++;
        }
    }
    $conn = null;
    $transactions = null;
    return $table;
}

function sumTransaction($type, $month = 0){
    $conn = connectMysql();
    $query = "SELECT SUM(value) as SUMA FROM `transactions` where type = ".$type.";";
    if($month != 0){
        $query = "SELECT SUM(value) as SUMA FROM `transactions` where type = ".$type." AND MONTH(date) = ".(int)$month.";";
    }
    $transactions = $conn->query($query);
    $suma = 0;
    if ($transactions->rowCount() > 0) {
        $suma = (int)$transactions->fetchAll()[0]['SUMA'];
    }
    return $suma;
}

function total($month = 0){
    return (int)sumTransaction(0, $month) - (int)sumTransaction(1, $month);
}

function getMonth(){
    $now = new DateTime();
    $month = $now->format('m');
    return $month;
}

function getMothText(){
    $meses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
    $monthName = $meses[(int)getMonth() - 1];
    return $monthName;
}