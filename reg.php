<?php
include 'conn.php';
$reg = "AKU/2022/BCA/";
$data = "SELECT * FROM `registration` ORDER BY rollno DESC LIMIT 1";
$query=mysqli_query($conn,$data);
$row=mysqli_fetch_array($query);
$roll=$row['rollno'];
$uroll=$roll+1;
$ureg=$reg.$uroll;
$rno=rand(10000,50000);
$ureg=$reg.$rno;
if(isset($_POST['save'])){
  $inroll=$_POST['roll'];
  $inreg=$_POST['reg'];
  $sname=$_POST['name'];
  $fname=$_POST['fname'];
  $mname=$_POST['mname'];
  $birth=$_POST['dob'];
  $image=$_FILES['image'];
  //print_r($image);
  
  $filename=$image['name'];
  $filepath=$image['tmp_name'];
  $fileerror=$image['error'];
  if($fileerror==0){
    $filedset='image/'.$filename;
    move_uploaded_file( $filepath,$filedset);
   $ndata="INSERT INTO `registration`(`rollno`, `reg`, `name`, `fname`, `mname`, `dob`, `image`) VALUES ('$inroll','$inreg','$sname',' $fname','$mname',' $birth','$filedset')";
   $savequery=mysqli_query($conn,$ndata);
   if($savequery==true){
    echo "Data has been inserted";
   }else{
    echo "Error";
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
    <title>Full fill</title>
    <link rel="stylesheet" href="reg2.css">
</head>

<body>
    <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="">Roll Number</label><br>
            <input type="text" name="roll" value="<?php echo $uroll ?>" readonly><br>
            <label for="">Registration Number</label><br>
            <input type="text" name="reg" value="<?php echo $ureg ?>" readonly><br>
            <label for="">Student Name</label><br>
            <input type="text" name="name" placeholder="Enter student name"><br>
            <label for="">Student father's Name</label><br>
            <input type="text" name="fname" placeholder="Enter father's name"><br>
            <label for="">Student mother's Name</label><br>
            <input type="text" name="mname" placeholder="Enter mother's name"><br>
            <label for="">Date of Birth</label><br>
            <input type="date" name="dob" placeholder="Enter DOB"><br>
            <label for="">Image</label><br>
            <input type="file" name="image"><br><br>
            <input type="submit" name="save" value="Submit" class="btn"> <a href="display.php">View report</a>
        </form>
    </div>
</body>

</html>