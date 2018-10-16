$(document).ready(function() {
	$("#addNew").on('click', function () {
	   $("#tableManager").modal('show');
	});
	
	getExistingData(5);
});

function getExistingData(limit) {
	$.ajax({
		url: 'insert.php',
		method: 'POST',
		dataType: 'text',
		data: {
			key: 'getExistingData',
			limit: limit
		},
    success: function (response) {
			if (response == "reachedMax") {
				limit += 1;
				getExistingData(limit);
			} else {
				$('tbody').append(response);
			}
		}
	});
}

function manageData(key) {
	var itemName = $("#itemName");
	var itemCategory = $("#itemCategory");
	var price = $("#price");
	var minRequired = $("#minRequired");
	var maxCapacity = $("#maxCapacity");
	var startingInventory = $("#startingInventory");

	if (isNotEmpty(itemName) && isNotEmpty(itemCategory) && isNotEmpty(price) && isNotEmpty(minRequired) && isNotEmpty(maxCapacity) && isNotEmpty(startingInventory)) {
		$.ajax({
		  url: 'insert.php',
		  method: 'POST',
		  dataType: 'text',
		  data: {
			  key: key,
			  itemName: itemName.val(),
			  itemCategory: itemCategory.val(),
			  price: price.val(),
			  minRequired: minRequired.val(),
			  maxCapacity: maxCapacity.val(),
			  startingInventory: startingInventory.val()
		  },
      success: function (response) {
				alert(response);
		  }
		});
	}
}

function isNotEmpty(caller) {
	if (caller.val() == '') {
		caller.css('border', '1px solid red');
		return false;
	} else
		caller.css('border', '');

	return true;
}