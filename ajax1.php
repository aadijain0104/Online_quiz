<?PHP
include "conn.php";
$count = $_POST['count'];
$category_id =  $_POST['category_id'];

if($category_id==0 || $category_id=='')
{
    $query = "SELECT id, question, correct_answer FROM mytable ORDER BY RAND() LIMIT $count";
}
else
{
    $query = "SELECT id, question, correct_answer FROM mytable WHERE category_id=$category_id ORDER BY RAND() LIMIT $count";
}      
        $result = mysqli_query($conn, $query);    
    ?>
        <?php $counter = 0;  while($row = mysqli_fetch_assoc($result)):  $counter++; ?>
            <div class="qabox mb-5">
          <h5 class="mb-3"><?php echo $counter.'. '.$row['question']; ?></h5 class="mb-3">
          <div>Ans: <?php echo $row['correct_answer']; ?></div>
          <hr>
          <?php endwhile; ?>