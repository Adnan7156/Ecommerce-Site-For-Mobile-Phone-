

<?php 
session_start();

$servername = "localhost";
$username = "root";
$password = ""; 
$database = "ecommerce_project"; 


$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(!isset($_SESSION['user_id'])) {
    header("Location: login.php"); 
    exit();
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM orders WHERE user_id = '$user_id'";
$result = $conn->query($sql);

?>

<div class="container mt-5">

    <h2 class="mb-4">Your Orders</h2>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Serial Number</th>
                <th scope="col">User ID</th>
                <th scope="col">Product ID</th>
                <th scope="col">Product Title</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total Price</th>
                <th scope="col">Invoice</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $serialNumber = 1;

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $serialNumber++ . "</td>";
                
                echo "<td>" . $row["user_id"] . "</td>";
                echo "<td>" . $row["product_id"] . "</td>";
                echo "<td>" . $row["producttitle"] . "</td>";
                echo "<td>" . $row["qty"] . "</td>";
                echo "<td>" . $row["total_price"] . "</td>";
                echo "<td><a href='invoice.php?id=" .$row["id"] . "&user_id=" . $row["user_id"] . "' class='btn btn-primary btn-sm'>Invoice</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No orders found.</td></tr>";
        }
        ?>
        </tbody>
    </table>

    <a href="index.php" class="btn btn-secondary">GO BACK</a> 

</div>

<?php
$conn->close();
?>
<br><br><br><br>