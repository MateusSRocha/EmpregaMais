<?php 

if(empty($_GET['url'])) {
    $url = 'index.php';
} else {
    $url = $_GET['url'];
}

require('./views/'. $url);
?>