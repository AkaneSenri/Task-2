<?php 
use AkaneSenri\App\Services\Page;
?>

<!DOCTYPE html>
<html lang="en">
<?php 
Page::part('head');
?>
<body>
<?php 
Page::part('navbar');
?>
	<div class="container-fluid">
		
		<form method="post" action="/done"> 
		<div class="p-4 mx-auto mr-4 shadow rounded" style="margin-top: 50px;width:100%;max-width: 340px;">
			<h2 class="text-center">Staff Manager</h2>
			<h3>Add new user</h3>
			<input class="my-2 form-control" value="<?=getVar('full_name')?>" type="name" name="full_name" placeholder="Your name">
			<input class="my-2 form-control" value="<?=getVar('email')?>" type="email" name="email" placeholder="Your email">
			<select class="my-2 form-control" name="gender">
                <option <?=getSelect('gender', '')?> value="">Select your gender</option>
				<option <?=getSelect('gender','Male')?> value="Male">Male</option>
				<option <?=getSelect('gender', 'Female')?> value="Female">Female</option>
			</select>
			<select class="my-2 form-control" name="status">
				<option <?=getSelect('status','')?>v alue="">Select your status</option>
				<option <?=getSelect('status', 'Active')?> value="Active">Active</option>
				<option <?=getSelect('status', 'Inactive')?> value="Inactive">Inactive</option>
			</select>
            <input class="btn btn-success" type="submit" value="Save">
		</div>
	</form>
	</div>