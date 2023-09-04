<html>
    <head>
    <style>
    body{
    margin: 0;
    padding: 0;
    background-image: url("test.jpg");
    background-size: cover;
    background-repeat: no-repeat;
    }
        </style>
    <link href="css/bootstrap.min.css" rel="stylesheet">
        <title>Histoy of Tests</title>
    </head>
</html>
<?php
include("conn.php");
//error_reporting(0);
$query = "SELECT * FROM score";
$data = mysqli_query($conn,$query);
$total = mysqli_num_rows($data);
//echo $total;
if($total > 0){
    ?>
    <h2 align=center style="color:white">History Of All Tests</h2>
    <center style="color:white"><table border="2px" cellspacing="7" width="100%">
        <tr>
        <th width="3%" style="color:white">Id</th>
        <th width="3%" style="color:white">Total Questions</th>
        <th width="6%" style="color:white">Total Correct Answers</th>
        <th width="6%" style="color:white">Total Score</th>
        <th width="6%" style="color:white">Date</th>
        </tr>
    <?php
    while($result = mysqli_fetch_assoc($data)){
        echo "<tr style='color:white'>
        <td>". "$result[id]" ."</td>
        <td>". "$result[total_questions]" ."</td>
        <td>". "$result[total_correct_answers]" ."</td>
        <td>". "$result[total_score]"."% " ."</td>
        <td>". "$result[date]" ."</td>
        </tr>";
    }
}
else{
    echo "Not Record Found";
}
?>
    </table>
</center>
<body>
<script src="js/jquery-3.3.1.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
<div style="text-align: center;">
  <a href="test.php" class="btn btn-dark" name="test" value="Test" style="width: 25%;">Test</a>
</div>