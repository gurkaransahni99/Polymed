<?php
    session_start();
    include 'dbConfig.php';
    $username=$_SESSION['username'];
    $query="SELECT agent_id FROM master_individuals where agent_name='$username' ";
    $queryResult=$db->query($query);
    if($queryResult->num_rows>0){ 
        while ($row=$queryResult->fetch_assoc()) {
            $agent_id=$row['agent_id'];
        }
    }
    ?>

<html>

<head>

<title>POLYMED</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">   
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<script type="text/javascript">

function myFunction() {

    var account= "<?php echo $_POST['account'] ?>";
    document.getElementById("account").value =  account;

  
    var product= "<?php echo $_POST['product'] ?>";
    document.getElementById("product").value =  product;

    var person_linked= "<?php echo $_POST['person_linked'] ?>";
    document.getElementById("person_linked").value =  person_linked;

    var person_profile= "<?php echo $_POST['person_profile'] ?>";
    document.getElementById("person_profile").value =  person_profile;

    var stage= "<?php echo $_POST['stage'] ?>";
    document.getElementById("stage").value =  stage;

    var calendar_activity= "<?php echo $_POST['calendar_activity'] ?>";
    document.getElementById("calendar_activity").value =  calendar_activity;

    var date= "<?php echo $_POST['date'] ?>";
    document.getElementById("date").value =  date;

    var comments= "<?php echo $_POST['comments'] ?>";
    document.getElementById("comments").value =  comments;

    if(document.getElementById("account").value == null){
    var accountID = $(this).val();
        if(accountID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'account_id='+accountID,
                success:function(html){
                    $('#product').html(html);
                }
            }); 
        }else{        
            $('#product').html('<option value="">Select account first</option>');
            }
  }

}

function editData(){
    $.ajax({
        type:'POST',
        url:'edit_records.php',
        success:function(html){
            $("#abc").html(html);
        }
    })
}

$(document).ready(function(){

    $('#account').on('change',function(){
        var accountID = $(this).val();
        if(accountID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'account_id='+accountID,
                success:function(html){
                    $('#product').html(html);
                }
            }); 
        }else{        
            $('#product').html('<option value="">Select account first</option>');
            }
    });




$('#product').on('change',function(){
        var productID = $(this).val();
        if(productID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'product_id='+productID,
                success:function(html){
                    $('#stage').html(html);
                }
            }); 
        }else{
            $('#stage').html('<option value="">Select Product first</option>'); 
        }
    });

$(function () { 
    $('#submit').bind('click', function (event) {

    event.preventDefault();// using this page stop being refreshing 

    var account= $("#account").val();
    var product= $("#product").val();
    var person_linked = $("#person_linked").val();
    var person_profile = $("#person_profile").val();
    var stage = $("#stage").val();
    var calendar_activity = $("#calendar_activity").val();
    var date= $("#date").val();
    var comments= $("#comments").val()

    $.ajax({
        type:'POST',
        url:'form_reload.php',
        data: "account="+account+"&product="+product+"&person_linked="+person_linked+"&person_profile="+person_profile+"&stage="+stage+"&calendar_activity="+calendar_activity+"&date="+date+"&comments="+comments,
        success:function(html){
            $('#abc').html(html);



        }
    });

});
});
});

</script>

</head>
<body>

<?php
$servername = "localhost";
$username = "lol";
$password = "karan1122";
$dbname = "polymed";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$account = $_POST['account'];
$product = $_POST['product'];
$person_linked = $_POST['person_linked'];
$person_profile = $_POST['person_profile'];
$stage = $_POST['stage'];
$calendar_activity = $_POST['calendar_activity'];
$comments = $_POST['comments'];
$date = $_POST['date'];
$now=date('Y-m-d');


$query=mysqli_query($conn,"SELECT account_name from master_hospital where account_id='$account'");
while ($row = mysqli_fetch_array($query)){
    $account_name=$row['account_name'];
}

$query0=mysqli_query($conn,"SELECT product_name from master_product where product_id='$product'");
while ($row0 = mysqli_fetch_array($query0)){
    $product_name=$row0['product_name'];
}

$query1="SELECT product_id_start_date from daily_updates_prototype where product_id='$product' and account_id='$account'";
$result=$conn->query($query1);
while ($row1 = $result->fetch_assoc()){
    $product_id_start_date=$row1['product_id_start_date'];
    break;
}

$query2=mysqli_query($conn,"SELECT stage_name from master_sales_funnel where stage_id='$stage'");
while ($row2 = mysqli_fetch_array($query2)){
    $stage_name=$row2['stage_name'];
}

