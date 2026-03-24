<?php include 'db/db_connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Tenants - Fulani Rental</title>
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
                    <li><a href="index.php">Dashboard</a></li>
                    <li><a href="add_tenant.php">Add Tenant</a></li>
                    <li><a href="view_tenants.php" class="active">View Tenants</a></li>
                    <li><a href="maintenance.php">Maintenance</a></li>
                    <li><a href="about.php">About</a></li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="main-wrapper">
            <header class="topbar">
                <h1>Tenant Directory</h1>
            </header>

            <main class="content">
                <div class="card">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                        <h3 style="margin:0;">All Registered Tenants</h3>
                        <a href="add_tenant.php" style="background: #2563eb; color: white; padding: 8px 16px; border-radius: 6px; text-decoration: none; font-size: 0.875rem; font-weight: 500;">+ New Tenant</a>
                    </div>
                    <?php
                    $result = $conn->query("SELECT * FROM tenants");
                    if ($result && $result->num_rows > 0) {
                        echo "<table>
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
                                    <td><font style='font-weight: 500; color: #0f172a;'>" . $row["name"] . "</font></td>
                                    <td>" . $row["email"] . "</td>
                                    <td>" . $row["phone"] . "</td>
                                    <td>" . $row["check_in"] . "</td>
                                    <td>" . $row["check_out"] . "</td>
                                    <td>
                                        <a href='edit_tenant.php?id=" . $row["tenant_id"] . "'>Edit</a>
                                        <a href='delete_tenant.php?id=" . $row["tenant_id"] . "' class='delete' onclick='return confirm(\"Are you sure you want to delete this tenant permanently?\");'>Delete</a>
                                    </td>
                                  </tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "<p style='color: #64748b;'>No tenants found. Start by adding one!</p>";
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
