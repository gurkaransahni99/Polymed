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


<?php
//Database credentials
$dbHost     = 'localhost';
$dbUsername = 'lol';
$dbPassword = 'karan1122';
$dbName     = 'polymed';     

//Connect and select the database
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

 
$query0 = mysqli_query($conn,'SELECT * from master_hospital, daily_updates where master_hospital.account_id=daily_updates.Account_ID');
$query1 = mysqli_query($conn, 'SELECT * FROM daily_updates');
$query2 = mysqli_query($conn, 'SELECT * FROM master_product');
$query3 = mysqli_query($conn,'SELECT product_name from master_product, daily_updates where master_product.product_id=daily_updates.product_ID');
$query4 = mysqli_query($conn,"SELECT * from daily_updates where stage='2'");

?>


        






<!DOCTYPE html>
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

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#recent" style="color:#008f97"><b>RECENT</b></a></li>
                <li><a href="#calendar" style="color:#008f97"><b>CALENDAR</b></a></li>   
            </ul>
            </div>
        </div>
    </nav>



<!-- Extensive logic -->



<!-- 

            <?php
                $query="SELECT count(DISTINCT account_id,product_id) from daily_updates where agent_id in(SELECT id FROM login where username='$username')";
                $queryResult=$conn->query($query);
            if($queryResult->num_rows>0){ 
                while ($row=$queryResult->fetch_assoc()) {
                $total_account=$row['count(DISTINCT account_id,product_id)'];
            }
            }
            ?>    
            <?php

            $query1="CREATE table t1 as select * from (select * from daily_updates where (stage = 1 OR stage = 2) order by account_id,product_id, stage, date ) x group by account_id,product_id,stage";
            $queryResult=$conn->query($query1);

            $query2="CREATE table t2 as select * from (select * from daily_updates where (stage = 1 OR stage = 3) order by account_id,product_id, stage, date ) x group by account_id,product_id,stage";
            $queryResult=$conn->query($query2);
            
            $query3="CREATE table t3 as select * from (select * from daily_updates where (stage = 1 OR stage = 4) order by account_id,product_id, stage, date ) x group by account_id,product_id,stage";
            $queryResult=$conn->query($query3);

            $query4="CREATE table t4 as select * from (select * from daily_updates where (stage = 1 OR stage = 5) order by account_id,product_id, stage, date ) x group by account_id,product_id,stage";
            $queryResult=$conn->query($query4);

            $query5="CREATE table t5 as select * from (select * from daily_updates where (stage = 1 OR stage = 6) order by account_id,product_id, stage, date ) x group by account_id,product_id,stage";
            $queryResult=$conn->query($query5);

            $query6="CREATE table t6 as select * from (select * from daily_updates where (stage = 1 OR stage = 7) order by account_id,product_id, stage, date ) x group by account_id,product_id,stage";
            $queryResult=$conn->query($query6);

            $query7="CREATE table t7 as select * from (select * from daily_updates where (stage = 1 OR stage = 8) order by account_id,product_id, stage, date ) x group by account_id,product_id,stage";
            $queryResult=$conn->query($query7);
            

            $query1_1="SELECT b.date from t1 b ,t1 a where b.account_id=a.account_id and b.product_id=a.product_id and a.stage=2";
            $result1=$conn->query($query1_1);
            $items1=array();
            $index=0;
            while($row = $result1->fetch_assoc()) {
                $items1[$index]=$row['date'];                                      
                $index+=1;  
            }

            $query2_1="SELECT b.date from t2 b ,t2 a where b.account_id=a.account_id and b.product_id=a.product_id and a.stage=3";
            $result2=$conn->query($query2_1);
            $items2=array();
            $index=0;
            while($row = $result2->fetch_assoc()) {
                $items2[$index]=$row['date'];                                      
                $index+=1;  
            }

            $query3_1="SELECT b.date from t3 b ,t3 a where b.account_id=a.account_id and b.product_id=a.product_id and a.stage=4";
            $result3=$conn->query($query3_1);
            $items3=array();
            $index=0;
            while($row = $result3->fetch_assoc()) {
                $items3[$index]=$row['date'];                                      
                $index+=1;  
            }

            $query4_1="SELECT b.date from t4 b ,t4 a where b.account_id=a.account_id and b.product_id=a.product_id and a.stage=5";
            $result4=$conn->query($query4_1);
            $items4=array();
            $index=0;
            while($row = $result4->fetch_assoc()) {
                $items4[$index]=$row['date'];                                      
                $index+=1;  
            }
            $query5_1="SELECT b.date from t5 b ,t5 a where b.account_id=a.account_id and b.product_id=a.product_id and a.stage=6";
            $result5=$conn->query($query5_1);
            $items5=array();
            $index=0;
            while($row = $result5->fetch_assoc()) {
                $items5[$index]=$row['date'];                                      
                $index+=1;  
            }

            $query6_1="SELECT b.date from t6 b ,t6 a where b.account_id=a.account_id and b.product_id=a.product_id and a.stage=7";
            $result6=$conn->query($query6_1);
            $items6=array();
            $index=0;
            while($row = $result6->fetch_assoc()) {
                $items6[$index]=$row['date'];                                      
                $index+=1;  
            }

            $query7_1="SELECT b.date from t7 b ,t7 a where b.account_id=a.account_id and b.product_id=a.product_id and a.stage=8";
            $result7=$conn->query($query7_1);
            $items7=array();
            $index=0;
            while($row = $result7->fetch_assoc()) {
                $items7[$index]=$row['date'];                                      
                $index+=1;  
            }


            $index_1=0;
            $items1_1=array();
            $items2_1=array();
            $items3_1=array();              
            $items4_1=array();
            $items5_1=array();
            $items6_1=array();
            $items7_1=array();
            $items8_1=array();

            $index=1;
            $avg1=0;
            for($index;$index<count($items1);$index=$index+2){
                $avg1=$avg1+round(abs(strtotime($items1[$index])-strtotime($items1[$index-1]))/(60*60*24));
                $items1_1[$index_1]=round(abs(strtotime($items1[$index])-strtotime($items1[$index-1]))/(60*60*24));
                $index_1+=1;
            }
            $avg1/=count($items1)/2;

            $index_1=0;
            $index=1;
            $avg2=0;
            for($index;$index<count($items2);$index=$index+2){
                $avg2=$avg2+round(abs(strtotime($items2[$index])-strtotime($items2[$index-1]))/(60*60*24));
                $items2_1[$index_1]=round(abs(strtotime($items2[$index])-strtotime($items2[$index-1]))/(60*60*24));
                $index_1+=1;            
            }
            $avg2/=count($items2)/2;

            $index_1=0;
            $index=1;
            $avg3=0;
            for($index;$index<count($items3);$index=$index+2){
                $avg3=$avg3+round(abs(strtotime($items3[$index])-strtotime($items3[$index-1]))/(60*60*24));    
                $items3_1[$index_1]=round(abs(strtotime($items3[$index])-strtotime($items3[$index-1]))/(60*60*24));
                $index_1+=1;        
            }
            $avg3/=count($items3)/2;

            $index_1=0;
            $index=1;
            $avg4=0;
            for($index;$index<count($items4);$index=$index+2){
                $avg4=$avg4+round(abs(strtotime($items4[$index])-strtotime($items4[$index-1]))/(60*60*24));
                $items4_1[$index_1]=round(abs(strtotime($items4[$index])-strtotime($items4[$index-1]))/(60*60*24));
                $index_1+=1;
            }
            $avg4/=count($items4)/2;

            $index_1=0;
            $index=1;
            $avg5=0;
            for($index;$index<count($items5);$index=$index+2){
                $avg5=$avg5+round(abs(strtotime($items5[$index])-strtotime($items5[$index-1]))/(60*60*24));            
                $items5_1[$index_1]=round(abs(strtotime($items5[$index])-strtotime($items5[$index-1]))/(60*60*24));
                $index_1+=1;
            }
            $avg5/=count($items5)/2;

            $index_1=0;
            $index=1;
            $avg6=0;
            for($index;$index<count($items6);$index=$index+2){
                $avg6=$avg6+round(abs(strtotime($items6[$index])-strtotime($items6[$index-1]))/(60*60*24));
                $items6_1[$index_1]=round(abs(strtotime($items6[$index])-strtotime($items6[$index-1]))/(60*60*24));
                $index_1+=1;            
            }
            $avg6/=count($items6)/2;

            $index_1=0;
            $index=1;
            $avg7=0;
            for($index;$index<count($items7);$index=$index+2){
                $avg7=$avg7+round(abs(strtotime($items7[$index])-strtotime($items7[$index-1]))/(60*60*24));
                $items7_1[$index_1]=round(abs(strtotime($items7[$index])-strtotime($items7[$index-1]))/(60*60*24));
                $index_1+=1;
            }
            $avg7/=count($items7)/2;
                

            $index=0;
            $standard_deviation_1=0;
            for($index;$index<count($items1_1);$index++){
                $standard_deviation_1+=pow($items1_1[$index]-$avg1,2);
            }
            $standard_deviation_1=pow($standard_deviation_1/count($items1_1),0.5);

            $index=0;
            $standard_deviation_2=0;
            for($index;$index<count($items2_1);$index++){
                $standard_deviation_2+=pow($items2_1[$index]-$avg2,2);
            }
            $standard_deviation_2=pow($standard_deviation_2/count($items2_1),0.5);

            $index=0;
            $standard_deviation_3=0;
            for($index;$index<count($items3_1);$index++){
                $standard_deviation_3+=pow($items3_1[$index]-$avg3,2);
            }
            $standard_deviation_3=pow($standard_deviation_3/count($items3_1),0.5);

            $index=0;
            $standard_deviation_4=0;
            for($index;$index<count($items4_1);$index++){
                $standard_deviation_4+=pow($items4_1[$index]-$avg4,2);
            }
            $standard_deviation_4=pow($standard_deviation_4/count($items4_1),0.5);

            $index=0;
            $standard_deviation_5=0;
            for($index;$index<count($items5_1);$index++){
                $standard_deviation_5+=pow($items5_1[$index]-$avg5,2);
            }
            $standard_deviation_5=pow($standard_deviation_5/count($items5_1),0.5);

            $index=0;
            $standard_deviation_6=0;
            for($index;$index<count($items6_1);$index++){
                $standard_deviation_6+=pow($items6_1[$index]-$avg6,2);
            }
            $standard_deviation_6=pow($standard_deviation_6/count($items6_1),0.5);

            $index=0;
            $standard_deviation_7=0;
            for($index;$index<count($items7_1);$index++){
                $standard_deviation_7+=pow($items7_1[$index]-$avg7,2);
            }
            $standard_deviation_7=pow($standard_deviation_7/count($items7_1),0.5);





            $query=mysqli_query($conn,"create table temp4 as select * from (select * from daily_updates where agent_id in (SELECT id FROM login where username='$username') order by account_id,product_id, stage desc, date ) x group by account_id,product_id");
            $query1=mysqli_query($conn,'select * from temp4');
            $on_time=0;
            $delayed=0;
            $bad_account=0;
            

            while ($row = mysqli_fetch_array($query1)){

                if($row['stage']==1){
                    $on_time+=1;
                }
                else if($row['stage']==2){
                    $query0=mysqli_query($conn,"select t1.date from t1,temp4 where temp4.stage=2 and t1.stage=1 and temp4.account_id=t1.account_id and temp4.product_id=t1.product_id");

                    $now=date('Y-m-d');
                    $now=strtotime($now);
                    while($row0 = mysqli_fetch_array($query0)){
                        $date=strtotime($row0['date']);
                    }
                    $datediff=round(abs($now-$date)/(60*60*24));

                    if ($datediff<=$avg1+$standard_deviation_1){
                        $on_time+=1;
                    }
                    else if($datediff<=$avg1+2*$standard_deviation_1){
                        $delayed+=1;
                    }
                    else if($datediff>$avg1+2*$standard_deviation_1){
                        $bad_account+=1;
                    }
                }
                else if($row['stage']==3){
                    $query0=mysqli_query($conn,"select t1.date from t1,temp4 where temp4.stage=3 and t1.stage=1 and temp4.account_id=t1.account_id and temp4.product_id=t1.product_id");

                    $now=date('Y-m-d');
                    $now=strtotime($now);
                    while($row0 = mysqli_fetch_array($query0)){
                        $date=strtotime($row0['date']);
                    }
                    $datediff=round(abs($now-$date)/(60*60*24));

                    if ($datediff<=$avg2+$standard_deviation_2){
                        $on_time+=1;
                    }
                    else if($datediff<=$avg2+2*$standard_deviation_2){
                        $delayed+=1;
                    }
                    else if($datediff>$avg2+2*$standard_deviation_2){
                        $bad_account+=1;
                    }
                }
                else if($row['stage']==4){
                    $query0=mysqli_query($conn,"select t1.date from t1,temp4 where temp4.stage=4 and t1.stage=1 and temp4.account_id=t1.account_id and temp4.product_id=t1.product_id");

                    $now=date('Y-m-d');
                    $now=strtotime($now);
                    while($row0 = mysqli_fetch_array($query0)){
                        $date=strtotime($row0['date']);
                    }
                    $datediff=round(abs($now-$date)/(60*60*24));

                    if ($datediff<=$avg3+$standard_deviation_3){
                        $on_time+=1;
                    }
                    else if($datediff<=$avg3+2*$standard_deviation_3){
                        $delayed+=1;
                    }
                    else if($datediff>$avg3+2*$standard_deviation_3){
                        $bad_account+=1;
                    }
                }
                else if($row['stage']==5){
                    $query0=mysqli_query($conn,"select t1.date from t1,temp4 where temp4.stage=5 and t1.stage=1 and temp4.account_id=t1.account_id and temp4.product_id=t1.product_id");

                    $now=date('Y-m-d');
                    $now=strtotime($now);
                    while($row0 = mysqli_fetch_array($query0)){
                        $date=strtotime($row0['date']);
                    }
                    $datediff=round(abs($now-$date)/(60*60*24));

                    if ($datediff<=$avg4+$standard_deviation_4){
                        $on_time+=1;
                    }
                    else if($datediff<=$avg4+2*$standard_deviation_4){
                        $delayed+=1;
                    }
                    else if($datediff>$avg4+2*$standard_deviation_4){
                        $bad_account+=1;
                    }
                }
                else if($row['stage']==6){
                    $query0=mysqli_query($conn,"select t1.date from t1,temp4 where temp4.stage=6 and t1.stage=1 and temp4.account_id=t1.account_id and temp4.product_id=t1.product_id");

                    $now=date('Y-m-d');
                    $now=strtotime($now);
                    while($row0 = mysqli_fetch_array($query0)){
                        $date=strtotime($row0['date']);
                    }
                    $datediff=round(abs($now-$date)/(60*60*24));

                    if ($datediff<=$avg5+$standard_deviation_5){
                        $on_time+=1;
                    }
                    else if($datediff<=$avg5+2*$standard_deviation_5){
                        $delayed+=1;
                    }
                    else if($datediff>$avg5+2*$standard_deviation_5){
                        $bad_account+=1;
                    }
                }
                else if($row['stage']==7){
                    $query0=mysqli_query($conn,"select t1.date from t1,temp4 where temp4.stage=7 and t1.stage=1 and temp4.account_id=t1.account_id and temp4.product_id=t1.product_id");

                    $now=date('Y-m-d');
                    $now=strtotime($now);
                    while($row0 = mysqli_fetch_array($query0)){
                        $date=strtotime($row0['date']);
                    }
                    $datediff=round(abs($now-$date)/(60*60*24));

                    if ($datediff<=$avg6+$standard_deviation_6){
                        $on_time+=1;
                    }
                    else if($datediff<=$avg6+2*$standard_deviation_6){
                        $delayed+=1;
                    }
                    else if($datediff>$avg6+2*$standard_deviation_6){
                        $bad_account+=1;
                    }
                }
                else if($row['stage']==8){
                    $query0=mysqli_query($conn,"select t1.date from t1,temp4 where temp4.stage=2 and t1.stage=1 and temp4.account_id=t1.account_id and temp4.product_id=t1.product_id");

                    $now=date('Y-m-d');
                    $now=strtotime($now);
                    while($row0 = mysqli_fetch_array($query0)){
                        $date=strtotime($row0['date']);
                    }
                    $datediff=round(abs($now-$date)/(60*60*24));

                    if ($datediff<=$avg7+$standard_deviation_7){
                        $on_time+=1;
                    }
                    else if($datediff<=$avg7+2*$standard_deviation_7){
                        $delayed+=1;
                    }
                    else if($datediff>$avg7+2*$standard_deviation_7){
                        $bad_account+=1;
                    }
                }

            }


            $query=mysqli_query($conn,"drop table temp4");


            ?>