$uname=$_SESSION['username'];

$sql = "INSERT INTO daily_updates_prototype (s_no, agent, agent_id, account, account_id, product, product_id, product_id_start_date, person_linked, person_profile, stage, stage_id, meeting_date, comments, calendar_activity, date) VALUES ('NULL', '$uname', '$agent_id', '$account_name', '$account', '$product_name', '$product', '$product_id_start_date', '$person_linked','$person_profile', '$stage_name', '$stage','$now', '$comments', '$calendar_activity','$date')";
mysqli_query($conn,$sql);

?>



<div id="abc" class="container">
<br>
<br>

<button onclick="myFunction()">Copy data from last form</button>

 <form class="form-horizontal" method="POST" >

    <div class="form-group">
      <label class="control-label col-sm-2">Select Account:</label>
      <div class="col-sm-10">
        <?php
        //Include the database configuration file
        include 'dbConfig.php';

        $query = $db->query("SELECT * FROM master_hospital WHERE status = 1 ORDER BY account_name ASC");

        //Count total number of rows
        $rowCount = $query->num_rows;
        ?>

        <select id="account">
            <option class="form-control" value="">Select Account</option>
            <?php

            if($rowCount > 0){
                while($row = $query->fetch_assoc()){ 
                    echo '<option value="'.$row['account_id'].'">'.$row['account_name'].'</option>';
                }
            }else{
                echo '<option value="">Account not available</option>';
            }
            ?>

        </select>
      </div>
    </div>


    <div class="form-group">
      <label class="control-label col-sm-2">Select Product:</label>
      <div class="col-sm-10">
        <select id="product">
            <option value="">Select Account first</option>
        </select>
      </div>  
    </div>


<div class="form-group">
      <label class="control-label col-sm-2">Person Linked: </label>
      <div class="col-sm-10">
      <?php

            include 'dbConfig.php';
            $query0=mysqli_query($db,"SELECT DISTINCT person_linked from daily_updates_prototype");
            $rowCount = $query0->num_rows;

      ?>
        <select id='person_linked'>            
        <option class="form-control" value="">Select Person</option>
            <?php

            if($rowCount > 0){
                while($row = $query0->fetch_assoc()){ 

                    echo '<option value="'.$row['person_linked'].'">'.$row['person_linked'].'</option>';
                }
            }else{
                echo '<option value="">Person not available</option>';
            }
            ?>
        </select>
      </div>
    </div>


<div class="form-group">
      <label class="control-label col-sm-2">Person Profile:</label>
      <div class="col-sm-10">
      <?php

            include 'dbConfig.php';
            $query0=mysqli_query($db,"SELECT DISTINCT person_profile from daily_updates_prototype");
            $rowCount = $query0->num_rows;

      ?>
        <select id='person_profile' >            
        <option class="form-control" value="">Select Profile</option>
            <?php

            if($rowCount > 0){
                while($row = $query0->fetch_assoc()){ 

                    echo '<option value="'.$row['person_profile'].'">'.$row['person_profile'].'</option>';
                }
            }else{
                echo '<option value="">Profile not available</option>';
            }
            ?>
        </select>
      </div>
    </div>







<!--     <div class="form-group">
      <label class="control-label col-sm-2">Person Linked:</label>
      <div class="col-sm-10">
        <input type="text" id="person_linked" class="form-control" placeholder="Enter person name" name="person_linked">
      </div>
    </div>
    

    <div class="form-group">
      <label class="control-label col-sm-2">Person Profile:</label>
      <div class="col-sm-10">          
        <input type="text" id="person_profile" class="form-control" placeholder="Enter profile" name="person_profile">
      </div>
    </div>
 -->
    <div class="form-group">
      <label class="control-label col-sm-2">Current Stage:</label>
      <div class="col-sm-10">          
      <select id="stage">
            <option value="">Select Product first</option>
      </select>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2">Calendar Activity:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="calendar_activity" placeholder="Enter Activity" name="calendar_activity">
      </div>
    </div>


    <div class="form-group">
      <label class="control-label col-sm-2">Additional Comments:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="comments" placeholder="Enter comments" name="comments">
      </div>
    </div>    

        <div class="form-group">
      <label class="control-label col-sm-2">Date:</label>
      <div class="col-sm-10">          
        <input type="date" class="form-control" id="date" placeholder="Enter Date" name="date">
      </div>
    </div>


    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button id="submit" type="submit" class="btn btn-default" onclick="pass()">Submit</button>
      </div>
    </div>
  </form>

<button onclick="editData()">Edit today's data</button>

</div>

</body>
</html>