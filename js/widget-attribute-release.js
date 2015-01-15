/*

Andreas Matheus
Secure Dimensions GmbH
Copyright (c) 2015

UserFrosting Version: 0.2.1 (beta)
By Alex Weissman
Copyright (c) 2014

Based on the UserCake user management system, v2.0.2.
Copyright (c) 2009-2012

UserFrosting, like UserCake, is 100% free and open-source.

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the 'Software'), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:
The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED 'AS IS', WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.

*/

/* Display a table of users */
function entityGlobalTable(box_id, user_name, options) {
        options = typeof options !== 'undefined' ? options : {};

        var data = options;
        data['ajaxMode'] = true;
        data['user_name'] = user_name;

        // Generate the form
        $.ajax({
          type: "GET",
          url: FORMSPATH + "table_attribute_global_release.php",
          data: data,
          dataType: 'json',
          cache: false
        })
        .fail(function(result) {
                addAlert("danger", "Oops, looks like our server might have goofed.  If you're an admin, please check the PHP error logs.");
                alertWidget('display-alerts');
        })
        .done(function(result) {

                $('#' + box_id).html(result['data']);

        });
}

/* Display a table of users */
function entityTable(box_id, user_name, options) {	
	options = typeof options !== 'undefined' ? options : {};
	
	var data = options;
	data['ajaxMode'] = true;
	data['user_name'] = user_name;
	
	// Generate the form
	$.ajax({  
	  type: "GET",  
	  url: FORMSPATH + "table_attribute_release.php",  
	  data: data,
	  dataType: 'json',
	  cache: false
	})
	.fail(function(result) {
		addAlert("danger", "Oops, looks like our server might have goofed.  If you're an admin, please check the PHP error logs.");
		alertWidget('display-alerts');
	})
	.done(function(result) {

		$('#' + box_id).html(result['data']);
		
		// define pager options
		var pagerOptions = {
		  // target the pager markup - see the HTML block below
		  container: $('#' + box_id + ' .pager'),
		  // output string - default is '{page}/{totalPages}'; possible variables: {page}, {totalPages}, {startRow}, {endRow} and {totalRows}
		  output: '{startRow} - {endRow} / {filteredRows} ({totalRows})',
		  // if true, the table will remain the same height no matter how many records are displayed. The space is made up by an empty
		  // table row set to a height to compensate; default is false
		  fixedHeight: true,
		  // remove rows from the table to speed up the sort of large tables.
		  // setting this to false, only hides the non-visible rows; needed if you plan to add/remove rows with the pager enabled.
		  removeRows: false,
		  size: 10,
		  // go to page selector - select dropdown that sets the current page
		  cssGoto: '.gotoPage'
		};
		
		// Initialize the tablesorter
		$('#' + box_id + ' .table').tablesorter({
			debug: false,
			theme: 'bootstrap',
			widthFixed: true,
			widgets: ['filter']
		}).tablesorterPager(pagerOptions);		
	
		// Link buttons
		$('#' + box_id + ' .btn-delete-user').click(function() {
			var btn = $(this);
            		var entity_id = btn.data('id');
			var user_name = btn.data('user_name');
			deleteEntityDialog('user-delete-dialog', entity_id);
			$('#user-delete-dialog').modal('show');
		});	 	
	});
}

function deleteEntityDialog(box_id, entity_id){
	// Delete any existing instance of the form with the same name
	if($('#' + box_id).length ) {
		$('#' + box_id).remove();
	}
	
	var data = {
		box_id: box_id,
		title: "Delete Entity",
		message: "Are you sure you want to revoke attribute release permission for entity " + entity_id + "?",
		confirm: "Yes, revoke"
	}
	
	// Generate the form
	$.ajax({  
	  type: "GET",  
	  url: FORMSPATH + "form_confirm_delete.php",  
	  data: data,
	  dataType: 'json',
	  cache: false
	})
	.fail(function(result) {
		addAlert("danger", "Oops, looks like our server might have goofed.  If you're an admin, please check the PHP error logs.");
		alertWidget('display-alerts');
	})
	.done(function(result) {
		if (result['errors']) {
			console.log("error");
			alertWidget('display-alerts');
			return;
		}
		
		// Append the form as a modal dialog to the body
		$( "body" ).append(result['data']);
		$('#' + box_id).modal('show');
		
		$('#' + box_id + ' .btn-group-action .btn-confirm-delete').click(function(){
			deleteEntity(entity_id);
		});	
	});
}

function deleteEntity(entity_id) {
	var url = APIPATH + "delete_entity.php";
	$.ajax({  
	  type: "POST",  
	  url: url,  
	  data: {
		entity_id:	entity_id,
		ajaxMode:	"true"
	  }
	}).done(function(result) {
		processJSONResult(result);
		window.location.reload();
	});
}
