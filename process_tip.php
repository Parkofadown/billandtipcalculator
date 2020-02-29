<?php
/*
 * Richard Boyd
 * 2/28/2020
 * Final
 */
session_start();

 // get the data from the form
$bill_amount = filter_input(INPUT_POST, 'bill_amount', FILTER_VALIDATE_FLOAT);
$number_people = filter_input(INPUT_POST,'number_people',FILTER_VALIDATE_INT);
$tip_percent = filter_input(INPUT_POST, 'tip_percent');
    

// validate bill amount
if($bill_amount === FALSE){
    $error_message = 'Bill must be a valid number.';
} elseif ($bill_amount <= 0) {
    $error_message = 'Bill must be greater than zero.';
} 
 // validate tip percent
else if($tip_percent === FALSE){
    $error_message = 'Tip percent must be a valid number';
} elseif ($tip_percent < 0) {
    $error_message = 'Tip percent must be greater than zero.';
} elseif($tip_percent > 50){
    $error_message = 'Tip percent must be less than fifty.';
}
// validate number of people
else if ($number_people === FALSE){
      $error_message = 'Number of people must be a valid number.'; 
} else if ($number_people <= 0){
        $error_message = 'Number of people must be greater than zero.';   
} 
// set error message to empty if no invalid
else {
        $error_message = ''; 
    }
if ($error_message != '') {
        include('tip.php');
        exit();
}
          // save values to session
    $_SESSION['bill_amount'] = $bill_amount;
    $_SESSION['tip_percent'] = $tip_percent;
    $_SESSION['number_people'] = $number_people;

    // calculate the bill
    $real_percent = $tip_percent / 100; 
    $tip_amount = ($bill_amount * $real_percent);
    $total_bill = $bill_amount + $tip_amount;
    $bill_per_person = ($total_bill / $number_people);
    
    // format the bill
    $bill_amount_f = '$'. number_format($bill_amount, 2);
    $tip_amount_f = '$'.number_format($tip_amount, 2);
    $total_bill_f = '$'. number_format($total_bill, 2);
    $bill_per_person_f = '$'. number_format($bill_per_person, 2);
    
    // send back
    include('tip.php');
    exit();
?>
