<?php 
    session_start(); 

    if ($_SESSION['username']!='admin') {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header("location: login_manager.php");
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

 
    // $query0 = mysqli_query($conn,'SELECT * from master_hospital, daily_updates where master_hospital.account_id=daily_updates.Account_ID');
    // $query1 = mysqli_query($conn, 'SELECT * FROM daily_updates');
    // $query2 = mysqli_query($conn, 'SELECT * FROM master_product');
    // $query3 = mysqli_query($conn,'SELECT product_name from master_product, daily_updates where master_product.product_id=daily_updates.product_ID');
    // $query4 = mysqli_query($conn,"SELECT * from daily_updates where stage='2'");

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



<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>




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




@-webkit-keyframes 
load { 0% {
stroke-dashoffset:0
}
}
@-moz-keyframes 
load { 0% {
stroke-dashoffset:0
}
}
@keyframes 
load { 0% {
stroke-dashoffset:0
}
}

/* Container */

.progress_chart {
  position: relative;
  display: inline-block;
  padding: 0;
  width:100%;
  text-align: center;
}

/* Item */

.progress_chart>li {
  display: inline-block;
  position: relative;
  text-align: center;
  color: #93A2AC;
  font-family: Lato;
  font-weight: 100;
  margin: 2rem;
}

.progress_chart>li:before {
  content: attr(data-name);
  position: absolute;
  width: 100%;
  bottom: -4rem;
  font-weight: 400;
    font-size: 2rem;
        font-family: 'Montserrat', sans-serif !important;


}

.progress_chart>li:after {
  content: attr(data-percent);
  position: absolute;
  width: 100%;
  top: 7.7rem;
  left: 0;
  font-size: 3rem;
  text-align: center;
      font-family: 'Montserrat', sans-serif !important;

}

.progress_chart svg {
  width: 20rem;
  height: 20rem;
}

.progress_chart svg:nth-child(2) {
  position: absolute;
  left: 0;
  top: 0;
  transform: rotate(-90deg);
  -webkit-transform: rotate(-90deg);
  -moz-transform: rotate(-90deg);
  -ms-transform: rotate(-90deg);
}

.progress_chart svg:nth-child(2) path {
  fill: none;
  stroke-width: 25;
  stroke-dasharray: 629;
  stroke: rgba(255, 255, 255, 0.9);
  -webkit-animation: load 10s;
  -moz-animation: load 10s;
  -o-animation: load 10s;
  animation: load 10s;
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
            <div style="padding:0px;text-align: right">Welcome <strong><?php echo $_SESSION['username']; ?></strong>&nbsp;&nbsp;&nbsp;|<a href="index_polymed_manager.php?logout='1'" style="color: red;">&nbsp;&nbsp;&nbsp;logout</a> </div>
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
                $query="SELECT count(DISTINCT account_id,product_id) from daily_updates_prototype";
                $queryResult=$conn->query($query);
            if($queryResult->num_rows>0){ 
                while ($row=$queryResult->fetch_assoc()) {
                $total_account=$row['count(DISTINCT account_id,product_id)'];
            }
            }

            $avg_days=4;
            $query0=mysqli_query($conn,"SELECT * from daily_updates_prototype order by stage_id ");

            $on_time=0;
            $delayed=0;
            $bad_account=0;
            $outlier=0;
            
            $top_performer=0;
            $pipeline_builder=0;
            $deal_maker=0;
            $under_performer=0;

            $now=date('Y-m-d');

            while ($row = mysqli_fetch_array($query0)){
                if($row['stage_id']==1){

                    if(round(abs(strtotime($now)-strtotime($row['product_id_start_date']))/(60*60*24))<=$avg_days-2){
                        $outlier+=1;
                    }

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
                    
                    if(round(abs(strtotime($now)-strtotime($row['product_id_start_date']))/(60*60*24))<=2*$avg_days-2){
                        $outlier+=1;
                    }

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
                    
                    if(round(abs(strtotime($now)-strtotime($row['product_id_start_date']))/(60*60*24))<=3*$avg_days-2){
                        $outlier+=1;
                    }

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

                    if(round(abs(strtotime($now)-strtotime($row['product_id_start_date']))/(60*60*24))<=4*$avg_days-2){
                        $outlier+=1;
                    }

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

                    if(round(abs(strtotime($now)-strtotime($row['product_id_start_date']))/(60*60*24))<=5*$avg_days-2){
                        $outlier+=1;
                    }

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
                    
                    if(round(abs(strtotime($now)-strtotime($row['product_id_start_date']))/(60*60*24))<=6*$avg_days-2){
                        $outlier+=1;
                    }

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
                    
                    if(round(abs(strtotime($now)-strtotime($row['product_id_start_date']))/(60*60*24))<=7*$avg_days-2){
                        $outlier+=1;
                    }

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
                    
                    if(round(abs(strtotime($now)-strtotime($row['product_id_start_date']))/(60*60*24))<=8*$avg_days-2){
                        $outlier+=1;
                    }

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

            $array_under_performer = array();
            $array_top_performer = array();
            $array_pipeline_builder = array();
            $array_deal_maker = array();

            $query=mysqli_query($conn,"SELECT DISTINCT agent from daily_updates_prototype ");
            while ($row = mysqli_fetch_array($query)){
                $agent_name=$row['agent'];

                $effective_days=0;
                $mean_days=0;

                $effective_days_pipeline_first=0;
                $effective_days_pipeline_last=0;
                $mean_days_pipeline_first=0;
                $mean_days_pipeline_last=0;


                $query1=mysqli_query($conn,"SELECT * from daily_updates_prototype where agent='$agent_name'");
                while ($row1 = mysqli_fetch_array($query1)){
                    if ($row1['stage_id']==1){
                        $mean_days+=32;
                        $effective_days+=round(abs(strtotime($now)-strtotime($row1['product_id_start_date']))/(60*60*24*1))*8;

                        $mean_days_pipeline_first+=16;
                        $effective_days_pipeline_first+=round(abs(strtotime($now)-strtotime($row1['product_id_start_date']))/(60*60*24*1))*4;
                    }
                    else if ($row1['stage_id']==2){
                        $mean_days+=32;
                        $effective_days+=round(abs(strtotime($now)-strtotime($row1['product_id_start_date']))/(60*60*24*2))*8;

                        $mean_days_pipeline_first+=16;
                        $effective_days_pipeline_first+=round(abs(strtotime($now)-strtotime($row1['product_id_start_date']))/(60*60*24*2))*4;
                    }
                    else if ($row1['stage_id']==3){
                        $mean_days+=32;
                        $effective_days+=round(abs(strtotime($now)-strtotime($row1['product_id_start_date']))/(60*60*24*3))*8;

                        $mean_days_pipeline_first+=16;
                        $effective_days_pipeline_first+=round(abs(strtotime($now)-strtotime($row1['product_id_start_date']))/(60*60*24*3))*4;
                    }
                    else if ($row1['stage_id']==4){
                        $mean_days+=32;
                        $effective_days+=round(abs(strtotime($now)-strtotime($row1['product_id_start_date']))/(60*60*24*4))*8;

                        $mean_days_pipeline_first+=16;
                        $effective_days_pipeline_first+=round(abs(strtotime($now)-strtotime($row1['product_id_start_date']))/(60*60*24*4))*4;
                    }
                    else if ($row1['stage_id']==5){
                        $mean_days+=32;
                        $effective_days+=round(abs(strtotime($now)-strtotime($row1['product_id_start_date']))/(60*60*24*5))*8;

                        $mean_days_pipeline_last+=16;
                        $effective_days_pipeline_last+=round(abs(strtotime($now)-strtotime($row1['product_id_start_date']))/(60*60*24*5))*8-16;
                    }
                    else if ($row1['stage_id']==6){
                        $mean_days+=32;
                        $effective_days+=round(abs(strtotime($now)-strtotime($row1['product_id_start_date']))/(60*60*24*6))*8;

                        $mean_days_pipeline_last+=16;
                        $effective_days_pipeline_last+=round(abs(strtotime($now)-strtotime($row1['product_id_start_date']))/(60*60*24*6))*8-16;
                    }
                    else if ($row1['stage_id']==7){
                        $mean_days+=32;
                        $effective_days+=round(abs(strtotime($now)-strtotime($row1['product_id_start_date']))/(60*60*24*7))*8;

                        $mean_days_pipeline_last+=16;
                        $effective_days_pipeline_last+=round(abs(strtotime($now)-strtotime($row1['product_id_start_date']))/(60*60*24*7))*8-16;
                    }
                    else if ($row1['stage_id']==8){
                        $mean_days+=32;
                        $effective_days+=round(abs(strtotime($now)-strtotime($row1['product_id_start_date']))/(60*60*24*8))*8;

                        $mean_days_pipeline_last+=16;
                        $effective_days_pipeline_last+=round(abs(strtotime($now)-strtotime($row1['product_id_start_date']))/(60*60*24*8))*8-16;
                    }
                }   
                if ($effective_days<=$mean_days){
                    $top_performer+=1;
                    array_push($array_top_performer,$agent_name);
                } 
                else{
                    $under_performer+=1;
                    array_push($array_under_performer,$agent_name);
                }

                if ($effective_days_pipeline_first<=$mean_days_pipeline_first and $effective_days_pipeline_last>$mean_days_pipeline_last){
                    $pipeline_builder+=1;
                    array_push($array_pipeline_builder,$agent_name);
                }

                if ($effective_days_pipeline_first>$mean_days_pipeline_first and $effective_days_pipeline_last<=$mean_days_pipeline_last){
                    $deal_maker+=1;
                    array_push($array_deal_maker,$agent_name);

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

        $query0=mysqli_query($conn, "SELECT * from daily_updates_prototype  where stage_id=1");

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

        $query0=mysqli_query($conn, "SELECT * from daily_updates_prototype  where stage_id=2");

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

        $query0=mysqli_query($conn, "SELECT * from daily_updates_prototype  where stage_id=3");
    
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
        $query0=mysqli_query($conn, "SELECT * from daily_updates_prototype where stage_id=4");

    
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
        $query0=mysqli_query($conn, "SELECT * from daily_updates_prototype where stage_id=5");

    
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
        $query0=mysqli_query($conn, "SELECT * from daily_updates_prototype where stage_id=6");

    
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
        $query0=mysqli_query($conn, "SELECT * from daily_updates_prototype where stage_id=7");

    
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
        $query0=mysqli_query($conn, "SELECT * from daily_updates_prototype where stage_id=8");

    
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


<div class="text-container">
<ul class="progress_chart">
  
  <li data-name="ON TIME" data-percent="<?php
  $output=number_format((float)(($on_time/$total_account)*100),2,'.','');
echo $output.'%'; ?> "> <svg viewBox="-10 -10 220 220">
    <g fill="none" stroke-width="6" transform="translate(100,100)">
      <path d="M 0,-100 A 100,100 0 0,1 86.6,-50" stroke="url(#cl1)"/>
      <path d="M 86.6,-50 A 100,100 0 0,1 86.6,50" stroke="url(#cl2)"/>
      <path d="M 86.6,50 A 100,100 0 0,1 0,100" stroke="url(#cl3)"/>
      <path d="M 0,100 A 100,100 0 0,1 -86.6,50" stroke="url(#cl4)"/>
      <path d="M -86.6,50 A 100,100 0 0,1 -86.6,-50" stroke="url(#cl5)"/>
      <path d="M -86.6,-50 A 100,100 0 0,1 0,-100" stroke="url(#cl6)"/>
    </g>
    </svg> <svg viewBox="-10 -10 220 220">
    <path d="M200,100 C200,44.771525 155.228475,0 100,0 C44.771525,0 0,44.771525 0,100 C0,155.228475 44.771525,200 100,200 C155.228475,200 200,155.228475 200,100 Z" stroke-dashoffset="<?php echo $output*6.29?>"></path>
    </svg> </li>
  <li data-name="DELAYED" data-percent="<?php
  $output=number_format((float)(($delayed/$total_account)*100),2,'.','');
echo $output.'%'; ?>"> <svg viewBox="-10 -10 220 220">
    <g fill="none" stroke-width="6" transform="translate(100,100)">
      <path d="M 0,-100 A 100,100 0 0,1 86.6,-50" stroke="url(#cl1)"/>
      <path d="M 86.6,-50 A 100,100 0 0,1 86.6,50" stroke="url(#cl2)"/>
      <path d="M 86.6,50 A 100,100 0 0,1 0,100" stroke="url(#cl3)"/>
      <path d="M 0,100 A 100,100 0 0,1 -86.6,50" stroke="url(#cl4)"/>
      <path d="M -86.6,50 A 100,100 0 0,1 -86.6,-50" stroke="url(#cl5)"/>
      <path d="M -86.6,-50 A 100,100 0 0,1 0,-100" stroke="url(#cl6)"/>
    </g>
    </svg> <svg viewBox="-10 -10 220 220">
    <path d="M200,100 C200,44.771525 155.228475,0 100,0 C44.771525,0 0,44.771525 0,100 C0,155.228475 44.771525,200 100,200 C155.228475,200 200,155.228475 200,100 Z" stroke-dashoffset="<?php echo $output*6.29?>"></path>
    </svg> </li>
  <li data-name="BAD ACCOUNT" data-percent="<?php
  $output=number_format((float)(($bad_account/$total_account)*100),2,'.','');
echo $output.'%'; ?>"> <svg viewBox="-10 -10 220 220">
    <g fill="none" stroke-width="6" transform="translate(100,100)">
      <path d="M 0,-100 A 100,100 0 0,1 86.6,-50" stroke="url(#cl1)"/>
      <path d="M 86.6,-50 A 100,100 0 0,1 86.6,50" stroke="url(#cl2)"/>
      <path d="M 86.6,50 A 100,100 0 0,1 0,100" stroke="url(#cl3)"/>
      <path d="M 0,100 A 100,100 0 0,1 -86.6,50" stroke="url(#cl4)"/>
      <path d="M -86.6,50 A 100,100 0 0,1 -86.6,-50" stroke="url(#cl5)"/>
      <path d="M -86.6,-50 A 100,100 0 0,1 0,-100" stroke="url(#cl6)"/>
    </g>
    </svg> <svg viewBox="-10 -10 220 220">
    <path d="M200,100 C200,44.771525 155.228475,0 100,0 C44.771525,0 0,44.771525 0,100 C0,155.228475 44.771525,200 100,200 C155.228475,200 200,155.228475 200,100 Z" stroke-dashoffset="<?php echo $output*6.29?>"></path>
    </svg> </li>
  <li data-name="OUTLIER" data-percent="<?php
  $output=number_format((float)(($outlier/$total_account)*100),2,'.','');
echo $output.'%'; ?>"> <svg viewBox="-10 -10 220 220">
    <g fill="none" stroke-width="6" transform="translate(100,100)">
      <path d="M 0,-100 A 100,100 0 0,1 86.6,-50" stroke="url(#cl1)"/>
      <path d="M 86.6,-50 A 100,100 0 0,1 86.6,50" stroke="url(#cl2)"/>
      <path d="M 86.6,50 A 100,100 0 0,1 0,100" stroke="url(#cl3)"/>
      <path d="M 0,100 A 100,100 0 0,1 -86.6,50" stroke="url(#cl4)"/>
      <path d="M -86.6,50 A 100,100 0 0,1 -86.6,-50" stroke="url(#cl5)"/>
      <path d="M -86.6,-50 A 100,100 0 0,1 0,-100" stroke="url(#cl6)"/>
    </g>
    </svg> <svg viewBox="-10 -10 220 220">
    <path d="M200,100 C200,44.771525 155.228475,0 100,0 C44.771525,0 0,44.771525 0,100 C0,155.228475 44.771525,200 100,200 C155.228475,200 200,155.228475 200,100 Z" stroke-dashoffset="<?php echo $output*6.29?>"></path>
    </svg> </li>

</ul>
<svg width="0" height="0">
<defs>
  <linearGradient id="cl1" gradientUnits="objectBoundingBox" x1="0" y1="0" x2="1" y2="1">
    <stop stop-color="#618099"/>
    <stop offset="100%" stop-color="#8e6677"/>
  </linearGradient>
  <linearGradient id="cl2" gradientUnits="objectBoundingBox" x1="0" y1="0" x2="0" y2="1">
    <stop stop-color="#8e6677"/>
    <stop offset="100%" stop-color="#9b5e67"/>
  </linearGradient>
  <linearGradient id="cl3" gradientUnits="objectBoundingBox" x1="1" y1="0" x2="0" y2="1">
    <stop stop-color="#9b5e67"/>
    <stop offset="100%" stop-color="#9c787a"/>
  </linearGradient>
  <linearGradient id="cl4" gradientUnits="objectBoundingBox" x1="1" y1="1" x2="0" y2="0">
    <stop stop-color="#9c787a"/>
    <stop offset="100%" stop-color="#817a94"/>
  </linearGradient>
  <linearGradient id="cl5" gradientUnits="objectBoundingBox" x1="0" y1="1" x2="0" y2="0">
    <stop stop-color="#817a94"/>
    <stop offset="100%" stop-color="#498a98"/>
  </linearGradient>
  <linearGradient id="cl6" gradientUnits="objectBoundingBox" x1="0" y1="1" x2="1" y2="0">
    <stop stop-color="#498a98"/>
    <stop offset="100%" stop-color="#618099"/>
  </linearGradient>
</defs>
</svg> 
</div> 


    <div style="margin-left: 40px; margin-right:40px;">
        <div class="text-container">
        <div class="row">
            <div onclick="open_table(event, 'top_performer_table')" class="text-border text-center col-lg-3 col-md-6 ">
                <img src="image/top_performer.png" width="50px" height="50px">
                <p style="font-size: 100px;"><?php echo $top_performer ?></p>
                <p><b>TOP PERFORMERS</b></p>
            </div>
            <div onclick="open_table(event, 'pipeline_builder_table')" class="text-border text-center col-lg-3 col-md-6 ">
                <img src="image/pipeline_builder.png" width="50px" height="50px">
                <p style="font-size: 100px;"><?php echo $pipeline_builder ?></p>
                <p style="color:green"><b>PIPELINE BUILDER</b></p>
            </div>
            <div onclick="open_table(event, 'deal_maker_table')" class="text-border text-center col-lg-3 col-md-6 ">
                <img src="image/deal_maker.png" width="50px" height="50px">
                <p style="font-size: 100px;"><?php echo $deal_maker ?></p>
                <p style="color:orange"><b>DEAL MAKER</b></p>
            </div>
            <div onclick="open_table(event, 'under_performer_table')" class="text-center col-lg-3 col-md-6">
                <img src="image/under_performer.png" width="50px" height="50px">
                <p style="font-size: 100px;"><?php echo $under_performer ?></p>
                <p style="color:red"><b>UNDER PERFORMER</b> </p>
            </div>
        </div>

        <div id="under_performer_table" class="tabcontent ">
        <p>
        <br>
        <br>
        <br>    
        </p>
        <table id="datatable_under_performer" class="data-table" >
        <caption class="title">Under Performer Data</caption>
        <thead>
            <tr>
                <th style="text-align:center">AGENT ID</th>
                <th style="text-align:center">AGENT NAME</th>
                <th style="text-align:center">NO OF HOSPITALS</th>
                <th style="text-align:center">NO OF PRODUCTS</th>
                <th style="text-align:center">GOOD PRODUCTS</th>
            </tr>
        </thead>
        <tbody>

        <?php

 



        for($index=0;$index<count($array_under_performer);$index++)
        {

            
            $avg_days=4;
            $query3=mysqli_query($conn,"SELECT * from daily_updates_prototype where agent='$array_under_performer[$index]' order by stage_id ");
            $on_time=0;
            $now=date('Y-m-d');

            while ($row = mysqli_fetch_array($query3)){
                if($row['stage_id']==1){
                    if(round(abs(strtotime($now)-strtotime($row['product_id_start_date']))/(60*60*24))<=$avg_days){
                        $on_time+=1;
                    }
                }

               if($row['stage_id']==2){
                    if(round(abs(strtotime($now)-strtotime($row['product_id_start_date']))/(60*60*24))<=2*$avg_days){
                        $on_time+=1;
                    }
                    
                }
                if($row['stage_id']==3){
                    if(round(abs(strtotime($now)-strtotime($row['product_id_start_date']))/(60*60*24))<=3*$avg_days){
                        $on_time+=1;
                    }
                }
                if($row['stage_id']==4){
                    if(round(abs(strtotime($now)-strtotime($row['product_id_start_date']))/(60*60*24))<=4*$avg_days){
                        $on_time+=1;
                    }
                }
                if($row['stage_id']==5){
                    if(round(abs(strtotime($now)-strtotime($row['product_id_start_date']))/(60*60*24))<=5*$avg_days){
                        $on_time+=1;
                    }
                }
                if($row['stage_id']==6){
                    if(round(abs(strtotime($now)-strtotime($row['product_id_start_date']))/(60*60*24))<=6*$avg_days){
                        $on_time+=1;
                    }
                }
                if($row['stage_id']==7){
                    if(round(abs(strtotime($now)-strtotime($row['product_id_start_date']))/(60*60*24))<=7*$avg_days){
                        $on_time+=1;
                    }
                }
                if($row['stage_id']==8){
                    if(round(abs(strtotime($now)-strtotime($row['product_id_start_date']))/(60*60*24))<=8*$avg_days){
                        $on_time+=1;
                    }
                }
            }

            $query0=mysqli_query($conn, "SELECT DISTINCT agent_id,agent from daily_updates_prototype  where agent='$array_under_performer[$index]'");
            $query1=mysqli_query($conn,"SELECT count(DISTINCT account) from daily_updates_prototype where agent= '$array_under_performer[$index]'");
            $query2=mysqli_query($conn,"SELECT count(DISTINCT account,product) from daily_updates_prototype where agent= '$array_under_performer[$index]'");
            while ($row0 = mysqli_fetch_array($query0) and $row1 = mysqli_fetch_array($query1) and $row2 = mysqli_fetch_array($query2))
            {
                echo '<tr>
                        <td style="text-align:center">'.$row0['agent_id'].'</td>
                        <td style="text-align:center">'.$row0['agent'].'</td>
                        <td style="text-align:center">'.$row1['count(DISTINCT account)'].'</td>
                        <td style="text-align:center">'.$row2['count(DISTINCT account,product)'].'</td>
                        <td style="text-align:center">'.$on_time.'</td>
                    </tr>';
            }
        }
        ?>


        </tbody>
    </table>
    
    </div>



        <div id="top_performer_table" class="tabcontent ">
        <p>
        <br>
        <br>
        <br>    
        <table id="datatable_top_performer" class="data-table">
        <caption class="title">Top Performer Data</caption>
        <thead>
            <tr>
                <th style="text-align:center">AGENT ID</th>
                <th style="text-align:center">AGENT NAME</th>
                <th style="text-align:center">NO OF HOSPITALS</th>
                <th style="text-align:center">NO OF PRODUCTS</th>
                <th style="text-align:center">GOOD PRODUCTS</th>
            </tr>
        </thead>
        <tbody>

        <?php





        for($index=0;$index<count($array_top_performer);$index++)
        {

            
            $avg_days=4;
            $query3=mysqli_query($conn,"SELECT * from daily_updates_prototype where agent='$array_top_performer[$index]' order by stage_id ");
            $on_time=0;
            $now=date('Y-m-d');

            while ($row = mysqli_fetch_array($query3)){
                if($row['stage_id']==1){
                    if(round(abs(strtotime($now)-strtotime($row['product_id_start_date']))/(60*60*24))<=$avg_days){
                        $on_time+=1;
                    }
                }

               if($row['stage_id']==2){
                    if(round(abs(strtotime($now)-strtotime($row['product_id_start_date']))/(60*60*24))<=2*$avg_days){
                        $on_time+=1;
                    }
                    
                }
                if($row['stage_id']==3){
                    if(round(abs(strtotime($now)-strtotime($row['product_id_start_date']))/(60*60*24))<=3*$avg_days){
                        $on_time+=1;
                    }
                }
                if($row['stage_id']==4){
                    if(round(abs(strtotime($now)-strtotime($row['product_id_start_date']))/(60*60*24))<=4*$avg_days){
                        $on_time+=1;
                    }
                }
                if($row['stage_id']==5){
                    if(round(abs(strtotime($now)-strtotime($row['product_id_start_date']))/(60*60*24))<=5*$avg_days){
                        $on_time+=1;
                    }
                }
                if($row['stage_id']==6){
                    if(round(abs(strtotime($now)-strtotime($row['product_id_start_date']))/(60*60*24))<=6*$avg_days){
                        $on_time+=1;
                    }
                }
                if($row['stage_id']==7){
                    if(round(abs(strtotime($now)-strtotime($row['product_id_start_date']))/(60*60*24))<=7*$avg_days){
                        $on_time+=1;
                    }
                }
                if($row['stage_id']==8){
                    if(round(abs(strtotime($now)-strtotime($row['product_id_start_date']))/(60*60*24))<=8*$avg_days){
                        $on_time+=1;
                    }
                }
            }

            $query0=mysqli_query($conn, "SELECT DISTINCT agent_id,agent from daily_updates_prototype  where agent='$array_top_performer[$index]'");
            $query1=mysqli_query($conn,"SELECT count(DISTINCT account) from daily_updates_prototype where agent= '$array_top_performer[$index]'");
            $query2=mysqli_query($conn,"SELECT count(DISTINCT account,product) from daily_updates_prototype where agent= '$array_top_performer[$index]'");
            while ($row0 = mysqli_fetch_array($query0) and $row1 = mysqli_fetch_array($query1) and $row2 = mysqli_fetch_array($query2))
            {
                echo '<tr>
                        <td style="text-align:center">'.$row0['agent_id'].'</td>
                        <td style="text-align:center">'.$row0['agent'].'</td>
                        <td style="text-align:center">'.$row1['count(DISTINCT account)'].'</td>
                        <td style="text-align:center">'.$row2['count(DISTINCT account,product)'].'</td>
                        <td style="text-align:center">'.$on_time.'</td>
                    </tr>';
            }
        }
        ?>


        </tbody>
    </table>
    
    </div>



        

        <div id="pipeline_builder_table" class="tabcontent ">
        <p>
        <br>
        <br>
        <br>    
        </p>
        <table id="datatable_pipeline_builder" class="data-table" >
        <caption class="title">Pipeline Builder Data</caption>
        <thead>
            <tr>
                <th style="text-align:center">AGENT ID</th>
                <th style="text-align:center">AGENT NAME</th>
                <th style="text-align:center">NO OF HOSPITALS</th>
                <th style="text-align:center">NO OF PRODUCTS</th>
                <th style="text-align:center">GOOD PRODUCTS</th>
            </tr>
        </thead>
        <tbody>

        <?php





        for($index=0;$index<count($array_pipeline_builder);$index++)
        {

            
            $avg_days=4;
            $query3=mysqli_query($conn,"SELECT * from daily_updates_prototype where agent='$array_pipeline_builder[$index]' order by stage_id ");
            $on_time=0;
            $now=date('Y-m-d');

            while ($row = mysqli_fetch_array($query3)){
                if($row['stage_id']==1){
                    if(round(abs(strtotime($now)-strtotime($row['product_id_start_date']))/(60*60*24))<=$avg_days){
                        $on_time+=1;
                    }
                }

               if($row['stage_id']==2){
                    if(round(abs(strtotime($now)-strtotime($row['product_id_start_date']))/(60*60*24))<=2*$avg_days){
                        $on_time+=1;
                    }
                    
                }
                if($row['stage_id']==3){
                    if(round(abs(strtotime($now)-strtotime($row['product_id_start_date']))/(60*60*24))<=3*$avg_days){
                        $on_time+=1;
                    }
                }
                if($row['stage_id']==4){
                    if(round(abs(strtotime($now)-strtotime($row['product_id_start_date']))/(60*60*24))<=4*$avg_days){
                        $on_time+=1;
                    }
                }
                if($row['stage_id']==5){
                    if(round(abs(strtotime($now)-strtotime($row['product_id_start_date']))/(60*60*24))<=5*$avg_days){
                        $on_time+=1;
                    }
                }
                if($row['stage_id']==6){
                    if(round(abs(strtotime($now)-strtotime($row['product_id_start_date']))/(60*60*24))<=6*$avg_days){
                        $on_time+=1;
                    }
                }
                if($row['stage_id']==7){
                    if(round(abs(strtotime($now)-strtotime($row['product_id_start_date']))/(60*60*24))<=7*$avg_days){
                        $on_time+=1;
                    }
                }
                if($row['stage_id']==8){
                    if(round(abs(strtotime($now)-strtotime($row['product_id_start_date']))/(60*60*24))<=8*$avg_days){
                        $on_time+=1;
                    }
                }
            }

            $query0=mysqli_query($conn, "SELECT DISTINCT agent_id,agent from daily_updates_prototype  where agent='$array_pipeline_builder[$index]'");
            $query1=mysqli_query($conn,"SELECT count(DISTINCT account) from daily_updates_prototype where agent= '$array_pipeline_builder[$index]'");
            $query2=mysqli_query($conn,"SELECT count(DISTINCT account,product) from daily_updates_prototype where agent= '$array_pipeline_builder[$index]'");
            while ($row0 = mysqli_fetch_array($query0) and $row1 = mysqli_fetch_array($query1) and $row2 = mysqli_fetch_array($query2))
            {
                echo '<tr>
                        <td style="text-align:center">'.$row0['agent_id'].'</td>
                        <td style="text-align:center">'.$row0['agent'].'</td>
                        <td style="text-align:center">'.$row1['count(DISTINCT account)'].'</td>
                        <td style="text-align:center">'.$row2['count(DISTINCT account,product)'].'</td>
                        <td style="text-align:center">'.$on_time.'</td>
                    </tr>';
            }
        }
        ?>


        </tbody>
    </table>
    
    </div>





    <div id="deal_maker_table" class="tabcontent ">
        <p>
        <br>
        <br>
        <br> 
        </p>   
        <table id="datatable_deal_maker" class="data-table" >
        <caption class="title">Deal Maker Data</caption>
        <thead>
            <tr>
                <th style="text-align:center">AGENT ID</th>
                <th style="text-align:center">AGENT NAME</th>
                <th style="text-align:center">NO OF HOSPITALS</th>
                <th style="text-align:center">NO OF PRODUCTS</th>
                <th style="text-align:center">GOOD PRODUCTS</th>
            </tr>
        </thead>
        <tbody>

        <?php





        for($index=0;$index<count($array_deal_maker);$index++)
        {

            
            $avg_days=4;
            $query3=mysqli_query($conn,"SELECT * from daily_updates_prototype where agent='$array_deal_maker[$index]' order by stage_id ");
            $on_time=0;
            $now=date('Y-m-d');

            while ($row = mysqli_fetch_array($query3)){
                if($row['stage_id']==1){
                    if(round(abs(strtotime($now)-strtotime($row['product_id_start_date']))/(60*60*24))<=$avg_days){
                        $on_time+=1;
                    }
                }

               if($row['stage_id']==2){
                    if(round(abs(strtotime($now)-strtotime($row['product_id_start_date']))/(60*60*24))<=2*$avg_days){
                        $on_time+=1;
                    }
                    
                }
                if($row['stage_id']==3){
                    if(round(abs(strtotime($now)-strtotime($row['product_id_start_date']))/(60*60*24))<=3*$avg_days){
                        $on_time+=1;
                    }
                }
                if($row['stage_id']==4){
                    if(round(abs(strtotime($now)-strtotime($row['product_id_start_date']))/(60*60*24))<=4*$avg_days){
                        $on_time+=1;
                    }
                }
                if($row['stage_id']==5){
                    if(round(abs(strtotime($now)-strtotime($row['product_id_start_date']))/(60*60*24))<=5*$avg_days){
                        $on_time+=1;
                    }
                }
                if($row['stage_id']==6){
                    if(round(abs(strtotime($now)-strtotime($row['product_id_start_date']))/(60*60*24))<=6*$avg_days){
                        $on_time+=1;
                    }
                }
                if($row['stage_id']==7){
                    if(round(abs(strtotime($now)-strtotime($row['product_id_start_date']))/(60*60*24))<=7*$avg_days){
                        $on_time+=1;
                    }
                }
                if($row['stage_id']==8){
                    if(round(abs(strtotime($now)-strtotime($row['product_id_start_date']))/(60*60*24))<=8*$avg_days){
                        $on_time+=1;
                    }
                }
            }

            $query0=mysqli_query($conn, "SELECT DISTINCT agent_id,agent from daily_updates_prototype  where agent='$array_deal_maker[$index]'");
            $query1=mysqli_query($conn,"SELECT count(DISTINCT account) from daily_updates_prototype where agent= '$array_deal_maker[$index]'");
            $query2=mysqli_query($conn,"SELECT count(DISTINCT account,product) from daily_updates_prototype where agent= '$array_deal_maker[$index]'");
            while ($row0 = mysqli_fetch_array($query0) and $row1 = mysqli_fetch_array($query1) and $row2 = mysqli_fetch_array($query2))
            {
                echo '<tr>
                        <td style="text-align:center">'.$row0['agent_id'].'</td>
                        <td style="text-align:center">'.$row0['agent'].'</td>
                        <td style="text-align:center">'.$row1['count(DISTINCT account)'].'</td>
                        <td style="text-align:center">'.$row2['count(DISTINCT account,product)'].'</td>
                        <td style="text-align:center">'.$on_time.'</td>
                    </tr>';
            }
        }
        ?>


        </tbody>
    </table>
    
    </div>
    </div>       
    </div> 
    











    


    <h1 id="calendar">CALENDAR ACTIVITY</h1>
    
    <table id='calendarTable' class="data-table">
        <thead>
            <tr>
                <th style="text-align:center">MEETING DATE</th>
                <th style="text-align:center">PRODUCT</th>
                <th style="text-align:center">HOSPITAL</th>
                <th style="text-align:center">GRADE</th>
                <th style="text-align:center">STAGE</th>
                <th style="text-align:center">MIR STATUS</th>
            </tr>
        </thead>

        <tbody>
        <?php

        
        $query0=mysqli_query($conn,"SELECT * FROM daily_updates_prototype ORDER BY daily_updates_prototype.date");
        $mir_status='no';
        while ($row0 = mysqli_fetch_array($query0))
        {
            if ($row0['stage_id']==1){
                if(round(abs(strtotime($now)-strtotime($row0['product_id_start_date']))/(60*60*24*1))*8 <=32*1.3){
                    $mir_status='no';
                } 
                else{
                    $mir_status='yes';
                }
            }
            else if ($row0['stage_id']==2){
                if(round(abs(strtotime($now)-strtotime($row0['product_id_start_date']))/(60*60*24*2))*8 <=32*1.3){
                    $mir_status='no';
                } 
                else{
                    $mir_status='yes';
                }
            }
            else if ($row0['stage_id']==3){
                if(round(abs(strtotime($now)-strtotime($row0['product_id_start_date']))/(60*60*24*3))*8 <=32*1.3){
                    $mir_status='no';
                } 
                else{
                    $mir_status='yes';
                }
            }
            if ($row0['stage_id']==4){
                if(round(abs(strtotime($now)-strtotime($row0['product_id_start_date']))/(60*60*24*4))*8 <=32*1.3){
                    $mir_status='no';
                } 
                else{
                    $mir_status='yes';
                }
            }
            else if ($row0['stage_id']==5){
                if(round(abs(strtotime($now)-strtotime($row0['product_id_start_date']))/(60*60*24*5))*8 <=32*1.3){
                    $mir_status='no';
                } 
                else{
                    $mir_status='yes';
                }
            }
            else if ($row0['stage_id']==6){
                if(round(abs(strtotime($now)-strtotime($row0['product_id_start_date']))/(60*60*24*6))*8 <=32*1.3){
                    $mir_status='no';
                } 
                else{
                    $mir_status='yes';
                }
            }
            else if ($row0['stage_id']==7){
                if(round(abs(strtotime($now)-strtotime($row0['product_id_start_date']))/(60*60*24*7))*8 <=32*1.3){
                    $mir_status='no';
                } 
                else{
                    $mir_status='yes';
                }
            }
            else if ($row0['stage_id']==8){
                if(round(abs(strtotime($now)-strtotime($row0['product_id_start_date']))/(60*60*24*8))*8 <=32*1.3){
                    $mir_status='no';
                } 
                else{
                    $mir_status='yes';
                }
            }




            
            echo '<tr>
                    <td style="text-align:center">'.$row0['date'].'</td>
                    <td style="text-align:center">'.$row0['product'].'</td>
                    <td style="text-align:center">'.$row0['account'].'</td>
                    <td style="text-align:center">'.'A'.'</td>
                    <td style="text-align:center">'.$row0['stage'].'</td>
                    <td style="text-align:center">'.$mir_status.'</td>
                </tr>';
        }
        // $temp3=mysqli_query($conn,'drop table temp1');
        // $temp4=mysqli_query($conn,'drop table temp2');
        ?>
        </tbody>

    </table>

        

    </div>
</div>

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


<div class="text-center">Product Effectiveness Holistic</div>
<div id="product_effectiveness_holistic" style="height: 300px; width: 100% ;padding-bottom:50px;"></div>

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


<div class="text-center">Product Effectiveness Stage Wise</div>
<div id="product_effectiveness_stage_wise" style="height: 290px; width: 100% ;padding-bottom:40px"></div>

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


<div class="text-center">Account Effectiveness Holistic</div>
<div id="account_effectiveness_holistic" style="height: 300px; width: 100%; padding-bottom: 50px"></div>

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
    



<div class="overlay"></div>




<script type="text/javascript">
    
new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'product_effectiveness_holistic',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [


    <?php
    
    $query=mysqli_query($conn,"SELECT DISTINCT account from daily_updates_prototype");
    $expected_time_polysyte=0;
    $expected_time_autofusion=0;
    $expected_time_novocent=0;
    $expected_time_polysafety=0;    
    $mean_funnel_time=32;

    while($row=mysqli_fetch_array($query)){
         
         $graph_account_name=$row['account'];
         $query1=mysqli_query($conn,"SELECT product_id_start_date,stage_id from daily_updates_prototype where account='$graph_account_name' and product='Polysyte'");
         while($row1=mysqli_fetch_array($query1)){
            $expected_time_polysyte = round(abs(strtotime($now)-strtotime($row1['product_id_start_date']))/(60*60*24*$row1['stage_id']))*8;
        }

        $query2=mysqli_query($conn,"SELECT product_id_start_date,stage_id from daily_updates_prototype where account='$graph_account_name' and product='Autofusion'");
         while($row2=mysqli_fetch_array($query2)){
            $expected_time_autofusion = round(abs(strtotime($now)-strtotime($row2['product_id_start_date']))/(60*60*24*$row2['stage_id']))*8;
        }

        $query3=mysqli_query($conn,"SELECT product_id_start_date,stage_id from daily_updates_prototype where account='$graph_account_name' and product='Novocent'");
         while($row3=mysqli_fetch_array($query3)){
            $expected_time_novocent = round(abs(strtotime($now)-strtotime($row3['product_id_start_date']))/(60*60*24*$row3['stage_id']))*8;
        }

        $query4=mysqli_query($conn,"SELECT product_id_start_date,stage_id from daily_updates_prototype where account='$graph_account_name' and product='Polysafety'");
         while($row4=mysqli_fetch_array($query4)){
            $expected_time_polyfusion = round(abs(strtotime($now)-strtotime($row4['product_id_start_date']))/(60*60*24*$row4['stage_id']))*8;
        }

                $output_polysyte=number_format((float)($mean_funnel_time/$expected_time_polysyte),2,'.','');
        $output_autofusion=number_format((float)($mean_funnel_time/$expected_time_autofusion),2,'.','');
        $output_novocent=number_format((float)($mean_funnel_time/$expected_time_novocent),2,'.','');
        $output_polyfusion=number_format((float)($mean_funnel_time/$expected_time_polyfusion),2,'.','');

        echo"{ hospital: '".$row['account']."', Polysyte:".$output_polysyte." , Autofusion:".$output_autofusion.", Novocent:".$output_novocent.", Polysafety:".$output_polyfusion."},";
    }

    // echo "{ hospital: 'karan' , value: 20 ,a:0},
    // { hospital: '2001', value: 10,z:15,a:0 },
    // { hospital: '2002', value: 5 ,z:10,a:0},
    // { hospital: '2003', value: 5 ,a:0},
    // { hospital: '2004', value: 20 ,a:0 },";

    ?>


    
  ],
  // The name of the data record attribute that contains x-values.
  xkey: ['hospital'],
  // A list of names of data record attributes that contain y-values.
  ykeys: ['Polysyte','Autofusion','Novocent','Polysafety'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Polysyte','Autofusion','Novocent','Polysafety'],

   // lineColors: ['#000000','#00ff00'],
   // pointFillColors: ['#ff0000',"#000000"],
   lineWidth:['3'],
   fillOpacity:['0.4'],
   parseTime:false,
   xLabelAngle:90,
   resize:true

});

</script>



<script type="text/javascript">
    
new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'product_effectiveness_stage_wise',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [


    <?php
    
    $query=mysqli_query($conn,"SELECT stage_id ,stage_name from master_sales_funnel");
    while($row=mysqli_fetch_array($query)){
         $graph_stage_id=$row['stage_id'];
         $mean_stage_time=0;
         $num_of_products=0;
         $query1=mysqli_query($conn,"SELECT  product_id_start_date from daily_updates_prototype where stage_id='$graph_stage_id'");
         while($row1=mysqli_fetch_array($query1)){
            $mean_stage_time+= round(abs(strtotime($now)-strtotime($row1['product_id_start_date']))/(60*60*24)); 
            $num_of_products+=1;
        }
        $output=number_format((float)($mean_stage_time/$num_of_products),2,'.','');

        echo"{ Stage: 'Stage ".$row['stage_id']."', Average_Days:".$output."},";
    }

    // echo "{ hospital: 'karan' , value: 20 ,a:0},
    // { hospital: '2001', value: 10,z:15,a:0 },
    // { hospital: '2002', value: 5 ,z:10,a:0},
    // { hospital: '2003', value: 5 ,a:0},
    // { hospital: '2004', value: 20 ,a:0 },";

    ?>


    
  ],
  // The name of the data record attribute that contains x-values.
  xkey: ['Stage'],
  // A list of names of data record attributes that contain y-values.
  ykeys: ['Average_Days'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Average Days'],

   // lineColors: ['#000000','#00ff00'],
   // pointFillColors: ['#ff0000',"#000000"],
   lineWidth:['3'],
   fillOpacity:['0.4'],
   parseTime:false,
   xLabelAngle:90,
   resize:true

});

</script>


<script type="text/javascript">
    
new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'account_effectiveness_holistic',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [


        <?php
    
    $query=mysqli_query($conn,"SELECT DISTINCT product from daily_updates_prototype");
    $expected_time_1=0;
    $expected_time_2=0;
    $expected_time_3=0;
    $expected_time_4=0;
    $expected_time_5=0;
    $expected_time_6=0;
    $expected_time_7=0;
    $expected_time_8=0;
    $expected_time_9=0;
    $expected_time_10=0;
    $expected_time_11=0;
    $expected_time_12=0;
    $expected_time_13=0;
    $expected_time_14=0;
    $expected_time_15=0;

    $mean_funnel_time=32;

    while($row=mysqli_fetch_array($query)){
         
         $graph_product_name=$row['product'];
         $query1=mysqli_query($conn,"SELECT product_id_start_date,stage_id from daily_updates_prototype where product='$graph_product_name' and account='Apollo Hospital'");
         while($row1=mysqli_fetch_array($query1)){
            $expected_time_1 = round(abs(strtotime($now)-strtotime($row1['product_id_start_date']))/(60*60*24*$row1['stage_id']))*8;
        }

        $query2=mysqli_query($conn,"SELECT product_id_start_date,stage_id from daily_updates_prototype where product='$graph_product_name' and account='Fortis Hospital'");
         while($row2=mysqli_fetch_array($query2)){
            $expected_time_2 = round(abs(strtotime($now)-strtotime($row2['product_id_start_date']))/(60*60*24*$row2['stage_id']))*8;
        }

        $query3=mysqli_query($conn,"SELECT product_id_start_date,stage_id from daily_updates_prototype where product='$graph_product_name' and account='Narayana Hridyalaya'");
         while($row3=mysqli_fetch_array($query3)){
            $expected_time_3 = round(abs(strtotime($now)-strtotime($row3['product_id_start_date']))/(60*60*24*$row3['stage_id']))*8;
        }

        $query4=mysqli_query($conn,"SELECT product_id_start_date,stage_id from daily_updates_prototype where product='$graph_product_name' and account='Umkal Hospital'");
         while($row4=mysqli_fetch_array($query4)){
            $expected_time_4 = round(abs(strtotime($now)-strtotime($row4['product_id_start_date']))/(60*60*24*$row4['stage_id']))*8;
        }


        $query5=mysqli_query($conn,"SELECT product_id_start_date,stage_id from daily_updates_prototype where product='$graph_product_name' and account='Kalyani Hospital'");
         while($row5=mysqli_fetch_array($query5)){
            $expected_time_5 = round(abs(strtotime($now)-strtotime($row5['product_id_start_date']))/(60*60*24*$row5['stage_id']))*8;
        }

        $query6=mysqli_query($conn,"SELECT product_id_start_date,stage_id from daily_updates_prototype where product='$graph_product_name' and account='Medanta'");
         while($row6=mysqli_fetch_array($query6)){
            $expected_time_6 = round(abs(strtotime($now)-strtotime($row6['product_id_start_date']))/(60*60*24*$row6['stage_id']))*8;
        }

        $query7=mysqli_query($conn,"SELECT product_id_start_date,stage_id from daily_updates_prototype where product='$graph_product_name' and account='Holy Child Hospital'");
         while($row7=mysqli_fetch_array($query7)){
            $expected_time_7 = round(abs(strtotime($now)-strtotime($row7['product_id_start_date']))/(60*60*24*$row7['stage_id']))*8;
        }

        $query8=mysqli_query($conn,"SELECT product_id_start_date,stage_id from daily_updates_prototype where product='$graph_product_name' and account='Holy Family'");
         while($row8=mysqli_fetch_array($query8)){
            $expected_time_8 = round(abs(strtotime($now)-strtotime($row8['product_id_start_date']))/(60*60*24*$row8['stage_id']))*8;
        }


         $query9=mysqli_query($conn,"SELECT product_id_start_date,stage_id from daily_updates_prototype where product='$graph_product_name' and account='Cloudnine'");
         while($row9=mysqli_fetch_array($query9)){
            $expected_time_9 = round(abs(strtotime($now)-strtotime($row9['product_id_start_date']))/(60*60*24*$row9['stage_id']))*8;
        }

        $query10=mysqli_query($conn,"SELECT product_id_start_date,stage_id from daily_updates_prototype where product='$graph_product_name' and account='Sparsh Hospital'");
         while($row10=mysqli_fetch_array($query10)){
            $expected_time_10 = round(abs(strtotime($now)-strtotime($row10['product_id_start_date']))/(60*60*24*$row10['stage_id']))*8;
        }

        $query11=mysqli_query($conn,"SELECT product_id_start_date,stage_id from daily_updates_prototype where product='$graph_product_name' and account='Aryan'");
         while($row11=mysqli_fetch_array($query11)){
            $expected_time_11 = round(abs(strtotime($now)-strtotime($row11['product_id_start_date']))/(60*60*24*$row11['stage_id']))*8;
        }

        $query12=mysqli_query($conn,"SELECT product_id_start_date,stage_id from daily_updates_prototype where product='$graph_product_name' and account='Triveni Hospital'");
         while($row12=mysqli_fetch_array($query12)){
            $expected_time_12 = round(abs(strtotime($now)-strtotime($row12['product_id_start_date']))/(60*60*24*$row12['stage_id']))*8;
        }

         $query13=mysqli_query($conn,"SELECT product_id_start_date,stage_id from daily_updates_prototype where product='$graph_product_name' and account='Sunrise'");
         while($row13=mysqli_fetch_array($query13)){
            $expected_time_13 = round(abs(strtotime($now)-strtotime($row13['product_id_start_date']))/(60*60*24*$row13['stage_id']))*8;
        }

        $query14=mysqli_query($conn,"SELECT product_id_start_date,stage_id from daily_updates_prototype where product='$graph_product_name' and account='Max Hospital'");
         while($row14=mysqli_fetch_array($query14)){
            $expected_time_14 = round(abs(strtotime($now)-strtotime($row14['product_id_start_date']))/(60*60*24*$row14['stage_id']))*8;
        }

        $query15=mysqli_query($conn,"SELECT product_id_start_date,stage_id from daily_updates_prototype where product='$graph_product_name' and account='Columbia Asia'");
         while($row15=mysqli_fetch_array($query15)){
            $expected_time_15 = round(abs(strtotime($now)-strtotime($row15['product_id_start_date']))/(60*60*24*$row15['stage_id']))*8;
        }

        $output_1=number_format((float)($mean_funnel_time/$expected_time_1),2,'.','');
        $output_2=number_format((float)($mean_funnel_time/$expected_time_2),2,'.','');
        $output_3=number_format((float)($mean_funnel_time/$expected_time_3),2,'.','');
        $output_4=number_format((float)($mean_funnel_time/$expected_time_4),2,'.','');
        $output_5=number_format((float)($mean_funnel_time/$expected_time_5),2,'.','');
        $output_6=number_format((float)($mean_funnel_time/$expected_time_6),2,'.','');
        $output_7=number_format((float)($mean_funnel_time/$expected_time_7),2,'.','');
        $output_8=number_format((float)($mean_funnel_time/$expected_time_8),2,'.','');
        $output_9=number_format((float)($mean_funnel_time/$expected_time_9),2,'.','');
        $output_10=number_format((float)($mean_funnel_time/$expected_time_10),2,'.','');
        $output_11=number_format((float)($mean_funnel_time/$expected_time_11),2,'.','');
        $output_12=number_format((float)($mean_funnel_time/$expected_time_12),2,'.','');
        $output_13=number_format((float)($mean_funnel_time/$expected_time_13),2,'.','');
        $output_14=number_format((float)($mean_funnel_time/$expected_time_14),2,'.','');
        $output_15=number_format((float)($mean_funnel_time/$expected_time_15),2,'.','');

        echo"{ Product: '".$row['product']."', Apollo_Hospital:".$output_1." , Fortis_Hospital:".$output_2.", Narayana_Hridyalaya:".$output_3.", Umkal_Hospital:".$output_4.", Kalyani_Hospital:".$output_5.", Medanta:".$output_6.", Holy_Child_Hospital:".$output_7.", Holy_Family:".$output_8.", Cloudnine:".$output_9.", Sparsh_Hospital:".$output_10.", Aryan:".$output_11.", Triveni_Hospital:".$output_12.", Sunrise:".$output_13.", Max_Hospital:".$output_14.", Columbia_Asia:".$output_15."},";
    }

    // echo "{ hospital: 'karan' , value: 20 ,a:0},
    // { hospital: '2001', value: 10,z:15,a:0 },
    // { hospital: '2002', value: 5 ,z:10,a:0},
    // { hospital: '2003', value: 5 ,a:0},
    // { hospital: '2004', value: 20 ,a:0 },";

    ?>



    
  ],
  // The name of the data record attribute that contains x-values.
  xkey: ['Product'],
  // A list of names of data record attributes that contain y-values.
  ykeys: ['Apollo_Hospital','Fortis_Hospital','Narayana_Hridyalaya','Umkal_Hospital','Kalyani_Hospital','Medanta','Holy_Child_Hospital','Holy_Family','Cloudnine','Sparsh_Hospital','Aryan','Triveni_Hospital','Sunrise','Max_Hospital','Columbia_Asia'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Apollo_Hospital','Fortis_Hospital','Narayana_Hridyalaya','Umkal_Hospital','Kalyani_Hospital','Medanta','Holy_Child_Hospital','Holy_Family','Cloudnine','Sparsh_Hospital','Aryan','Triveni_Hospital','Sunrise','Max_Hospital','Columbia_Asia'],

   // lineColors: ['#000000','#00ff00'],
   // pointFillColors: ['#ff0000',"#000000"],
   lineWidth:['3'],
   fillOpacity:['0.4'],
   parseTime:false,
   xLabelAngle:90,
   resize:true

});

</script>






<script>
$('#datatable_top_performer').dataTable( {
  "lengthMenu": [ 3, 10, 50, 75, 100 ]
} );

$('#datatable_pipeline_builder').dataTable( {
  "lengthMenu": [ 3, 10, 50, 75, 100 ]
} );

$('#datatable_deal_maker').dataTable( {
  "lengthMenu": [ 3, 10, 50, 75, 100 ]
} );

$('#datatable_under_performer').dataTable( {
  "lengthMenu": [ 3, 10, 50, 75, 100 ]
} );

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




