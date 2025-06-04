<?php
session_start(); // هذا ضروري جدًا


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "brids_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: ../index.php");
    exit;
}

$admin_name = isset($_SESSION['admin_name']) ? $_SESSION['admin_name'] : 'AdminUser';

// جلب البيانات للإحصائيات
$product_count_result = $conn->query("SELECT COUNT(*) as total FROM products");
$product_count = $product_count_result ? $product_count_result->fetch_assoc()['total'] : 0;

$order_count_result = $conn->query("SELECT COUNT(*) as total FROM orders");
$order_count = $order_count_result ? $order_count_result->fetch_assoc()['total'] : 0;

$sales_total_result = $conn->query("SELECT SUM(quantity * price) as total FROM order_items");
$sales_total = $sales_total_result ? $sales_total_result->fetch_assoc()['total'] : 0;

$recent_orders = $conn->query("
    SELECT o.order_id, o.customer_name, o.order_date, IFNULL(SUM(oi.price * oi.quantity), 0) AS total_price
    FROM orders o
    LEFT JOIN order_items oi ON o.order_id = oi.fk_order_id
    GROUP BY o.order_id
    ORDER BY o.order_date DESC
    LIMIT 5
");
?>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>



<body>

<div class='dashboard'>

  <?php include '../../include/nav-bar.php';?>
  
  <div class='dashboard-app'>
    <header class='dashboard-toolbar'><a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a></header>
    <div class='dashboard-content'>
        <div class='card mb-4'>
          <div class='card-header'>
          <h1 style="text-align: center;">Welcome Back: <?php echo htmlspecialchars($admin_name); ?></h1>
          </div>
          <div class='card-body'>
            <p>Your account type is: Administrator</p>
          </div>
        </div>

        <div class="row mb-4">
          <div class="col-md-4">
            <div class="card text-white bg-primary">
              <div class="card-body">
                <h5>Total Products</h5>
                <h3><?= $product_count ?></h3>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card text-white bg-success">
              <div class="card-body">
                <h5>Total Orders</h5>
                <h3><?= $order_count ?></h3>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card text-white bg-dark">
              <div class="card-body">
                <h5>Total Sales</h5>
                <h3>BD<?= number_format($sales_total ?? 0, 2) ?></h3>
              </div>
            </div>
          </div>
        </div>

        <div class='card'>
          <div class='card-header'>
            <h5>Recent Orders</h5>
          </div>
          <div class='card-body p-0'>
            <table class="table mb-0">
              <thead>
                <tr>
                  <th>Customer</th>
                  <th>Date</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>
                <?php while($row = $recent_orders->fetch_assoc()): ?>
                  <tr>
                    <td><?= $row['customer_name'] ?></td>
                    <td><?= $row['order_date'] ?></td>
                    <td>BD<?= number_format($row['total_price'], 2) ?></td>
                  </tr>
                <?php endwhile; ?>
              </tbody>
            </table>
          </div>
        </div>
    </div>
  </div>
</div>

</body>
</html>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-HoA8z1uCBrum1+qsSVqS+8CA0nVddOZXS6jttuPAHyBs+K6TfGsZ3jAC5PVsQtAT" crossorigin="anonymous"></script>
</body>
