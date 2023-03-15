<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Markfill</title>
    <link rel="stylesheet" href="mark.css">
</head>

<body>
    <div class="containter">
        <form action="" method="POST">
            <br>
            <h3>Please Enter Marks</h3>
            <select name="roll" id="">
                <?php
                include 'conn.php';
                $rdata="SELECT * FROM `registration`";
                $query=mysqli_query($conn,$rdata);
                //$result = mysqli_num_rows($query);
                $result=mysqli_fetch_array($query);
                if($result>0){
                    foreach($query as $row){
                        ?>
                <option value="<?=$row['rollno'] ?>"><?=$row['rollno'] ?></option>
                <?php
                    }
                }
                ?>

            </select><br>

            <label for="hindi"> English Mark:</label><br>
            <input type="text" id="english" name="english" placeholder="Enter marks english"><br>
            <label for="English"> Hindi Mark:</label><br>
            <input type="text" id="hindi" name="hindi" placeholder="Enter marks hindi"><br>
            <label for="Math"> Math Mark:</label><br>
            <input type="text" id="math" name="math" placeholder="Enter marks math"><br>
            <label for="science"> Science Mark:</label><br>
            <input type="text" id="science" name="science" placeholder="Enter marks science"><br>
            <label for="sscience">Socical Science Mark:</label><br>
            <input type="text" id="social_science" name="social_science" placeholder="Enter marks social_science"><br>
            <label for="sanskrit"> Maithli Mark:</label><br>
            <input type="text" id="maithli" name="maithli" placeholder="Enter marks maithli"><br>
            <button name="submit" class="btn">Submit</button>
        </form>
    </div>
    <?php
include 'conn.php';
if(isset($_POST['submit'])){
    $roll=$_POST['roll'];
    $eng=$_POST['english'];
    $hin=$_POST['hindi'];
    $math=$_POST['math'];
    $sc=$_POST['science'];
    $ssc=$_POST['social_science'];
    $m=$_POST['maithli'];
    if($eng>99|| $hin>99||$math>99||$sc>99||$ssc>99||$m>99){
        echo "Number should be greater than 99";
     }else{
        $savedata="INSERT INTO `mark`(`roll_no`, `english`, `hindi`, `math`, `science`, `sscience`, `maithli`) VALUES ('$roll','$eng','$hin','$math',' $sc',' $ssc','$m')";
        $savequery=mysqli_query($conn,$savedata);
    if($savequery==true){
        echo "Data inserted";
    }else{
        echo "Error!";
    }
  }
}
?>
</body>

</html>