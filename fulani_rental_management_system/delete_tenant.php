<?php 
include 'db/db_connection.php';

if (isset($_GET['id'])) {
    $tenant_id = $_GET['id'];

    // Delete tenant from the database
    $sql = "DELETE FROM tenants WHERE tenant_id = $tenant_id";

    if ($conn->query($sql) === TRUE) {
        echo "Tenant deleted successfully!";
        header("Location: view_tenants.php"); // Redirect to view page
        exit();
    } else {
        echo "Error deleting tenant: " . $conn->error;
    }
} else {
    // Redirect to the view page if no ID is provided
    header("Location: view_tenants.php");
    exit();
}
?>
