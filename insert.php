<?php
include("conn.php");
$query = "INSERT INTO mytable VALUES ('10','10. The principle of diminishing marginal utility suggests that:','The more a good is consumed, the higher its marginal utility becomes','The less a good is consumed, the higher its marginal utility becomes','The more a good is consumed, the lower its marginal utility becomes', 'The less a good is consumed, the lower its marginal utility becomes','The more a good is consumed, the lower its marginal utility becomes')";

$data = mysqli_query($conn, $query);

if($data)
{
    echo "Data inserted into Database";
}

?>