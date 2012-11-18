<?php echo form_open("/home/updateProfile") ?>
<fieldset>
	<legend>Change Your Password</legend>
<p>Old Password: <input type="password" data-hint = "Old Password" name="OldPassword" id="OldPassword" /></p>
<p>New Password: <input type="password" data-hint = "New Password" name="NewPassword" id="NewPassword" /></p>
<p>Confirm Password: <input type="password" data-hint="Confirm Password" name="ConfirmPassword" id="ConfirmPassword" /></p>
</fieldset>
<p>First Name: <input type="text" name="FirstName" id="FirstName" data-hint="First Name" value="<?php if(isset($FirstName)) echo $FirstName; ?>"/></p>
<p>Last Name: <input type="text" name="LastName" id="LastName" data-hint="Last Name" value="<?php if(isset($LastName)) echo $LastName; ?>"/></p>

<p>Employment Date: <input type="text" name="EmploymentDate" id="EmploymentDate" value="<?php if(isset($EmploymentDate)) echo $EmploymentDate; ?>"/></p>

<p>Age: <input type="text" data-hint="Age" name="Age" id="Age" value="<?php if(isset($Age)) echo $Age; ?>"/></p>
<p>Phone : <input type="text" data-hint="Phone Number" name="Phone" id="Phone" value="<?php if(isset($Phone)) echo $Phone; ?>"/></p>
<!-- Image upload -->


<p> <input type="submit" value="Submit" /></p>

<?php form_close();?> 

</div>