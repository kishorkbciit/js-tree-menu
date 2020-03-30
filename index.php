<?php
$json = '{
  "level1": {
    "data-level": "01",
    "data-parent": {
      "a": {
        "title": [
          "a1",
          "a2"
        ],
        "img-url": [
          "1",
          "2"
        ]
      }
    }
  },
  "level2_1": {
    "data-level": "02",
    "parent": "a",
    "data-child-from": {
      "a": {
        "title": [
          "a1",
          "a2"
        ],
        "img-url": [
          "1",
          "2"
        ]
      }
    }
  },
  "level3_1": {
    "data-level": "03",
    "parent": "a01",
    "data-child-from": {
      "a": {
        "title": [
          "a1",
          "a2"
        ],
        "img-url": [
          "1",
          "2"
        ]
      }
    }
  },
  "level3_2": {
    "data-level": "03",
    "parent": "a02",
    "data-child-from": {
      "a": {
        "title": [
          "a1",
          "a2"
        ],
        "img-url": [
          "1",
          "2"
        ]
      }
    }
  }
}';
$json = json_decode($json,true);
$data ='
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />

		<title>jQuery Stiff Chart Plugin Demo</title>

<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

		<link href="css/reset-html5.css" rel="stylesheet" media="screen" />
		<link href="css/micro-clearfix.css" rel="stylesheet" media="screen" />
		<link href="css/stiff-chart.css" rel="stylesheet" media="screen" />
		<link href="css/custom.css" rel="stylesheet" media="screen" />
<style>
body { background-color:#fafafa; font-family:"Roboto";}
</style>
	</head>

	<body>
<div id="jquery-script-menu">
<div class="jquery-script-center">
<ul>
<li><a href="http://www.jqueryscript.net/chart-graph/Animated-Organization-Chart-Tree-Diagram-Plugin-Stiff-Chart.html">Download This Plugin</a></li>
<li><a href="http://www.jqueryscript.net/">Back To jQueryScript.Net</a></li>
</ul>
<div class="jquery-script-ads"><script type="text/javascript"><!--
google_ad_client = "ca-pub-2783044520727903";
/* jQuery_demo */
google_ad_slot = "2780937993";
google_ad_width = 728;
google_ad_height = 90;
//-->



</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></div>
<div class="jquery-script-clear"></div>
</div>
</div>
		<!--[if lt IE 8]>
		    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
		<![endif]-->

		<div class="text-center" style="margin-top:150px;">
			<h1>jQuery Stiff Chart Plugin Demo</h1>
		</div>
		
		<div class="chart-container">
			<div id="your-chart-name">
			  <div class="stiff-chart-inner">';
			    
$data .= '<div class="stiff-chart-level" data-level="'.$json['level1']['data-level'].'">
			      <div class="stiff-main-parent">
			        <ul>';
$dataP = '';
foreach($json as $key => $value) {
	foreach($value as $key1=>$value1) {
		if(is_array($value1))		
		foreach($value1 as $key2 => $value2) {
			if($key == 'level1') {
			$data .= '<li data-parent="'.$key2.'">
			            <div class="the-chart">
			            	<img src="'.$value2['title'][0].'" alt="">
			            	<p>'.$value2['title'][0].'</p>
			            </div>
			          </li>';
			}
			else {
			$dataParent = $value['parent'];
			$data .= '<div class="stiff-chart-level" data-level="'.$value['data-level'].'">
			      <div class="stiff-child" data-child-from="'.$dataParent.'">
			        <ul>';
			for($i=1;$i<=count($value2['title']);$i++) {
			$dataParent = $value['parent'].'0'.$i;
			$data .= '<li data-parent="'.$dataParent.'">
			            <div class="the-chart">
			            	<img src="'.$value2['img'][$i-1].'" alt="">
			            	<p>'.$value2['title'][$i-1].'</p>
			            </div>
			          </li>';
			}
				$data .= '</ul>
			    </div>
			       </div>';
			}
		}
		if($key == 'level1' && $key1 == 'data-parent')
		$data .= '</ul>
			    </div>
			       </div>';
		else if($key1 == 'data-child-from'){
			$dataP .= '01';		
		}	
	}
}


$data .='

			</div>
		</div>
		
		<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

		
		<script src="js/stiffChart.js"></script>
		<script>
			$(document).ready(function() {
			  $("#your-chart-name").stiffChart({
			    
			  });
			});
		</script>
		
		<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(["_setAccount", "UA-36251023-1"]);
  _gaq.push(["_setDomainName", "jqueryscript.net"]);
  _gaq.push(["_trackPageview"]);

  (function() {
    var ga = document.createElement("script"); ga.type = "text/javascript"; ga.async = true;
    ga.src = ("https:" == document.location.protocol ? "https://ssl" : "http://www") + ".google-analytics.com/ga.js";
    var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

	</body>
</html>';
echo $data;