THE END -->

<?php
                $query="SELECT count(DISTINCT account_id,product_id) from daily_updates_prototype where agent='$username'";
                $queryResult=$conn->query($query);
            if($queryResult->num_rows>0){ 
                while ($row=$queryResult->fetch_assoc()) {
                $total_account=$row['count(DISTINCT account_id,product_id)'];
            }
            }

            $avg_days=4;
            $query0=mysqli_query($conn,"SELECT * from daily_updates_prototype where agent='$username' order by stage_id ");

            $on_time=0;
            $delayed=0;
            $bad_account=0;
            $now=date('Y-m-d');

            while ($row = mysqli_fetch_array($query0)){
                if($row['stage_id']==1){
                    if(round(abs(strtotime($now)-strtotime($row['product_id_start_date']))/(60*60*24))<=$avg_days){
                        $on_time+=1;
                    }
                    elseif (round(abs(strtotime($now)-strtotime($row['product_id_start_date']))/(60*60*24))<$avg_days+2) {
                        $delayed+=1;
                    }
                    else{
                        $bad_account+=1;
                    }


                }

               if($row['stage_id']==2){
                    if(round(abs(strtotime($now)-strtotime($row['product_id_start_date']))/(60*60*24))<=2*$avg_days){
                        $on_time+=1;
                    }
                    elseif (round(abs(strtotime($now)-strtotime($row['product_id_start_date']))/(60*60*24))<2*$avg_days+2) {
                        $delayed+=1;
                    }
                    else{
                        $bad_account+=1;
                    }



                }
                if($row['stage_id']==3){
                    if(round(abs(strtotime($now)-strtotime($row['product_id_start_date']))/(60*60*24))<=3*$avg_days){
                        $on_time+=1;
                    }
                    elseif (round(abs(strtotime($now)-strtotime($row['product_id_start_date']))/(60*60*24))<3*$avg_days+2) {
                        $delayed+=1;
                    }
                    else{
                        $bad_account+=1;
                    }


                }
                if($row['stage_id']==4){
                    if(round(abs(strtotime($now)-strtotime($row['product_id_start_date']))/(60*60*24))<=4*$avg_days){
                        $on_time+=1;
                    }
                    elseif (round(abs(strtotime($now)-strtotime($row['product_id_start_date']))/(60*60*24))<4*$avg_days+2) {
                        $delayed+=1;
                    }
                    else{
                        $bad_account+=1;
                    }


                }
                if($row['stage_id']==5){
                    if(round(abs(strtotime($now)-strtotime($row['product_id_start_date']))/(60*60*24))<=5*$avg_days){
                        $on_time+=1;
                    }
                    elseif (round(abs(strtotime($now)-strtotime($row['product_id_start_date']))/(60*60*24))<5*$avg_days+2) {
                        $delayed+=1;
                    }
                    else{
                        $bad_account+=1;
                    }
                }
                if($row['stage_id']==6){
                    if(round(abs(strtotime($now)-strtotime($row['product_id_start_date']))/(60*60*24))<=6*$avg_days){
                        $on_time+=1;
                    }
                    elseif (round(abs(strtotime($now)-strtotime($row['product_id_start_date']))/(60*60*24))<6*$avg_days+2) {
                        $delayed+=1;
                    }
                    else{
                        $bad_account+=1;
                    }
                }
                if($row['stage_id']==7){
                    if(round(abs(strtotime($now)-strtotime($row['product_id_start_date']))/(60*60*24))<=7*$avg_days){
                        $on_time+=1;
                    }
                    elseif (round(abs(strtotime($now)-strtotime($row['product_id_start_date']))/(60*60*24))<7*$avg_days+2) {
                        $delayed+=1;
                    }
                    else{
                        $bad_account+=1;
                    }
                }
                if($row['stage_id']==8){
                    if(round(abs(strtotime($now)-strtotime($row['product_id_start_date']))/(60*60*24))<=8*$avg_days){
                        $on_time+=1;
                    }
                    elseif (round(abs(strtotime($now)-strtotime($row['product_id_start_date']))/(60*60*24))<8*$avg_days+2) {
                        $delayed+=1;
                    }
                    else{
                        $bad_account+=1;
                    }
                }



            }



            ?>




    <div style="margin-left: 40px; margin-right:40px;">
        <div class="text-container">
        <div class="row">
            <div class="text-border text-center col-lg-3 col-md-6 ">
                <img src="image/total.png" width="50px" height="50px">
                <p style="font-size: 100px;"><?php echo $total_account ?></p>
                <p><b>TOTAL</b></p>

            </div>



            <div class="text-border text-center col-lg-3 col-md-6 ">
                <img src="image/on_time.png" width="50px" height="50px">
                <p style="font-size: 100px;"><?php echo $on_time ?></p>
                <p style="color:green"><b>ON TIME</b></p>

            </div>
                
    <!--             <div class="text-center col-lg-4 col-md-6 ">
                    <p id="donutchart" style="width: 100%; height: 350px;"></p  >
                </div> -->

            <div class="text-border text-center col-lg-3 col-md-6 ">
                <img src="image/delayed.png" width="50px" height="50px">
                <p style="font-size: 100px;"><?php echo $delayed ?></p>
                <p style="color:orange"><b>DELAYED</b></p>

            </div>
            <div class="text-center col-lg-3 col-md-6">
                <img src="image/bad_account.png" width="50px" height="50px">
                <p style="font-size: 100px;"><?php echo $bad_account ?></p>
                <p style="color:red"><b>BAD ACCOUNT</b> </p>

            </div>
        </div>
        </div>        
    </div> 


    <div>        

    <h1>SALES PANNEL<br><br><br></h1>
    <div class="tab">
    <div class="text-center row">
    <div class="col-xs-1 col-md-6">
    <button class="tablinks" onclick="open_table(event, 'table_stage_1')"><img width="100%"  src="image/stage1.png"></button>
    </div>
    <div class="col-xs-1 col-md-6">
    <button class="tablinks" onclick="open_table(event, 'table_stage_2')"><img width="100%" src="image/stage2.png"></button>
    </div>
    <div class="col-xs-1 col-md-6">
    <button class="tablinks" onclick="open_table(event, 'table_stage_3')"><img width="100%" src="image/stage3.png"></button>
    </div>
    <div class="col-xs-1 col-md-6"> 
    <button class="tablinks" onclick="open_table(event, 'table_stage_4')"><img width="100%" src="image/stage4.png"></button>
    </div>
    <div class="col-xs-1 col-md-6">
    <button class="tablinks" onclick="open_table(event, 'table_stage_5')"><img width="100%" src="image/stage5.png"></button>
    </div>
    <div class="col-xs-1 col-md-6">
    <button class="tablinks" onclick="open_table(event, 'table_stage_6')"><img width="100%" src="image/stage6.png"></button>
    </div>
    <div class="col-xs-1 col-md-6">
    <button class="tablinks" onclick="open_table(event, 'table_stage_7')"><img width="100%" src="image/stage7.png"></button>
    </div>
    <div class="col-xs-1 col-md-6">
    <button class="tablinks" onclick="open_table(event, 'table_stage_8')"><img width="100%" src="image/stage8.png"></button>
    </div>

