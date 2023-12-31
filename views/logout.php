
<?php 
   session_destroy();
    unset($_SESSION['email']);
    header("Location:index.php?page=login");
    
?>


