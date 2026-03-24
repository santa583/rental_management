<?php include 'db/db_connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Fulani Rental</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <h2>Fulani Rental</h2>
            </div>
            <nav class="sidebar-nav">
                <ul>
                    <li><a href="index.php" class="active">Dashboard</a></li>
                    <li><a href="add_tenant.php">Add Tenant</a></li>
                    <li><a href="view_tenants.php">View Tenants</a></li>
                    <li><a href="maintenance.php">Maintenance</a></li>
                    <li><a href="about.php">About</a></li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="main-wrapper">
            <header class="topbar">
                <h1>Dashboard Overview</h1>
            </header>

            <main class="content">
                <div class="card">
                    <h2>Welcome to Fulani Rental Management System</h2>
                    <p style="color: #475569; line-height: 1.6;">This is the rental management system dashboard where you can easily manage tenants, rental units, and maintenance requests.</p>
                </div>
                
                <div class="card" style="margin-top: 24px;">
                    <h3>Recent Tenants</h3>
                    <?php
                    $result = $conn->query("SELECT * FROM tenants LIMIT 5");
                    if ($result && $result->num_rows > 0) {
                        echo "<table>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Check-in</th>
                                    <th>Check-out</th>
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
                    } else {
                        echo "<p style='color: #64748b;'>No tenants found in the database.</p>";
                    }
                    ?>
                </div>
            </main>
            
            <footer class="footer">
                <p>&copy; <?php echo date("Y"); ?> Fulani Limited. All rights reserved.</p>
            </footer>
        </div>
    </div>
    <script src="js/scripts.js"></script>
</body>
</html>