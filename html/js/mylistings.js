$(document).ready(function() {

	$('.is-listed').click(function() {
		var val = $(this).attr('assoc-id');
		var row = $(this);

		$.post("../request/list/updateListed.php", {
			id : val
		}, function(data, status) {
			try {
				var result = JSON.parse(data);
				if (result.result == 0) {
					if (result.newVal == 1) {
						$(row).removeClass('btn-success');
						$(row).addClass('btn-danger');
						$(row).html('Delist');
					} else {
						$(row).removeClass('btn-danger');
						$(row).addClass('btn-success');
						$(row).html('Relist');
					}
				}
			} catch (err) {
			}
		});
	});

	$('.del-listing').click(function() {
		var val = $(this).attr('assoc-id');
		var row = $(this);
		var parent = $(this).closest('.listing-row')

		if(confirm("Are you sure you want to delete this?")){
			$.post("../request/list/deleteListed.php", {
				id : val
			}, function(data, status) {
				try {
					var result = JSON.parse(data);
					
					if (result.result == 0) {
						$(parent).toggle();
						$(parent).remove();
					}
				} catch (err) {
				}
			});
	    }
	    else{
	        return false;
	    }
		
	});
	
});