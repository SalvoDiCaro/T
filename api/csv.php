<?php 

include_once './Database.php';

$db = new Database();

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
        LEFT JOIN workclasses ws on r.workclass_id = ws.id;'
);

$fp = fopen('denormalized.csv', 'w');

$headers = array('id','age','workclass','education_level','education_num',
'marital_stasus','occupation','relationship','race','sex','capital_gain',
'capital_loss','hours_week','country','over_50k');

fputcsv($fp, $headers);

if($result){
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
        fputcsv($fp, $output[$row['id']]);
    }
}else{
    fputcsv($fp, array());
}

fclose($fp);

$url = "denormalized.csv";

$file_name = basename($url);

$info = pathinfo($file_name);

if ($info["extension"] == "csv") {

	header("Content-Description: File Transfer");
	header("Content-Type: application/octet-stream");
	header(
	"Content-Disposition: attachment; filename=\""
	. $file_name . "\"");
	readfile ($url);
}

else echo "Sorry, that's not a CSV file";

exit();

?>