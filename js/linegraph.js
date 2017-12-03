$(document).ready(function(){
	$.ajax({
		url : "http://bullseyeweatherstation.com/data.php",
		type : "GET",
		success : function(data){
			console.log(data);
			
			var temperature = [];
			var indexArray = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30];
			
			for(var i in data) {
				temperature.push(data[i].temperature);
			}

			var chartdata = {
				labels: indexArray,
				datasets: [
					{
						label: "Temperature",
						fill: true,
						lineTension: 1,
						backgroundColor: "rgba(59, 89, 152, 0.75)",
						borderColor: "rgba(59, 89, 152, 1)",
						pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
						pointHoverBorderColor: "rgba(59, 89, 152, 1)",
						data: temperature
					}
					
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