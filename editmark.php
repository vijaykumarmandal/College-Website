<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="editmark.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <form action="" method="POST">
            <input type="text" name="rollno"><br>
            <button class="btn" name="search">Search</button><br>
            <?php
        include 'conn.php';
        if(isset($_POST['search'])){
        $search_roll=$_POST['rollno'];
        $search_data="SELECT * FROM `mark` WHERE roll_no='$search_roll'";
        $search_query=mysqli_query($conn, $search_data);
        $search_row=mysqli_fetch_array( $search_query);
        /*if($search_row){
            echo "Sucess";
        }else{
            echo "error!";
        }*/
        
        ?>
            <input type="text" name="seroll" value="<?php echo $search_roll ?>"><br>

            <label for="">English</label><br>
            <input type="text" name="english" value="<?php echo $search_row['english'];?>"><br>
            <label for="">Hindi</label><br>
            <input type="text" name="hindi" value="<?php echo $search_row['hindi'];?>"><br>
            <label for="">Math</label><br>
            <input type="text" name="math" value="<?php echo $search_row['math'];?>"><br>
            <label for="">Science</label><br>
            <input type="text" name="science" value="<?php echo $search_row['science'];?>"><br>
            <label for="">Social_Science</label><br>
            <input type="text" name="sscience" value="<?php echo  $search_row['sscience'];?>"><br>
            <label for="">Maithli</label><br>
            <input type="text" name="maithli" value="<?php echo $search_row['maithli'];?>">
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
    $update_roll=$_POST['seroll'];
    $update_english=$_POST['english'];
    $update_hindi=$_POST['hindi'];
    $update_math=$_POST['math'];
    $update_science=$_POST['science'];
    $update_sscience=$_POST['sscience'];
    $update_maithli=$_POST['maithli'];
    $update_data="UPDATE `mark` SET `roll_no`='$update_roll',`english`='$update_english',`hindi`='$update_hindi',`math`='$update_math',`science`='$update_science',`sscience`='$update_sscience',`maithli`='$update_maithli' WHERE roll_no='$update_roll'";
    $update_query=mysqli_query($conn,$update_data);
    if( $update_query){
        echo "Data updated";
    }else{
        echo "Error!";
    }
}
?>