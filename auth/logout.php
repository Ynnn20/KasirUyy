<?php 
session_start();

// menghapus selurh session
session_destroy();

header("location:index.php")
 ?>