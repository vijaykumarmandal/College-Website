<?php
include 'conn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PrintMarksheet</title>
    <link rel="stylesheet" href="">
</head>

<body>
    <form action="" method="post">
        <div class="container">
            <label for="rollno">Please Enter Roll No.:</label>
            <div>
                <input type="text" name="rollno" id="rollNumber" class="search">
                <input type="submit" name="search" value="Search" class="btn">
                <button class="btn"><a href="workadmin.html" class="anc">HOME</a></button>
            </div>
        </div> <br>
    </form>
    <div class="table" style="overflow-x: auto;">
        <table style="width:100%">
            <?php
      if(isset($_POST['search'])){
        $serachRoll = $_POST['rollno'];
        $alldata="SELECT * FROM `registration` WHERE rollno='$serachRoll'";
        $query= mysqli_query($conn,$alldata);
        $row = mysqli_fetch_array($query);


        $data="SELECT * FROM `mark` WHERE roll_no = '$serachRoll'";
        $mquery= mysqli_query($conn,$data);
        $res = mysqli_fetch_array($mquery);
        if($res==false){
          ?>
            <script>
            alert("This Roll Number Not Found");
            </script>
            <?php
        }else {
      ?>
            <tr class="head">
                <th colspan="3">BIHAR SECONDRY EDUCATION BOARD, PATNA</th>
            </tr>
            <tr class="head1">
                <th colspan="3">ANNUAL SECONDRY SCHOOL EXAMINATION RESULT- 2022</th>
            </tr>
            <tr class="head3">
                <th colspan="3">PERSONAL DETAILS</th>
            </tr>
        </table>
        <br>
        <table style="width:100%">



            <tr>
                <td>Roll Number</td>
                <td><?php echo $serachRoll;?></td>
                <td rowspan="5"><img src="<?php echo $row['image' ]?>"></td>



            </tr>

            <tr>
                <td>Student Name</td>
                <td><?php echo $row['name'];?></td>


            </tr>
            <tr>
                <td>Father's Name</td>
                <td><?php echo $row['fname']; ?></td>

            </tr>
            <tr>
                <td>Mother's Name</td>
                <td><?php echo $row['mname']; ?></td>

            </tr>
            <tr>
                <td>Date of Birth</td>
                <td><?php echo $row['dob']; ?></td>

            </tr>

        </table><br>
        <table style="width:100%">
            <tr class="head3">
                <th colspan="7">MARK DETAILS</th>
            </tr>

            <tr>
                <th colspan="">SUBJECTS</th>
                <th colspan="">F. MARKS</th>
                <th colspan="">P. MARKS</th>
                <th colspan="">THEORY</th>
                <th colspan="">INT/PRAC</th>
                <th colspan="">REGULATION</th>
                <th colspan="">SUBJECT TOTAL</th>

            </tr>

            <tr>

                <td>ENGLISH</td>
                <td>100</td>
                <td>30</td>
                <td id="hin"><?php echo $res['hindi']; ?> </td>
                <td> </td>
                <td> </td>
                <td> <?php echo $res['hindi']; ?></td>

            </tr>
            <tr>
                <td>HINDI</td>
                <td>100</td>
                <td>30</td>
                <td id="english"><?php echo $res['english']; ?></td>
                <td></td>
                <td></td>
                <td><?php echo $res['english']; ?></td>

            </tr>
            <tr>
                <td>MATHEMATICS</td>
                <td>100</td>
                <td>30</td>
                <td id="math"><?php echo $res['math']; ?></td>
                <td></td>
                <td></td>
                <td><?php echo $res['math']; ?></td>

            </tr>
            <tr>
                <td>SCIENCE</td>
                <td>100</td>
                <td id="">30</td>
                <td id="science"><?php echo $res['science']; ?></td>
                <td id="spmark">5</td>
                <td></td>
                <td id="tscience"></td>
            </tr>
            <tr>
                <td>SOCIAL SCIENCE</td>
                <td>100</td>
                <td id="">30</td>
                <td id="sscience"><?php echo $res['sscience']; ?></td>
                <td id="somark">5</td>
                <td></td>
                <td id="tsocial"></td>
            </tr>
            <tr>
                <td>MAITHLI</td>
                <td>100</td>
                <td>30</td>
                <td id="sanskrit"><?php echo $res['maithli']; ?></td>
                <td></td>
                <td></td>
                <td><?php echo $res['maithli']; ?></td>

            </tr>




        </table><br>
        <table style="width:100%">
            <tr class="head3">
                <th colspan="4">FINAL RESULTS</th>
            </tr>
            <tr>
                <th colspan="">RESULT</th>
                <th colspan="">DIVISION</th>
                <th colspan="">PERCENTAGE</th>
                <th colspan="">TOTAL MARKS</th>
            </tr>
            <tr>
                <td id="result"></td>
                <td id="division"></td>
                <td id="percent"></td>
                <td id="total"></td>


            </tr>
        </table><br>

        <h3>Abbreviation Used</h3>
        <p><span>Percenage >= 60 : 1st Divison, Percentage<60&>=45, 2nd Division, Percebtage<45&>=33, 3rd Divison,
                        Result: Percentage>=33, Passed, Percentage <33, Failed</span>
        </p>
    </div>
    <?php
      }
          }
          ?>
    <script>
    let hindi = parseInt(document.getElementById('hin').innerHTML);
    let english = parseInt(document.getElementById('english').innerHTML);
    let math = parseInt(document.getElementById('math').innerHTML);
    let science = parseInt(document.getElementById('science').innerHTML);
    let psci = parseInt(document.getElementById('spmark').innerHTML);
    let tscience = science + psci;

    let sscience = parseInt(document.getElementById('sscience').innerHTML);
    let somark = parseInt(document.getElementById('somark').innerHTML);
    let tsocial = sscience + somark;

    let sanskrit = parseInt(document.getElementById('sanskrit').innerHTML);



    document.getElementById('tscience').innerHTML = tscience;
    document.getElementById('tsocial').innerHTML = tsocial;
    let total = hindi + math + tscience + tsocial + sanskrit;

    document.getElementById('total').innerHTML = total;
    let percent = parseFloat(total / 5);
    percent = Math.round(percent);
    document.getElementById('percent').innerHTML = percent + "%";
    if (percent >= 60) {
        document.getElementById('division').innerHTML = "First";
    } else if (percent >= 45) {
        document.getElementById('division').innerHTML = "Second";
    } else if (percent >= 33) {
        document.getElementById('division').innerHTML = "Third";
    } else {
        document.getElementById('division').innerHTML = "Poor";
    }
    if (percent >= 33) {
        document.getElementById('result').innerHTML = "<span style='color:green'>Passed</span>";
    } else {
        document.getElementById('result').innerHTML = "<span style='color:red'>Failed</span>";
    }
    </script>
    <?php
        ?>
    <script src="index.js"></script>
</body>

</html>