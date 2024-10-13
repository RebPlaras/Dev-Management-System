<?php 

require_once 'dbConfig.php'; 
require_once 'models.php';

if (isset($_POST['insertNewDevBtn'])) {
	$firstName = trim($_POST['firstName']);
	$lastName = trim($_POST['lastName']);
	$gender = trim($_POST['gender']);
	$devLevel = trim($_POST['devlevel']);
	$team = trim($_POST['team']);
	$langSpecialty = trim($_POST['lang_specialty']);
	$yearsOfExp = trim($_POST['years_of_exp']);

	if (!empty($firstName) && !empty($lastName) && !empty($gender) && !empty($devLevel) && !empty($team) && !empty($langSpecialty) && !empty($yearsOfExp)) {
		$query = insertIntoDeveloperRecords($pdo, $firstName, $lastName, $gender, $devLevel, $team, $langSpecialty, $yearsOfExp);

		if ($query) {
			header("Location: ../sql/index.php");
			exit; // Use exit after header redirect to stop further script execution
		} else {
			echo "Insertion failed";
		}
	} else {
		echo "Make sure that no fields are empty";
	}
}

if (isset($_POST['editDevBtn'])) {
	$developer_id = $_GET['developer_id'];
	$firstName = trim($_POST['firstName']);
	$lastName = trim($_POST['lastName']);
	$gender = trim($_POST['gender']);
	$devLevel = trim($_POST['devlevel']);
	$team = trim($_POST['team']);
	$langSpecialty = trim($_POST['lang_specialty']);
	$yearsOfExp = trim($_POST['years_of_exp']);

	if (!empty($developer_id) && !empty($firstName) && !empty($lastName) && !empty($gender) && !empty($devLevel) && !empty($team) && !empty($langSpecialty) && !empty($yearsOfExp)) {
		$query = updateDeveloper($pdo, $developer_id, $firstName, $lastName, $gender, $devLevel, $team, $langSpecialty, $yearsOfExp);

		if ($query) {
			header("Location: ../sql/index.php");
			exit; // Use exit after header redirect to stop further script execution
		} else {
			echo "Update failed";
		}
	} else {
		echo "Make sure that no fields are empty";
	}
}

if (isset($_POST['deleteDevBtn'])) {
	$query = deleteDeveloper($pdo, $_GET['developer_id']);

	if ($query) {
		header("Location: ../sql/index.php");
		exit; // Use exit after header redirect to stop further script execution
	} else {
		echo "Deletion failed";
	}
}

?>
