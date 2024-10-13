<?php 
    require_once '../core/dbConfig.php'; 
    require_once '../core/models.php'; 

    // Fetch the developer's details
    $getDeveloperById = getDeveloperByID($pdo, $_GET['developer_id']); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Developer</title>
    <style>
        body {
            font-family: "Arial", sans-serif;
            line-height: 1.6;
        }
        .developerContainer {
            border: 1px solid black;
            padding: 20px;
            margin: 20px 0;
            max-width: 600px;
            box-sizing: border-box;
        }
        input[type="submit"], .cancel-btn {
            font-size: 1.2em;
            padding: 10px 20px;
            color: white;
            border: none;
            cursor: pointer;
            margin-top: 10px;
            margin-right: 10px;
        }
        input[type="submit"] {
            background-color: #d9534f;
        }
        input[type="submit"]:hover {
            background-color: #c9302c;
        }
        .cancel-btn {
            background-color: #5bc0de;
            text-decoration: none;
            padding: 10px 20px;
            display: inline-block;
        }
        .cancel-btn:hover {
            background-color: #31b0d5;
        }
    </style>
</head>
<body>

    <h1>Are you sure you want to delete this developer?</h1>

    <!-- display the dev info-->
    <div class="developerContainer">
        <p><strong>First Name:</strong> <?php echo htmlspecialchars($getDeveloperById['first_name']); ?></p>
        <p><strong>Last Name:</strong> <?php echo htmlspecialchars($getDeveloperById['last_name']); ?></p>
        <p><strong>Gender:</strong> <?php echo htmlspecialchars($getDeveloperById['gender']); ?></p>
        <p><strong>Developer Level:</strong> <?php echo htmlspecialchars($getDeveloperById['dev_level']); ?></p>
        <p><strong>Team:</strong> <?php echo htmlspecialchars($getDeveloperById['team']); ?></p>
        <p><strong>Language Specialty:</strong> <?php echo htmlspecialchars($getDeveloperById['lang_specialty']); ?></p>
        <p><strong>Years of Experience:</strong> <?php echo htmlspecialchars($getDeveloperById['years_of_exp']); ?></p>
        <p><strong>Date Added:</strong> <?php echo htmlspecialchars($getDeveloperById['date_added']); ?></p>
    </div>

    <!-- confirmation -->
    <form action="../core/handleForms.php?developer_id=<?php echo htmlspecialchars($_GET['developer_id']); ?>" method="POST">
        <input type="submit" name="deleteDevBtn" value="Delete">
        <a href="index.php" class="cancel-btn">No</a>
    </form>

</body>
</html>
