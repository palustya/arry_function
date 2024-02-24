<?php
// Step 1: Session Shuru 
session_start();

// Step 2: Session Variable Set 
$_SESSION['username'] = 'Pankaj sharma';

// Step 3: Session Variable Ka Istemal 
echo $_SESSION['username'];

// Step 4: Session  Khatam
session_destroy();
?>
