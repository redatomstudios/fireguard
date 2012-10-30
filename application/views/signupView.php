<?php echo form_open("/home/signup") ?>

<p>User Name: <input type="text" name="UserName" id="UserName" /></p>
<p>First Name: <input type="text" name="FirstName" id="FirstName" /></p>
<p>Last Name: <input type="text" name="LastName" id="LastName" /></p>

<p>Password: <input type="password" name="Password" id="Password" /></p>
<p>Confirm Password: <input type="password" name="ConfirmPassword" id="ConfirmPassword" /></p>
<p>Joining Date: <input type="text" name="JoiningDate" id="JoiningDate" /></p>
<p>Age: <input type="text" name="Age" id="Age" /></p>

<!-- Image upload -->
<p> <input type="submit" value="Submit" /></p>
<?php form_close();
?> 

