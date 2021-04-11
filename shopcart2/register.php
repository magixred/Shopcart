<html>
<head>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
<div class="container-fluid">
    <a href= 'index.php'><img class="rounded-circle" style="width: 60px; height: 60px; float: center;" src="img/download.png"></a>
<a href='index.php'><h1>Shopping Cart</h1></a>
<div style="background:white;width:100%; height:400px;">
<form action="regval.php" method="POST">
<div>
<label>firstname</label>
<input type='text' name='firstname'size="16">
</div>
<div>
<label>last name</label>
<input type='text' name='lastname' size="16">
</div>
<div>
<label>email</label>
<input type='email' name='email' size="16">
</div>
<div>
<label>password</label>
<input type='password' name='password' size="15">
</div>
<input type='submit' name='reg'>
</form>

<?php
    session_start();
//create conecction to database




 


     
?>


</div>
</body>

</html>