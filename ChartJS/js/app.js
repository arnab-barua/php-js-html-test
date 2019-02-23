$(document).ready(function(){
	$.ajax({
		url:"http://localhost:81/chartjs/data.php",
		method:"GET",
		success:function(data){
			var text = '{ "employees" : ';
			text += data;
			text += '}';
			//document.write(text);
			var obj = JSON.parse(text);
			//document.write(obj.employees[1].Name);
			//console.log(data);
			var developer = [];
			var time = [];
			//document.write(employees.length);
			for(var i=0;i<6;i++)
			{
				developer.push("D "+obj.employees[i].Name);
				time.push(obj.employees[i].WorkingHour);
			}
			//document.write(time[2]);
			var chartdata = {
				labels : developer,
				datasets : [
					{
						label:'Working Hour',
						backgroundColor:'rgba(51,255,51,0.75)',
						borderColor:'rgba(51,255,51,0.75)',
						hoverBackgroundColor:'rgba(51,255,51,1)',
						hoverBorderColor:'rgba(51,255,51,1)',
						data:time
					}
				]
			};
			
			var ctx = $("#mycanvas");
			var barGraph = new Chart(ctx,{
				type:'bar',
				data:chartdata
			});
		},
		error:function(data){
			console.log(data);
		}
	});
});