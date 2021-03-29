<?php 

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once './Database.php';

    $db = new Database();
    $aggregationType = isset($_GET['aggregationType']) ? $_GET['aggregationType'] : die();
    $aggregationValue = isset($_GET['aggregationValue']) ? $_GET['aggregationValue'] : die();

    if($aggregationType=='age'){
        $result = $db->connect()->query(
            "SELECT 'age'                                         [aggregationType]
            , $aggregationValue                                   [aggregationFilter]
            , SUM(r.capital_gain)                                 [capital_gain_sum]
            , AVG(r.capital_gain)                                 [capital_gain_avg]
            , SUM(r.capital_loss)                                 [capital_loss_sum]
            , AVG(r.capital_loss)                                 [capital_loss_avg]
            , SUM(CASE WHEN r.over_50k = true THEN 1 ELSE 0 END)  [over_50k_count]
            , SUM(CASE WHEN r.over_50k = false THEN 1 ELSE 0 END) [under_50k_count]
            FROM records r
            WHERE r.'age' = $aggregationValue;"
        );
    }

    if($aggregationType=='education_level_id'){
        $result = $db->connect()->query(
            "SELECT 'education_level_id'                          [aggregationType]
            , $aggregationValue                                   [aggregationFilter]
            , SUM(r.capital_gain)                                 [capital_gain_sum]
            , AVG(r.capital_gain)                                 [capital_gain_avg]
            , SUM(r.capital_loss)                                 [capital_loss_sum]
            , AVG(r.capital_loss)                                 [capital_loss_avg]
            , SUM(CASE WHEN r.over_50k = true THEN 1 ELSE 0 END)  [over_50k_count]
            , SUM(CASE WHEN r.over_50k = false THEN 1 ELSE 0 END) [under_50k_count]
            FROM records r
            WHERE r.'education_level_id' = $aggregationValue;"
        );
    }

    if($aggregationType=='occupation_id'){
        $result = $db->connect()->query(
            "SELECT 'occupation_id'                               [aggregationType]
            , $aggregationValue                                   [aggregationFilter]
            , SUM(r.capital_gain)                                 [capital_gain_sum]
            , AVG(r.capital_gain)                                 [capital_gain_avg]
            , SUM(r.capital_loss)                                 [capital_loss_sum]
            , AVG(r.capital_loss)                                 [capital_loss_avg]
            , SUM(CASE WHEN r.over_50k = true THEN 1 ELSE 0 END)  [over_50k_count]
            , SUM(CASE WHEN r.over_50k = false THEN 1 ELSE 0 END) [under_50k_count]
            FROM records r
            WHERE r.'occupation_id' = $aggregationValue;"
        );
    }

    if($result){
        foreach($result as $row){
            $output = array(
                'aggregationType' => $row['aggregationType'],
                'aggregationFilter' => $row['aggregationFilter'],
                'capital_gain_sum' => $row['capital_gain_sum'],
                'capital_gain_avg' => $row['capital_gain_avg'],
                'capital_loss_sum' => $row['capital_loss_sum'],
                'capital_loss_avg' => $row['capital_loss_avg'],
                'over_50k_count' => $row['over_50k_count'],
                'under_50k_count' => $row['under_50k_count'],

            );
        }
        echo json_encode($output);
    }else{
        echo json_encode(
            array('message' => 'No record found')
        );
    }
?>