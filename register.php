<?php
/*

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
require_once("models/config.php");

setReferralPage(getAbsoluteDocumentPath(__FILE__));

if (!userIdExists('1')){
	addAlert("danger", lang("MASTER_ACCOUNT_NOT_EXISTS"));
	header("Location: install/wizard_root_user.php");
	exit();
}

// If registration is disabled, send them back to the home page with an error message
if (!$can_register){
	addAlert("danger", lang("ACCOUNT_REGISTRATION_DISABLED"));
	header("Location: login.php");
	exit();
}

//Prevent the user visiting the logged in page if he/she is already logged in
if(isUserLoggedIn()) {
	addAlert("danger", "I'm sorry, you cannot join for an account while logged in.  Please log out first.");
	apiReturnError(false, SITE_ROOT);
}

?>

<!DOCTYPE html>
<html lang="en">
  <?php
	echo renderTemplate("head.html", array("#SITE_ROOT#" => SITE_ROOT, "#SITE_TITLE#" => SITE_TITLE, "#PAGE_TITLE#" => "Join"));
  ?>

  <body>
    <div class="container">
      <div class="header">
        <ul class="nav nav-pills navbar pull-right">
        </ul>
        <h3 class="text-muted">COBWEB User Management</h3>
      </div>
      <div class="jumbotron">
        <h1>Let's get started!</h1>
        <p class="lead">Joining is fast and simple.</p>
		<form name='newUser' id='newUser' class='form-horizontal' role='form' action='api/create_user.php' method='post'>
		  <div class="row">
				<div id='display-alerts' class="col-lg-12">
		  
				</div>
		  </div>		
		  <div class="row form-group">
			<label class="col-sm-4 control-label">Username</label>
			<div class="col-sm-8">
			    <div class="input-group">
                    <span class='input-group-addon'><i class='fa fa-edit'></i></span>
					<input type="text" class="form-control" placeholder="Username" name = 'user_name' value='' data-validate='{"minLength": 1, "maxLength": 25, "label": "Username" }'>
				</div>
			</div>
		  </div>
		  <div class="row form-group">
			<label class="col-sm-4 control-label">Display Name</label>
			<div class="col-sm-8">
				<div class="input-group">
					<span class='input-group-addon'><i class='fa fa-edit'></i></span>
					<input type="text" class="form-control" placeholder="Display Name" name='display_name' data-validate='{"minLength": 1, "maxLength": 50, "label": "Display Name" }'>
				</div>
			</div>
		  </div>
		  <div class="row form-group">
			<label class="col-sm-4 control-label">Email</label>
			<div class="col-sm-8">
				<div class="input-group">
					<span class='input-group-addon'><i class='fa fa-envelope'></i></span>
					<input type="email" class="form-control" placeholder="Email" name='email' data-validate='{"email": true, "minLength": 1, "maxLength": 150, "label": "Email" }'>
				</div>
			</div>
		  </div>		  
		  <div class="row form-group">
			<label class="col-sm-4 control-label">Password</label>
			<div class="col-sm-8">
				<div class="input-group">
					<span class='input-group-addon'><i class='fa fa-lock'></i></span>
					<input type="password" class="form-control" placeholder="Password" name='password' data-validate='{"minLength": 8, "maxLength": 50, "passwordMatch": "passwordc", "label": "Password" }'>
				</div>
			</div>
		  </div>
		  <div class="row form-group">
			<label class="col-sm-4 control-label">Confirm Password</label>
			<div class="col-sm-8">
			  	<div class="input-group">
					<span class='input-group-addon'><i class='fa fa-lock'></i></span>
					<input type="password" class="form-control" placeholder="Confirm Password" name='passwordc' data-validate='{"minLength": 8, "maxLength": 50, "label": "Confirm Password" }'>
				</div>
			</div>
		  </div>
		  <div class="row form-group">
			<label class="col-sm-4 control-label">Confirm Security Code</label>
			<div class="col-sm-4">
				<div class="input-group">
					<span class='input-group-addon'><i class='fa fa-eye'></i></span>
					<input type="text" class="form-control" name='captcha' data-validate='{"minLength": 1, "maxLength": 50, "label": "Confirm Security Code" }'>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="input-group">
                                        <span class='input-group-addon'><i id="button" class='fa fa-play'></i></span>
			  		<img id="captchaImage">
				</div>
			</div>
		  </div>

		  <br>
		  <div class="form-group">
			<div class="col-sm-12">
			  <button type="submit" class="btn btn-success submit" value='Register'>Join</button>
			</div>
		  </div>
		</form>

                  <div class='row'>
                          <div class='col-md-12'>
                                <a href='resend_activation.php' class='btn btn-link' role='button' value='Activate'>Resend activation email</a>
                          </div>
                  </div>

	  </div>	
      <?php echo renderTemplate("footer.html"); ?>

    </div> <!-- /container -->

    <script>


	$(document).ready(function() {
		// Load navigation bar
		$(".navbar").load("header-loggedout.php", function() {
            		$(".navbar .navitem-register").addClass('active');
        	});

		var captchaArray = <?php $number = generateCaptchaNumber(); $image = generateCaptchaImage($number); $audio = generateCaptchaAudio($number); echo json_encode(array($image,$audio));?>;
		$("#captchaImage").attr("src", captchaArray[0]);
		$("#captchaAudio").attr("src", captchaArray[1]);

 		//$("#captchaAudio").bind('ended', function(){});
		var playing = false;
		$('i#button').click(function() {
		    $(this).toggleClass('fa-play fa-pause');

                    if (playing == false) {
                        document.getElementById('captchaAudio').play();
                        playing = true;
    
                    } else {
                        document.getElementById('captchaAudio').pause();
                        playing = false;
                    }

                });
		
		// Process submission
            $("form[name='newUser']").submit(function(e){
			e.preventDefault();
            var form = $(this);
            var errorMessages = validateFormFields('newUser');
			if (errorMessages.length > 0) {
				$('#display-alerts').html("");
				$.each(errorMessages, function (idx, msg) {
					$('#display-alerts').append("<div class='alert alert-danger'>" + msg + "</div>");
				});	
			} else {
                var url = APIPATH + 'create_user.php';
                $.ajax({  
                  type: "POST",  
                  url: url,  
                  data: {
					user_name: 		form.find('input[name="user_name"]' ).val(),
					display_name: 	form.find('input[name="display_name"]' ).val(),
					email: 			form.find('input[name="email"]' ).val(),
					password: 		form.find('input[name="password"]' ).val(),
					passwordc: 		form.find('input[name="passwordc"]' ).val(),
					captcha: 		form.find('input[name="captcha"]' ).val(),
					//terms_of_use: 		form.find('input[name="terms_of_use"]' ).val(),
                    ajaxMode:		"true"
                  }		  
                }).done(function(result) {
                  var resultJSON = processJSONResult(result);
                  if (resultJSON['errors'] && resultJSON['errors'] > 0){
                        console.log("error");
						// Reload captcha
						// var img_src = 'models/captcha.php?' + new Date().getTime();
						// $('#captcha').attr('src', img_src);
						form.find('input[name="captcha"]' ).val("");
                        alertWidget('display-alerts');
                        return;
                  } else {
                    window.location.replace('login.php');
                  }
                });   
            }
		});
	});
</script>
<audio id="captchaAudio" type="audio/mp3"/>

</body>
</html>
