<?php 
include 'db/db_connection.php';

if (isset($_GET['id'])) {
    $tenant_id = $_GET['id'];

    // Fetch tenant details
    $query = "SELECT * FROM tenants WHERE tenant_id = $tenant_id";
    $result = $conn->query($query);
    $tenant = $result->fetch_assoc();
} else {
    // Redirect to the view page if no ID is provided
    header("Location: view_tenants.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get updated tenant information from the form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];

    // Update tenant information
    $sql = "UPDATE tenants SET name='$name', email='$email', phone='$phone', check_in='$checkin', check_out='$checkout' WHERE tenant_id=$tenant_id";

    if ($conn->query($sql) === TRUE) {
        echo "Tenant updated successfully!";
        header("Location: view_tenants.php"); // Redirect to view page
        exit();
    } else {
              echo "Error updating tenant: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Edit Tenant</title>
</head>
<body>
    <header>
        <h1>Edit Tenant</h1>
    </header>
    
    <main>
        <form method="POST" action="">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $tenant['name']; ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $tenant['email']; ?>" required>

            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" value="<?php echo $tenant['phone']; ?>" required>

            <label for="checkin">Check-in Date:</label>
            <input type="date" id="checkin" name="checkin" value="<?php echo $tenant['check_in']; ?>" required>

            <label for="checkout">Check-out Date:</label>
            <input type="date" id="checkout" name="checkout" value="<?php echo $tenant['check_out']; ?>" required>

            <input type="submit" value="Update Tenant">
        </form>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Fulani Limited. All rights reserved.</p>
    </footer>
</body>
</html>
