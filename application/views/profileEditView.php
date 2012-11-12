<?php echo form_open("/home/profileEdit") ?>

<p>Old Password: <input type="password" name="OldPassword" id="OldPassword" /></p>
<p>New Password: <input type="password" name="NewPassword" id="NewPassword" /></p>
<p>Confirm Password: <input type="password" name="ConfirmPassword" id="ConfirmPassword" /></p>

<p>First Name: <input type="text" name="FirstName" id="FirstName" /></p>
<p>Last Name: <input type="text" name="LastName" id="LastName" /></p>

<p>Employment Date: <input type="text" name="EmploymentDate" id="EmploymentDate" /></p>

<p>Age: <input type="text" name="Age" id="Age" /></p>
<p>Phone : <input type="text" name="Phone" id="Phone" /></p>
<!-- Image upload -->


<p> <input type="submit" value="Submit" /></p>
<?php form_close();
?> 

