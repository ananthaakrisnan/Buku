<?php
session_start();
session_destroy();  // Hapus sesi login
header("Location: login.php");  // Alihkan semula ke halaman login selepas logout
exit;
?>