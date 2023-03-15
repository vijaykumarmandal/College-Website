<?php
include 'conn.php';
$reg = "AKU/2022/BCA/";
$data = "SELECT * FROM `registration` ORDER BY rollno DESC LIMIT 1";
$query = mysqli_query($conn,$data);
$row = mysqli_fetch_array($query);
$roll = $row['rollno'];
$uroll =$roll+1;
//$ureg = $reg.$uroll;
$rno = rand(10000,500000);
$ureg =$reg.$rno;
if(isset($_POST['save'])){
    $inroll = $_POST['roll'];
    $inreg = $_POST['reg'];
    $studentName = $_POST['sname'];
    $fatherName = $_POST['fname'];
    $motherName = $_POST['mname'];
    $birth = $_POST['dob'];
    $image = $_FILES['image'];
    //print_r($image);
    $fname =$image['name'];
    $filepath=$image['tmp_name']; 
    $fileerror = $image['error'];
    if($fileerror==0){
        $filedest = 'image/'.$fname;
        move_uploaded_file($filepath,$filedest);
    $univData = "INSERT INTO `registration`(`rollno`, `reg`, `name`, `fname`, `mname`, `dob`, `image`) VALUES ('$inroll','$inreg','$studentName','$fatherName','$motherName','$birth','$filedest')";
    $univQuery = mysqli_query($conn,$univData);
    if($univQuery==true){
        echo"Data has been inserted";
    }else {
        echo "Error!";
    }
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrationform</title>
    <link rel="stylesheet" href="reg2.css">

</head>

<body>

    <div class="container">
        <h3>Student Registration</h3><br>

        <form action="" method="post" enctype="multipart/form-data">
            <label for="">Registration No.:</label>
            <input type="text" name="reg" value="<?php echo $ureg ?>" readonly> <br>
            <label for="">Roll No. :</label>
            <input type="text" name="roll" value="<?php echo $uroll ?>" readonly><br>
            <label for="">Student Name:</label>
            <input type="text" name="sname" placeholder="Enter Student Name"><br>
            <label for="">Father's Name:</label>
            <input type="text" name="fname" placeholder="Enter Father's Name"><br>
            <label for="">Mother's Name:</label>
            <input type="text" name="mname" placeholder="Enter Mother's Name"><br>
            <label for="">Date of Birth:</label>
            <input type="date" name="dob" placeholder="Enter DOB"><br>
            <label for="">Upload Image:</label>
            <input type="file" name="image"><br>
            <input type="submit" name="save" value="Submit" class="btn"> <a href="display.php">View REPORT</a>


        </form>
    </div>
</body>

</html>