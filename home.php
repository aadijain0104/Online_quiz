<?php
include("conn.php");
/*if(isset($_POST["Study"]))
    {
        header('Location:study.php');
    }
    if(isset($_POST["Test"]))
    {
        header('Location:test.php');
    }*/
?>
<!doctype html>
<html lang="en">

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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="css/bootstrap.min.css" rel="stylesheet">


    <title>Quiz</title>
    <h1 align=center style="color:white">Quiz Test and Study Material</h1>
</head>
<body>
    <div class="container" style="color:white">
    <form action="test.php" method="GET" enctype="multipart/form-data">
        <div class="title">
        </div><br>
        <div class="form-group">
            <label for="category-dropdown">Exam Category</label>
            <select class="form-control" id="category-dropdown" name="category_id">
                <option value="">All</option>
                <?php 
                $result = mysqli_query($conn, "SELECT * FROM category where status = 1 ");
                while ($row = mysqli_fetch_array($result)){
                    ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                    <?php
                }
                ?>
                </select>
                </div><br>
                <div class="input_field">
                <label for="category-dropdown">Select no. of questions</label>
                <select class="form-control" name="total_questions" id = "opt" required>
    <option value="" required>Select</option>
    <option value="5">5 Question</option>
    <option value="10">10 Question</option>
    <option value="15">15 Question</option>
    <option value="20">20 Question</option>
</div></select>    
            </div><br>
            
        <div class="input_field">
                <input type="submit" value="Test" name="submit" class="btn btn-dark"> <input type="submit" value="Study" name="submit" class="btn btn-dark"> 
            </div>
                </body>
                
</html>    
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
