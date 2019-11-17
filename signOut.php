<?php
	header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");
    session_start();
    session_unset();
    session_destroy();
    ob_start();
    unset($_COOKIE['muskRemAuth']);
    setcookie('muskRemAuth', '', time()-3600*24*366, '/', 'muskgreen.live', TRUE, TRUE);
    ob_end_flush();
    header("Location: signingOut.php");
?>