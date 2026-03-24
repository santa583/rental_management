<?php include 'db/db_connection.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>View Tenants</title>
</head>
<body>
    <header>
        <h1>View Tenants</h1>
    </header>

    <main>
        <h3>Registered Tenants</h3>
        <?php
        $result = $conn->query("SELECT * FROM tenants");
        
        if ($result->num_rows > 0) {
            echo "<table border='1'>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Check-in</th>
                        <th>Check-out</th>
                        <th>Actions</th>
                    </tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["tenant_id"] . "</td>
                        <td>" . $row["name"] . "</td>
                        <td>" . $row["email"] . "</td>
                        <td>" . $row["phone"] . "</td>
                        <td>" . $row["check_in"] . "</td>
                        <td>" . $row["check_out"] . "</td>
                        <td>
                            <a href='edit_tenant.php?id=" . $row["tenant_id"] . "'>Edit</a> | 
                            <a href='delete_tenant.php?id=" . $row["tenant_id"] . "' onclick='return confirm(\"Delete this tenant?\");'>Delete</a>
                        </td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "No tenants found.";
        }
        ?>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Fulani Limited. All rights reserved.</p>
    </footer>
</body>
</html>
