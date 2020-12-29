<?php
include 'dbConfig.php';

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
#aaa{
	display: none;
}

</style>




</head>



<body id='abc'>


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

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#recent" style="color:#008f97"><b>RECENT</b></a></li>
                <li><a href="#calendar" style="color:#008f97"><b>CALENDAR</b></a></li>   
            </ul>
            </div>
        </div>
    </nav>








<?php
$s_no=$_GET['s_no'];
$query=mysqli_query($db,"SELECT * from daily_updates_prototype where s_no=$s_no");
while ($row = mysqli_fetch_array($query)){
    $account=$row['account'];
    $product=$row['product'];
    $person_linked=$row['person_linked'];
    $person_profile=$row['person_profile'];
    $stage=$row['stage_id'];
    $calendar_activity=$row['calendar_activity'];
    $comments=$row['comments'];
    $date=$row['date'];
    $date1="1999-01-21";
}
?>

<form class="form-horizontal" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2">Select Account:</label>
      <div class="col-sm-10">
        <?php
        $query = $db->query("SELECT * FROM master_hospital WHERE status = 1 ORDER BY account_name ASC");

        //Count total number of rows
        $rowCount = $query->num_rows;
        ?>

        <select id="account">
            <option class="form-control" value="<?php echo $account ?>"><?php echo $account ?></option>
            <?php

            if($rowCount > 0){
                while($row = $query->fetch_assoc()){ 
                    echo '<option value="'.$row['account_name'].'">'.$row['account_name'].'</option>';
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
            <option class="form-control" value="<?php echo $product ?>"><?php echo $product ?></option>
            <?php
            $query = $db->query("SELECT * FROM master_product ORDER BY product_name ASC");

            //Count total number of rows
            $rowCount = $query->num_rows;
        
            if($rowCount > 0){
                while($row = $query->fetch_assoc()){ 
                    echo '<option value="'.$row['product'].'">'.$row['product_name'].'</option>';
                }
            }else{
                echo '<option value="">Product not available</option>';
            }
            ?>
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
        <option class="form-control" value="<?php echo $person_linked ?>"><?php echo $person_linked ?></option>
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
        <option class="form-control" value="<?php echo $person_profile ?>"><?php echo $person_profile ?></option>
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


    <div class="form-group">
      <label class="control-label col-sm-2">Current Stage:</label>
      <div class="col-sm-10">          
      <?php

            include 'dbConfig.php';
            $query0=mysqli_query($db,"SELECT stage_id from master_sales_funnel");
            $rowCount = $query0->num_rows;

      ?>
        <select id='stage'>            
        <option class="form-control" value="<?php echo $stage ?>"><?php echo $stage ?></option>
            <?php
            if($rowCount > 0){
                while($row = $query0->fetch_assoc()){ 

                    echo '<option value="'.$row['stage_id'].'">'.$row['stage_id'].'</option>';
                }
            }else{
                echo '<option value="">Stage not available</option>';
            }
            ?>
        </select>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2">Calendar Activity:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="calendar_activity" placeholder="Enter Activity" name="calendar_activity" value="<?php echo $calendar_activity?>">
      </div>
    </div>


    <div class="form-group">
      <label class="control-label col-sm-2">Additional Comments:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="comments" placeholder="Enter comments" name="comments1" value="<?php echo $comments ?>">
      </div>
    </div>    

        <div class="form-group">
      <label class="control-label col-sm-2">Date:</label>
      <div class="col-sm-10">          
        <input type="date" class="form-control" id="date" placeholder="Enter Date" name='date' value="<?php echo $date1 ?>">
      </div>
    </div>


    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button id="submit" type="submit" class="btn btn-default">UPDATE</button>
      </div>
    </div>
  </form>

    
<script type="text/javascript">
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
    var s_no=<?php echo $s_no?>;
   
    $.ajax({
        type:'POST',
        url:'edit_records_page_update.php',
        data: "account="+account+"&product="+product+"&person_linked="+person_linked+"&person_profile="+person_profile+"&stage="+stage+"&calendar_activity="+calendar_activity+"&date="+date+"&comments="+comments+"&s_no="+s_no,
        success:function(html){
            $('#abc').html(html);
        }
    });

});
});
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