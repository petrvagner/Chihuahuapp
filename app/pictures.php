<?php include_once "header.php"; ?>
    






<?php

	$phase = $_GET["phase"];
	$chiurl = $_GET["url"];
	
	
	if ($phase=="edit") {
		
		


	list($width, $height, $type, $attr)= getimagesize('http://app.chihuahuapp.com'.$chiurl); 
	
	$new_width = ($width/528);
	$new_height = ($height/600);
	
	$ratio = max($new_width, $new_height);
	$thelimit = '1';
	
	if ($ratio < $thelimit)  $ratio = '1';

	 
		
		
?>
<div id="promo">
<div style="margin:0px auto; width:738px; padding:20px 0px;">
<table>
			<tr>
				<td style="vertical-align:top; width:528px;">
                	<div style="padding:0px 7px 10px;"><img src="img/title-your.png" width="149" height="17" alt="Your Photograph" /></div>
					<img src="http://app.chihuahuapp.com<?php echo $chiurl; ?>" id="target" style="max-width:528px; max-height:600px;"/>
</td>
				<td style="vertical-align:top;">
                	<div style="padding:0px 7px 13px;"><img src="img/title-preview.png" width="71" height="14" alt="Preview" /></div>

    <div style="width:200px;height:600px;overflow:hidden; background-color:#000;" id="preview-cntr" style="float:right;">
						<img src="http://app.chihuahuapp.com<?php echo $chiurl; ?>" id="preview" alt="Preview" style="min-height:600px;" />
				</div>
                <div class="cleaner"></div>
				</td>
			</tr>
		</table>
        
        
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>?create=crop" method="post" onSubmit="return checkCoords();">
			<input type="hidden" id="x" name="x" />
			<input type="hidden" id="y" name="y" />
			<input type="hidden" id="w" name="w" />
			<input type="hidden" id="h" name="h" />
            <input type="hidden" id="ratio" name="ratio" value="<?php echo $ratio; ?>"  />
            <input type="hidden" id="picture" name="picture" value="http://app.chihuahuapp.com<?php echo $chiurl; ?>"  />
			<input type="submit" class="start ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary" value="Crop and Upload to Facebook!" />
            <div class="cleaner"></div>
		</form>
        
</div>	
</div>
<div style="background-image:url(img/app-shade-bottom.png); height:10px; background-repeat:repeat-x;"></div>

<?php
  	}
	else {
?>	

<div id="main-all">
<div id="main">

  <div id="top"><img src="img/shade-top.png" width="640" height="10" /></div>

    <div id="content">
    <div id="content-inside">
    	<div id="app-title">
	    <img src="img/title-upload.png" width="214" height="17" alt="What would you like to create?" />
        </div>
    	<div id="promo">
        
       	  <div id="app-choose"> 
          <div id="fileupload">
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <div class="fileupload-buttonbar">
            <label class="fileinput-button">
                <span>Add files...</span>
                <input type="file" name="files[]" multiple>
            </label>
            <button type="submit" class="start">Start upload</button>
            <button type="reset" class="cancel">Cancel upload</button>
            <button type="button" class="delete">Delete files</button>
        </div>
    </form>
    <div class="fileupload-content">
        <table class="files"></table>
        <div class="fileupload-progressbar"></div>
    </div>
</div>

          
            </div>
			<div class="app-divider"></div>
            <div id="app-footer">
            <span class="hint">Upload and select one for editing</span>
            <?php include_once "rest.php"; ?>

<?php	

	}

?>




<?php include_once "footer.php"; ?>