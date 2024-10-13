<?php 
    require_once '../core/dbConfig.php'; 
    require_once '../core/models.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Developer Management System</title>
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
        table {
            width: 80%;
            margin-top: 50px;
            border-collapse: collapse;
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
    <h3>Welcome to the Developer Management System</h3>

    <!-- Entry Form -->
    <form action="../core/handleForms.php" method="POST">
        <p>
            <label for="firstName">First Name</label>
            <input type="text" name="firstName" id="firstName" required>
        </p>
        <p>
            <label for="lastName">Last Name</label>
            <input type="text" name="lastName" id="lastName" required>
        </p>
        <p>
            <label for="gender">Gender</label>
            <input type="text" name="gender" id="gender" required placeholder="Enter Gender">
        </p>
        <p>
            <label for="devlevel">Developer Level</label>
            <input type="text" name="devlevel" id="devlevel" required placeholder="e.g., Junior, Mid, Senior">
        </p>
        <p>
            <label for="team">Team</label>
            <input type="text" name="team" id="team" required>
        </p>
        <p>
            <label for="lang_specialty">Language Specialty</label>
            <input type="text" name="lang_specialty" id="lang_specialty" required>
        </p>
        <p>
            <label for="years_of_exp">Years of Experience</label>
            <input type="number" name="years_of_exp" id="years_of_exp" required min="0">
        </p>
        <p>
            <input type="submit" name="insertNewDevBtn" value="Add Developer">
        </p>
    </form>

    <!-- Developer List Table -->
    <table>
        <thead>
            <tr>
                <th>Developer ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Developer Level</th>
                <th>Team</th>
                <th>Language Specialty</th>
                <th>Years of Experience</th>
                <th>Date Added</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $seeRecords = seeRecords($pdo); 
            foreach ($seeRecords as $row) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['developer_id']); ?></td>
                    <td><?php echo htmlspecialchars($row['first_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['last_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['gender']); ?></td>
                    <td><?php echo htmlspecialchars($row['dev_level']); ?></td>
                    <td><?php echo htmlspecialchars($row['team']); ?></td>
                    <td><?php echo htmlspecialchars($row['lang_specialty']); ?></td>
                    <td><?php echo htmlspecialchars($row['years_of_exp']); ?></td>
                    <td><?php echo htmlspecialchars($row['date_added']); ?></td>
                    <td>
                        <a href="update.php?developer_id=<?php echo htmlspecialchars($row['developer_id']); ?>">Edit</a>
                        <a href="delete.php?developer_id=<?php echo htmlspecialchars($row['developer_id']); ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
