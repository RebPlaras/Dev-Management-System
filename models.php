<?php 

require_once 'dbConfig.php';

function insertIntoDeveloperRecords($pdo, $first_name, $last_name, $gender, $dev_level, $team, $lang_specialty, $years_of_exp) {
    $sql = "INSERT INTO software_developers (first_name, last_name, gender, dev_level, team, lang_specialty, years_of_exp) VALUES (?,?,?,?,?,?,?)";

    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$first_name, $last_name, $gender, $dev_level, $team, $lang_specialty, $years_of_exp]);

    return $executeQuery;  


function seeRecords($pdo) {
	$sql = "SELECT * FROM software_developers";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getDeveloperByID($pdo, $developer_id) {
	$sql = "SELECT * FROM software_developers WHERE developer_id = ?";
	$stmt = $pdo->prepare($sql);
	if ($stmt->execute([$developer_id])) {
		return $stmt->fetch();
	}
}

function updateDeveloper($pdo, $developer_id, $first_name, $last_name, $gender, $dev_level, $team, $lang_specialty, $years_of_exp) {
	$sql = "UPDATE software_developers 
				SET first_name = ?, 
					last_name = ?, 
					gender = ?, 
					dev_level = ?, 
					team = ?, 
					lang_specialty = ?, 
					years_of_exp = ? 
			WHERE developer_id = ?";
	$stmt = $pdo->prepare($sql);
	
	$executeQuery = $stmt->execute([$first_name, $last_name, $gender, $dev_level, $team, $lang_specialty, $years_of_exp, $developer_id]);

	return $executeQuery;  
}

function deleteDeveloper($pdo, $developer_id) {
	$sql = "DELETE FROM software_developers WHERE developer_id = ?";
	$stmt = $pdo->prepare($sql);

	$executeQuery = $stmt->execute([$developer_id]);

	return $executeQuery;  
}
?>
