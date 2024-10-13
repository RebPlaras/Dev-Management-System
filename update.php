<?php 
    require_once '../core/dbConfig.php'; 
    require_once '../core/models.php'; 

    // Fetch Developer Details
    $getDeveloperById = getDeveloperByID($pdo, $_GET['developer_id']); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Developer</title>
    <style>
        body {
            font-family: "Arial", sans-serif;
        }
        input, select {
            font-size: 1.2em;
            padding: 10px;
            margin: 5px 0;
            width: 100%;
            max-width: 400px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: auto;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <h3>Edit Developer Information</h3>

    <!-- Update Form -->
    <form action="../core/handleForms.php?developer_id=<?php echo htmlspecialchars($_GET['developer_id']); ?>" method="POST">
        <p>
            <label for="firstName">First Name</label>
            <input type="text" name="firstName" id="firstName" value="<?php echo htmlspecialchars($getDeveloperById['first_name']); ?>" required>
        </p>
        <p>
            <label for="lastName">Last Name</label>
            <input type="text" name="lastName" id="lastName" value="<?php echo htmlspecialchars($getDeveloperById['last_name']); ?>" required>
        </p>
        <p>
            <label for="gender">Gender</label>
            <input type="text" name="gender" id="gender" value="<?php echo htmlspecialchars($getDeveloperById['gender']); ?>" required>
        </p>
        <p>
            <label for="devLevel">Developer Level</label>
            <input type="text" name="devlevel" id="devLevel" value="<?php echo htmlspecialchars($getDeveloperById['dev_level']); ?>" required>
        </p>
        <p>
            <label for="team">Team</label>
            <input type="text" name="team" id="team" value="<?php echo htmlspecialchars($getDeveloperById['team']); ?>" required>
        </p>
        <p>
            <label for="lang_specialty">Language Specialty</label>
            <input type="text" name="lang_specialty" id="lang_specialty" value="<?php echo htmlspecialchars($getDeveloperById['lang_specialty']); ?>" required>
        </p>
        <p>
            <label for="years_of_exp">Years of Experience</label>
            <input type="number" name="years_of_exp" id="years_of_exp" value="<?php echo htmlspecialchars($getDeveloperById['years_of_exp']); ?>" required min="0">
        </p>
        <p>
            <input type="submit" name="editDevBtn" value="Update">
        </p>
    </form>

</body>
</html>
