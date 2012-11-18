<div>

<?php echo form_open("/home/updateProfile") ?>
<fieldset>
	<legend>Change Your Password</legend>
<p>Old Password: <input type="password" data-hint = "OldPassword" name="OldPassword" id="OldPassword" /></p>
<p>New Password: <input type="password" data-hint = "NewPassword" name="NewPassword" id="NewPassword" /></p>
<p>Confirm Password: <input type="password" name="ConfirmPassword" id="ConfirmPassword" /></p>
</fieldset>
<p>First Name: <input type="text" name="FirstName" id="FirstName" value="<?php if(isset($FirstName)) echo $FirstName; ?>"/></p>
<p>Last Name: <input type="text" name="LastName" id="LastName" value="<?php if(isset($LastName)) echo $LastName; ?>"/></p>

<p>Employment Date: <input type="text" name="EmploymentDate" id="EmploymentDate" value="<?php if(isset($EmploymentDate)) echo $EmploymentDate; ?>"/></p>

<p>Age: <input type="text" name="Age" id="Age" value="<?php if(isset($Age)) echo $Age; ?>"/></p>
<p>Phone : <input type="text" name="Phone" id="Phone" value="<?php if(isset($Phone)) echo $Phone; ?>"/></p>
<!-- Image upload -->


<p> <input type="submit" value="Submit" /></p>
<?php form_close();?> 

</div>
</body>
</html>