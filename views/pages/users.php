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

<div class="container-fluid p-4 shadow mx-auto" style="max-width: 1000px;">
        <a href="/adduser">
			<button class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add new user</button>
		</a>

		<div class="card-group justify-content-center">
		<?php foreach ($user_item as $user){ ?>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $user['email']?></h5>
                            <p class="card-text"><?php echo $user['full_name']?></p>
                            <p class="card-text"><?php echo $user['gender']?></p>
                            <p class="card-text"><?php echo $user['status']?></p>
                            <a href="/profile?id=<?= $user['id']?>" class="btn btn-primary">Profile</a>
                        </div>
        <?php } ?>
</div>