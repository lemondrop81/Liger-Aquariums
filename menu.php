
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Liger Aquariums</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
    <ul id="menu">
        <li><a href="homepage.php">Home</a></li>
        <li><a href="create.php" >New Post</a></li>
        <li><a href="categories.php" >Categories</a></li>
    
        <?php if(isset($_SESSION['username'])): ?>
            <li><a href="logout.php">Log out</a></li>
            <li> <?= $_SESSION['username']?> </li>
        <?php else: ?>
            <li><a href="registration.php">Register</a></li>
            <li><a href="login.php">Log in</a></li>
        <?php endif ?>
            
    
    </ul> <!-- END div id="menu" -->
</body>
</html>
