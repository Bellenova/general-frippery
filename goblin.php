<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Goblins!</title>

<script type="text/javascript" src="js/jquery.js"></script>
<script>
	$(document).ready(function(){
				$('.showPHP').click(function(){
                	$('.php').toggle('fast');
                });
				angryGoblin();
                $('.goblin img').click(function(){
                	angryGoblin();
                });
				
				$(".goblin img").hover(
				  function () {
					$('.song').fadeIn("fast");
				  }, 
				  function () {
				  	
					$(".song").fadeOut("fast", function() {
						angryGoblin();
					});
				  }

        );
});

function angryGoblin() {
	var words = new Array (); 
	 words[0] = "Your lullaby would waken a drunken goblin!";
     words[1] = "Don't poke me.";
     words[2] = "Fifteen birds <br/>On five fir trees,<br/>Their feathers were fanned<br/> In a fiery breeze.";
     words[3] = "Burn, burn tree and fern!";
	 words[4] = "While Goblins quaff,<br/> And Goblins laugh,<br/>Round and round<br/> Far underground";
	 words[5] = "Grr!";
	 words[6] = "A sad tale's best for winter.<br/>I have one of sprites and goblins.";
	 words[7] = "Down down to Goblin-town!";
	 words[8] = "Don't you think you've poked me enough by now?";
	 words[9] = "Goblins don't like Hobbits.";
     var i= Math.floor(10*Math.random())
	$('.song span').html(words[i]);
}
</script>
<link href='http://fonts.googleapis.com/css?family=Volkhov:400,400italic,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Irish+Grover' rel='stylesheet' type='text/css'>
<style>
body {
	margin: 0;
	padding: 0;
	text-align: center;
}
.container {
	margin: 0 auto;
	width: 790px;
	height: 500px;
	margin-top: 40px;
	position: relative;
	text-align: left;
}
.name {
	font-size: 50px;
	text-shadow: 1px 1px 0px #666;
	filter: dropshadow(color=#666, offx=1, offy=1);
	font-family: "Irish Grover", serif;
	font-weight: 700;
	color: #990000;
	text-indent: 100px;
}
.goblin img {
	cursor: pointer;
}
.song {
	display: none;
	position: absolute;
	padding: 10px;
	left:320px;
	top: 100px;
	background-color: white;
	border: 2px solid #a6c9e2;
	-moz-border-radius: 10px;
	-webkit-border-radius: 10px;
	z-index: 9999;
	-webkit-box-shadow: 1px 1px 1px 1px #EFEFEF;
	-moz-box-shadow: 1px 1px 1px 1px #EFEFEF;
	box-shadow: 1px 1px 1px 1px #EFEFEF;
	font-style: italic;
	font-size: 18px;
	font-family: "Volkhov", serif;
	font-weight: 400;
	text-align: center;
	max-width: 300px;
}
.bubble {
	position: absolute;
	padding: 0px;
	left:-20px;
	top: 10px;
	background-color: white;
	border: 2px solid #a6c9e2;
	-moz-border-radius: 10px;
	-webkit-border-radius: 10px;
	z-index: 99999;
	-webkit-box-shadow: 1px 1px 1px 1px #EFEFEF;
	-moz-box-shadow: 1px 1px 1px 1px #EFEFEF;
	box-shadow: 1px 1px 1px 1px #EFEFEF;
	width: 10px;
	height: 10px;
}
.bubble2 {
	position: absolute;
	padding: 0px;
	left:-40px;
	top: 20px;
	background-color: white;
	border: 2px solid #a6c9e2;
	-moz-border-radius: 10px;
	-webkit-border-radius: 10px;
	z-index: 99999;
	-webkit-box-shadow: 1px 1px 1px 1px #EFEFEF;
	-moz-box-shadow: 1px 1px 1px 1px #EFEFEF;
	box-shadow: 1px 1px 1px 1px #EFEFEF;
	width: 10px;
	height: 10px;
}
.stats {
	font-family: "Volkhov", serif;
	font-size: 14px;
	position: absolute;
	bottom: 100px;
	right: 150px;
	width: 300px;
	background-color: #fdfbee;
	border: 2px solid #ccc;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px; 
	opacity:0.7;
	padding: 10px;
	filter:alpha(opacity=70); /* For IE8 and earlier */
	-webkit-box-shadow: 1px 1px 1px 1px #EFEFEF;
	-moz-box-shadow: 1px 1px 1px 1px #EFEFEF;
	box-shadow: 1px 1px 1px 1px #EFEFEF;
}
.stats span {
	font-weight: 700;
	width: 80px;
	height: 30px;
	display: block;
	float: left;
}
.stats div {
	clear: both;
}
.showPHP {
	font-style: italic;
	font-size: 18px;
	font-family: "Volkhov", serif;
	font-weight: 400;
	cursor: pointer;
}
.php {
	clear: both;
	display: none;
	text-align: left;
}
</style>
</head>
<body>
<?php
        class goblin {
        	 var $name;
			 var $age;
			 var $health;
			 var $abilities;
			 function __construct($goblins_name) {           
             	$this->name = $goblins_name;            
             }
			function get_name() {
				return $this->name;
			}
			function set_age($new_age) {
				$this->age = $new_age;
			}
			function get_age() {
				return $this->age;
			}
			function set_health($new_health) {
				$this->health = $new_health;
			}
			function get_health() {
				return $this->health;
			}
			function set_abilities($new_abilities) {
				$this->abilities = $new_abilities;
			}
			function get_abilities() {
				return $this->abilities;
			}
        }
		
		$bolg = new goblin("Bolg, the Goblin!");
		$bolg->set_age('143 in Goblin years'); 
		$bolg->set_health('1500 HP'); 
		$bolg->set_abilities('Poison, +1 agility over swamp land, dislikes Hobbits'); 

?>
<div class="container">
  <div class="name">Meet <?php echo $bolg->get_name();?>
</div>
  <div class="song">
  	<div class="bubble"></div>
    <div class="bubble2"></div>
    <span></span>
   </div>
  <div class="goblin"><img src="images/goblin.jpg" alt="Meet <?php echo $bolg->get_name();?>"/></div>
  <div class="stats">
  	<div><span>Age:</span><?php echo $bolg->get_age();?></div>
    <div><span>Health:</span><?php echo $bolg->get_health();?></div>
    <div><span>Attributes:</span><?php echo $bolg->get_abilities();?></div>
  </div>
</div>
<div class="showPHP">Click here to see the PHP used for this page.</div>
<div class="php">
<pre>
&lt;?php
        class goblin {
        	 var $name;
			 var $age;
			 var $health;
			 var $abilities;
			 function __construct($goblins_name) {
                     $this-&gt;name = $goblins_name;            
                  }
			function get_name() {
				return $this-&gt;name;
			}
			function set_age($new_age) {
				$this-&gt;age = $new_age;
			}
			function get_age() {
				return $this-&gt;age;
			}
			function set_health($new_health) {
				$this-&gt;health = $new_health;
			}
			function get_health() {
				return $this-&gt;health;
			}
			function set_abilities($new_abilities) {
				$this-&gt;abilities = $new_abilities;
			}
			function get_abilities() {
				return $this-&gt;abilities;
			}
        }
		
		$bolg = new goblin("Bolg, the Goblin!");
		$bolg-&gt;set_age('143 in Goblin years'); 
		$bolg-&gt;set_health('1500 HP'); 
		$bolg-&gt;set_abilities('Poison, +1 agility over swamp land, dislikes Hobbits'); 

?&gt;

&lt;div class="container"&gt;
  &lt;div class="name"&gt;Meet &lt;?php echo $bolg-&gt;get_name();?&gt;&lt;/div&gt;
  &lt;div class="song"&gt;
    &lt;div class="bubble"&gt;&lt;/div&gt;
    &lt;div class="bubble2"&gt;&lt;/div&gt;
    &lt;span&gt;&lt;/span&gt;
   &lt;/div&gt;
  &lt;div class="goblin"&gt;&lt;img src="images/goblin.jpg" alt="Meet &lt;?php echo $bolg-&gt;get_name();?&gt;"/&gt;&lt;/div&gt;
  &lt;div class="stats"&gt;
    &lt;div&gt;&lt;span&gt;Age:&lt;/span&gt;&lt;?php echo $bolg-&gt;get_age();?&gt;&lt;/div&gt;
    &lt;div&gt;&lt;span&gt;Health:&lt;/span&gt;&lt;?php echo $bolg-&gt;get_health();?&gt;&lt;/div&gt;
    &lt;div&gt;&lt;span&gt;Attributes:&lt;/span&gt;&lt;?php echo $bolg-&gt;get_abilities();?&gt;&lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
</pre>
</div>
<!-- I see you! -->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-5987322-3']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>
