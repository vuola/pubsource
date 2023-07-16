<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-kosteusKukka: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    include_once '../../config-k/database.php';
    include_once '../../class-k/sample.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $item = new Sample($db);
    
    $data = json_decode(file_get_contents("php://input"));
    
    $item->time = $data->time;
    
    // employee values
    $item->lampotilaVesimittari = $data->lampotilaVesimittari;
    $item->lampotilaHuone = $data->lampotilaHuone;
    $item->kosteusKukka = $data->kosteusKukka;
    $item->janniteVesimittari = $data->janniteVesimittari;
    $item->janniteHuone = $data->janniteHuone;
    
    if($item->updateSample()){
        echo json_encode("Sample data updated.");
    } else{
        echo json_encode("Data could not be updated");
    }
?>