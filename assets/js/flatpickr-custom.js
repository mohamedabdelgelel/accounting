$(document).ready(function() {

	// Flatpickr

	$('#basicFlatpickr').flatpickr();

	$('#rangeCalendarFlatpickr').flatpickr({
	    mode: 'range'
	});

	$('#dateTimeFlatpickr').flatpickr({
	    enableTime: true,
	    dateFormat: 'Y-m-d H:i'
	});

	$('#timeFlatpickr').flatpickr({
	    enableTime: true,
	    noCalendar: true,
	    dateFormat: 'H:i'
	});

});