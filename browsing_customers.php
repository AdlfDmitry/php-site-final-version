<?php
require_once 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Bank</title>
    <link rel="stylesheet" href="administrator_panel.css">
     <script src="admin_panel.js" defer></script>
</head>
<body>
    <header>
        <div class="logo">
            <img src="img/log 1.png" alt="Simple Bank Logo">
        </div>
        <h1>Simple Bank</h1>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
    </header>

    <section class="hero">
       <center> <h2>Welcome to Simple Bank</h2> 
        <p>Your trusted partner in banking solutions.</p>
        
        
     </center>
    </section>
     <div class="container">
       <center> <h1>Customers of Banking System</h1> </center>
         <div class="button-container">
          <center>   
              <button class="btn" onclick=" window.location.href='customer_delete.php'">Remove data </button>
              <button class="btn" onclick="window.location.href='add_customer.php'">Add data </button> 
              <button class="btn" onclick="require_once"('fetch_customers.php')" >Refresh </button> 
              <button class="btn" onclick=" window.location.href='index.html'">Back</button>  
        <select id="TableName" onchange="redirect()">
    <option></option>
    <option value="browsing_customers.php">Customer</option>
    <option value="bank_accounts.php">Bank Account</option>
    <option value="terminal.php">Terminal</option>
    <option value="technical_support.php">Technical Support</option>
    <option value="operation.php">Operation</option>
</select>
         </center>

        </div>
         <div>
         

<script>
    function redirect() {
        var selectedValue = document.getElementById("TableName").value;
        window.location.href = selectedValue;
    }
</script>


             </div>
        <table class="custom-table">
            <thead>
                <tr>
                    <th>CustomerID</th>
                    <th>Full Name</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php include 'fetch_customers.php'; ?>
            </tbody>
        </table>
         
    </div>
    
</body>
</html>
