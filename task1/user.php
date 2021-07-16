<!DOCTYPE html>
<html lang="en">

<head>
  <title>Users</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="user.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
  integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <style>
    footer {
      position: sticky;
      left: 50%;
      right: 50%;
      bottom: 0%;
      top: 100%;
      color: #ffffff;
    }

    th {
      background-color: #000000;
      color: #ffffff;
    }

    td {
      color: #ffffff;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-inverse" style="padding-top: 2px;">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="home.html">XYZ Bank</a>
      </div>
      <ul class="nav navbar-nav  navbar-right">
        <li><a href="home.html">Home</a></li>
        <li class="active"><a href="user.php">View Customers</a></li>
        <li><a href="transaction.php?id=10001">Transfer Money</a></li>
        <li><a href="history.php">Transaction History</a></li>
        <li><a href="aboutus.html">About Us</a></li>
      </ul>
    </div>
  </nav>
  <div class="container">
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
      ?> <tr>
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
  <footer class="text-center mt-5 py-2">
    <p>&copy 2021 Designed by <br><strong>Shreeram Aithal</strong></br> </p>
  </footer>
</body>

</html>