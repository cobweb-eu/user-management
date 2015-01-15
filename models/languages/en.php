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

/*
%m1% - Dymamic markers which are replaced at run time by the relevant index.
*/

$lang = array();

// Installer
$lang = array_merge($lang,array(
    "INSTALLER_INCOMPLETE"      => "You cannot register the root account until the installer has been successfully completed!",
    "MASTER_ACCOUNT_EXISTS"     => "The master account already exists!",
    "MASTER_ACCOUNT_NOT_EXISTS" => "You cannot register an account until the master account has been created!",
    "CONFIG_TOKEN_MISMATCH" => "Sorry, that configuration token is not correct."
    ));

//Account
$lang = array_merge($lang,array(
	"ACCOUNT_SPECIFY_USERNAME" 		=> "Please enter your username",
	"ACCOUNT_SPECIFY_PASSWORD" 		=> "Please enter your password",
	"ACCOUNT_SPECIFY_EMAIL"			=> "Please enter your email address",
	"ACCOUNT_INVALID_EMAIL"			=> "Invalid email address",
    "ACCOUNT_INVALID_USER_ID"		=> "The requested user id does not exist.",
    "ACCOUNT_INVALID_PAY_TYPE"		=> "Invalid pay type.  Pay type must be either 'deduct fee' or 'hourly'.",
	"ACCOUNT_USER_OR_EMAIL_INVALID"		=> "Username or email address is invalid",
	"ACCOUNT_USER_OR_PASS_INVALID"		=> "Username or password is invalid",
	"ACCOUNT_ALREADY_ACTIVE"		=> "Your account is already activated",
	"ACCOUNT_REGISTRATION_DISABLED" => "We're sorry, account registration has been disabled.",
    "ACCOUNT_INACTIVE"			=> "Your account is in-active. Check your emails / spam folder for account activation instructions",
	"ACCOUNT_DISABLED"			=> "This account has been disabled.  Please contact us for more information.",
    "ACCOUNT_USER_CHAR_LIMIT"		=> "Your username must be between %m1% and %m2% characters in length",
	"ACCOUNT_DISPLAY_CHAR_LIMIT"		=> "Your display name must be between %m1% and %m2% characters in length",
	"ACCOUNT_PASS_CHAR_LIMIT"		=> "Your password must be between %m1% and %m2% characters in length",
	"ACCOUNT_TITLE_CHAR_LIMIT"		=> "Titles must be between %m1% and %m2% characters in length",
	"ACCOUNT_NAME_CHAR_LIMIT"		=> "Your given name must be between %m1% and %m2% characters in length",
	"ACCOUNT_SURNAME_CHAR_LIMIT"		=> "Your surnme must be between %m1% and %m2% characters in length",
	"ACCOUNT_GENDER_CHAR_LIMIT"		=> "Your gender must be between %m1% and %m2% characters in length",
	"ACCOUNT_AGE_CHAR_LIMIT"		=> "Your age must be between %m1% and %m2% characters in length",
	"ACCOUNT_AFFILIATION_CHAR_LIMIT"	=> "Your affiliation must be between %m1% and %m2% characters in length",
	"ACCOUNT_TELEFON_CHAR_LIMIT"		=> "Your telefon number must be between %m1% and %m2% characters in length",
	"ACCOUNT_ADDRESS_CHAR_LIMIT"		=> "Your postal address must be between %m1% and %m2% characters in length",
	"ACCOUNT_PASS_MISMATCH"			=> "Your password and confirmation password must match",
	"ACCOUNT_DISPLAY_INVALID_CHARACTERS"	=> "Display name can only include alpha-numeric characters",
	"ACCOUNT_USERNAME_IN_USE"		=> "Username %m1% is already in use",
	"ACCOUNT_DISPLAYNAME_IN_USE"		=> "Display name %m1% is already in use",
	"ACCOUNT_EMAIL_IN_USE"			=> "Email %m1% is already in use",
	"ACCOUNT_LINK_ALREADY_SENT"		=> "An activation email has already been sent to this email address in the last %m1% hour(s)",
	"ACCOUNT_NEW_ACTIVATION_SENT"		=> "We have emailed you a new activation link, please check your email",
	"ACCOUNT_NEW_DEACTIVATION_SENT"		=> "We have emailed you an account removal link, please check your email",
	"ACCOUNT_SPECIFY_NEW_PASSWORD"		=> "Please enter your new password",	
	"ACCOUNT_SPECIFY_CONFIRM_PASSWORD"	=> "Please confirm your new password",
	"ACCOUNT_NEW_PASSWORD_LENGTH"		=> "New password must be between %m1% and %m2% characters in length",	
	"ACCOUNT_PASSWORD_INVALID"		=> "Current password doesn't match the one we have on record",	
	"ACCOUNT_DETAILS_UPDATED"		=> "Account details updated",
	"ACCOUNT_ACTIVATION_MESSAGE"		=> "You will need to activate your account before you can login.\n Please follow the link below to activate your account. \n\n BY CLICKING THE LINK YOU ACCEPT THE TERMS OF USE AS OUTLINED BELOW\n %m1%activate_user.php?token=%m2% \n",
	"ACCOUNT_CREATION_COMPLETE"		=> "Account for new user %m1% has been created.",
    "ACCOUNT_VERIFIED_SUCCESSFUL"		=> "Account successfully verified",
    "ACCOUNT_VERIFIED_NOT_SUCCESSFUL"		=> "Account not successfully verified",
    "ACCOUNT_ACTIVATION_COMPLETE"		=> "You have successfully activated your account. You can now login.",
    "ACCOUNT_DEACTIVATION_COMPLETE"		=> "We have successfully removed your account.",
	"ACCOUNT_REGISTRATION_COMPLETE_TYPE1"	=> "You have successfully registered. You can now login.",
	"ACCOUNT_REGISTRATION_COMPLETE_TYPE2"	=> "You have successfully registered. You will soon receive an activation email. 
	You must activate your account before logging in.",
	"ACCOUNT_PASSWORD_NOTHING_TO_UPDATE"	=> "You cannot update with the same password",
	"ACCOUNT_PASSWORD_UPDATED"		=> "Account password updated",
	"ACCOUNT_EMAIL_UPDATED"			=> "Account email updated",
	"ACCOUNT_TOKEN_NOT_FOUND"		=> "Token does not exist / Account is already activated",
	"ACCOUNT_USER_INVALID_CHARACTERS"	=> "Username can only include alpha-numeric characters",
    "ACCOUNT_DELETE_MASTER"     => "You cannot delete the master account!",
    "ACCOUNT_DISABLE_MASTER"     => "You cannot disable the master account!",
    "ACCOUNT_DISABLE_SUCCESSFUL"     => "Account has been successfully disabled.",
    "ACCOUNT_ENABLE_SUCCESSFUL"     => "Account has been successfully enabled.",
    "ACCOUNT_DELETIONS_SUCCESSFUL"		=> "You have successfully deleted %m1% users",
	"ACCOUNT_MANUALLY_ACTIVATED"		=> "%m1%'s account has been manually activated",
	"ACCOUNT_MANUALLY_DEACTIVATED"		=> "%m1%'s account has been manually deactivated",
	"ACCOUNT_DISPLAYNAME_UPDATED"		=> "Displayname changed to %m1%",
	"ACCOUNT_TITLE_UPDATED"			=> "%m1%'s title changed to %m2%",
	"ACCOUNT_NAME_UPDATED"			=> "Your given name changed to %m1%",
	"ACCOUNT_SURNAME_UPDATED"		=> "Your surname changed to %m1%",
	"ACCOUNT_GENDER_UPDATED"		=> "Your gender changed to %m1%",
	"ACCOUNT_AGE_UPDATED"			=> "Your age changed to %m1%",
	"ACCOUNT_AFFILIATION_UPDATED"		=> "Your affiliation changed to %m1%",
	"ACCOUNT_TELEFON_UPDATED"		=> "Your telefon changed to %m1%",
	"ACCOUNT_ADDRESS_UPDATED"		=> "Your postal address changed to %m1%",
	"ACCOUNT_GROUP_ADDED"		=> "Added user to group %m1%.",
	"ACCOUNT_GROUP_REMOVED"		=> "Removed user from group %m1%.",
	"ACCOUNT_GROUP_NOT_MEMBER"		=> "User is not a member of group %m1%.",
	"ACCOUNT_GROUP_ALREADY_MEMBER"		=> "User is already a member of group %m1%.",
    "ACCOUNT_INVALID_USERNAME"		=> "Invalid username",
    "ACCOUNT_PRIMARY_GROUP_SET" => "Successfully set user primary group.",
	));

