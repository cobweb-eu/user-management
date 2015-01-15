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

// Resend the activation email for a user that has registered an account.  Note that this is enabled regardless of whether or not email activation is enabled.
// This is to prevent "orphaned" accounts, who registered while email activation was still required.
// Request method: POST

require_once("../models/config.php");

set_error_handler('logAllErrors');

//Forms posted
if(!empty($_POST))
{
	$email = $_POST["email"];
	$username = $_POST["username"];
	
	//Perform some validation
	//Feel free to edit / change as required
	if(trim($email) == "")
	{
		$errors[] = lang("ACCOUNT_SPECIFY_EMAIL");
	}
	//Check to ensure email is in the correct format / in the db
	else if(!isValidEmail($email) || !emailExists($email))
	{
		$errors[] = lang("ACCOUNT_INVALID_EMAIL");
	}
	
	if(trim($username) == "")
	{
		$errors[] =  lang("ACCOUNT_SPECIFY_USERNAME");
	}
	else if(!usernameExists($username))
	{
		$errors[] = lang("ACCOUNT_INVALID_USERNAME");
	}
	
	if(count($errors) == 0)
	{
		//Check that the username / email are associated to the same account
		if(!emailUsernameLinked($email,$username))
		{
			$errors[] = lang("ACCOUNT_USER_OR_EMAIL_INVALID");
		}
		else
		{
			$userdetails = fetchUserAuthByUserName($username);
			
			//See if the user's account is activation
			if($userdetails["active"]==1)
			{

                            //Create a new deactivation url;
                            $deactivation_token = generateDeactivationToken();

			    if(!updateDeactivationToken($deactivation_token,$username,$email))
                            {
                                    $errors[] = lang("SQL_ERROR");
                            }
                            else
                            {
                                $deactivation_url = SITE_ROOT."api/deactivate_user.php?token=".$deactivation_token;

                                $mail = new userCakeMail();

                                //Setup our custom hooks
                                $hooks = array(
                                    "searchStrs" => array("#DEACTIVATION-URL","#USERNAME#"),
                                    "subjectStrs" => array($deactivation_url,$userdetails["display_name"])
                                    );

                                if(!$mail->newTemplateMsg("send-deactivation.txt",$hooks))
                                {
                                    $errors[] = lang("MAIL_TEMPLATE_BUILD_ERROR");
                                }
                                else
                                {
                                    if(!$mail->sendMail($userdetails["email"],"Request for removing your ".$websiteName." Account"))
                                    {
                                            $errors[] = lang("MAIL_ERROR");
                                    }
                                    else
                                    {
                                            //Success, user details have been updated in the db now mail this information out.
                                            $successes[] = lang("ACCOUNT_NEW_DEACTIVATION_SENT");
                                    }
                                }
			    }
			}
		}
	}
} else {
	$errors[] = lang("NO_DATA");
}

restore_error_handler();

foreach ($errors as $error){
  addAlert("danger", $error);
}
foreach ($successes as $success){
  addAlert("success", $success);
}

if (isset($_POST['ajaxMode']) and $_POST['ajaxMode'] == "true" ){
  echo json_encode(array(
	"errors" => count($errors),
	"successes" => count($successes)));
} else {
  // Send successes to the home page, while errors should return them to the deactivation page.
  if(count($errors) == 0) {
	header('Location: index.php');
	exit();
  } else {
	header('Location: send_deactivation.php');
	exit();	
  }
}

?>
