
<?php
$image = htmlspecialchars($_GET["image"]);
$info = pathinfo($image);
$file_name =  basename($image,'.'.$info['extension']);

		$results = array();
		if ($handle = opendir('gallery/before_after')) {
			while (false !== ($file = readdir($handle))) {
				if ($file != '.' && $file != '..' && $file != 'thumbs') {
					$info = pathinfo($file);
					$index_name =  basename($file,'.'.$info['extension']);
				 	$results[] = $index_name;
					 
				}
			}
			closedir($handle);
			$last_raw = max($results);
			$first_raw = min($results);
			$last =  $last_raw[0]; 
			$first =  $first_raw[0]; 
					}
?>
<div class="toolbar">
  <div class="instructions">Mouse over a menu item for detailed instructions.</div>
  <div class="buttons"> 
  <a id="before-toolbar" class="showBefore" title="Click this link to see the site prior to our redesign.">BEFORE</a> 
  <a id="after-toolbar" class="showAfter" title="Click this link to see the design ePublishing implemented for this client.">AFTER</a> 
  <a id="compare-toolbar" class="showCompare" title="Click this link to see the BEFORE and AFTER designs side by side.">COMPARE</a> 
  <a id="previous-toolbar" class="showPrevious" title="Click this link to see the previous featured design.">PREVIOUS</a>
  <a id="next-toolbar" class="showNext" title="Click this link to see the next featured design.">NEXT</a>
  <a id="close-toolbar" title="Click this link to hide this toolbar.">COLLAPSE TOOLBAR</a> 
  <a id="return-toolbar" title="Click this link to return to the portfolio to view another design.">RETURN TO PORTFOLIO</a> </div>
</div>
<div class="toolbar-collapse"> <a id="open-toolbar">OPEN TOOLBAR</a> </div>
<div class="slides">
<div class="slide"><img src="/gallery/before_after/<?PHP echo $file_name ?>_compare.jpg" alt="Compare" width="1170" border="0" usemap="#Map" class="compare" />
  <div class="slide"><img src="/gallery/before_after/<?PHP echo $file_name ?>_before.jpg" width="1170" alt="Before" class="before-image" /></div>
  <div class="slide"><img src="/gallery/before_after/<?PHP echo $file_name ?>_after.jpg" width="1170" alt="After" class="after-image" /></div>
  
    <map name="Map">
      <area shape="rect" coords="3,3,543,887" href="#" alt="showBefore" class="showBefore" >
      <area shape="rect" coords="626,2,1178,914" href="#" alt="showAfter" class="showAfter">
    </map>
  </div>
</div>
<script>
$(document).ready(function() {
	var current = <? echo $file_name ?>;
	recalculate(<? echo $file_name ?>);
	$("[title]").tooltip({ position: 'center right', offset: [0, 20], opacity: 0.8, effect: 'fade'});
		$('.showCompare').click(function() {
			 showCompare();
		});
		$('.showBefore').click(function() {
			showBefore();
		});
		$('.showAfter').click(function() {
			showAfter();
		});
		$('.showPrevious').click(function() {
			current--;
			recalculate(current);
		});
		$('.showNext').click(function() {
			current++;
			recalculate(current);
		});
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
});
function showBefore() {
	$('.slides .slide img').delay(500).fadeOut('fast', function() {
	$('.before-image').fadeIn();
  });
}
function showAfter() {
	$('.slides .slide img').delay(500).fadeOut('fast', function() {
	$('.after-image').fadeIn();
  });
}
function showCompare() {
	$('.slides .slide img').delay(500).fadeOut('fast', function() {
	$('.compare').fadeIn();
  });
}
        
 function recalculate(current) {
	var previous = current - 1;
	var next = current + 1;
	var first = <? echo $first ?>;
	var last = <? echo $last ?>;
	$('.slides .slide img').hide('fast', function() {
	$(".compare").attr("src","/gallery/before_after/"+ current + "_compare.jpg").bind('readystatechange load', function(){
		if (this.complete) $(this).fadeIn('fast');
		$(".before-image").attr("src","/gallery/before_after/"+ current + "_before.jpg");
		$(".after-image").attr("src","/gallery/before_after/"+ current + "_after.jpg");
	});
  });
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