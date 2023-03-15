<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Registration</title>
    <link rel="stylesheet" href="edit.css">
</head>

<body>
    <div class="container">
        <form action="" method="post">
            <h3>Select Registration Number</h3>
            <input type="text" name="searchroll">
            <button class="btn" name="search">Search</button><br>
            <?php
            include 'conn.php';
            if(isset($_POST['search'])){
                $searchRoll = $_POST['searchroll'];
                $searchData = "SELECT * FROM `registration`";
                $searchQuery = mysqli_query($conn, $searchData);
                $searchArray = mysqli_fetch_array($searchQuery);
                $dbroll=$searchArray['rollno'];
                if($dbroll==$searchRoll){
                    
                $searchData1 = "SELECT * FROM `registration` WHERE rollno =$searchRoll";
                $searchQuery1 = mysqli_query($conn, $searchData1);
                $searchArray1 = mysqli_fetch_array($searchQuery1);
                    ?>
            <input type="text" name="regno" value="<?php echo $searchArray1['reg']; ?>">
            <input type="text" name="rollno" value="<?php echo $searchArray1['rollno']; ?>">
            <input type="text" name="stname" value="<?php echo $searchArray1['name']; ?>">
            <input type="text" name="fname" value="<?php echo $searchArray1['fname']; ?>">
            <input type="text" name="mname" value="<?php echo $searchArray1['mname']; ?>">
            <input type="date" name="dob" value="<?php echo $searchArray1['dob']; ?>"><br>
            <button class="btn" name="update">Update</button>
            <?php
                }else{
                    echo "Does not match";
                }
                
            }
        
            ?>
        </form>
    </div>
</body>

</html>
<?php
if(isset($_POST['update'])){
    $updateRoll = $_POST['rollno'];
    $updateReg = $_POST['regno'];
    $updateName = $_POST['stname'];
    $updateFname = $_POST['fname'];
    $updateMname = $_POST['mname'];
    $updateDob = $_POST['dob'];

    $updateData = "UPDATE `registration` SET `rollno`='$updateRoll',`reg`='$updateReg',`name`='$updateName',`fname`='$updateFname',`mname`='$updateMname',`dob`='$updateDob' WHERE `rollno`=$updateRoll";
    $updateQuery = mysqli_query($conn, $updateData);
    if($updateQuery==true){
        ?>
<script>
alert("Data has been Updated.....");
</script>
<?php
    }else {
        ?>
<script>
alert("Data Updated Error!");
</script>
<?php
    }
}
?>