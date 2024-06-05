<?php
session_start();
ob_start(); // Start output buffering

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommerce_project";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

require('libs/fpdf.php');

if (isset($_GET['id']) && isset($_GET['user_id'])) {
    $order_id = $_GET['id'];
    $user_id = $_GET['user_id'];

    $query = "SELECT * FROM orders WHERE id = ? AND user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $order_id, $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $order = $result->fetch_assoc();

    if (!$order) {
        die("Order not found.");
    }

    // Clean the output buffer before generating the PDF
    

    // Create a new PDF instance
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(40, 10, 'Invoice');
    $pdf->Ln(20);

    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(40, 10, 'Order ID: ' . $order['id']);
    $pdf->Ln();
    $pdf->Cell(40, 10, 'User ID: ' . $order['user_id']);
    $pdf->Ln();
    $pdf->Cell(40, 10, 'Product ID: ' . $order['product_id']);
    $pdf->Ln();
    $pdf->Cell(40, 10, 'Product Title: ' . $order['producttitle']);
    $pdf->Ln();
    $pdf->Cell(40, 10, 'Quantity: ' . $order['qty']);
    $pdf->Ln();
    $pdf->Cell(40, 10, 'Total Price: ' . $order['total_price']);
    $pdf->Ln();

    // Output the PDF
    $pdf->Output();
    exit(); // Ensure no further output after the PDF is sent

} else {
    die("Order ID or User ID not provided.");
}
ob_end_clean();

$conn->close();

