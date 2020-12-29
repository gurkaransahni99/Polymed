<?php 
    session_start(); 

    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header("location: login.php");
    }
    $username=$_SESSION['username'];

?>

<html>
<head>




<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>POLYMED_HOMEPAGE</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.0/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.0/css/jquery.dataTables_themeroller.css">


<link rel="stylesheet" href="style.css">

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"</script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

        <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>




<style type="text/css">
    
.text-container{
    margin:25px;
    padding:25px;
    background-color: #fff !important;
}
.text-border{
    border-right: 2px solid #999;
}
.header-container{
    margin-top:10px;
    margin-bottom: 10px;
    padding: 10px;
    background-color: #fff !important;
}


a{
    text-decoration: none !important;
}




table {
    width:90%;
    margin: auto;
    font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
    font-size: 12px;
}

h1 {
    margin: 25px auto 0;
    text-align: center;
    text-transform: uppercase;
    font-size: 17px;
}

table td {
    transition: all .5s;
}

/* Table */
.data-table {
    border-collapse: collapse;
    font-size: 14px;
    min-width: 537px;
}

.data-table th, 
.data-table td {
    border: 1px solid #e1edff;
    padding: 7px 17px;
}
.data-table caption {
    margin: 7px;
}

/* Table Header */
.data-table thead th {
    background-color: #008f97;
    color: #FFFFFF;
    border-color: #008f97 !important;
    text-transform: uppercase;
}

/* Table Body */
.data-table tbody td {
    color: #353535;
}
.data-table tbody td:first-child,
.data-table tbody td:nth-child(4),
.data-table tbody td:last-child {
    text-align: right;
}

.data-table tbody tr:nth-child(odd) td {
    background-color: #f4fbff;
}
.data-table tbody tr:hover td {
    background-color: #ffffa2;
    border-color: #ffff0f;
}

/* Table Footer */
.data-table tfoot th {
    background-color: #e5f5ff;
    text-align: right;
}
.data-table tfoot th:first-child {
    text-align: left;
}
.data-table tbody td:empty
{
    background-color: #ffcccc;
}

button{
    border: none;
    text-decoration: none;
    background-color: transparent;
}



@media screen and (max-width: 768px) {
    .text-border{
    border-right: 0px solid #999;
}
hr{
    display: none;
}
.col-md-1 {
    text-align: center;
    width: 50% !important;
}
}

*:focus {
outline: none !important;
}

.tab {
    overflow: hidden;
    background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of buttons on hover */

/* Create an active/current tablink class */

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border-top: none;
}
.col-xs-1 {
    width: 12.5%;
}


</style>


<script type="text/javascript">
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
    var comments= $("#comments").val()
    var date= $("#date").val();

   

    $.ajax({
        type:'POST',
        url:'form_reload.php',
        data: "account="+account+"&product="+product+"&person_linked="+person_linked+"&person_profile="+person_profile+"&stage="+stage+"&calendar_activity="+calendar_activity+"&comments="+comments+"&date="+date,
        success:function(html){
            $('#abc').html(html);



        }
    });

});
})  ;
});


</script>

</head>
<body>


<div class="wrapper">
    <nav id="sidebar">
        <div id="dismiss">
            <i class="glyphicon glyphicon-arrow-left"></i>
        </div>

        <ul class="list-unstyled components">
            <p><br></p>
            <li class="active">
            <a class="text-center" href="index_polymed.php" >Dashboard</a>
            </li>
            <li>
            <a class="text-center" href="index.php">Daily Updates</a>
            </li>
        </ul>

    </nav>

    <div id="content">

    <div class="header-container">
           <!-- logged in user information -->
        <?php  if (isset($_SESSION['username'])) : ?>
            <div style="padding:0px;text-align: right">Welcome <strong><?php echo $_SESSION['username']; ?></strong>&nbsp;&nbsp;&nbsp;|<a href="index_polymed.php?logout='1'" style="color: red;">&nbsp;&nbsp;&nbsp;logout</a> </div>
        <?php endif ?>  
    </div>

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                    <i class="glyphicon glyphicon-menu-hamburger "></i>
                </button>
            </div>

        </div>
    </nav>






<div id="abc" class="container">
<br>
<br>
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
        <input type="text" class="form-control" id="comments" placeholder="Enter comments" name="comments" required>
      </div>
    </div>    

        <div class="form-group">
      <label class="control-label col-sm-2">Date:</label>
      <div class="col-sm-10">          
        <input type="date" class="form-control" id="date" placeholder="Enter Date" name="date" required>
      </div>
    </div>


    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button id="submit" type="submit" class="btn btn-default" onclick="pass()">Submit</button>
      </div>
    </div>
  </form>
</div>

<script>
$('#dataTable').dataTable( {
  "lengthMenu": [ 3, 10, 50, 75, 100 ]
} ); 

</script>
<script type="text/javascript">
$(document).ready(function () {
    $("#sidebar").mCustomScrollbar({
        theme: "minimal"
    });

    $('#dismiss, .overlay').on('click', function () {
        $('#sidebar').removeClass('active');
        $('.overlay').fadeOut();
    });

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').addClass('active');
        $('.overlay').fadeIn();
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });
});

</script>

</body>

  </html>