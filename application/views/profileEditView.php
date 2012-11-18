<?php echo form_open("/home/updateProfile") ?>
<table class="form">
	<tr>
		<th colspan="2">Change Password</th>
	</tr>
	<tr>
		<td>
			<label for="OldPassword">Old Password:</label> <input type="password" data-hint = "********" name="OldPassword" id="OldPassword" />
		</td></tr><tr><td>
			<label for="NewPassword">New Password:</label> <input type="password" data-hint = "********" name="NewPassword" id="NewPassword" />
		</td><td>
			<label for="ConfirmPassword">Confirm Password:</label> <input type="password" data-hint="********" name="ConfirmPassword" id="ConfirmPassword" />
		</td>
	</tr>
	<tr>
		<th colspan="2">Member Details</th>
	</tr>
	<tr>
		<td>
			<label for="FirstName">First Name:</label> <input type="text" name="FirstName" id="FirstName" data-hint="First Name" value="<?php if(isset($FirstName)) echo $FirstName; ?>"/>
		</td><td>
			<label for="LastName">Last Name:</label> <input type="text" name="LastName" id="LastName" data-hint="Last Name" value="<?php if(isset($LastName)) echo $LastName; ?>"/>
		</td></tr><tr><td>
			<label for="Age">Age:</label> <input type="text" data-hint="Age" name="Age" id="Age" value="<?php if(isset($Age)) echo $Age; ?>"/>
		</td><td>
			<label for="Phone">Phone:</label> <input type="text" data-hint="Phone Number" name="Phone" id="Phone" value="<?php if(isset($Phone)) echo $Phone; ?>"/>
		</td></tr><tr><td>
			<label for="EmploymentDate">Employment Date:</label> <input type="text" name="EmploymentDate" id="EmploymentDate" value="<?php if(isset($EmploymentDate)) echo $EmploymentDate; ?>"/>
		</td></tr></table>
<!-- Image upload -->


 <input type="submit" value="Submit" />

<?php form_close();?> 

</div>