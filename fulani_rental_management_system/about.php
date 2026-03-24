<?php include 'db/db_connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>About - Fulani Rental</title>
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
                    <li><a href="maintenance.php">Maintenance</a></li>
                    <li><a href="about.php" class="active">About</a></li>
                </ul>
            </nav>
        </aside>

        <div class="main-wrapper">
            <header class="topbar">
                <h1>About the Platform</h1>
            </header>
            <main class="content">
                <div class="card" style="max-width: 800px; margin: 0 auto; text-align: center; padding: 48px;">
                    <h2 style="font-size: 2rem; color: #0f172a; margin-bottom: 16px;">Fulani Rental Management SaaS</h2>
                    <p style="color: #475569; line-height: 1.8; font-size: 1.1rem; margin-bottom: 32px;">
                        Welcome to true property management synchronization. Built for modern property owners, our platform centralizes operations - from tracking tenant contracts securely to executing automated maintenance pipelines.
                    </p>
                    <div style="display: flex; gap: 20px; justify-content: center;">
                        <div style="background: #f8fafc; padding: 24px; border-radius: 12px; border: 1px solid #e2e8f0; flex: 1;">
                            <h3 style="color: #2563eb; margin-top: 0;">Tenant Tracking</h3>
                            <p style="font-size: 0.9rem; color: #64748b;">Effortlessly monitor check-ins, leases, and contract renewals from a singular dashboard.</p>
                        </div>
                        <div style="background: #f8fafc; padding: 24px; border-radius: 12px; border: 1px solid #e2e8f0; flex: 1;">
                            <h3 style="color: #2563eb; margin-top: 0;">Streamlined Maintenance</h3>
                            <p style="font-size: 0.9rem; color: #64748b;">Respond to tenant issues instantly with an organized maintenance ticket system.</p>
                        </div>
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
