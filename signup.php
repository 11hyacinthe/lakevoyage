<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
            color: #666;
        }
        input[type="text"],
        input[type="password"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        p {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }
        a {
            color: #4CAF50;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }

    </style>
    
</head>
<body>
    <div class="container">
        <h2>Create your account</h2>
        <form action="" method="POST">
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" >
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" >
            <label for="confirm_password">Confirm Password</label>
            <input type="password" name="confirm_password" id="confirm_password">
            <input type="submit" name="submit" value="Signup">
            <p>Already have an account? <a href="index.php">Login</a></p>
           

        </form>
    </div>
    
</body>
</html>
<?php
include "connect.php";
if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $confirm_password=$_POST['confirm_password'];
    if($password==$confirm_password){
        $query="INSERT INTO users(email,password) VALUES('$email','$password')";
        $result=mysqli_query($conn,$query);
        if($result){
            echo "Account was created successful";
        }
        else{
            echo "Account was not created failed";
        }
    }
    else{
        echo "Password and confirm password do not match";
    }
}
?>