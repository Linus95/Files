<?php
/*
	file:	ourstories_example/admin/userFrm.php
	desc:	Form to add a new user 
*/
?>
<h4>Add user</h4>
<div id="info">
	<p>Fill the form and click insert to save into db</p>
</div>
<form id="userFrm">
	
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="firstname">Firstname:</label>
      <input type="text" class="form-control" id="firstname" placeholder="Firstname" name="firstname">
    </div>
	<div class="form-group">
      <label for="lastname">Lastname:</label>
      <input type="text" class="form-control" id="lastname" placeholder="Lastname" name="lastname">
    </div>
	<div class="form-group">
      <label for="phone">Phone:</label>
      <input type="tel" class="form-control" id="phone" placeholder="Phone" name="phone">
    </div>
	<div class="form-group">
      <label for="password">Password:</label>
      <input type="text" class="form-control" id="password" placeholder="Password" name="password">
    </div>
	<div class="form-group">
		<label for="level">Select user level:</label>
			<select class="form-control" id="level">
				<option value="">-Select-</option>
				<option value="admin">Admin</option>
				<option value="editor">Editor</option>
			</select>
	</div>
    <button type="submit" class="btn btn-default" id="insUsrBtn">Insert</button>
  </form>