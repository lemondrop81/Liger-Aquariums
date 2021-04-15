<ul id="menu">
        <li><a href="index.php">Home</a></li>
        <?php if(isset($_SESSION['role'])): ?>
            <li><a href="create.php" >New Post</a></li>
        <?php endif ?>
        <li><a href="categories.php" >Categories</a></li>
        <li><a href="sort.php" >Sort</a></li>
    
        <?php if(isset($_SESSION['username'])): ?>
            <?php if($_SESSION['role'] == 'a'): ?>
                <li><a href="createNewCategories.php"> New Categories </a></li>
                <li><a href="users.php">Users </a></li>
            <?php endif ?>
            <li><a href="logout.php">Log out</a></li>
            <li> <?= $_SESSION['username']?> </li>
        <?php else: ?>
            <li><a href="registration.php">Register</a></li>
            <li><a href="login.php">Log in</a></li>
        <?php endif ?>
</ul> <!-- END div id="menu" -->
