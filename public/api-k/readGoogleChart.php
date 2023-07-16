<?php

    // Initial version 31 May 2023, tailored for Kalliola data (api-k)
    // Can be easily modified for extracting DB data for Google charts
    // 

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    $sampleSize = $_POST['sampleSize'];
    
    include_once '../../config-k/database.php';
    include_once '../../class-k/sample.php';

    $database = new Database();
    $db = $database->getConnection();

    $items = new Sample($db);

    $stmt = $items->getLatestNSamples($sampleSize);
    $itemCount = $stmt->rowCount();

    // This is a translation from SQL timestamp format to Google charts datetime format
    $timestampGoogle = function ($timestampSQL) {
        $f = sscanf($timestampSQL, "%4d-%2d-%2d %2d:%2d:%2d");
        $m = $f[1] - 1;
        return 'Date('.$f[0].','.$m.','.$f[2].','.$f[3].','.$f[4].','.$f[5].')';
    };
  
    if($itemCount > 0){

        //  Common skeleton for the output package
        $sampleArr = array(); 
        $sampleArr["cols"] = array();
        $sampleArr["rows"] = array();

        // Building the header i.e. "cols" section.
        //
        // Google requires a header where each time series variable is given
        // three parameters;
        // "id" - a variable name which will be used in the chart code
        // "label" - a display name which will be displayed in the rendered charts
        // "type" - one of the data type definitions supported by Google Charts
          
        $HEADER_timestamp = array(
            "id" => "timestamp",
            "label" => "Time",
            "type" => "datetime"        
        );
        $HEADER_lampotilaVesimittari = array(
            "id" => "lampotilaVesimittari",
            "label" => "lampotilaVesimittari",
            "type" => "number"        
        );
        $HEADER_lampotilaHuone = array(
            "id" => "lampotilaHuone",
            "label" => "lampotilaHuone",
            "type" => "number"        
        );
        $HEADER_kosteusKukka = array(
            "id" => "kosteusKukka",
            "label" => "kosteusKukka",
            "type" => "number"        
        );
        $HEADER_janniteVesimittari = array(
            "id" => "janniteVesimittari",
            "label" => "janniteVesimittari",
            "type" => "number"        
        );

        array_push($sampleArr["cols"], $HEADER_timestamp);
        array_push($sampleArr["cols"], $HEADER_lampotilaVesimittari);
        array_push($sampleArr["cols"], $HEADER_lampotilaHuone);
        array_push($sampleArr["cols"], $HEADER_kosteusKukka);
        array_push($sampleArr["cols"], $HEADER_janniteVesimittari);

        // The payload data is held in an array named "rows".
        //
        // If there are several timeseries variables plotted simultaneously,
        // the data structure for each time instance is an array labeled "c"
        // which carries the data points of all different time series variables
        // in the same order as they were defined in the "cols" section.
        
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $c = array(
                array("v" => $timestampGoogle($time)),
                array("v" => $lampotilaVesimittari),
                array("v" => $lampotilaHuone),
                array("v" => $kosteusKukka),
                array("v" => $janniteVesimittari)
            );

            // the extra wrapping around c-array looks a bit odd when viewing raw data ...
            array_push($sampleArr["rows"], array("c" => $c));
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