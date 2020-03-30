<?php
$json = '{
  "level1": {
    "data-level": "01",
    "parent": "a",
    "data-parent": {
      "nodes": {
        "title": [
          "a1"
        ],
        "img-url": [
          "1"
        ]
      }
    }
  },
  "level2_1": {
    "data-level": "02",
    "parent": "a",
    "data-child-from": {
      "nodes": {
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
      "nodes": {
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
      "nodes": {
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
  "level4_1": {
    "data-level": "04",
    "parent": "a0101",
    "data-child-from": {
      "nodes": {
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
  "level4_2": {
    "data-level": "04",
    "parent": "a0102",
    "data-child-from": {
      "nodes": {
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
  "level4_3": {
    "data-level": "04",
    "parent": "a0201",
    "data-child-from": {
      "nodes": {
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
  "level4_4": {
    "data-level": "04",
    "parent": "a0202",
    "data-child-from": {
      "nodes": {
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

		<title>Show Data Tree Structure</title>

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
			$data .= '<li data-parent="'.$value['parent'].'">
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
