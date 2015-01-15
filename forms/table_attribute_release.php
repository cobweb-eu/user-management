<?php

require_once("../models/config.php");

// Request method: GET
$ajax = checkRequestMode("get");

if (!securePage(__FILE__)){
  // Forward to index page
  addAlert("danger", "Whoops, looks like you don't have permission to view that page.");
  apiReturnError($ajax, ACCOUNT_ROOT);
}

// Sanitize input data
$get = filter_input_array(INPUT_GET, FILTER_SANITIZE_SPECIAL_CHARS);

// Parameters: [title, limit, columns, actions, buttons]
// title (optional): title of this table. 
// limit (optional): if specified, loads only the first n rows.
// columns (optional): a list of columns to render.
// actions (optional): a list of actions to render in a dropdown in a special 'action' column.
// buttons (optional): a list of buttons to render at the bottom of the table.

// Set up Valitron validator
$v = new Valitron\DefaultValidator($get);

// Add default values
$v->setDefault('title', 'List of Entities with individual attribute release approval');
$v->setDefault('limit', null);
$v->setDefault('columns',
    [
    'entity_info' =>  [
        'label' => 'Entity',
        'sort' => 'asc',
        'sorter' => 'metatext',
        'sort_field' => 'entity_id',
        'template' => "{{entity_id}}"
    ],
    'consent_date' => [
        'label' => 'Approved',
        'sorter' => 'metanum',
        'sort_field' => 'consent_date',
        'template' => "{{consent_date}}"
    ]
    
]);

$v->setDefault('menu_items',
    [
	'user_delete' => [
        'template' => "<a href='#' data-id='{{entity_id}}' class='btn-delete-user' data-user_name='{{user_name}}' data-target='#user-delete-dialog' data-toggle='modal'><i class='fa fa-trash-o'></i> Revoke</a>"
    ]
]);

$v->setDefault('buttons',
    [
    'add' => "",
    'view_all' => ""
]);

// Validate!
$v->validate();

// Process errors
if (count($v->errors()) > 0) {	
  foreach ($v->errors() as $idx => $error){
    addAlert("danger", $error);
  }
  apiReturnError($ajax, ACCOUNT_ROOT);    
} else {
    $get = $v->data();
}

// Generate button display modes
$buttons_render = ['add', 'view_all'];
if (isset($get['buttons']['add'])){
    $buttons_render['add']['hidden'] = "";
} else {
    $buttons_render['add']['hidden'] = "hidden";
}
if (isset($get['buttons']['view_all'])){
    $buttons_render['view_all']['hidden'] = "";
} else {
    $buttons_render['view_all']['hidden'] = "hidden";
}

// Load entities
$entities = loadEntities($get['user_name'],$get['limit']);

// Compute user table properties
foreach($entities as $entity_id => $entity){
    $entities[$entity_id]['entity_status'] = "Approved";
}


// Load CSRF token
$csrf_token = $loggedInUser->csrf_token;

$response = "
<div class='panel panel-primary'>
  <div class='panel-heading'>
    <h3 class='panel-title'><i class='fa fa-entities'></i> {$get['title']}</h3>
  </div>
  <div class='panel-body'>
    <input type='hidden' name='csrf_token' value='$csrf_token'/>";

// Don't bother unless there are some records found
if (count($entities) > 0) {
    $tb = new TableBuilder($get['columns'], $entities, $get['menu_items'], "Status/Action", "entity_status", "entity_status_style");
    $response .= $tb->render();
    $response .= "</div>";
} else {
    $response .= "<div class='alert alert-info'>No entities found.</div>";
}

$response .= "
    </div> <!-- end panel body -->
</div> <!-- end panel -->";


if ($ajax)
    echo json_encode(array("data" => $response), JSON_FORCE_OBJECT);
else
    echo $response;

?>
