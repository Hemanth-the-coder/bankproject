
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="design.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>home</title>
</head>
<?php
include "header.php";
?>
<body class="bg-slate-900">
    <div class="container  h-screen  flex flex-col sm:flex-row ">
        
            <div class="container  h-1/2 sm:h-full">
                <img src="bankingimg.jpeg" class="mx-auto h-full" alt="">

            </div>
        <div class="container flex flex-col content-center mt-10">
            <h1 class="text-zinc-50 mx-8 mb-4 sm:mx-auto text-5xl font-semibold tracking-tight">WELCOME TO SPARKS BANK</h1>
            <a href="transact.php" class="bg-green-700 rounded-md  w-72 text-white mx-auto mt-auto text-center py-2 hover:border-2 hover:border-lime-600 hover:bg-black font-semibold text-xl tracking-tight">Perform Transaction</a>
                <a href="transact.php" class="mt-4 bg-green-700 rounded-md  w-72 text-white mx-auto mb-auto py-2 text-center hover:border-2 hover:border-lime-600 hover:bg-black font-semibold text-xl tracking-tight">Customer details</a>
            </div>
        </div>
    
</body>
</html>
