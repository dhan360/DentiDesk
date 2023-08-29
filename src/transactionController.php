<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include('transactionModel.php');

if(isset($_POST)):
    $action = $_POST['action'];
    if($action == 'insertTransaction'):
        $result = insertTransaction($_POST['type'], $_POST['detail'], $_POST['value'], $_POST['date']);
        die($result);
    elseif($action == 'getTransactions'):
        $result = getTransaction($_POST['month']);
        die($result);
    endif;
endif;