//Configuration
$lang = array_merge($lang,array(
	"CONFIG_NAME_CHAR_LIMIT"		=> "Site name must be between %m1% and %m2% characters in length",
	"CONFIG_URL_CHAR_LIMIT"			=> "Site url must be between %m1% and %m2% characters in length",
	"CONFIG_EMAIL_CHAR_LIMIT"		=> "Site email must be between %m1% and %m2% characters in length",
	"CONFIG_TITLE_CHAR_LIMIT"		=> "New user title must be between %m1% and %m2% characters in length",
    "CONFIG_ACTIVATION_TRUE_FALSE"		=> "Email activation must be either `true` or `false`",
	"CONFIG_REGISTRATION_TRUE_FALSE"		=> "User registration must be either `true` or `false`",
    "CONFIG_ACTIVATION_RESEND_RANGE"	=> "Activation Threshold must be between %m1% and %m2% hours",
	"CONFIG_LANGUAGE_CHAR_LIMIT"		=> "Language path must be between %m1% and %m2% characters in length",
	"CONFIG_LANGUAGE_INVALID"		=> "There is no file for the language key `%m1%`",
	"CONFIG_TEMPLATE_CHAR_LIMIT"		=> "Template path must be between %m1% and %m2% characters in length",
	"CONFIG_TEMPLATE_INVALID"		=> "There is no file for the template key `%m1%`",
	"CONFIG_EMAIL_INVALID"			=> "The email you have entered is not valid",
	"CONFIG_INVALID_URL_END"		=> "Please include the ending / in your site's URL",
	"CONFIG_UPDATE_SUCCESSFUL"		=> "Your site's configuration has been updated. You may need to load a new page for all the settings to take effect",
	));

