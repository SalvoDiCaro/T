<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once './config/Database.php';

    $db = new Database();

    $offset = isset($_GET['offset']) ? filter_input(INPUT_GET, 'offset', FILTER_VALIDATE_INT) : 5;
    $count = isset($_GET['count']) ? filter_input(INPUT_GET, 'count', FILTER_VALIDATE_INT) : 10;

    $result = $db->connect()->query(
        'SELECT r.id, age, cs.name [country name], els.name [education level],
         education_num, mss.name [marital status], os.name [occupation], rs.name [race],
         rels.name [relationship], ss.name [sex], ws.name [workclass], capital_gain, capital_loss, hours_week, over_50k
            FROM records r
            LEFT JOIN countries cs on r.country_id = cs.id
            LEFT JOIN education_levels els on r.education_level_id = els.id
            LEFT JOIN marital_statuses mss on r.marital_status_id = mss.id
            LEFT JOIN occupations os on r.occupation_id = os.id
            LEFT JOIN races rs on r.race_id = rs.id
            LEFT JOIN relationships rels on r.relationship_id = rels.id
            LEFT JOIN sexes ss on r.sex_id = ss.id
            LEFT JOIN workclasses ws on r.workclass_id = ws.id'. 
            ' LIMIT ' . $offset . ',' . $count . ';'
    );

    if($result){
        $output = array();
        foreach($result as $row){
            $output[$row['id']] = array(
                'id' => $row['id'],
                'age' => $row['age'],
                'workclass' => $row['workclass'],
                'education level' => $row['education level'],
                'education num' => $row['education_num'],
                'marital stasus' => $row['marital status'],
                'occupation' => $row['occupation'],
                'relationship' => $row['relationship'],
                'race' => $row['race'],
                'sex' => $row['sex'],
                'capital gain' => $row['capital_gain'],
                'capital loss' => $row['capital_loss'],
                'hours week' => $row['hours_week'],
                'country' => $row['country name'],
                'over 50k' => $row['over_50k']
            );
        }
        echo json_encode($output);
    }else{
        echo json_encode(
            array('message' => 'No record found')
        );
    }
?>