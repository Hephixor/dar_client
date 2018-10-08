<?php
if(!empty($_GET['id'])){
    //DB details
    $dbHost = '127.0.0.1';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'thn';
    
    //Create connection and select DB
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    
    if ($db->connect_error) {
        die("Unable to connect database: " . $db->connect_error);
    }
    
    //get content from database
    $query = $db->query("SELECT * FROM cms_content WHERE id = {$_GET['id']}");
    
    if($query->num_rows > 0){
        $cmsData = $query->fetch_assoc();
        echo '<h4>'.$cmsData['title'].'</h4>';
        echo '<p>'.$cmsData['content'].'</p>';
    }else{
        echo 'Content not found....';
    }
}else{
    echo 'Content not found....';
}
?>