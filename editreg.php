<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Registration</title>
    <link rel="stylesheet" href="editreg.css">
</head>

<body>
    <div class="editreg">
        <form action="" method="POST">

            <h3>Edit Student Registration</h3>
            <select name="roll" id="">



                <?php
                include 'conn.php';
                $rdata = "SELECT * FROM `registration`";
                $query = mysqli_query($conn, $rdata);
                $result = mysqli_num_rows($query);
                if ($result > 0) {
                    foreach ($query as $row) {
                ?>
                <option value="<?= $row['rollno'] ?>"><?= $row['rollno'] ?></option>
                <?php
                    }
                }
                ?>

            </select>
            <button class="btn" name="search">Search</button><br>
            <?php
            //serach query
            if (isset($_POST['search'])) {
                $searchRoll = $_POST['roll'];
                $sData = "SELECT * FROM `registration` WHERE rollno=$searchRoll";
                $squery = mysqli_query($conn, $sData);
                $searchArray = mysqli_fetch_array($squery);
            ?>
            <label for="">Registration No.:-</label>
            <input type="text" name="reg" value="<?php echo $searchArray['reg']; ?>"> <br>
            <label for="">Roll No. :-</label>
            <input type="text" name="roll" value="<?php echo $searchArray['rollno']; ?>"><br>
            <label for="">Student Name :-</label>
            <input type="text" name="sname" value="<?php echo $searchArray['name']; ?>"><br>
            <label for="">Father's Name :-</label>
            <input type="text" name="fname" value="<?php echo $searchArray['fname']; ?>"><br>
            <label for="">Mother's Name :-</label>
            <input type="text" name="mname" value="<?php echo $searchArray['mname']; ?>"><br>
            <label for="">Date of Birth :-</label>
            <input type="date" name="dob" value="<?php echo $searchArray['dob']; ?>"><br>
            <input type="submit" name="update" value="Update" class="btn">


            <?php
            }
            ?>
        </form>

    </div>
</body>

</html>
<?php
include 'conn.php';
if(isset($_POST['update'])){
    $updateroll=$_POST['roll'];
    $updatereg=$_POST['reg'];
    $updatename=$_POST['sname'];
    $updatefname=$_POST['fname'];
    $updatemname=$_POST['mname'];
    $updatedob=$_POST['dob'];
    $updateData="UPDATE `registration` SET `rollno`=' $updateroll',`reg`=' $updatereg',`name`=' $updatename',`fname`=' $updatefname',`mname`=' $updatemname',`dob`=' $updatedob' WHERE rollno= $updateroll";
    $updateQuery=mysqli_query($conn,$updateData);
    if($updateQuery){
        echo "Data has been Updated......";
    }else{
        echo "Data no Updated";
    }

}
?>