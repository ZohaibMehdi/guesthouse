<?php
require_once 'includes/header.php';
require_once 'users.php';

$user = new User;
?>

<section>
  <div class="container">

    <table class="table table-bordered">
      <thead>
				<tr>
	        <th>ID</th>
	        <th>E-Mail</th>
					<th>Active state</th>
					<th>Action</th>
				</tr>
      </thead>
      <tbody>
        <?php
          foreach($user->getAll() as $val){
        ?>
				<tr>
	        <td> <?php echo $val['id']; ?> </td>
	        <td> <?php echo $val['email']; ?> </td>
	        <td> <?php echo $val['register_accept']; ?> </td>
					<td> <?php if($val['register_accept'] == 0) {  ?>
						<button id = "approveUser" data-id = "<?php echo $val['id'];?>" type="button" class="btn btn-success userAction">Accept</button>
					<?php }else{ ?>
						<button id = "inActive" data-id = "<?php echo $val['id'];?>" type="button" class="btn btn-danger userAction">Deactivate</button>
					<?php }?>
					</td>
				</tr>
      </tbody>
			<?php
			}
			?>
    </table>

  </div>
</section>

<?php
require_once 'includes/footer.php';
?>
