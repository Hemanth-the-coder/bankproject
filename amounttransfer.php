<?php
   include "connect.php";
   include "header.php";
   // $query = "SELECT * FROM `transactions`";
   // $result = mysqli_query($con , $query);
   $sender = $_POST['from'];
   $receiver = $_POST['to'];
   $amount = $_POST['amount'];
   $query = "SELECT * FROM `userdetails` WHERE User_ID = '$sender'";
   $result = mysqli_query($con , $query);
   $rows = mysqli_fetch_assoc($result);
   $amount_avail = $rows['amount'];
   $sender_name_query  =  "SELECT * FROM `userdetails` WHERE User_ID = '$sender'" ;
   $receiver_name_query = "SELECT * FROM `userdetails` WHERE User_ID = '$receiver'" ; 
   $sender_name = mysqli_fetch_assoc(mysqli_query($con , $sender_name_query))['Name'];
   $receiver_name = mysqli_fetch_assoc(mysqli_query($con , $receiver_name_query))['Name'];
   ?>
    <script src="https://cdn.tailwindcss.com"></script>
   <body class="bg-slate-900 text-white">
      
   <?php
   if($amount_avail<$amount){ ?>
      
      <div class="py-8 mx-auto text-lg text-center border-2 border-red-600 bg-black text-red-500 font-mono w-1/2"> 
      <?php
      echo "TRANSACTION FAILED";
      $status = "Failed";
      $date = date("Y-m-d");
       ?>

      <p class="text-white">
         <?php echo "Sorry , insufficient funds";?>
      </p>
      </div> 
      <?php
   } else {
   date_default_timezone_set("Asia/Kolkata");
   $date = date("Y-m-d");
   $time = date("h:i:sa");
   $query2 = "SELECT * FROM `userdetails` WHERE user_id = '$receiver'";
   $result2 = mysqli_query($con , $query2);
   $rows2 = mysqli_fetch_assoc($result2);
   $new_amount = $rows2['amount']+$amount;
   $sender_new_amount = $amount_avail - $amount;
   $sender_up_query  = "UPDATE `userdetails` SET `amount`='$sender_new_amount' WHERE user_id = '$sender'";
   $receiver_up_query = "UPDATE `userdetails` SET `amount`='$new_amount' WHERE user_id='$receiver'";

   mysqli_query($con , $sender_up_query);
   mysqli_query($con , $receiver_up_query);
   // $query = "INSERT INTO `history`(`From`, `To`, `Amount`) VALUES ('[value-1]','[value-2]','[value-3]')"
   ?>
   <div class=" py-8 mx-auto text-lg text-center border-2 border-green-600 bg-black text-green-500 font-mono w-1/2 mt-4">
      <?php
      echo "TRANSACTION COMPLETED SUCCESSFULLY";
       ?>
       <p class="text-white">
         Amount <?php echo $amount ?> rupees was succesfully transfered to <?php echo $receiver_name?> from <?php echo $sender_name?> 
       </p>
       <p class="text-white">
       date of transaction - <?php echo $date?>
   </p> 
       <p class="text-white">
       time of transaction - <?php echo $time?>     
   </p>
   </div>
<?php
  $status = 'SUCCESS';
   }

   ?>
   <?php 
   $history = "INSERT INTO `history`(`From`, `To`, `Amount`, `Transaction Status`, `Date`,`Time`) VALUES ('$sender_name','$receiver_name','$amount','$status','$date','$time')";
   mysqli_query($con , $history)
   ?>
   <div class="flex w-1/2 mx-auto space-x-12 mt-32">
   <a href="transact.php" class="bg-green-700 rounded-md  w-72 text-white  mt-auto text-center py-2 hover:border-2 hover:border-lime-600 hover:bg-black font-semibold text-xl tracking-tight">Perform Transaction</a>
   <a href="history.php" class="bg-green-700 rounded-md  w-72 text-white mx-auto mt-auto text-center py-2 hover:border-2 hover:border-lime-600 hover:bg-black font-semibold text-xl tracking-tight">View History</a>
     
   </div>

   </body>