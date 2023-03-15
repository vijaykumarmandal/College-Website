<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studentreport</title>
    <link rel="stylesheet" href="display.css">
</head>

<body>
    <div class="container">
        <button class="btn"><a href="admin.php" class="anc">HOME</a></button>
        <h2>STUDENT'S REPORT</h2>

    </div><br>
    <div style="overflow-x:auto;" class="table">
        <table>
            <tr>
                <th>Reg. Date</th>
                <th>RollNo.</th>
                <th>Student Name</th>
                <th>Father's Name</th>
                <th>Mother's Names</th>
                <th>Date of Birth</th>
                <th>Image</th>
                <th>Date</th>

            </tr>
            <?php
          include 'conn.php';
          $data = "SELECT * FROM `registration`";
          $query = mysqli_query($conn,$data);
          while($res=mysqli_fetch_array($query)){


          ?>
            <tr>
                <td><?php echo $res['reg']; ?></td>
                <td><?php echo $res['rollno']; ?></td>
                <td><?php echo $res['name']; ?></td>
                <td><?php echo $res['fname']; ?></td>
                <td><?php echo $res['mname']; ?></td>
                <td><?php echo $res['dob']; ?></td>
                <td><img src="<?php echo $res['image']; ?>" alt="" class="img"></td>
                <td><?php echo $res['date']; ?></td>
               
            </tr>
            <?php
        }
        ?>


        </table>
    </div>
</body>

</html>