
<!-- Sort index results -->
<?php
$image = htmlspecialchars($_GET["image"]);
$info = pathinfo($image);
$file_name =  basename($image,'.'.$info['extension']);
echo '<div class="main-image"><img src="/gallery/' . $image . '" width="1170" alt=""></div>';

		$results = array();
		if ($handle = opendir('gallery')) {
			while (false !== ($file = readdir($handle))) {
				if ($file != '.' && $file != '..' && $file != 'thumbs' && $file != 'before_after') {
					$info = pathinfo($file);
					$index_name =  basename($file,'.'.$info['extension']);
				 	$results[] = $index_name;
					 
				}
			}
			closedir($handle);
			$last = max($results);
			$first = min($results);
		}
?>
<div class="toolbar">
	<div class="instructions">Mouse over a menu item for detailed instructions.</div>
    <div class="buttons">   
        <a id="previous-toolbar" class="showPrevious" title="Click this link to see the previous featured design.">PREVIOUS</a>
        <a id="next-toolbar" class="showNext" title="Click this link to see the next featured design.">NEXT</a>
        <a id="close-toolbar" title="Click this link to hide this toolbar.">COLLAPSE TOOLBAR</a> 
        <a id="return-toolbar" title="Click this link to return to the portfolio to view another design.">RETURN TO PORTFOLIO</a>
    </div>
</div>
<div class="toolbar-collapse">
<a id="open-toolbar">OPEN TOOLBAR</a>
</div>
<script>
$(document).ready(function() {
	var current = <? echo $file_name ?>;
	recalculate(<? echo $file_name ?>);
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
		$('.showPrevious').click(function() {
			current--;
			recalculate(current);
		});
		$('.showNext').click(function() {
			current++;
			recalculate(current);
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
 function recalculate(current) {
	var previous = current - 1;
	var next = current + 1;
	var first = <? echo $first ?>;
	var last = <? echo $last ?>;
	$(".main-image img").attr("src","/gallery/"+ current + ".jpg");
	if (next > last) {
		$(".showNext").hide();
	} else {
		$(".showNext").show();
	}
	if (previous < first) {
		$(".showPrevious").hide();
	} else {
		$(".showPrevious").show();
	}
 }
    
		
</script>