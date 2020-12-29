<html>
<body>
<?php

include 'dbConfig.php';
$account= $_POST['account'];
$product= $_POST['product'];
$stage= $_POST['stage'];
$person_linked= $_POST['person_linked'];
$person_profile= $_POST['person_profile'];
$date= $_POST['date'];
$comments= $_POST['comments'];
$calendar_activity= $_POST['calendar_activity'];
$s_no=$_POST['s_no'];

$query0=mysqli_query($db,"SELECT account_id from master_hospital where account_name='$account'");
while($row = $query0->fetch_assoc()){ 
	$account_id=$row['account_id'];
}

$query1=mysqli_query($db,"SELECT product_id from master_product where product_name='$product'");
while($row = $query1->fetch_assoc()){ 
	$product_id=$row['product_id'];
}

$query2=mysqli_query($db,"SELECT stage_name from master_sales_funnel where stage_id='$stage'");
while($row = $query2->fetch_assoc()){ 
	$stage_name=$row['stage_name'];
}

$query=mysqli_query($db,"UPDATE daily_updates_prototype set account='$account' , account_id='$account_id', product='$product', product_id='$product_id', person_linked='$person_linked', person_profile='$person_profile', stage='$stage_name', stage_id='$stage', comments='$comments', calendar_activity='$calendar_activity', date='$date'  where s_no=$s_no");
if ($query){
	echo "SUCCESSFUL!!!";
}

?>
<script>
setTimeout(function () {
   window.location.href= 'index_polymed.php'; // the redirect goes here

},2000); // 5 seconds
</script>
</body>
</html>