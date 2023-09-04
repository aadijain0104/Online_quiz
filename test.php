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

    if(isset($_GET['submit']))
    {
        if($_GET['submit']=='Study')
        {
            header('location:study.php?category_id='.$category_id.'&total_questions='.$total_questions);
        }
    }
?>
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
    <title>Quiz</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <h1 align=center style="color:white">Welcome to Test</h1>
</head>
<body>
    <div class="container" style="color:white">
        <div class="row justify-content-center">
        <?php
        if($category_id==0 || $category_id=='')
        {
            $category_id = 0;
            $query = "SELECT id, question, option1, option2, option3, option4 FROM mytable ORDER BY RAND() LIMIT $total_questions";
        }
        else
        {
            $query = "SELECT id, question, option1, option2, option3, option4 FROM mytable WHERE category_id=$category_id ORDER BY RAND() LIMIT $total_questions";
        }
       
        $result = mysqli_query($conn, $query);    
    ?>

                <form method="post" action="submit.php">
                    <div style="text-align: left;" name="select" style="width: 20%;">
        <select class="btn btn-dark" id="opt">
        <option value="">Select</option>
        <option value="5">5 questions</option>
        <option value="10">10 questions</option>
        <option value="15">15 questions</option>
        <option value="20">20 questions</option></div></select>
       <div style="text-align: right;">
       <a href="home.php" class="btn btn-dark" name="home" value="Home" style="width: 8%;">Home</a>
    <a href="history.php" class="btn btn-dark" name="history" value="Check History" style="width: 13%;">Check History</a>     
    <a href="study.php" class="btn btn-dark" name="study" value="Study" style="width: 10%;">Study</a>
</div>
<!--another method of button
    <input type="submit" name="study" value="Study">-->
    <div class="py-5 row justify-content-center">
      <div class="col-lg-5" id="st">
                    <?php
                        $counter =0;
                        while ($row = mysqli_fetch_assoc($result)):
                            $counter++;
                    ?>

                    <input type="hidden" name="all_questions[]" value="<?php echo $row['id']; ?>">
                    <div class="qabox mb-5">
                        <h5 class="mb-3"><?php echo $counter.'. '.$row['question']; ?></h5>
          <div class="form-check mb-2"><input type="radio" class="form-check-input" name="answer[<?php echo $row['id']; ?>]" value="<?php echo $row['option1']; ?>"> <?php echo $row['option1']; ?></div>
          <div class="form-check mb-2"><input type="radio" class="form-check-input" name="answer[<?php echo $row['id']; ?>]" value="<?php echo $row['option2']; ?>"><?php echo $row['option2']; ?></div>
          <div class="form-check mb-2"><input type="radio" class="form-check-input" name="answer[<?php echo $row['id']; ?>]" value="<?php echo $row['option3']; ?>"><?php echo $row['option3']; ?></div>
          <div class="form-check mb-2"><input type="radio" class="form-check-input" name="answer[<?php echo $row['id']; ?>]" value="<?php echo $row['option4']; ?>"><?php echo $row['option4']; ?></div>
                        <hr>
                    </div>
                    <?php endwhile; ?>
                </form>
                <div>
                <button type="submit" class="btn btn-dark" name="submit">Submit</button>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <?php
    if (isset($_POST["check"]))
    {

    }
    ?>
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
        url:"ajax.php",
        data:{count:count,category_id:category_id},
        dataType:"html",
        success:function(data){
            $("#st").html(data);
        }
    })
});
});
</script>
</html>