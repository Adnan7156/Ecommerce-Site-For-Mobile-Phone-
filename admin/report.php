<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommerce_project"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT product_id, 
                 SUM(qty) AS total_quantity, 
                 SUM(total_price) AS total_sales, 
                 SUM(cost * qty) AS total_cost 
                FROM orders 
                 GROUP BY product_id";

$result = $conn->query($query);
?>


<!DOCTYPE html>
<html>
<head>
    <title> Sales Report</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css  ">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        
    </style>
</head>
<body>


<h2> Sales Report</h2>

<table>
    <tr>
        <th>Product ID</th>
        <th>Total Quantity Sold</th>
        <th>Total Sales</th>
        <th>Total Cost</th>
        <th>Profit</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $product_id = $row["product_id"];
            $total_quantity = $row["total_quantity"];
            $total_sales = $row["total_sales"];
            $total_cost = $row["total_cost"];
            $profit = $total_sales - $total_cost;

            echo "<tr>";
            echo "<td>" . $product_id . "</td>";
            echo "<td>" . $total_quantity . "</td>";
            echo "<td>" . $total_sales . "</td>";
            echo "<td>" . $total_cost . "</td>";
            echo "<td>" . $profit . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No products sold</td></tr>";
    }
    ?>
</table><br>

<button type="button" class="btn btn-secondary"><a href="dashboard.php">Go Back</a></button>



</body>
</html>

<?php
$conn->close();
?>
