<?php if(!empty($_GET['id'])){
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
        $title='Content not found....';
    }
}else{
   $title='Content not found....';
}
?>

<div id="myModal" class="modal fade">
    <div class="modal-dialog" style="z-index: 1041;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><?php echo $title?></h4>
            </div>
            <div class="modal-body">
                <form>
				  <div class="form-group">
					<label for="recipient-name" class="control-label">Recipient:</label>
					<input type="text" class="form-control" id="recipient-name">
				  </div>
				  <div class="form-group">
					<label for="message-text" class="control-label">Message:</label>
					<textarea class="form-control" id="message-text"></textarea>
				  </div>
				</form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>