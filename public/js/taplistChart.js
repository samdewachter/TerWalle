$( document ).ready(function() {
	
	function loadChart(chart_data, chart_category){
		var chart = c3.generate({
			bindto: '#taplist-chart',
			data: {
		        columns: [
		            chart_data
		        ],
		        type: 'bar'
		    },
		    legend: {
		        show: true,
		        position: 'inset',
		        inset: {
		            anchor: 'top-right',
		            x: 10,
		            y: 10,
		            step: 1
		        }
		    },
		    axis: {
		        x: {
		            type: 'category',
		            categories: chart_category
		        }
		    }
		});
	}

	$('.apply-chart-filter').click(function(){
		var start_date = $('#start-date').val();
		var end_date = $('#end-date').val();
		$('.filter-info').empty();
		if (start_date > end_date) {
			$('.filter-info').append("<div class='chart-info-alert'>De start datum moet kleiner zijn dan de eind datum.</div>");
		} else {
			$.ajax({
				url: 'grafiek/data',
				data: {
					'start_date': start_date,
					'end_date': end_date,
				},
				type: 'GET',
				success: function(data) {
					console.log(data.chart_data);

					loadChart(data.chart_data, data.chart_tappers);

				},
				error: function() {
					console.log('error');
				}
			});
		}

	});

	var start_date = $('#start-date').val();
	var end_date = $('#end-date').val();

	$.ajax({
		url: 'grafiek/data',
		type: 'GET',
		data: {
			'start_date': start_date,
			'end_date': end_date,
		},
		success: function(data) {
			console.log(data.chart_data);

			loadChart(data.chart_data, data.chart_tappers);

		},
		error: function() {
			console.log('error');
		}
	});
	

});