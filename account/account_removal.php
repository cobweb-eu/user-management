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

if (!securePage(__FILE__)){
  // Forward to index page
  addAlert("danger", "Whoops, looks like you don't have permission to view that page.");
  header("Location: index.php");
  exit();
}

setReferralPage(getAbsoluteDocumentPath(__FILE__));

?>

<!DOCTYPE html>
<html lang="en">
  <?php
        echo renderAccountPageHeader(array("#SITE_ROOT#" => SITE_ROOT, "#SITE_TITLE#" => SITE_TITLE, "#PAGE_TITLE#" => "Account Removal"));
  ?>

  <body>
    <div id="wrapper">

      <!-- Sidebar -->
        <?php
          echo renderMenu("account-removal");
        ?>

      <div id="page-wrapper">
                <div class="row">
          <div id='display-alerts' class="col-lg-12">

          </div>
        </div>
        <h1>Account Removal</h1>
        <p class="lead">An account removal request will be send to your email address.</p> 
		<form class='form-horizontal' role='form' name='delete' action='../api/user_send_deactivation.php' method='post'>
		  <div class="row">
			<div id='display-alerts' class="col-lg-12">
  
			</div>
		  </div>
		  <div class="form-group">
			<div class="col-md-offset-3 col-md-6">
			  <input type="hidden" class="form-control" placeholder="Username" name = 'username' value=''>
			</div>
		  </div>
		  <div class="form-group">
			<div class="col-md-offset-3 col-md-6">
			  <input type="email" class="form-control" placeholder="Email" name='email'>
			</div>
		  </div>
		  <div class="form-group">
			<div class="col-md-12">
			  <button type="submit" class="btn btn-success submit" value='Resend'>Send Removal Email</button>
			</div>
		  </div>
		</form>
      </div>	

    </div> <!-- /container -->

	<script>
        $(document).ready(function() {          
          // Get id of the logged in user to determine how to render this page.
          var user = loadCurrentUser();

	  $('form[name="delete"] input[name="username"]').val(user['user_name']);
	  $('form[name="delete"] input[name="email"]').val(user['email']);
	  $('form[name="delete"] input[name="email"]').prop('readonly',true);

	  alertWidget('display-alerts');
			  
	  $("form[name='delete']").submit(function(e){
				var form = $(this);
				var url = APIPATH + 'user_send_removal.php';
				$.ajax({  
				  type: "POST",  
				  url: url,  
				  data: {
					username:	form.find('input[name="username"]').val(),
					email:		form.find('input[name="email"]').val(),
					ajaxMode:	"true"
				  }		  
				}).done(function(result) {
				  resultJSON = processJSONResult(result);
				  alertWidget('display-alerts');
				});
				// Prevent form from submitting twice
				e.preventDefault();
		    });
		});
	</script>
  </body>
</html>
