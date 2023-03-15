<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li>
                    <a href="#">Student Registration</a>
                </li>
                <li>
                    <a href="#">Fill Marks</a>
                </li>
                <li>
                    <a href="#">View Students</a>
                </li>
                <li>
                    <a href="#">Print Result</a>
                </li>
                <li>
                    <a href="#">Edit Registration</a>
                </li>
                <li>
                    <a href="#">Edit Marks</a>
                </li>
                <li>
                    <a href="admin.php">Logout</a>

                </li>
            </ul>
        </nav>

    </header>
    <div class="abc">
        <form action="" method="post">
            <img src=" " alt="" class="adminuser">
            <input type="text" name="username" class="log" placeholder="Enter User Name">
            <input type="password" name="password" class="log" placeholder="Enter Password">
            <button name="submit" class="btn">Submit</button>
        </form>
    </div>
</body>

</html>
<?php
include 'conn.php';
if(isset($_POST['submit'])){
    $userName = $_POST['username'];
    $userPassword = $_POST['password'];
    $adminData = "SELECT * FROM `login`";
    $adminQuery = mysqli_query($conn, $adminData);
    $adminRes = mysqli_fetch_array($adminQuery);
    $dbAdminid = $adminRes['username'];
    $dbAdminpwd = $adminRes['password'];
    if($userName==$dbAdminid && $userPassword == $dbAdminpwd ){

        header('location:workadmin.html');
    }else {
       ?>
<script>
//alert("User Id or Password Invalid!");
</script>
<?php
    }
}
?>