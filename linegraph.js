$(document).ready(function(){
	$.ajax({
		url : "http://bullseyeweatherstation.com/data.php",
		type : "GET",
		success : function(data){
			console.log(data);

			var date = [];
			var temperature = [];
			
			for(var i in data) {
				date.push(data[i].Date);
				temperature.push(data[i].Temperature);
			}

			var chartdata = {
				labels: Date,
				datasets: [
					{
						label: "Temperature",
						fill: false,
						lineTension: 0.1,
						backgroundColor: "rgba(59, 89, 152, 0.75)",
						borderColor: "rgba(59, 89, 152, 1)",
						pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
						pointHoverBorderColor: "rgba(59, 89, 152, 1)",
						data: temperature
					},
				]
			};

			var ctx = $("#mycanvas");

			var LineGraph = new Chart(ctx, {
				type: 'line',
				data: chartdata
			});
		},
		error : function(data) {

		}
	});
});