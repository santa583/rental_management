<?php include 'db/db_connection.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Add Tenant</title>
</head>
<body>
    <header>
        <h1>Add New Tenant</h1>
    </header>
    
    <main>
        <form method="POST" action="add_tenant.php">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" required>

            <label for="checkin">Check-in Date:</label>
            <input type="date" id="checkin" name="checkin" required>

            <label for="checkout">Check-out Date:</label>
            <input type="date" id="checkout" name="checkout" required>

            <input type="submit" value="Add Tenant">
        </form>

        <?php
        // Handle form submission
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $checkin = $_POST['checkin'];
            $checkout = $_POST['checkout'];

            $sql = "INSERT INTO tenants (name, email, phone, check_in, check_out)
                    VALUES ('$name', '$email', '$phone', '$checkin', '$checkout')";

            if ($conn->query($sql) === TRUE) {
                echo "New tenant added successfully!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        ?>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Fulani Limited. All rights reserved.</p>
    </footer>
</body>
</html>
