<?php 
/*
 * Richard Boyd
 * 2/28/2020
 * Final
 */
$lifetime = 60 * 60 * 24 * 7 * 1;    // 1 weeks in seconds
session_set_cookie_params($lifetime, '/');
    if(session_id() == '') { //Check to see if a session is started already
       session_start();  
    }
    
      // Create a variable array if needed
   if (!isset($_SESSION['bill_amount'])) {
		$_SESSION['bill_amount'] = '';  //give initial values
	}
	if (!isset($_SESSION['tip_percent'])) {
		$_SESSION['tip_percent'] = '';  //give initial values
	}
	if (!isset($_SESSION['number_people'])) {
		$_SESSION['number_people'] = '';  //give initial values
	}
    // default value of inital page load
    if (!isset($bill_amount)) { $bill_amount = $_SESSION['bill_amount']; } 
    if (!isset($tip_percent)) { $tip_percent = $_SESSION['tip_percent']; } 
    if (!isset($number_people)) { $number_people = $_SESSION['number_people']; } 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Deliverable</title>
    </head>
    <body>
        <h1>Deliverable</h1>
        <?php if (!empty($error_message)) { ?>
            <p class="error"><?php echo 'Error: '.htmlspecialchars($error_message); ?></p>
        <?php } ?> 
            <form action="process_tip.php" method="post" id="process_bill" >
                <div id="bill_amount">
                    <label>Bill Amount: </label>
                    <input type="number" step="0.01" min="0" name ="bill_amount" value="<?php echo $bill_amount; ?>" >
                </div>
                <br>
              
                <div id ="tip_percent"
                    <label for="tip_percent">Tip Percent: </label>
                        <select name="tip_percent">
                            <?php for ($i = 0; $i <= 50; $i += 5){?>
                    <option value = "<?php echo $i; ?>" 
                        <?php if($i == $tip_percent){?> selected <?php }?>>
                        <?php echo $i . '%'; ?>
                    </option>
                        <?php } ?>
                           
                        </select>
                </div>
                <br>
                <div id="number_people">
                    <label>Number of people:  </label>
                    <input type="number" name="number_people" min="1" value="<?php echo $number_people; ?>" >
                </div>
                <br>
                <br>
            <input type="submit" value="Submit">
            </form>
            <p>
           <?php if(isset($total_bill)){
            
        echo 'Bill Amount: '.htmlspecialchars($bill_amount_f);
        echo nl2br("\n");
        echo 'Tip Amount: '.htmlspecialchars($tip_percent). '%';
        echo nl2br("\n");
        echo 'Tip Total: '.htmlspecialchars($tip_amount_f);
        echo nl2br("\n");
        echo 'Number of people: '.htmlspecialchars($number_people);
        echo nl2br("\n");
        echo 'Total Bill: '.htmlspecialchars($total_bill_f);
        echo nl2br("\n");
        echo 'Bill per person: '.htmlspecialchars($bill_per_person_f);
        }
  
        ?>
                
          </p>
    </body>
</html>
