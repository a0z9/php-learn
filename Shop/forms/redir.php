<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirecting...</title>
</head>
<body>
<h2><?=$_SESSION["message"]?></h2>  
<h2>Вы будете перенаправлены на главную страницу через
<span id="seconds">5</span> cекунд...</h2>    

<script>
     const wt = 5000, ct = 1000;
     var count = wt/ct;

    const si = setInterval(()=>{
        const sec = document.getElementById("seconds");
        sec.innerHTML = --count;
     }, ct);

     const st = setTimeout(()=>{
       clearInterval(si);
       window.location = '../index.php';
     },wt);

</script>    
    
</body>
</html>