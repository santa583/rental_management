<?php
//dn_connection.php include to establish a database connection
include 'db/db_connection.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"content="width=device-width,initial-scale=1.0">
        <link rel="stylesheet" href=css/styles.css> <!-- Link to your CSS -->
        <title>Fulani Rental Management System</title>
    </head>
    <body>
        <header>
            <h1>Welcome to Fulani Rental Management System</h1>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="add_tenant.php">Add Tenant</a></li>
                    <li><a href="view_tenants.php">View Tenants</a></li>
                    <li><a href="maintenance.php">Maintenance Requests</a></li>
                    <li><a href="about.php">About</a></li>
                </ul>
            </nav>
        </header>

        <main>
            <h2>Dashboard</h2>
            <p>This is the rental management system dashboard where you can manage tenats, rental units. and maintenance requests</p>

            <!-- PHP logic to fetch and display data (example for tenants) -->
             <?php
             //Fetch tenants from the database 
             $result = $conn->query("SELECT*FROM tenants");

             if ($result->num_rows > 0) {
                 echo "<h3>Registered Tenants</h3>";
                 echo "<table border='1'>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Check-in Date</th>
                        <th>Check-out Date</th>
                    </tr>";
                while($row = $result->fetch_assoc()) {
                     echo "<tr>
                        <td>" . $row["tenant_id"] . "</td>
                        <td>" . $row["name"] . "</td>
                        <td>" . $row["email"] . "</td>
                        <td>" . $row["phone"] . "</td>
                        <td>" . $row["check_in"] . "</td>
                        <td>" . $row["check_out"] . "</td>
                      </tr>";
            }
             echo "</table>";
             } else{
                echo "No tenants found.";
             }
             ?>
             </main>

             <footer>
                <p>&cpoy;<?php echo date("Y");?>Fulani Limited.All rights reserved.</p>           
             </footer>

             <script src="js/scripts.js"></script><!-- Link to your JS -->
    </body>
</html>