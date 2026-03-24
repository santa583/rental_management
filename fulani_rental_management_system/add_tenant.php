<?php include 'db/db_connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Add Tenant - Fulani Rental</title>
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
                    <li><a href="add_tenant.php" class="active">Add Tenant</a></li>
                    <li><a href="view_tenants.php">View Tenants</a></li>
                    <li><a href="maintenance.php">Maintenance</a></li>
                    <li><a href="about.php">About</a></li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content Wrapper -->
        <div class="main-wrapper">
            <header class="topbar">
                <h1>New Registration</h1>
            </header>

            <main class="content">
                <div class="card">
                    <div style="max-width: 500px; margin: 0 auto;">
                        <h2 style="text-align: center; margin-bottom: 24px;">Add New Tenant</h2>
                        <?php
                        // Handle form submission
                        $success = false;
                        $error = "";
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $name = $_POST['name'];
                            $email = $_POST['email'];
                            $phone = $_POST['phone'];
                            $checkin = $_POST['checkin'];
                            $checkout = $_POST['checkout'];

                            $sql = "INSERT INTO tenants (name, email, phone, check_in, check_out)
                                    VALUES ('$name', '$email', '$phone', '$checkin', '$checkout')";

                            if ($conn->query($sql) === TRUE) {
                                $success = true;
                            } else {
                                $error = "Error: " . $conn->error;
                            }
                        }
                        ?>

                        <?php if ($success): ?>
                            <div style="background-color: #dcfce7; color: #166534; padding: 16px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #bbf7d0;">
                                New tenant added successfully! <a href="view_tenants.php" style="color: #15803d; font-weight: bold;">View all tenants</a>.
                            </div>
                        <?php endif; ?>
                        <?php if ($error): ?>
                            <div style="background-color: #fee2e2; color: #991b1b; padding: 16px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #fecaca;">
                                <?php echo htmlspecialchars($error); ?>
                            </div>
                        <?php endif; ?>

                        <form method="POST" action="add_tenant.php">
                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input type="text" id="name" name="name" required placeholder="Mary Jane">
                            </div>

                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" id="email" name="email" required placeholder="mj@example.com">
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="text" id="phone" name="phone" required placeholder="+254 700000000">
                            </div>

                            <div style="display: flex; gap: 20px;">
                                <div class="form-group" style="flex: 1;">
                                    <label for="checkin">Check-in Date</label>
                                    <input type="date" id="checkin" name="checkin" required>
                                </div>
                                <div class="form-group" style="flex: 1;">
                                    <label for="checkout">Check-out Date</label>
                                    <input type="date" id="checkout" name="checkout" required>
                                </div>
                            </div>

                            <input type="submit" value="Register Tenant">
                        </form>
                    </div>
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
