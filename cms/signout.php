<?php
if(!isset($_SESSION)) { session_start(); }  
unset($_SESSION['admin_role']);
?>

<script language="javascript">window.location.href="index.php";</script>