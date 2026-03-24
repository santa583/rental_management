<?php include 'db/db_connection.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Edit Tenant - Fulani Rental</title>
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
                <h1>Manage Records</h1>
            </header>

            <main class="content">
                <div class="card">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                        <h2 style="margin: 0;">Edit Tenant</h2>
                        <a href="view_tenants.php" style="color: #64748b; text-decoration: none; font-size: 0.9rem;">&larr; Back to Directory</a>
                    </div>

                    <?php
                    $id = $_GET['id'] ?? null;
                    if (!$id) {
                        echo "<div style='color: #ef4444;'>No tenant specified. <a href='view_tenants.php'>Return to safety</a></div>";
                        exit();
                    }

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $phone = $_POST['phone'];
                        $checkin = $_POST['checkin'];
                        $checkout = $_POST['checkout'];

                        $sql = "UPDATE tenants SET name='$name', email='$email', phone='$phone', check_in='$checkin', check_out='$checkout' WHERE tenant_id=$id";

                        if ($conn->query($sql) === TRUE) {
                            echo "<div style='background-color: #dcfce7; color: #166534; padding: 16px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #bbf7d0;'>Tenant record updated successfully.</div>";
                        } else {
                            echo "<div style='background-color: #fee2e2; color: #991b1b; padding: 16px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #fecaca;'>Error optimizing record: " . $conn->error . "</div>";
                        }
                    }

                    $result = $conn->query("SELECT * FROM tenants WHERE tenant_id=$id");
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                    ?>
                    
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($row['name']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($row['phone']); ?>" required>
                        </div>

                        <div style="display: flex; gap: 20px;">
                            <div class="form-group" style="flex: 1;">
                                <label for="checkin">Check-in Date</label>
                                <input type="date" id="checkin" name="checkin" value="<?php echo htmlspecialchars($row['check_in']); ?>" required>
                            </div>
                            <div class="form-group" style="flex: 1;">
                                <label for="checkout">Check-out Date</label>
                                <input type="date" id="checkout" name="checkout" value="<?php echo htmlspecialchars($row['check_out']); ?>" required>
                            </div>
                        </div>

                        <input type="submit" value="Save Changes">
                    </form>
                    <?php
                    } else {
                        echo "<p style='color: #ef4444;'>Tenant not found in database.</p>";
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
