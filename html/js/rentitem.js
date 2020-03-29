const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const id = urlParams.get('i');

var dateRanges = null;//[ { 'start' : moment('2020-03-20'), 'end' : moment('2020-03-22')} , 
	//{'start' : moment('2020-03-30'), 'end' : moment('2020-04-01')}

//];

$.post("../request/getAvailDates.php", {
	id : id
}, function(data, status) {
	var result = null;
	try {
		result = JSON.parse(data);
		console.log(result);
		for(var i = 0; i < result.unavailDates.length; i++) {
		    var dt = result.unavailDates[i];
		    dt.start = moment(dt.start);
		    dt.end = moment(dt.end);
		}
		//result.start = Date(result.start).toLocaleDateString;
		//result.end = Date(result.end).toLocaleDateString;
		console.log(result);
		dateRanges = result.unavailDates;
	} catch (err) {
	}
	
	$('#rentDateRange').daterangepicker({
		"minYear" : 2020,
		"maxYear" : 2020,
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
		console.log(hasRangeContainedInvalid);
		if (hasRangeContainedInvalid) {
			alert("invalid date");
			$('#rentDateRange').trigger('blur');
			$('#rentDateRange').trigger('focus');
		} else {
			//hasRangeContainedInvalid = false;
		}
	});
});

var hasRangeContainedInvalid = false;

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

	}
});

$(function() {
	
});