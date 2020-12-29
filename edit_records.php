<?php
    session_start();
    include 'dbConfig.php';
    $username=$_SESSION['username'];
    $query="SELECT id FROM login where username='$username' ";
    $queryResult=$db->query($query);
    if($queryResult->num_rows>0){ 
        while ($row=$queryResult->fetch_assoc()) {
            $agent_id=$row['id'];
        }
    }
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



<body>













<div id="edit_table" >
   
        <table id="datatable" class="data-table">
        <thead>
            <tr>
                <th style="text-align:center">HOSPITAL</th>
                <th style="text-align:center">PRODUCT</th>
                <th style="text-align:center">PERSON_LINKED</th>
                <th style="text-align:center">PERSON_PROFILE</th>
				<th style="text-align:center">CURRENT_STAGE</th>
				<th style="text-align:center">CALENDAR_ACTIVITY</th>
				<th style="text-align:center">ADDITIONAL COMMENTS</th>	
				<th style="text-align:center">DATE</th>
				<th style="text-align:center">EDIT</th>	                
            </tr>
        </thead>
        <tbody>

        <?php
		$now=date('Y-m-d');
		$agent=$_SESSION['username'];
        $query=mysqli_query($db,"SELECT * from daily_updates_prototype where meeting_date='$now' and agent='$agent'");
    
        while ($row = mysqli_fetch_array($query))
        {
        	$s_no=$row['s_no'];
            echo '<tr>
                    <td style="text-align:center">'.$row['account'].'</td>
                    <td style="text-align:center">'.$row['product'].'</td>
                    <td style="text-align:center">'.$row['person_linked'].'</td>
                    <td style="text-align:center">'.$row['person_profile'].'</td>
                    <td style="text-align:center">'.$row['stage_id'].'</td>
                    <td style="text-align:center">'.$row['calendar_activity'].'</td>
                    <td style="text-align:center">'.$row['comments'].'</td>
                    <td style="text-align:center">'.$row['date'].'</td>
                    
                    <td style="text-align:center"><a href="edit_records_page.php?s_no='.$s_no.'">EDIT</a></td>
                </tr>';
        }?>

        </tbody>
    </table>
    
    </div>
   
<script>
$('#dataTable').dataTable( {
  "lengthMenu": [ 3, 10, 50, 75, 100 ]
} ); 
</script>

</body>
</html>