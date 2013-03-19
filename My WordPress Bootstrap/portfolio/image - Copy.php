
<?php
$image = htmlspecialchars($_GET["image"]);
$info = pathinfo($image);
$file_name =  basename($image,'.'.$info['extension']);
$next = $file_name += 1;
$previous = $file_name -= 2;
echo '<div class="main-image"><img src="/newPHP/gallery/' . $image . '" width="1170" alt=""></div>';
?>
<div class="toolbar">
	<div class="instructions">Mouse over a menu item for detailed instructions.</div>
    <div class="buttons">   
        <!--<a id="before" class="showBefore" title="Click this link to see the previous featured design.">PREVIOUS</a>
        <a id="after" class="showAfter" title="Click this link to see the next featured design.">NEXT</a>-->
        <a id="close-toolbar" title="Click this link to hide this toolbar.">HIDE</a>
        <a id="return-toolbar" title="Click this link to return to the portfolio to view another design.">RETURN TO PORTFOLIO</a>
    </div>
</div>
<div class="toolbar-collapse">
<a id="open-toolbar">OPEN TOOLBAR</a>
</div>
<script>
$(document).ready(function() {
	$("[title]").tooltip({ position: 'center right', offset: [0, 20], opacity: 0.8, effect: 'fade'});
		$(function() {
			$( ".toolbar" ).draggable();
			$( ".toolbar-collapse" ).draggable();
		});
		$('#open-toolbar').click(function() {
			var offset = $(".toolbar-collapse").position();
			$('.toolbar').css("left", offset.left);
			$('.toolbar').css("top", offset.top);
			$('.toolbar').slideDown();
			$('.toolbar-collapse').fadeOut();
			
		});
		$('#close-toolbar').click(function() { 
			var offset = $(".toolbar").position();
			$('.toolbar-collapse').css("left", offset.left);
			$('.toolbar-collapse').css("top", offset.top);
			$('.toolbar-collapse').fadeIn();
			$('.toolbar').slideUp();
			
		});
		$('#return-toolbar').click(function() { 
			$('.close').click();
		});
		//$('.loader').delay(1500).hide('fast', function() {
    // Animation complete.
	//$("#overlay").show();
  //});
	//	
});
 
    
		
</script>