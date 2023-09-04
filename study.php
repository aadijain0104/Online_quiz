<?php
    include("conn.php");
    $total_questions = 10;
    $category_id = 0;
    if(isset($_GET['category_id']))
    {
        $category_id = $_GET['category_id'];
    }

    if(isset($_GET['total_questions']))
    {
        $total_questions = $_GET['total_questions'];
    }
?>
<!DOCTYPE html>
<html>
<head>
    <style>
    body{
    margin: 0;
    padding: 0;
    background-image: url('test.jpg');
    background-size: cover;
    background-repeat: no-repeat; 
        }
        </style>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title >Quiz</title>
    <h1 align=center style="color:white">Welcome to Study</h1>
    <select class="btn btn-dark" id = "opt">
    <option value="">Select</option>
    <option value="5">5 Question</option>
    <option value="10">10 Question</option>
    <option value="15">15 Question</option>
    <option value="20">20 Question</option>
</div></select>
</head>
<body>


<?php
if($category_id==0 || $category_id=='')
{
    $category_id = 0;
    $query = "SELECT id, question, correct_answer FROM mytable ORDER BY RAND() LIMIT $total_questions";
}
else
{
    $query = "SELECT id, question, correct_answer FROM mytable WHERE category_id=$category_id ORDER BY RAND() LIMIT $total_questions";
}
       
        $result = mysqli_query($conn, $query);    
    ?>

    
    <div style="text-align: right;" >
    <a href="home.php" class="btn btn-dark" name="home" value="Home" style="width: 11%;">Home</a>
  <a href="test.php" class="btn btn-dark" name="test" value="Test" style="width: 11%;">Test</a>
</div>
    <div class="container" style="color:white">
    <div class="py-5 row justify-content-center">
      <div class="col-lg-5" id = "sa">

        <?php $counter = 0;  while ($row = mysqli_fetch_assoc($result)):  $counter++; ?>
            <div class="qabox mb-5">
          <h5 class="mb-3"><?php echo $counter.'. '.$row['question']; ?></h5 class="mb-3">
          <div>Ans: <?php echo $row['correct_answer']; ?></div>
          <hr>
          <?php endwhile; ?>
    
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
    <div style="text-align: right;">
</body>
<script>
    $(document).ready(function(){
$("#opt").on('change',function(){
  var count = $(this).val();
  var category_id = <?php echo $category_id; ?>;
  if(count=='')
    {
        alert('Please select no of questions');
        return false;
    }
    $.ajax({
        method:"POST",
        url:"ajax1.php",
        data:{count:count,category_id:category_id},
        dataType:"html",
        success:function(data){
            $("#sa").html(data);
        }
    })
});
});
</script>
</html>