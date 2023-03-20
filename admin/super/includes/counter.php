
<?php include('../../../db_Connect.php');
    
    $sq = "SELECT COUNT(DISTINCT d.DID) as num
                FROM doc d
                LEFT JOIN member m
                    ON d.MID = m.MID
                WHERE d.state = '1'
                GROUP BY d.date_reported,d.time_reported"; 
    $pgs = mysqli_fetch_array(mysqli_query($conn,$sq));
    $count = $pgs['num'];
    if($count <= 0){echo '';}else {echo $count;}
    ?>