//Forgot Password
$lang = array_merge($lang,array(
	"FORGOTPASS_INVALID_TOKEN"		=> "Your activation token is not valid",
    "FORGOTPASS_OLD_TOKEN"          => "Token past expiration time",
    "FORGOTPASS_COULD_NOT_UPDATE"   => "Couldn't update password",
	"FORGOTPASS_NEW_PASS_EMAIL"		=> "We have emailed you a new password",
	"FORGOTPASS_REQUEST_CANNED"		=> "Lost password request cancelled",
	"FORGOTPASS_REQUEST_EXISTS"		=> "There is already an outstanding lost password request on this account",
	"FORGOTPASS_REQUEST_SUCCESS"		=> "We have emailed you instructions on how to regain access to your account",
	));

//Mail
$lang = array_merge($lang,array(
	"MAIL_ERROR"				=> "Fatal error attempting mail, contact your server administrator",
	"MAIL_TEMPLATE_BUILD_ERROR"		=> "Error building email template",
	"MAIL_TEMPLATE_DIRECTORY_ERROR"		=> "Unable to open mail-templates directory. Perhaps try setting the mail directory to %m1%",
	"MAIL_TEMPLATE_FILE_EMPTY"		=> "Template file is empty... nothing to send",
	));

//Miscellaneous
$lang = array_merge($lang,array(
    "PASSWORD_HASH_FAILED"  => "Password hashing failed.  Please contact a site administrator.",
	"NO_DATA"				=> "No data/bad data sent",
    "CAPTCHA_FAIL"				=> "Failed security question",
	"CONFIRM"				=> "Confirm",
	"DENY"					=> "Deny",
	"SUCCESS"				=> "Success",
	"ERROR"					=> "Error",
	"NOTHING_TO_UPDATE"			=> "Nothing to update",
	"SQL_ERROR"				=> "Fatal SQL error",
	"FEATURE_DISABLED"			=> "This feature is currently disabled",
	"PAGE_INVALID_ID"              => "The requested page id does not exist",
    "PAGE_PRIVATE_TOGGLED"			=> "This page is now %m1%",
	"PAGE_ACCESS_REMOVED"			=> "Page access removed for %m1% permission level(s)",
	"PAGE_ACCESS_ADDED"			=> "Page access added for %m1% permission level(s)",
    "ACCESS_DENIED" => "Hmm, looks like you don't have permission to do that.",
	));

