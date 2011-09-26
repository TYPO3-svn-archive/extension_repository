/**
 * Returns default chart options
 *
 * @return object Chart options
 */
function getDefaultChartOptions() {
	return {
		axes: {
			xaxis: {
				renderer: $.jqplot.CategoryAxisRenderer
			}
		},
		grid: {
			drawGridLines: true,
			gridLineColor: '#cccccc',
			background:    '#ffffff',
			borderColor:   '#4D4D4D',
			borderWidth:   1.0,
			shadow:        false
		},
		highlighter: {
			show: true,
			sizeAdjust: 5,
			tooltipLocation: 'n',
			tooltipOffset: 6,
			tooltipAxes: 'y'
		},
		cursor: {
			show: false
		}
	};
}


(function($) {

	/**
	 * Render chart
	 *
	 * @param boolean renderShy Render shy charts
	 * @return void
	 */
	$.fn.renderChart = function(renderShy) {
		var containerId = $(this).attr('id');
		if (!containerId || typeof(charts) === 'undefined' || typeof(charts[containerId]) === 'undefined') {
			return;
		}

		var chart = charts[containerId];
		if ((!renderShy && chart.isShy) || chart.isRendered) {
			return;
		}

		var options = getDefaultChartOptions();
		options.title = chart.options.title;
		options.series = chart.options.series;

		$.jqplot(containerId, chart.lines, options);
		charts[containerId].isRendered = true;
	}


	/**
	 * Toggle extension row details
	 *
	 * @param mixed element Object or selector
	 * @return void
	 */
	$.fn.toggleExtensionDetails = function() {
		var $element = $(this);

			// Stop here without correct element
		if (typeof($element) === 'undefined') {
			return;
		}

			// Toggle elements
		$toggleElement = $element.closest('.repository-toggle-from-here');
		$toggleElement.find('.repository-toggle-hide').toggle();
		$toggleElement.find('.repository-toggle-show').toggle();

		// Render chart
		var $chart = $toggleElement.find('.chart-container');
		if (typeof($chart) !== 'undefined') {
			$chart.renderChart(true);
		}
	}

})(jQuery);


jQuery(document).ready(function($) {

	/**
	 * Process all charts
	 */
	$('div.chart-container').renderChart(false);


	/**
	 * Add click event handler to all toggle elements
	 */
	$('.repository-toggle').click(function(event) {
		event.preventDefault();
		$(this).toggleExtensionDetails();
	});

});