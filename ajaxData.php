<?php
//Include the database configuration file
include 'dbConfig.php';

if(!empty($_POST["account_id"])){
    // $query = $db->query("SELECT * FROM master_product WHERE account_id = ".$_POST['account_id']." AND status = 1 ORDER BY product_name ASC");
    
    // //Count total number of rows
    // $rowCount = $query->num_rows;
    
    // if($rowCount > 0){
        echo '<option value="">Select Product</option>';
        // while($row = $query->fetch_assoc()){ 
        // echo '<option value="'.$row['product_id'].'">'.$row['product_name'].'</option>';    
        echo '<option value="PRO001">Polysyte</option>';
        echo '<option value="PRO002">Autofusion</option>';
        echo '<option value="PRO003">Novocent</option>';
        echo '<option value="PRO004">Polysafety</option>';

        }
//     }else{
//         echo '<option value="">Product not available</option>';
//     }
// } 

elseif(!empty($_POST["product_id"])){

        echo '<option value="1">Select Stages</option>';
        echo '<option value="2">1</option>';
        echo '<option value="3">2</option>';
        echo '<option value="2">3</option>';
        echo '<option value="3">4</option>';
        echo '<option value="2">5</option>';
        echo '<option value="3">6</option>';
        echo '<option value="2">7</option>';
        echo '<option value="3">8</option>';
}
?>