//Permissions
$lang = array_merge($lang,array(
    "GROUP_INVALID_ID"              => "The requested group id does not exist",
	"PERMISSION_CHAR_LIMIT"			=> "Permission names must be between %m1% and %m2% characters in length",
	"PERMISSION_NAME_IN_USE"		=> "Permission name %m1% is already in use",
	"PERMISSION_DELETION_SUCCESSFUL_NAME"		=> "Successfully deleted permission '%m1%'",
    "PERMISSION_DELETIONS_SUCCESSFUL"	=> "Successfully deleted %m1% permission level(s)",
	"PERMISSION_CREATION_SUCCESSFUL"	=> "Successfully created the permission level `%m1%`",
	"GROUP_UPDATE"		=> "Group `%m1%` successfully updated.",
	"PERMISSION_REMOVE_PAGES"		=> "Successfully removed access to %m1% page(s)",
	"PERMISSION_ADD_PAGES"			=> "Successfully added access to %m1% page(s)",
	"PERMISSION_REMOVE_USERS"		=> "Successfully removed %m1% user(s)",
	"PERMISSION_ADD_USERS"			=> "Successfully added %m1% user(s)",
	"CANNOT_DELETE_PERMISSION_GROUP" => "You cannot delete the group '%m1%'",
	));

//Private Messages
$lang = array_merge($lang,array(
    "PM_RECEIVER_DELETION_SUCCESSFUL"   => "Message Deleted",
));

