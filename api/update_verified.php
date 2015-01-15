<?php
/*

By Andreas Matheus
Secure Dimensions GmbH
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

require_once("../models/config.php");
set_error_handler('logAllErrors');

if (!isUserLoggedIn()){
    addAlert("danger", "You must be logged in to access this resource.");
    echo json_encode(array("errors" => 1, "successes" => 0));
    exit();
}

$validator = new Validator();
// Required: csrf_token, user_id
$csrf_token = $validator->requiredPostVar('csrf_token');
$user_id = $validator->requiredNumericPostVar('user_id');

$display_name = trim($validator->optionalPostVar('display_name'));
$email = str_normalize($validator->optionalPostVar('email'));
$title = trim($validator->optionalPostVar('title'));
$given_name = trim($validator->optionalPostVar('given_name'));
$surname = trim($validator->optionalPostVar('surname'));
$gender = trim($validator->optionalPostVar('gender'));
$age = trim($validator->optionalPostVar('age'));
$affiliation = trim($validator->optionalPostVar('affiliation'));
$telefon = trim($validator->optionalPostVar('telefon'));
$address = trim($validator->optionalPostVar('address'));

$rm_groups = $validator->optionalPostVar('remove_groups');
$add_groups = $validator->optionalPostVar('add_groups');
$enabled = $validator->optionalPostVar('enabled');
$primary_group_id = $validator->optionalPostVar('primary_group_id');

// For updating passwords.  The user's current password must also be included (passwordcheck) if they are resetting their own password.
$password = $validator->optionalPostVar('password');
$passwordc = $validator->optionalPostVar('passwordc');
$passwordcheck = $validator->optionalPostVar('passwordcheck');

// Add alerts for any failed input validation
foreach ($validator->errors as $error){
  addAlert("danger", $error);
}

// Validate csrf token
if (!$csrf_token or !$loggedInUser->csrf_validate(trim($csrf_token))){
	addAlert("danger", lang("ACCESS_DENIED"));
    echo json_encode(array("errors" => 1, "successes" => 0));
	exit();
}

// Special case to update the logged in user (self)
$self = false;
if ($user_id == "0"){
	$self = true;
	$user_id = $loggedInUser->user_id;
}

//Check if selected user exists
if(!$user_id or !userIdExists($user_id)){
	addAlert("danger", "I'm sorry, the user id you specified is invalid!");
	if (isset($_POST['ajaxMode']) and $_POST['ajaxMode'] == "true" ){
	  echo json_encode(array("errors" => 1, "successes" => 0));
	} else {
	  header("Location: " . getReferralPage());
	}
	exit();
}
	
$userdetails = fetchUserAuthById($user_id); //Fetch user details

$error_count = 0;
$success_count = 0;

// Update verified tag
//if ($verified !== null){
        if (!updateUserVerified($user_id, 'true')){
                $error_count++;
        } else {
                $success_count++;
        }
//}

restore_error_handler();

$ajaxMode = $validator->optionalBooleanPostVar('ajaxMode', 'true');
if ($ajaxMode == "true" ){
  echo json_encode(array(
	"errors" => $error_count,
	"successes" => $success_count));
} else {
  header('Location: ' . getReferralPage());
  exit();
}

?>
