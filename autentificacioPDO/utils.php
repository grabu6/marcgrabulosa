<?php
try {
    $hostname = "localhost";
    $dbname = "dwes_marcgrabulosa_autpdo";
    $username = "dwes-user";
    $pw = "dwes-pass";
    $connexio = new PDO ("mysql:host=$hostname;dbname=$dbname","$username","$pw");
  } catch (PDOException $e) {
    echo "Failed to get DB handle: " . $e->getMessage() . "\n";
    exit;
  }
    
  ?>