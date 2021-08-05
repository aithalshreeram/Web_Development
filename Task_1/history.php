<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./css/history.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<body>
    <nav class="navbar navbar-inverse" style="padding-top: 2px;">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html">SPARKS Bank</a>
            </div>
            <ul class="nav navbar-nav  navbar-right">
                <li><a href="index.html">Home</a></li>
                <li><a href="user.php">View Customers</a></li>
                <li><a href="transaction.php?id=10001">Transfer Money</a></li>
                <li class="active"><a href="history.php">Transaction History</a></li>
                <li><a href="aboutus.html">About Us</a></li>
            </ul>
        </div>
    </nav>


    <div class="container">
        <h2 class="text-center pt-4" style="color : white;"><b>Transaction History</b></h2>
        <br>
        <div class="table-responsive-sm">
            <table class="table table-hover  table-bordered">
                <thead style="color : black;">
                    <tr>
                        <th class="text-center">S.No.</th>
                        <th class="text-center">Sender</th>
                        <th class="text-center">Receiver</th>
                        <th class="text-center">Amount</th>
                        <th class="text-center">Date & Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
include 'config.php';
$sql = "select * from transaction";
$query = mysqli_query($conn, $sql);
while ($rows = mysqli_fetch_assoc($query)) {
?>

                        <tr style="color : black;">
                            <td class="py-2"><?php echo $rows['Sno']; ?></td>
                            <td class="py-2"><?php echo $rows['Sender']; ?></td>
                            <td class="py-2"><?php echo $rows['Receiver']; ?></td>
                            <td class="py-2"><?php echo $rows['Amount']; ?> </td>
                            <td class="py-2"><?php echo $rows['Date and Time']; ?> </td>

                        <?php
}
?>

                </tbody>
            </table>

        </div>
    </div>

<footer class="text-center mt-5 ">
    <p>&copy; 2021 Designed by <br><strong>Shreeram Aithal</strong> </p>
</footer>

</body>
</html>