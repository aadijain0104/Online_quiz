<?php
include "conn.php";
$count = $_POST['count'];
$category_id =  $_POST['category_id'];
    if($category_id==0 || $category_id=='')
        {
            $query = mysqli_query($conn,"SELECT id, question, option1, option2, option3, option4 FROM mytable ORDER BY RAND() LIMIT $count");
        }
        else
        {
            $query = mysqli_query($conn,"SELECT id, question, option1, option2, option3, option4 FROM mytable WHERE category_id=$category_id ORDER BY RAND() LIMIT $count");
        }
    ?>
        <?php
        $counter = 0;
        while ($row = mysqli_fetch_assoc($query)):
            $counter++; 
    ?>
                    <input type="hidden" name="all_questions[]" value="<?php echo $row['id']; ?>">
    <div class="qabox mb-5">
        <h5 class="mb-3"><?php echo $counter.'. '.$row['question']; ?></h5>
        <div class="form-check mb-2"><input type="radio" class="form-check-input" name="answer[<?php echo $row['id']; ?>]" value="<?php echo $row['option1']; ?>"><?php echo $row['option1']; ?></div>
<div class="form-check mb-2"><input type="radio" class="form-check-input" name="answer[<?php echo $row['id']; ?>]" value="<?php echo $row['option2']; ?>"><?php echo $row['option2']; ?></div>
<div class="form-check mb-2"><input type="radio" class="form-check-input" name="answer[<?php echo $row['id']; ?>]" value="<?php echo $row['option3']; ?>"><?php echo $row['option3']; ?></div>
<div class="form-check mb-2"><input type="radio" class="form-check-input" name="answer[<?php echo $row['id']; ?>]" value="<?php echo $row['option4']; ?>"><?php echo $row['option4']; ?></div>
        <hr>
    </div>
    <?php endwhile; ?>
    <div>
        <button type="submit" class="btn btn-dark" name="submit">Submit</button>
