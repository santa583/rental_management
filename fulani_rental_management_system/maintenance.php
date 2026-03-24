<?php include 'db/db_connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Maintenance - Fulani Rental</title>
</head>
<body>
    <div class="dashboard-container">
        <aside class="sidebar">
            <div class="sidebar-header">
                <h2>Fulani Rental</h2>
            </div>
            <nav class="sidebar-nav">
                <ul>
                    <li><a href="index.php">Dashboard</a></li>
                    <li><a href="add_tenant.php">Add Tenant</a></li>
                    <li><a href="view_tenants.php">View Tenants</a></li>
                    <li><a href="maintenance.php" class="active">Maintenance</a></li>
                    <li><a href="about.php">About</a></li>
                </ul>
            </nav>
        </aside>

        <div class="main-wrapper">
            <header class="topbar">
                <h1>Maintenance Tickets</h1>
            </header>
            <main class="content">
                <div class="card" style="margin-bottom: 24px;">
                    <div style="max-width: 500px; margin: 0 auto;">
                        <h2 style="text-align: center; margin-bottom: 24px;">Submit a Request</h2>
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $name = $conn->real_escape_string($_POST['name']);
                            $unit = $conn->real_escape_string($_POST['unit']);
                            $desc = $conn->real_escape_string($_POST['description']);
                            $sql = "INSERT INTO maintenance_requests (name, unit, description) VALUES ('$name', '$unit', '$desc')";
                            if ($conn->query($sql) === TRUE) {
                                echo "<div style='background-color: #dcfce7; color: #166534; padding: 16px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #bbf7d0;'>Maintenance ticket opened successfully.</div>";
                            } else {
                                echo "<div style='color: #ef4444;'>Error recording ticket: " . $conn->error . "</div>";
                            }
                        }
                        ?>
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="name">Tenant Name</label>
                                <input type="text" id="name" name="name" required placeholder="Mary Jane">
                            </div>
                            <div style="display: flex; gap: 20px;">
                                <div class="form-group" style="flex: 1;">
                                    <label for="unit">Unit Number</label>
                                    <input type="text" id="unit" name="unit" required placeholder="Hse 14">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description">Issue Description</label>
                                <textarea id="description" name="description" rows="4" required style="padding: 12px 16px; border: 1px solid #cbd5e1; border-radius: 8px; font-family: inherit; font-size: 0.95rem; resize: vertical; transition: border-color 0.2s; outline: none;"></textarea>
                            </div>
                            <input type="submit" value="Submit Ticket">
                        </form>
                    </div>
                </div>

                <div class="card">
                    <h3>Active Requests</h3>
                    <?php
                    $result = null;
                    if($conn) {
                        $result = $conn->query("SELECT * FROM maintenance_requests ORDER BY created_at DESC");
                    }
                    if ($result && $result->num_rows > 0) {
                        echo "<table>
                                <tr>
                                    <th>Ticket #</th>
                                    <th>Tenant</th>
                                    <th>Unit</th>
                                    <th>Status</th>
                                    <th>Date Submitted</th>
                                </tr>";
                        while($row = $result->fetch_assoc()) {
                            $status_color = $row["status"] == 'Pending' ? '#eab308' : '#22c55e';
                            echo "<tr>
                                    <td>#" . $row["id"] . "</td>
                                    <td><font style='font-weight: 500; color: #0f172a;'>" . htmlspecialchars($row["name"]) . "</font></td>
                                    <td>" . htmlspecialchars($row["unit"]) . "</td>
                                    <td><span style='background: " . $status_color . "20; color: " . $status_color . "; padding: 4px 8px; border-radius: 4px; font-weight: 600; font-size: 0.75rem;'>" . $row["status"] . "</span></td>
                                    <td>" . date('M j, Y', strtotime($row["created_at"])) . "</td>
                                  </tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "<p style='color: #64748b;'>No active maintenance requests at this time.</p>";
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
