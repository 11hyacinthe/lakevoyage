<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fishing Booking</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #eef2f3;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            max-width: 900px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .form-section {
            flex: 1;
            padding: 20px;
            background-color: #f7f7f7;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            font-size: 20px;
            color: #007BFF;
            margin: 0;
        }
        .header p {
            font-size: 14px;
            color: #333;
        }
        form {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }
        label {
            font-size: 14px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"],
        input[type="date"],
        select {
            width: 100%;
            padding: 8px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px;
            font-size: 14px;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .half-width {
            flex: 1 1 calc(50% - 10px);
        }
        .full-width {
            flex: 1 1 100%;
        }
        .image-section {
            flex: 1;
            background: url('fish.jpg') center center/cover no-repeat;
            height: auto;
            min-height: 400px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-section">
            <div class="header">
                <h1>Fishing Booking</h1>
                <p>Start Planning Your Next Holiday</p>
                <p>Call us on 01700000000 or fill out the form below.</p>
            </div>
            <form action="" method="POST">
                <div class="half-width">
                    <label for="fname">Firstname</label>
                    <input type="text" name="fname" id="fname" required>
                </div>
                <div class="half-width">
                    <label for="lname">Lastname</label>
                    <input type="text" name="lname" id="lname" required>
                </div>
                <div class="half-width">
                    <label for="email">Email Address</label>
                    <input type="text" name="email" id="email" required>
                </div>
                <div class="half-width">
                    <label for="phone">Telephone Number</label>
                    <input type="text" name="phone" id="phone" required>
                </div>
                <div class="full-width">
                    <label for="date">Date</label>
                    <input type="date" name="date" id="date" required>
                </div>
                <div class="half-width">
                    <label for="age">How Many Adults (18+)?</label>
                    <input type="number" name="age" id="age" required>
                </div>
                <div class="half-width">
                    <label for="children">How Many Children?</label>
                    <input type="number" name="children" id="children" required>
                </div>
                <div class="half-width">
                    <label for="budget">Per-Person Budget</label>
                    <select name="budget" id="budget" required>
                        <option value="">Select</option>
                        <option value="1000">1000</option>
                        <option value="500">500</option>
                        <option value="100">100</option>
                        <option value="50">50</option>
                    </select>
                </div>
                <div class="half-width">
                    <label for="currency">Currency</label>
                    <input type="text" name="currency" id="currency" value="$" required>
                </div>
                <div class="full-width">
                    <input type="submit" name="save" value="Send Your Enquiry">
                </div>
            </form>
        </div>
        <div class="image-section"></div>
    </div>
</body>
</html>

<?php
if(isset($_POST['save'])){
	$a=$_POST['fname'];
    $b=$_POST['lname'];
    $c=$_POST['email'];
    $d=$_POST['phone'];
    $e=$_POST['date'];
    $f=$_POST['age'];
    $g=$_POST['children'];
    $h=$_POST['budget'];
    $i=$_POST['currency'];
	mysqli_query($conn,"insert into fishing(id,fname,lname,email,phone,date,age,children,budget,currency) values(null,'$a','$b','$c','$d','$e','$f','$g','$h','$i')");
}
?>