<!--  STAGE TABLE BEFORE
     <?php

    $query=mysqli_query($conn,"create table temp3 as select * from (select * from daily_updates where agent_id in (SELECT id FROM login where username='$username') order by account_id,product_id, stage desc, date ) x group by account_id,product_id");
    ?>
 -->

    <div id="table_stage_1" class="tabcontent ">
    
        <table id="datatable_stage_1" class="data-table" id="xyz">
        <caption class="title">Stage 1 Data</caption>
        <thead>
            <tr>
                <th style="text-align:center">PRODUCT</th>
                <th style="text-align:center">HOSPITAL</th>
                <th style="text-align:center">GRADE</th>
                <th style="text-align:center">STATUS</th>
            </tr>
        </thead>
        <tbody>

        <?php

        // $query0 = mysqli_query($conn,'SELECT * from master_hospital,temp3 where master_hospital.account_id=temp3.Account_ID and temp3.stage=1');
        // $query1 = mysqli_query($conn,'SELECT * from master_product,temp3 where master_product.product_id=temp3.product_ID and temp3.stage=1'); 

        $query0=mysqli_query($conn, "SELECT * from daily_updates_prototype where agent='$username' and stage_id=1");

        while ($row0 = mysqli_fetch_array($query0))
        {
            // echo '<tr>
            //         <td style="text-align:center">'.$row1['product_name'].'</td>
            //         <td style="text-align:center">'.$row0['account_name'].'</td>
            //         <td style="text-align:center">'.$row0['grade'].'</td>
            //         <td style="text-align:center">'.$row1['status'].'</td>
            //     </tr>';
            echo '<tr>
                    <td style="text-align:center">'.$row0['product'].'</td>
                    <td style="text-align:center">'.$row0['account'].'</td>
                    <td style="text-align:center">'.'A'.'</td>
                    <td style="text-align:center">'.'1'.'</td>
                </tr>';
        }?>

        </tbody>
    </table>
    
    </div>

        <div id="table_stage_2" class="tabcontent">
    
        <table id="datatable_stage_2" class="data-table">
        <caption class="title">Stage 2 Data</caption>
        <thead>
            <tr>
                <th style="text-align:center">PRODUCT</th>
                <th style="text-align:center">HOSPITAL</th>
                <th style="text-align:center">GRADE</th>
                <th style="text-align:center">STATUS</th>
            </tr>
        </thead>
        <tbody>

        <?php

       
        // $query0 = mysqli_query($conn,'SELECT * from master_hospital,temp3 where master_hospital.account_id=temp3.Account_ID and temp3.stage=2');
        // $query1 = mysqli_query($conn,'SELECT * from master_product,temp3 where master_product.product_id=temp3.product_ID and temp3.stage=2'); 

        $query0=mysqli_query($conn, "SELECT * from daily_updates_prototype where agent='$username' and stage_id=2");

        while ($row0 = mysqli_fetch_array($query0))
        {
            // echo '<tr>
            //         <td style="text-align:center">'.$row1['product_name'].'</td>
            //         <td style="text-align:center">'.$row0['account_name'].'</td>
            //         <td style="text-align:center">'.$row0['grade'].'</td>
            //         <td style="text-align:center">'.$row1['status'].'</td>
            //     </tr>';
            echo '<tr>
                    <td style="text-align:center">'.$row0['product'].'</td>
                    <td style="text-align:center">'.$row0['account'].'</td>
                    <td style="text-align:center">'.'A'.'</td>
                    <td style="text-align:center">'.'1'.'</td>
                </tr>';
        }?>

        </tbody>
    </table>
    
    </div>

        <div id="table_stage_3" class="tabcontent">
    
        <table id="datatable_stage_3" class="data-table">
        <caption class="title">Stage 3 Data</caption>
        <thead>
            <tr>
                <th style="text-align:center">PRODUCT</th>
                <th style="text-align:center">HOSPITAL</th>
                <th style="text-align:center">GRADE</th>
                <th style="text-align:center">STATUS</th>
            </tr>
        </thead>
        <tbody>

        <?php

        
        // $query0 = mysqli_query($conn,'SELECT * from master_hospital,temp3 where master_hospital.account_id=temp3.Account_ID and temp3.stage=3');
        // $query1 = mysqli_query($conn,'SELECT * from master_product,temp3 where master_product.product_id=temp3.product_ID and temp3.stage=3'); 

        $query0=mysqli_query($conn, "SELECT * from daily_updates_prototype where agent='$username' and stage_id=3");
    
        while ($row0 = mysqli_fetch_array($query0))
        {
            // echo '<tr>
            //         <td style="text-align:center">'.$row1['product_name'].'</td>
            //         <td style="text-align:center">'.$row0['account_name'].'</td>
            //         <td style="text-align:center">'.$row0['grade'].'</td>
            //         <td style="text-align:center">'.$row1['status'].'</td>
            //     </tr>';
            echo '<tr>
                    <td style="text-align:center">'.$row0['product'].'</td>
                    <td style="text-align:center">'.$row0['account'].'</td>
                    <td style="text-align:center">'.'A'.'</td>
                    <td style="text-align:center">'.'1'.'</td>
                </tr>';
        }?>

        </tbody>
    </table>
    
    </div>


        <div id="table_stage_4" class="tabcontent">
    
        <table id="datatable_stage_4" class="data-table">
        <caption class="title">Stage 4 Data</caption>
        <thead>
            <tr>
                <th style="text-align:center">PRODUCT</th>
                <th style="text-align:center">HOSPITAL</th>
                <th style="text-align:center">GRADE</th>
                <th style="text-align:center">STATUS</th>
            </tr>
        </thead>
        <tbody>

        <?php

        
        // $query0 = mysqli_query($conn,'SELECT * from master_hospital,temp3 where master_hospital.account_id=temp3.Account_ID and temp3.stage=4');
        // $query1 = mysqli_query($conn,'SELECT * from master_product,temp3 where master_product.product_id=temp3.product_ID and temp3.stage=4'); 
        $query0=mysqli_query($conn, "SELECT * from daily_updates_prototype where agent='$username' and stage_id=4");

    
        while ($row0 = mysqli_fetch_array($query0))
        {
            // echo '<tr>
            //         <td style="text-align:center">'.$row1['product_name'].'</td>
            //         <td style="text-align:center">'.$row0['account_name'].'</td>
            //         <td style="text-align:center">'.$row0['grade'].'</td>
            //         <td style="text-align:center">'.$row1['status'].'</td>
            //     </tr>';
            echo '<tr>
                    <td style="text-align:center">'.$row0['product'].'</td>
                    <td style="text-align:center">'.$row0['account'].'</td>
                    <td style="text-align:center">'.'A'.'</td>
                    <td style="text-align:center">'.'1'.'</td>
                </tr>';
        }?>

        </tbody>
    </table>
    
    </div>


        <div id="table_stage_5" class="tabcontent">
    
        <table id="datatable_stage_5" class="data-table">
        <caption class="title">Stage 5 Data</caption>
        <thead>
            <tr>
                <th style="text-align:center">PRODUCT</th>
                <th style="text-align:center">HOSPITAL</th>
                <th style="text-align:center">GRADE</th>
                <th style="text-align:center">STATUS</th>
            </tr>
        </thead>
        <tbody>

        <?php

        
        // $query0 = mysqli_query($conn,'SELECT * from master_hospital,temp3 where master_hospital.account_id=temp3.Account_ID and temp3.stage=5');
        // $query1 = mysqli_query($conn,'SELECT * from master_product,temp3 where master_product.product_id=temp3.product_ID and temp3.stage=5'); 
        $query0=mysqli_query($conn, "SELECT * from daily_updates_prototype where agent='$username' and stage_id=5");

    
        while ($row0 = mysqli_fetch_array($query0))
        {
            // echo '<tr>
            //         <td style="text-align:center">'.$row1['product_name'].'</td>
            //         <td style="text-align:center">'.$row0['account_name'].'</td>
            //         <td style="text-align:center">'.$row0['grade'].'</td>
            //         <td style="text-align:center">'.$row1['status'].'</td>
            //     </tr>';
            echo '<tr>
                    <td style="text-align:center">'.$row0['product'].'</td>
                    <td style="text-align:center">'.$row0['account'].'</td>
                    <td style="text-align:center">'.'A'.'</td>
                    <td style="text-align:center">'.'1'.'</td>
                </tr>';
        }?>

        </tbody>
    </table>
    
    </div>


        <div id="table_stage_6" class="tabcontent">
    
        <table id="datatable_stage_6" class="data-table">
        <caption class="title">Stage 6 Data</caption>
        <thead>
            <tr>
                <th style="text-align:center">PRODUCT</th>
                <th style="text-align:center">HOSPITAL</th>
                <th style="text-align:center">GRADE</th>
                <th style="text-align:center">STATUS</th>
            </tr>
        </thead>
        <tbody>

        <?php

        
        // $query0 = mysqli_query($conn,'SELECT * from master_hospital,temp3 where master_hospital.account_id=temp3.Account_ID and temp3.stage=6');
        // $query1 = mysqli_query($conn,'SELECT * from master_product,temp3 where master_product.product_id=temp3.product_ID and temp3.stage=6'); 
        $query0=mysqli_query($conn, "SELECT * from daily_updates_prototype where agent='$username' and stage_id=6");

    
        while ($row0 = mysqli_fetch_array($query0))
        {
            // echo '<tr>
            //         <td style="text-align:center">'.$row1['product_name'].'</td>
            //         <td style="text-align:center">'.$row0['account_name'].'</td>
            //         <td style="text-align:center">'.$row0['grade'].'</td>
            //         <td style="text-align:center">'.$row1['status'].'</td>
            //     </tr>';
            echo '<tr>
                    <td style="text-align:center">'.$row0['product'].'</td>
                    <td style="text-align:center">'.$row0['account'].'</td>
                    <td style="text-align:center">'.'A'.'</td>
                    <td style="text-align:center">'.'1'.'</td>
                </tr>';
        }?>

        </tbody>
    </table>
    
    </div>


        <div id="table_stage_7" class="tabcontent">
    
        <table id="datatable_stage_7" class="data-table">
        <caption class="title">Stage 7 Data</caption>
        <thead>
            <tr>
                <th style="text-align:center">PRODUCT</th>
                <th style="text-align:center">HOSPITAL</th>
                <th style="text-align:center">GRADE</th>
                <th style="text-align:center">STATUS</th>
            </tr>
        </thead>
        <tbody>

        <?php

        
        // $query0 = mysqli_query($conn,'SELECT * from master_hospital,temp3 where master_hospital.account_id=temp3.Account_ID and temp3.stage=7');
        // $query1 = mysqli_query($conn,'SELECT * from master_product,temp3 where master_product.product_id=temp3.product_ID and temp3.stage=7'); 
        $query0=mysqli_query($conn, "SELECT * from daily_updates_prototype where agent='$username' and stage_id=7");

    
        while ($row0 = mysqli_fetch_array($query0))
        {
            // echo '<tr>
            //         <td style="text-align:center">'.$row1['product_name'].'</td>
            //         <td style="text-align:center">'.$row0['account_name'].'</td>
            //         <td style="text-align:center">'.$row0['grade'].'</td>
            //         <td style="text-align:center">'.$row1['status'].'</td>
            //     </tr>';
                        echo '<tr>
                    <td style="text-align:center">'.$row0['product'].'</td>
                    <td style="text-align:center">'.$row0['account'].'</td>
                    <td style="text-align:center">'.'A'.'</td>
                    <td style="text-align:center">'.'1'.'</td>
                </tr>';
        }?>
        </tbody>
    </table>
    
    </div>


        <div id="table_stage_8" class="tabcontent">
    
        <table id="datatable_stage_8" class="data-table">
        <caption class="title">Stage 8 Data</caption>
        <thead>
            <tr>
                <th style="text-align:center">PRODUCT</th>
                <th style="text-align:center">HOSPITAL</th>
                <th style="text-align:center">GRADE</th>
                <th style="text-align:center">STATUS</th>
            </tr>
        </thead>
        <tbody>

        <?php

        
        // $query0 = mysqli_query($conn,'SELECT * from master_hospital,temp3 where master_hospital.account_id=temp3.Account_ID and temp3.stage=8');
        // $query1 = mysqli_query($conn,'SELECT * from master_product,temp3 where master_product.product_id=temp3.product_ID and temp3.stage=8'); 


        //         $query2 = mysqli_query($conn,'drop table temp3'); 
        $query0=mysqli_query($conn, "SELECT * from daily_updates_prototype where agent='$username' and stage_id=8");

    
        while ($row0 = mysqli_fetch_array($query0))
        {
            // echo '<tr>
            //         <td style="text-align:center">'.$row1['product_name'].'</td>
            //         <td style="text-align:center">'.$row0['account_name'].'</td>
            //         <td style="text-align:center">'.$row0['grade'].'</td>
            //         <td style="text-align:center">'.$row1['status'].'</td>
            //     </tr>';
            echo '<tr>
                    <td style="text-align:center">'.$row0['product'].'</td>
                    <td style="text-align:center">'.$row0['account'].'</td>
                    <td style="text-align:center">'.'A'.'</td>
                    <td style="text-align:center">'.'1'.'</td>
                </tr>';
        }?>

        </tbody>
    </table>
    
    </div>
    </div>

    <h1 id="recent">RECENT ACTIVITY</h1>
    <table id="recentTable" class="data-table">
        <thead>
            <tr>
                <th style="text-align:center">ENTRY DATE</th>
                <th style="text-align:center">PRODUCT</th>
                <th style="text-align:center">HOSPITAL</th>
                <th style="text-align:center">GRADE</th>
                <th style="text-align:center">STAGE</th>
            </tr>
        </thead>
        <tbody>
        <?php

        
        // $temp1 = mysqli_query($conn,"CREATE TABLE temp1 as SELECT account_id FROM daily_updates where agent_id IN (SELECT id FROM login where username='$username')");
        // $temp2 = mysqli_query($conn,"CREATE TABLE temp2 as SELECT product_id FROM daily_updates where agent_id IN (SELECT id FROM login where username='$username')");

        // $query0 = mysqli_query($conn,'SELECT * from master_hospital,temp1 where master_hospital.account_id=temp1.Account_ID');
        // $query2 = mysqli_query($conn,'SELECT * from master_product,temp2 where master_product.product_id=temp2.product_ID'); 
        // $query1 = mysqli_query($conn,"SELECT stage from daily_updates where agent_id IN (SELECT id FROM login where username='$username')");        
        
        $query0=mysqli_query($conn,"SELECT * FROM daily_updates_prototype where agent='$username' ORDER BY daily_updates_prototype.meeting_date DESC");


        while ($row0 = mysqli_fetch_array($query0))
        {
            echo '<tr>
                    <td style="text-align:center">'.$row0['meeting_date'].'</td>
                    <td style="text-align:center">'.$row0['product'].'</td>
                    <td style="text-align:center">'.$row0['account'].'</td>
                    <td style="text-align:center">'.'A'.'</td>
                    <td style="text-align:center">'.$row0['stage'].'</td>
                </tr>';
        }
        // $temp3=mysqli_query($conn,'drop table temp1');
        // $temp4=mysqli_query($conn,'drop table temp2');
        ?>
        </tbody>
    </table>

    <h1 id="calendar">CALENDAR ACTIVITY</h1>
    
    <table id='calendarTable' class="data-table">
        <thead>
            <tr>
                <th style="text-align:center">MEETING DATE</th>
                <th style="text-align:center">PRODUCT</th>
                <th style="text-align:center">HOSPITAL</th>
                <th style="text-align:center">GRADE</th>
                <th style="text-align:center">STAGE</th>
                <th style="text-align:center">CALENDAR ACTIVITY</th>
            </tr>
        </thead>

        <tbody>
        <?php

        
        $query0=mysqli_query($conn,"SELECT * FROM daily_updates_prototype where agent='$username' ORDER BY daily_updates_prototype.date");


        while ($row0 = mysqli_fetch_array($query0))
        {
            echo '<tr>
                    <td style="text-align:center">'.$row0['date'].'</td>
                    <td style="text-align:center">'.$row0['product'].'</td>
                    <td style="text-align:center">'.$row0['account'].'</td>
                    <td style="text-align:center">'.'A'.'</td>
                    <td style="text-align:center">'.$row0['stage'].'</td>
                    <td style="text-align:center">'.$row0['calendar_activity'].'</td>
                </tr>';
        }
        // $temp3=mysqli_query($conn,'drop table temp1');
        // $temp4=mysqli_query($conn,'drop table temp2');
        ?>
        </tbody>

    </table>

    <div>
