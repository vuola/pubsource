<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../../config-k/database.php';
    include_once '../../class-k/sample.php';

    $database = new Database();
    $db = $database->getConnection();

    $item = new Sample($db);

    $item->time = isset($_GET['time']) ? $_GET['time'] : die();
  
    $item->getSingleSample();

    if($item->lampotilaVesimittari != null){
        // create array
        $samp_arr = array(
            "time" =>  $item->time,
            "lampotilaVesimittari" => $item->lampotilaVesimittari,
            "lampotilaHuone" => $item->lampotilaHuone,
            "kosteusKukka" => $item->kosteusKukka,
            "janniteVesimittari" => $item->janniteVesimittari,
            "janniteHuone" => $item->janniteHuone
        );
      
        http_response_code(200);
        echo json_encode($samp_arr);
    }
      
    else{
        http_response_code(404);
        echo json_encode("Employee not found.");
    }
?>