<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>All Customers</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="./css/user.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
  integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>

<body>
  <nav class="navbar navbar-inverse" style="padding-top: 2px;">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.html">SPARKS Bank</a>
      </div>
      <ul class="nav navbar-nav  navbar-right">
        <li><a href="index.html">Home</a></li>
        <li class="active"><a href="user.php">View Customers</a></li>
        <li><a href="transaction.php?id=10001">Transfer Money</a></li>
        <li><a href="history.php">Transaction History</a></li>
        <li><a href="aboutus.html">About Us</a></li>
      </ul>
    </div>
  </nav>
  
  <div class="container">
      <h2 class="text-center pt-4" style="color : white;"><b>All Customers</b></h2>
        <br>
     <table class="table table-bordered">
      <tr>
        <th><b>Id</b></th>
        <th>Username</th>
        <th>E-mail</th>
        <th>Account Balance</th>
        <th>Operation</th>
      </tr>
      <?php
include 'config.php';
$sql = "Select Branch_Id, Name, Email, Account_Balance from users";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        //echo $row["Branch_Id"] ,$row["Name"], $row["Email"], $row["Account_Balance"];
        
?> 
      <tr>
            <td><?php echo $row['Branch_Id'] ?></td>
            <td><?php echo $row['Name'] ?></td>
            <td><?php echo $row['Email'] ?></td>
            <td><?php echo $row['Account_Balance'] ?></td>
            <td><a href="transaction.php?id=<?php echo $row['Branch_Id']; ?>"> <button type="button" class="btn btn-primary">Transact</button></a></td>
          </tr>
      <?php
    }
} else {
    echo "0 result";
}
$conn->close();
?>
    </table>
  </div>

<footer class="text-center mt-5 ">
    <p>&copy; 2021 Designed by <br><strong>Shreeram Aithal</strong> </p>
</footer>

</body>
</html>