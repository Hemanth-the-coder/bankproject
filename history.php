<?php
include 'connect.php';
include "header.php";
$query = "SELECT * FROM `history`";
$result = mysqli_query($con, $query);
?><html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="design.css">
    <link rel="stylesheet" href="design.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>History</title>
</head>

<body class="bg-slate-900">
<div class="mb-4 text-green-600 font-semibold text-3xl tracking-tight mx-auto mt-4">
        <center>

            Previous Transaction Details
        </center>
    </div>
    <div class="mx-auto flex justify-center">
    <table class="w-1/2 text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
            <th scope="col" class="px-6 py-3">
                    Transaction ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Sender
                </th>
                <th scope="col" class="px-6 py-3">
                    Receiver
                </th>
                <th scope="col" class="px-6 py-3">
                    Amount
                </th>
                <th scope="col" class="px-6 py-3">
                    Transaction Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Date of Transaction
                </th>
                <th scope="col" class="px-6 py-3">
                    Time of Transaction
                </th>

            </tr>
        </thead>
        <tbody>
           <?php
while ($rows = mysqli_fetch_assoc($result)) {
    ?>
           <tr class="px-12 py-4 font-medium bg-slate-900 text-white">
           <td class="px-6 py-3"><?php echo $rows['transact_id']; ?></td>
              <td class="px-6 py-3"><?php echo $rows['From']; ?></td>
              <td class="px-6 py-3"><?php echo $rows['To']; ?></td>
              <td class="px-6 py-3"><?php echo $rows['Amount']; ?></td>
              <td class="px-6 py-3"><?php echo $rows['Transaction Status']; ?></td>
              <td class="px-6 py-3"><?php echo $rows['Date']; ?></td>
              <td class="px-6 py-3"><?php echo $rows['Time']; ?></td>


           </tr>
           <?php
}
?>
        </tbody>

    </table>
    </div>
    <div class="flex w-1/2 mx-auto space-x-12 mt-10 mb-10">
   <a href="transact.php" class="bg-green-700 rounded-md  w-72 text-white  mt-auto text-center py-2 hover:border-2 hover:border-lime-600 hover:bg-black font-semibold text-xl tracking-tight">Transact More</a>
   <a href="index.php" class="bg-green-700 rounded-md  w-72 text-white mx-auto mt-auto text-center py-2 hover:border-2 hover:border-lime-600 hover:bg-black font-semibold text-xl tracking-tight">Back to Home</a>

   </div>
    </body>
    </html>