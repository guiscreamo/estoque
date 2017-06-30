<?php
/* define o limitador de cache para 'private' */

session_cache_limiter('private');
$cache_limiter = session_cache_limiter();

/* define o prazo do cache em 30 minutos */
session_cache_expire(30);
$cache_expire = session_cache_expire();

if(!isset($_SESSION)) session_start();

if(isset($_SESSION['login'])){

}else{

	echo "<script>alert('Voce deve se logar primeiro!');history.back();</script>";

}

?>