<!DOCTYPE html>
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
    <title>Quiz Results</title>
</head>
<body>
    <h1 align=center style="color:white">Quiz Results</h1>
    <?php
   include 'conn.php';
   error_reporting(0);
   $all_answers = $_POST['answer'];
   $correct_answers = $my_answers = array();
    $correctCount = 0;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $my_answers = $_POST['answer'];
        $all_questions= implode(',',$_POST['all_questions']);
        $query = "SELECT id,correct_answer FROM mytable WHERE id IN ($all_questions)";
        $result = $conn->query($query);

        while ($row = mysqli_fetch_assoc($result))
        {

            $correct_answers[$row['id']] = $row['correct_answer'];
            if(isset($all_answers[$row['id']]) && $all_answers[$row['id']]==$row['correct_answer'] )
            {
                $correctCount++;
            }
            
        }
     }
     else
     {
        header('location:test.php');
     }

    $r1 = mysqli_query($conn,'SELECT count(1) FROM mytable');
$r2 = mysqli_fetch_array($r1);

$total = count($_POST['all_questions']);
$percentage = ($correctCount / $total) * 100;
    echo '<h5 align=center style="color:white">Your score: ' . $correctCount . '/' . $total . '</h5>';
    //$cal=$correctCount/$total;
						//$ave=$cal*100;
                        //echo 'Percentage is =' . $ave . '%';
                        //echo '<h6 style="color:white">Percentage is = ' . number_format($percentage,2) . '%' . '</h6>';
                        if ($percentage < 40) {
                            echo '<h6 align=center style="color:white">Percentage is = <span style="color:#d98d80">' . number_format($percentage, 2) . '%' . '</span></h6>';
                            //echo '<img src="40.png" alt="Low Percentage Image" align="center" width="45">';
                        } elseif ($percentage >= 40 && $percentage < 80) {
                            echo '<h6 align=center style="color:white">Percentage is = <span style="color:#d98d80">' . number_format($percentage, 2) . '</span>%' . '</h6>';
                            //echo '<img src="60.png" alt="Medium Percentage Image" align="center" width="45">';
                        }
                        else {
                            echo '<h6 align=center style="color:white">Percentage is = <span style="color:#d98d80">' . number_format($percentage, 2) . '</span>%' . '</h6>';
                            //echo '<img src="80.png" alt="High Percentage Image" align="center" width="45">';
                        }
                        ?>
                        <div style="text-align: right;">
       <a href="home.php" class="btn btn-dark" name="home" value="Home" style="width: 8%;">Home</a>
    <a href="history.php" class="btn btn-dark" name="history" value="Check History" style="width: 13%;">Check History</a>     
    <a href="study.php" class="btn btn-dark" name="study" value="Study" style="width: 10%;">Study</a>
</div>
                        <div class="py-5 row justify-content-center" style="color:white">
                        <div class="col-lg-5" id = "st">
                       <?php $all_questions= implode(',',$_POST['all_questions']);
        $query = "SELECT id,question,option1,option2,option3,option4,correct_answer FROM mytable WHERE id IN ($all_questions)";
        $result = $conn->query($query);?>
                  
                          <?php $counter = 0; while ($row = mysqli_fetch_assoc($result)): $counter++; ?>
                          <input type="hidden" name="all_questions[]" value="<?php echo $row['id']; ?>">
                              <div class="qabox mb-5">
                            <h5 class="mb-3"><?php echo $counter.'. '.$row['question']; ?></h5 class="mb-3">
                            <div class="form-check mb-2  " <?php if(isset($correct_answers[$row['id']])){ if($correct_answers[$row['id']]==$row['option1']){ ?>  style="color:Chartreuse; font-weight: bold;" <?php } elseif ($my_answers[$row['id']] == $row['option1']) { echo 'style="color:#d98d80; font-weight: bold;"'; } } ?>><input class="form-check-input"   type="radio" <?php if(isset($my_answers[$row['id']])){ if($my_answers[$row['id']]==$row['option1']){ ?>  checked="" <?php } } ?> name="answer<?php echo $row['id']; ?>" value="<?php echo $row['option1']; ?>"><?php echo $row['option1']; ?></div>
                            
                            <div class="form-check mb-2" <?php if(isset($correct_answers[$row['id']])){ if($correct_answers[$row['id']]==$row['option2']){ ?>  style="color:Chartreuse; font-weight: bold;" <?php } elseif ($my_answers[$row['id']] == $row['option2']) { echo 'style="color:#d98d80; font-weight: bold;"'; } } ?>> <input class="form-check-input" type="radio" <?php if(isset($my_answers[$row['id']])){ if($my_answers[$row['id']]==$row['option2']){ ?>  checked="" <?php } } ?> name="answer<?php echo $row['id']; ?>" value="<?php echo $row['option2']; ?>"><?php echo $row['option2']; ?></div>
                            
                            <div class="form-check mb-2" <?php if(isset($correct_answers[$row['id']])){ if($correct_answers[$row['id']]==$row['option3']){ ?>  style="color:Chartreuse; font-weight: bold;" <?php } elseif ($my_answers[$row['id']] == $row['option3']) { echo 'style="color:#d98d80; font-weight: bold;"'; } } ?>><input class="form-check-input" type="radio" <?php if(isset($my_answers[$row['id']])){ if($my_answers[$row['id']]==$row['option3']){ ?>  checked="" <?php } } ?> name="answer<?php echo $row['id']; ?>" value="<?php echo $row['option3']; ?>"><?php echo $row['option3']; ?></div>
                            
                            <div class="form-check mb-2" <?php if(isset($correct_answers[$row['id']])){ if($correct_answers[$row['id']]==$row['option4']){ ?>  style="color:Chartreuse; font-weight: bold;" <?php } elseif ($my_answers[$row['id']] == $row['option4']) { echo 'style="color:#d98d80; font-weight: bold;"'; } } ?>><input class="form-check-input" type="radio" <?php if(isset($my_answers[$row['id']])){ if($my_answers[$row['id']]==$row['option4']){ ?>  checked="" <?php } } ?> name="answer<?php echo $row['id']; ?>" value="<?php echo $row['option4']; ?>"><?php echo $row['option4']; ?></div>
                           
                            <hr>
                          <?php endwhile;

?>
<script src="js/jquery-3.3.1.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
<a href="test.php" class="btn btn-dark">Back to Test</a></div>
</html>
<?php
include "conn.php";

function insertscore($total, $cal, $date, $correctCount) {
    global $conn;
    $query = "INSERT INTO score (`total_questions`, `total_correct_answers`, `total_score`, `date`) VALUES ('$total','$correctCount', '$cal', '$date')";
    $data = mysqli_query($conn, $query);
    
    if ($data) {
        echo "";
    }
}
date_default_timezone_set("Asia/Kolkata");
$date = date("Y-m-d H:i:s");
insertscore($total, $percentage, $date, $correctCount);
?>