$lang = array_merge($lang,array(
    "ENTITY_DELETIONS_SUCCESSFUL"		=> "You have successfully revoked attribute release for entity %m1%",
    "TERMS_OF_USE_MESSAGE" => "COBWEB End User Licence Agreement
PLEASE READ CAREFULLY BEFORE USE. 

COBWEB is a suite of mobile applications, website and associated infrastructure such as web services that provides a one-stop-shop for crowd sourced citizen science based activities, providing a controlled means to submit environment observations, compare with existing data and apply consistent quality checks to increase our understanding of the environment.

At a glance this agreement contains the following information:
(i) The software is provided as seen with certain restrictions on distribution and usage.
(ii) Your control the personal information you provide, how it is processed and your agreement to this.
(iii) The sensors accessed by the software and your agreement for the software to use these.
(iv) Care and safety when participating and creating surveys, what to be mindful of, to minimise risks to species, the environment, people and property.
(v) Supporting data, IPR and other legal implications.

This end-user licence agreement (?the EULA?) is a legal agreement between you (?the End-user? or ?you?) and the University of Edinburgh, acting through EDINA, the national data centre based at Causewayside House, 160 Causewayside, Edinburgh, EH9 1PR, UK. ˇThe University of Edinburgh is a charitable body registered in Scotland with registration number SC005336, having its principal office at Old College, South Bridge, Edinburgh, EH8 9YL (?the Licensor?, ?us? or ?we?).ˇ This EULA is for:
* The ?COBWEB infrastructure? which includes one or more mobile application, the COBWEB Portal, COBWEB COBWEB infrastructures and associated web services. 
We licence use of the COBWEB infrastructure to you on the basis of this EULA and subject to any rules or policies COBWEB infrastructurelied herein. We do not sell the COBWEB infrastructure to you. We remain the owners of the COBWEB infrastructure at all times.
You should print a copy of this EULA for future reference.
Agreed terms
1. Acknowledgements
1. The terms of this EULA apply to the COBWEB infrastructure, including any updates or supplements to the COBWEB infrastructure, unless they come with separate terms, in which case those terms apply. If any open-source software is included in the COBWEB infrastructure, the terms of an open-source licence may override some of the terms of this EULA. 
2. We may change these terms at any time by sending you details of the change or notifying you of a change when you next start using the COBWEB infrastructure. The new terms may be displayed on-screen and you may be required to read and accept them to continue your use of the COBWEB infrastructure. 
3. From time to time updates to the COBWEB infrastructure may be issued. Depending on the update, you may not be able to use the COBWEB infrastructure until you have accepted any new terms. 
4. You agree that you may be charged by your service providers for internet access when using the COBWEB infrastructure and you accept responsibility for this.

5. The terms of our privacy policy from time to time, available at http://edina.ac.uk/privacyandcookies.html(?the Privacy Policy?) are incorporated into this EULA by reference and apply to your use of the COBWEB infrastructure. 

6. The COBWEB infrastructure may contain links to other independent third-party websites (?Third-party Sites?). Third-party Sites are not under our control, and we are not responsible for and do not endorse their content or their privacy policies (if any). You will need to make your own independent judgement regarding your interaction with any Third-party Sites, including the purchase and use of any products or services accessible through them. 
2. Grant and scope of licence
1. In consideration of you agreeing to abide by the terms of this EULA, we grant you a non-transferable, non-exclusive licence to use the COBWEB infrastructure on your Devices, subject to these terms, the Privacy Policy and the COBWEB infrastructure Rules, incorporated into this EULA by reference. We reserve all other rights. 
2. You may download or stream a copy of the COBWEB Apps onto any number of smartphone, tablet or similar devices which you own for personal use and to view, use and display the COBWEB infrastructure on the Devices for your personal purposes only. 
3. You accept responsibility in accordance with the terms of this EULA for the use of the App on, or in relation to any Device, whether or not it is owned by you.
3. Licence restrictions
Except as expressly set out in this EULA or as permitted by any local law, you agree:
1. not to copy the COBWEB installations except where such copying is incidental to normal use of the COBWEB infrastructure, or where it is necessary for the purpose of back-up or operational security; 
2. not to rent, lease, sub-license, loan, translate, merge, adapt, vary or modify the COBWEB infrastructure; 
3. not to make alterations to, or modifications of, the whole or any part of the COBWEB infrastructure, or permit the COBWEB infrastructure or any part of it to be combined with, or become incorporated in, any other programs 
* not to disassemble, de-compile, reverse-engineer or create derivative works based on the whole or any part of the COBWEB infrastructure or attempt to do any such thing except to the extent that (by virtue of section 296A of the Copyright, Designs and Patents Act 1988) such actions cannot be prohibited because they are essential for the purpose of achieving inter-operability of the COBWEB infrastructure with another software program, and provided that the information obtained by you during such activities: 
1. is used only for the purpose of achieving inter-operability of the COBWEB infrastructure with another software program; 
2. is not unnecessarily disclosed or communicated without our prior written consent to any third party; and 
3. is not used to create any software that is substantially similar to the COBWEB infrastructure; 
* to keep all copies of the COBWEB infrastructure secure; 
* to include our copyright notice on all entire and partial copies you make of the COBWEB infrastructure on any medium; 
* not to provide or otherwise make available the COBWEB infrastructure in whole or in part (including object and source code), in any form to any person without prior written consent from us; and 
* to comply with all technology control or export laws and regulations that apply to the technology used or supported by the COBWEB infrastructure,together (?the Licence Restrictions?). 
4. Privacy
1. When participating in data collection surveys, you agree that the COBWEB infrastructure may make use of:
(i) Phone sensor data (e.g. temperature, compass, pressure and tilt),
(ii) The technical information about your devices and its operating system,
(iii) Location and time data,
(iv) A selected photograph, sound recording or short video recording.
However, this will be limited to a point at which \"observations\" are made ? the precise operation and settings of which will be determined by the specific survey participation requirements.
2. Such information is used only to improve the quality of the data and improve the COBWEB service.
3. The providers of COBWEB will never personally identify you from the data you collect unless you explicitly provide permission to do so. And this will be done on a case by case basis.
4. Anonymous use of COBWEB is facilitated where possible. However, you may agree to log your details with the system in order to:
(i) See the results of your own participation and build up an expertise profile,
(ii) Access the results of restricted surveys,
(iii) Participate in surveys where the collection of data, area to be surveyed, and conditions may be subject to legal and safety concerns (e.g. protected species, bogs, etc.), or may require a recognised level of experience in order to participate.
(iv) Author your own surveys.
(v) Contact and participate in discussions with fellow citizen scientists.
5. You may subsequently remove your personal data from the COBWEB system, including your registration options and survey information that you have submitted. However, you agree that the following observation data may be able to be removed:
(i) Observations submitted anonymously,
(ii) Observations which have since been anonymised and combined as part of a dataset,
(iii) Those observations where you have previously given explicit consent for their publication with your affiliation.
6. Some surveys permit the use of \"free\" text within an observation.  In order to comply with this policy and preserve the privacy rights of other participants, you agree not include any personal references.
7. There is a process for reporting inappropriate data submissions which would include but not be limited to:
(i) Inappropriate images and/or text not conducive to the science.
(ii) Reckless distribution of information not appropriate for public consumption (e.g. locations of protected species).
(iii) Pictures or textual references to persons/property intruding on their privacy.
8. You agree that the providers of COBWEB may pass on personal information if we consider there is a legal obligation to do so, or if we have to enforce or apply our terms of use and other agreements.
9. The providers of COBWEB ensure adherence to EU data protection policies, and therefore observations and registration in one country may not normally be taken across to another country.
5. Acceptable use restrictions
You must:
1. not use the COBWEB infrastructure in any unlawful manner, for any unlawful purpose, or in any manner inconsistent with this EULA, or act fraudulently or maliciously, for example, by hacking into or inserting malicious code, including viruses, or harmful data, into the COBWEB infrastructure or any operating system 
2. not infringe our intellectual property rights or those of any third party in relation to your use of the COBWEB infrastructure (to the extent that such use is not licensed by this EULA); 
3. not transmit any material that is defamatory, offensive or otherwise objectionable in relation to your use of the COBWEB infrastructure; 
4. not use the COBWEB infrastructure in a way that could damage, disable, overburden, impair or compromise our systems or security or interfere with other users; and 
5. not collect or harvest any information or data from the COBWEB infrastructure or our systems. 
6. acknowledge that we may impose or adjust the limit on the amount of data or functional privileges that you access through the COBWEB infrastructure[A1]ˇ.ˇ We[A2]ˇ may fix such upper limits at any time, at our discretion.
7. only use COBWEB with the account registered to you, you may not:
(i) seek to elevate your priviledges or data access through unauthorised means.
(ii) impersonate another user (e.g. use another person?s password).
(iii) access the COBWEB system using another person?s account or IdP. Such unauthorised usage may also have legal implications across other systems as well as COBWEB.
6. Intellectual property rights
1. You acknowledge that all intellectual property rights in the COBWEB infrastructure anywhere in the world belong to us or our licensors, that rights in the COBWEB infrastructure are licensed (not sold) to you, and that you have no rights in, or to, the COBWEB infrastructure other than the right to use each of them in accordance with the terms of this EULA. 
2. You acknowledge that the COBWEB infrastructure uses OS OpenDataTM sourced from Ordnance Survey.ˇ Such data is ? Crown copyright and database right and is licensed by us, from Ordnance Survey, on the terms of the following licence:
https://www.ordnancesurvey.co.uk/oswebsite/docs/licences/os-opendata-licence.pdf 
3. You acknowledge that the COBWEB infrastructure uses data from OpenStreetMap (http://www.openstreetmap.org/) ? OpenStreetMap contributors.ˇ Such data is available under the Open Database License http://opendatacommons.org/licenses/odbl/. 
4. You acknowledge that the COBWEB infrastructure uses data from Natural England (http://www.naturalengland.org.uk/).ˇ Such data is available under the NE Open Government License http://www.naturalengland.org.uk/Images/open-government-licence-NE-OS_tcm6-30743.pdf. 
5. You acknowledge that you have no right to have access to the COBWEB infrastructure in source-code form. 
6. You acknowledge that additional datasets may be incorporated into the COBWEB infrastructure and that they may also have certain restrictions on their use and public consumption.
7. Health & Safety
1. When participating in data gathering initiatives, you agree that your own safety, any potential harm caused to the environment and subsequent adherence to regional laws remains your own responsibility.
2. Laws may differ from region to region and it will be your responsibility to check the applicability of these and uphold adherence as appropriate. This covers your usage both with respect to your participation of surveys and/or as a survey author.
3. In particular, when authoring a survey, in addition to giving specific instructions about the data collection work, it may be necessary for you to provide some specific advice depending on the data collection tasks and the potential risks associated with the participant and/or their impact on the natural environment.
4. For instance, you are responsible for drawing attention to any specific risks associated with data collection work within the survey/area. These may include but will not be limited to:
(i) Respect for nature. Activities must not cause unnecessary disturbance, distressing, injuring, or killing species. There may be some instances where certain species are protected by law and consideration must be given to the legal status of certain species, including licencing (e.g. bats, bird ringing, breeding season, great crested newts);
(ii) Respect for land owners and property. Rights of way and the permissions on entry and access to land may differ from region to region. Activities must not encourage any activity such as trespass, wondering into prohibited areas, or damage to the countryside, etc.
(iii) Safety of the individuals conducting surveys. Providing local knowledge of hazards (e.g. drowning, falling, getting lost), exclusion zones, with any details when times/seasons have a bearing on the degree of risk (e.g. night time).
5. You must agree to control invitations and participation where (for instance):
(i) Species are protected by law, sampling skills/experience are necessary (e.g. sample collection in order to confirm species), or special handling skills or 
(ii) Land access is not public. And any specific advice (such as keeping to named paths, etc.) must be provided as part of the survey instructions.
(iii) Specialized knowledge may be needed (for instance dangerous tidal areas, poisonous/hazardous wildlife ? e.g. seals) and where special skills such as climbing or navigation is required.
(iv) Special permits, licences are needed to undertake the activity.
6. You agree that the providers of COBWEB cannot foresee all potential hazards associated with the use of the app and infrastructure.
7. Activities involving minors. Please note that in most cases, explicit permission from a parent or legal guardian is required (NB: the COBWEB EULA must be agreed to by someone over 18), and laws often exist regarding management and participation of children?s activities.
8. If your survey is aimed at children then by signing this agreement you agree to seek the relevant ethical advice and parental clearance for your specific survey activities.
9. The COBWEB consortia cannot be held responsible for mismanagement of data collection activities. Neither can they be held responsible for the actions or inactions of survey participants.
8. Limitation of liability
1. You acknowledge that the COBWEB infrastructure has not been developed to meet your individual requirements, and that it is therefore your responsibility to ensure that the facilities and functions of the COBWEB infrastructure meet your requirements.ˇ You should be particularly aware of the fact that calculation errors may occur when using the COBWEB infrastructure, for instance caused by local environmental conditions and/or incomplete data. 
2. You acknowledge that the maps accessed through the COBWEB infrastructure may contain cartographic errors and be incomplete or otherwise have inaccuracies or misleading information.ˇ The COBWEB infrastructure should not be used for the purposes of navigation or way finding.ˇ Marking of paths and roads on these maps do not imply any right of way or access to private property. 
3. We have developed the COBWEB infrastructure primarily for domestic and private use. You agree not to use the COBWEB infrastructure for resale purposes.ˇ If you choose to use the COBWEB infrastructure for any commercial or business purposes, we shall have no liability to you for any loss of profit, loss of business, business interruption, or loss of business opportunity. 
4. Our maximum aggregate liability under or in connection with this EULA (including your use of any Services) whether in contract, tort (including negligence) or otherwise, shall in all circumstances be limited to a refund of the amount paid for the COBWEB infrastructure. This does not apply to the types of loss set out in condition 6.4. 
5. Nothing in this EULA shall limit or exclude our liability for: 
I. death or personal injury resulting from our negligence; 
II. fraud or fraudulent misrepresentation; and 
III. any other liability that cannot be excluded or limited by Scottish law. 
9. Termination
1. We may terminate this EULA immediately by written notice to you: 
I. if you commit a material or persistent breach of this EULA which you fail to remedy (if remediable) within 14 days after the service of written notice requiring you to do so; and 
II. if you breach any of the Licence Restrictions or the Acceptable Use Restrictions. 
2. On termination for any reason: 
I. (a) all rights granted to you under this EULA shall cease; 
II. (b) you must immediately cease all activities authorised by this EULA; and 
III. (c) you must immediately delete or remove the COBWEB infrastructure from all Devices, and immediately destroy all copies of the COBWEB application then in your possession, custody or control and certify to us that you have done so. 
10. Communication between us
1. If you wish to contact us in writing, or if any condition in this EULA requires you to give us notice in writing, you can send this to us by e-mail [edina@ed.ac.uk] or by prepaid post to:
EDINA, University of Edinburgh
160 Causewayside
Edinburgh
EH9 1PR
We will confirm receipt of this by contacting you in writing, normally by e-mail. 
11. Events outside our control
1. We will not be liable or responsible for any failure to perform, or delay in performance of, any of our obligations under this EULA that is caused by any act or event beyond our reasonable control, including failure of public or private telecommunications networks. 
2. If such an event outside our control takes place that affects the performance of our obligations under this EULA: 
I. (a) our obligations under this EULA will be suspended and the time for performance of our obligations will be extended for the duration of the event; and 
II. (b) we will use our reasonable endeavours to find a solution by which our obligations under this EULA may be performed despite the event. 
12. Other important terms
1. We may transfer our rights and obligations under this EULA to another organisation, but this will not affect your rights or our obligations under this EULA. 
2. You may only transfer your rights or obligations under this EULA to another person if we agree in writing. 
3. If we fail to insist that you perform any of your obligations under this EULA, or if we do not enforce our rights against you, or if we delay in doing so, that will not mean that we have waived our rights against you and will not mean that you do not have to comply with those obligations. If we do waive a default by you, we will only do so in writing, and that will not mean that we will automatically waive any later default by you. 
4. Each of the conditions of this EULA operates separately. If any court or competent authority decides that any of them are unlawful or unenforceable, the remaining conditions will remain in full force and effect. 
5. Please note that this EULA, its subject matter and its formation, are governed by Scottish law. You and we both agree that the courts of Scotland will have non-exclusive jurisdiction. 
ˇ
",
));
?>
