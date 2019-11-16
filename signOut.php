<?php
	header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");
    session_start();
    session_unset();
    session_destroy();
    ob_start();
    if (isset($_COOKIE['muskRemAuth'])) {
	    unset($_COOKIE['muskRemAuth']);
	    setcookie('muskRemAuth', '', time()-3600*24*366);
	}
    ob_end_flush();
    header("Location: index.php");
?>