<p>
<br>
<br>
<br>
<br>
<br>
<br>
</p>
</div>  


    </div>
</div>













<div class="overlay"></div>

<script>
$('#recentTable').dataTable( {
  "lengthMenu": [ 3, 10, 50, 75, 100 ]
} );

$('#calendarTable').dataTable( {
  "lengthMenu": [ 3, 10, 50, 75, 100 ]
} );

$('#datatable_stage_1').dataTable( {
  "lengthMenu": [ 3, 10, 50, 75, 100 ]
} );

$('#datatable_stage_2').dataTable( {
  "lengthMenu": [ 3, 10, 50, 75, 100 ]
} );

$('#datatable_stage_3').dataTable( {
  "lengthMenu": [ 3, 10, 50, 75, 100 ]
} );

$('#datatable_stage_4').dataTable( {
  "lengthMenu": [ 3, 10, 50, 75, 100 ]
} );

$('#datatable_stage_5').dataTable( {
  "lengthMenu": [ 3, 10, 50, 75, 100 ]
} );

$('#datatable_stage_6').dataTable( {
  "lengthMenu": [ 3, 10, 50, 75, 100 ]
} );

$('#datatable_stage_7').dataTable( {
  "lengthMenu": [ 3, 10, 50, 75, 100 ]
} );

$('#datatable_stage_8').dataTable( {
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


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Products Assigned'],
          ['ON TIME',7],
          ['DELAYED',2],
          ['BAD ACCOUNT',1],

        ]);

        var options = {
            legend: 'none',
          pieHole: 0.6,
            colors: ['green','orange','red'],
                      pieSliceText: 'hello',


        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>


    <script>
// Select all links with hashes
$('a[href*="#"]')
  // Remove links that don't actually link to anything
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
      && 
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000, function() {
          // Callback after animation
          // Must change focus!
          var $target = $(target);
          $target.focus();
          if ($target.is(":focus")) { // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
            $target.focus(); // Set focus again
          };
        });
      }
    }
  });
</script>


<script>
function open_table(evt, stagename) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(stagename).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>



</body>

</html>




