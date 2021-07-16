 <?php
 $from = $_GET['id'];
    include 'config.php';
    if (isset($_POST['submit'])) {

        $to = $_POST['to'];
        $amount = $_POST['amount'];


        $sql = "SELECT * from users where Branch_Id=$from";
        $query = mysqli_query($conn, $sql);
        $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.


        $sql = "SELECT * from users where Branch_Id=$to";
        $query = mysqli_query($conn, $sql);
        $sql2 = mysqli_fetch_array($query);


        // constraint to check input of negative value by user
        if (($amount) < 0) {
            echo '<script type="text/javascript">';
            echo ' alert("Negative values cannot be transferred")';  // showing an alert box.
            echo '</script>';
        }
        // constraint to check insufficient balance.
        else if ($amount > $sql1['Account_Balance']) {

            echo '<script type="text/javascript">';
            echo ' alert("Insufficient Balance Found")';  // showing an alert box.
            echo '</script>';
        }

        // constraint to check zero values
        else if ($amount == 0) {

            echo "<script type='text/javascript'>";
            echo "alert('Zero amount cannot be transferred')";
            echo "</script>";
        } else {

            // deducting amount from sender's account
            $a = $sql1['Account_Balance'];
            $newbalance = $a - $amount;

            $sql = "UPDATE users set Account_Balance=$newbalance where Branch_Id=$from";
            mysqli_query($conn, $sql);


            // adding amount to reciever's account
            $newbalance = $sql2['Account_Balance'] + $amount;
            $sql = "UPDATE users set Account_Balance=$newbalance where Branch_Id=$to";
            mysqli_query($conn, $sql);

            $sender = $sql1['Name'];
            $receiver = $sql2['Name'];
            $sql = "INSERT INTO transaction(`Sender`, `Receiver`, `Amount`) VALUES ('$sender','$receiver','$amount')";
            $query = mysqli_query($conn, $sql);

            if ($query) {
                echo "<script> var x = new Date();
                      alert('Transaction Successful '+x);
                            window.location='history.php';
                           </script>";
            }
            $newbalance = 0;
            $amount = 0;
        }
    }
    ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Transaction Page</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
     <link rel="stylesheet" href="user.css">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


     <style type="text/css">
         button {
             border: none;
             background: #ffffff;
         }

         button:hover {
             background-color: #ffffff;
             transform: scale(1.2);
             color: black;
         }

         footer {
             position: sticky;
             left: 50%;
             right: 50%;
             bottom: 0%;
             top: 100%;
             color: #ffffff;
         }

         .table {
             border: 2px solid gray;
         }

         tr,
         td,
         th {
             border: 2px solid gray !important;
         }

         .form-control {
             width: 40% !important
         }

         th {
             color: #ffffff;
             background-color: #000000;
         }

         td {
             background-color: #ffffff;
         }
     </style>
 </head>

 <body style="  background-image: url(images/background_2.jpg);
    background-repeat: no-repeat;
    background-size: cover;">
     <nav class="navbar navbar-inverse" style="padding-top: 2px;">
         <div class="container-fluid">
             <div class="navbar-header">
                 <a class="navbar-brand" href="home.html">XYZ Bank</a>
             </div>
             <ul class="nav navbar-nav  navbar-right">
                 <li><a href="home.html">Home</a></li>
                 <li><a href="user.php">View Customers</a></li>
                 <li class="active"><a href="transaction.php?id=10001">Transfer Money</a></li>
                 <li><a href="history.php">Transaction History</a></li>
                 <li><a href="aboutus.html">About Us</a></li>
             </ul>
         </div>
     </nav><br><br><br>

     <div class="container">
         <h2 class="text-center pt-4" style="color : white;"><b>Transfer Money</b></h2>
         <?php

            include 'config.php';
            $sid = $_GET['id'];
            $sql = "SELECT * FROM  users where Branch_Id=$sid";
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                echo "Error : " . $sql . "<br>" . mysqli_error($conn);
            }
            $rows = mysqli_fetch_assoc($result);
            
            ?>
         <form method="post" name="tcredit" class="tabletext"><br>
             <div>
                 <table class="table table-striped table-condensed table-bordered">
                     <tr style="color : bwhite;">
                         <th class="text-center">Id</th>
                         <th class="text-center">Name</th>
                         <th class="text-center">Email</th>
                         <th class="text-center">Balance</th>
                     </tr>
                     <tr style="color : black;">
                         <td class="py-2"><?php echo $rows['Branch_Id'] ?></td>
                         <td class="py-2"><?php echo $rows['Name'] ?></td>
                         <td class="py-2"><?php echo $rows['Email'] ?></td>
                         <td class="py-2"><?php echo $rows['Account_Balance'] ?></td>
                     </tr>
                 </table>
             </div>
             <label style="color :hsl(240deg 46% 40% / 82%);  "><b>Transfer To:</b></label>
             <select name="to" class="form-control" required>
                 <option value="" disabled selected>Choose</option>
                 <?php
                    
                    include 'config.php';
                    $sid = $_GET['id'];
                    $sql = "SELECT * FROM users where Branch_Id!=$sid";
                    $result = mysqli_query($conn, $sql);
                    if (!$result) {
                        echo "Error " . $sql . "<br>" . mysqli_error($conn);
                    }
                    while ($rows = mysqli_fetch_assoc($result)) {
                    ?>
                     <option class="table" value="<?php echo $rows['Branch_Id']; ?>">
                         <?php echo $rows['Name']; ?>
                     </option>
                 <?php
                    }
                    ?>
                 <div>
             </select>
             <br>
             <br>
             <label style="color :hsl(240deg 46% 40% / 82%);"><b>Amount:</b></label>
             <input type="number" class="form-control" name="amount" required>
             <br><br>
             <div class="text-center">
                 <button class="btn mt-3 btn-primary" name="submit" type="submit" id="myBtn">Transfer</button>
             </div>
         </form>
     </div>
     <footer class="text-center mt-5 py-2">
         <p><br>&copy 2021 Designed by <br><strong>Shreeram Aithal</strong></br> </p>
     </footer>
 </body>

 </html>