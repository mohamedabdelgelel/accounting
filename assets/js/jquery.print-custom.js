$(document).ready(function() {

	// jQuery Print

	$('#printable').find('.print').on('click', function() {
		$.print('#printable');
	});

});