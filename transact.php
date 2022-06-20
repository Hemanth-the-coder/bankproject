<?php
   include "connect.php";
   include "header.php";
   $query = "SELECT * FROM `userdetails`";
   $result = mysqli_query($con , $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="design.css">
    <link rel="stylesheet" href="design.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Transact</title>
</head>
<body class="bg-slate-900">
<div class="mb-4 text-green-600 font-semibold text-3xl tracking-tight mx-auto mt-4">
        <center>

            Customer Details
        </center>
    </div>
<div class="relative overflow-x-auto sm:rounded-lg flex justify-center mt-4 ">
    <table class="w-1/2 text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
            <th scope="col" class="px-6 py-3">
                    Customer Id
                </th>
                <th scope="col" class="px-6 py-3">
                    Customer Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Customer Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Amount
                </th>
            
            </tr>
        </thead>
        <tbody>
           <?php 
            while($rows = mysqli_fetch_assoc($result))
            {
           ?>
           <tr class="px-12 py-4 font-medium bg-slate-900 text-white">
           <td class="px-6 py-3"><?php echo $rows['user_id']; ?></td>
              <td class="px-6 py-3"><?php echo $rows['Name']; ?></td>
              <td class="px-6 py-3"><?php echo $rows['email']; ?></td>
              <td class="px-6 py-3"><?php echo $rows['amount']; ?></td>
           </tr>
           <?php
            }
            ?>
        </tbody>
    </table>
</div>
<center>
    
    <button class="px-6 py-3 bg-green-500 text-gray-100 rounded shadow mt-30 sm:mt-48" id="transact-btn">
            Transact
        </button>
</center>

    <div class="bg-black bg-opacity-50 absolute inset-0 hidden justify-center items-center" id="overlay">
    <div class="w-full max-w-xs">
  <form action ="amounttransfer.php" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="from">
        From:
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="from" type="text" placeholder="from" name="from">
    </div>
    <div class="mb-6">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="to">
        To
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="to" type="text" placeholder="To" name="to">
    </div>
    <div class="mb-6">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="amount">
        Amount
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="amount" type="number" placeholder="Amount in Rupees" name="amount">
    </div>

    <button type ="submit" class="px-6 py-3 bg-green-500 text-gray-100 rounded shadow">
                Transact
    </button>
    </form>
    
    <a href="transact.php" class="px-6 py-3 bg-red-500 text-gray-100 rounded shadow">
                Cancel
    </a>
    
    
    
    
 
</div>
    </div>
    
    <script>
        window.addEventListener('DOMContentLoaded', () =>{
            const overlay = document.querySelector('#overlay')
            const transactBtn = document.querySelector('#transact-btn')
            const closeBtn = document.querySelector('#close-modal')

            const toggleModal = () => {
                overlay.classList.toggle('hidden')
                overlay.classList.toggle('flex')
            }

            transactBtn.addEventListener('click', toggleModal)

            closeBtn.addEventListener('click', toggleModal)
        })

    </script>
</body>
</html>


<!-- this is my transact page from where i can perform the transactions  -->