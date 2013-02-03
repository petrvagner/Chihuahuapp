<?php
session_start(); 
$_SESSION['user'] = $user;
setcookie(user, $user, time() + (86400 * 7))


?>

<?php     
	
        
    $filename = "pictures/user{$user}";  
    
    if (file_exists($filename)) {  
        echo "";  
    } else {  
        mkdir("pictures/user{$user}", 0777);
        mkdir("pictures/user{$user}/files", 0777);
        mkdir("pictures/user{$user}/thumbnails", 0777);
		
        echo "";  
    } 
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/><title>Chihuahuapp - The ulitmate iPhone and Facebook fashion photo look</title>

        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/themes/base/jquery-ui.css" id="theme">
        <link rel="stylesheet" href="img/style.css" id="theme">

        <link href="http://photos-b.ak.fbcdn.net/photos-ak-snc1/v43/230/194608580588078/app_2_194608580588078_4116.gif" rel="shortcut icon">
        
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js"></script>
        <script src="//ajax.aspnetcdn.com/ajax/jquery.templates/beta1/jquery.tmpl.min.js"></script>
        <script src="js/jquery.iframe-transport.js"></script>
        <script src="js/jquery.fileupload.js"></script>
        <script src="js/jquery.fileupload-ui.js"></script>
        <script src="application.js"></script> 
		<script src="js/jquery.Jcrop.js" type="text/javascript"></script>
		<link rel="stylesheet" href="jquery.Jcrop.css" type="text/css" />

        
        
        <style type="text/css">
            a{
                text-decoration: none;
                color: blue;
            }
            a:hover{
                text-decoration: underline;
                color: olive;
            }
        </style>
        <script type="text/javascript">
            
            function newInvite(){
                 var receiverUserIds = FB.ui({ 
                        method : 'apprequests',
                        message: 'Create your own fashion look book. For details visit http://www.chihuahuapp.com/',
                 },
                 function(receiverUserIds) {
                          console.log("IDS : " + receiverUserIds.request_ids);
                        }
                 );
                 //http://developers.facebook.com/docs/reference/dialogs/requests/
            }
        </script>
        		<script type="text/javascript">

    jQuery(function($){

      // Create variables (in this scope) to hold the API and image size
      var jcrop_api, boundx, boundy;
      
      $('#target').Jcrop({
        onChange: updatePreview,
        onSelect: updatePreview,
		setSelect: [ 0, 0, 100, 300 ],
        aspectRatio: 2 / 6,
		onSelect: updateCoords
      },function(){
        // Use the API to get the real image size
        var bounds = this.getBounds();
        boundx = bounds[0];
        boundy = bounds[1];
        // Store the API in the jcrop_api variable
        jcrop_api = this;
      });

      function updatePreview(c)
      {
        if (parseInt(c.w) > 0)
        {
          var rx = 200 / c.w;
          var ry = 600 / c.h;

          $('#preview').css({
            width: Math.round(rx * boundx) + 'px',
            height: Math.round(ry * boundy) + 'px',
            marginLeft: '-' + Math.round(rx * c.x) + 'px',
            marginTop: '-' + Math.round(ry * c.y) + 'px'
          });
        }
      };

    });
	
	function updateCoords(c)
			{
				$('#x').val(c.x);
				$('#y').val(c.y);
				$('#w').val(c.w);
				$('#h').val(c.h);
			};

			function checkCoords()
			{
				if (parseInt($('#w').val())) return true;
				alert('Please select a crop region then press submit.');
				return false;
			};

  </script>
    </head>
<body>
    
    <div id="fb-root"></div>
    <script type="text/javascript" src="http://connect.facebook.net/en_US/all.js"></script>
     <script type="text/javascript">
       FB.init({
         appId  : '<?=$fbconfig['appid']?>',
         status : true, // check login status
         cookie : true, // enable cookies to allow the server to access the session
         xfbml  : true  // parse XFBML
       });
       
     </script>
<div id="liner">
<div id="liner-inside">

<h1><a href="/" id="logo">Chihuahuapp</a></h1>
<ul id="list">
    <li class="menu-home"><a href="<?=$fbconfig['appBaseUrl']?>">Home</a></li>
    <li class="menu-invite"><a href="#" onClick="newInvite(); return false;">Invite Friends</a></li>
    <li class="menu-website"><a href="http://www.chihuahuapp.com/" target="_blank">Website</a></li>
</ul>
<div class="cleaner"></div>


</div>
</div>