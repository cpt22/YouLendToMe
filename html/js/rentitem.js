const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const id = urlParams.get('i');

var dateRanges = null;

var isValidDate = false;
var hasRangeContainedInvalid = false;


$.post("../request/getAvailDates.php", {
	id : id
}, function(data, status) {
	var result = null;
	try {
		result = JSON.parse(data);
		for(var i = 0; i < result.unavailDates.length; i++) {
		    var dt = result.unavailDates[i];
		    dt.start = moment(dt.start);
		    dt.end = moment(dt.end);
		}
		
		dateRanges = result.unavailDates;
	} catch (err) {
	}
	
	$('#rentDateRange').daterangepicker({
		"applyButtonClasses" : "applyButton btn-primary",
		"minYear" : result.start.substring(6),
		"maxYear" : result.end.substring(6),
		"startDate" : result.start,
		"endDate" : result.start,
		"minDate" : result.start,
		"maxDate" : result.end,
		"opens" : "center",
		isInvalidDate : isInvalidDate,
		isCustomDate : isCustomDate
	}, function(start, end, label) {
		var temp = new Date(start);
		var endDate = new Date(end);
		var invalid = false;
		while (temp.getTime() < endDate.getTime()) {
			if (isInvalidDate(temp, true)) {
				invalid = true;
			}
			temp.setDate(temp.getDate() + 1);
		}

		if (hasRangeContainedInvalid) {
			$('#rentButton').prop('disabled', true);
			isValidDate = false;
			return false;
		} else {
			isValidDate = true;
			$('#rentButton').prop('disabled', false);
		}
	});
});


function isContained(first, last, middle) {
	return middle >= first && middle <= last;
}

function isInvalidDate(date, log) {

	return dateRanges.reduce(function(bool, range) {
		var val = bool || (date >= range.start && date <= range.end);
		var startDate = $('#rentDateRange').data('daterangepicker').startDate;
		var endDate = $('#rentDateRange').data('daterangepicker').endDate;

		if (val && isContained(startDate, endDate, date)) {
			hasRangeContainedInvalid = true;
			
		}
		return val;
	}, false);
}

function isCustomDate(date, log) {
	var startDate = $('#rentDateRange').data('daterangepicker').startDate;
	var endDate = $('#rentDateRange').data('daterangepicker').endDate;

	if (hasRangeContainedInvalid && isContained(startDate, endDate, date)) {
		return "text-danger";
	} else {
		return;
	}
}

$('#rentDateRange').on('clickDate.daterangepicker', function(ev) {
	if ($('#rentDateRange').data('daterangepicker').endDate == null) {
		hasRangeContainedInvalid = false;
	} else {
		if (hasRangeContainedInvalid) {
			$('.applyButton').prop('disabled', true);
		}
	}
});

$('#rentDateRange').keydown(function(e) {
	e.preventDefault();
	return false;
});