<?php
/**
 * @FileName: Chart.tpl.php
 * @Desc: 
 * @Author: Faithlee
 * @Mail: li.jiawei@leftbrain.com.cn
 * @CTime: Tue 23 Dec 2014 03:06:38 PM CST
 */
?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>ECharts</title>
</head>
<body>
    <!-- 为ECharts准备一个具备大小（宽高）的Dom -->
    <div id="main" style="height:400px"></div>
</body>
<!--<script src="http://echarts.baidu.com/build/dist/echarts.js"></script>-->
<script src="<?=$baseUri?>/media/echarts/dist/echarts.js"></script>

<script type="text/javascript">
require.config({
	paths:{
		//echarts: 'http://echarts.baidu.com/build/dist'	
		echarts : '<?=$baseUri?>/media/echarts/dist/'
	}	
});

require(
	['echarts', 'echarts/chart/bar'],
	function(ec) {
		var myChart = ec.init(document.getElementById('main'));

		var option = {
			tooltip : {
				show : true	
			},
			legend : {
				data : ['销量']	
			},
			xAxis : {
				type : 'category',
				data : ['衬衫', '羊毛衫', '雪纺衫', '裤子', '高跟鞋', '袜子']
			},
			yAxis : {
				type : 'value'
			},
			series : [{
				'name' : '销量',
				'type' : 'bar',
				'data' : [5, 20, 40, 10, 29, 35]
			}],
		};
		
		myChart.setOption(option);
	}
);
</script>
