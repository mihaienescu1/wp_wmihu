<?php

if (!isset($_GET['p']) || empty($_GET['p'])) { 
                die('#199 BUMMER! Need GET Variable'); 
}

$url = 'http://whymihu.com/news/' . htmlentities($_GET['p']);

$conn = mysqli_connect('localhost' , 'root' , 'root' , 'howdowework');
$oPost = array();
        
if (mysqli_connect_errno()) {
        die("#102 Failed to connect to MySQL: " . mysqli_connect_error());
}
        
$stmt = $conn->prepare("SELECT link, short_link FROM Post WHERE path = ? LIMIT 1");
$stmt->bind_param('s', $url);
        
$result = $stmt->execute();
$stmt->bind_result($link, $short_link);

        
while ($stmt->fetch()) {
    $oPost = array('short_link' =>  $short_link , 'link' => $link);
}
    
if (empty($oPost['short_link'])) {
    die('#100 Entity does not have a short link');
}
        
if (preg_match('/facebook/', $_SERVER['HTTP_USER_AGENT'])) {
        header('Location: ' . $oPost['link']);
} else {
        header('Location: ' . $oPost['short_link']);
}


/**
* .htaccess Rule
RewriteRule ^news/(.*)$ live.php?p=$1 [QSA]
*/

