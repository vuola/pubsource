<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once '../../config-k/database.php';
    include_once '../../class-k/sample.php';

    $database = new Database();
    $db = $database->getConnection();

    $items = new Sample($db);

    $stmt = $items->getSamples();
    $itemCount = $stmt->rowCount();


    echo json_encode($itemCount);

    if($itemCount > 0){
        
        $sampleArr = array();
        $sampleArr["body"] = array();
        $sampleArr["itemCount"] = $itemCount;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $s = array(
                "time" => $time,
                "lampotilaVesimittari" => $lampotilaVesimittari,
                "lampotilaHuone" => $lampotilaHuone,
                "kosteusKukka" => $kosteusKukka,
                "janniteVesimittari" => $janniteVesimittari,
                "janniteHuone" => $janniteHuone
            );

            array_push($sampleArr["body"], $s);
        }
        echo json_encode($sampleArr);
    }

    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "No record found.")
        );
    }
?>