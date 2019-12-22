<table class="table table-dark" id="tasks_table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Description</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
  	<?php
  		$isDisabled = isset($_SESSION["is_admin"]) ? 'enabled' : 'disabled';
		foreach($data as $row) {
			$isChecked = $row['status'] ? 'checked' : '';
			$isChenged = $row['is_changed'] ? 'checked' : '';
			echo '<tr>
					<th scope="row" name="id">' . $row['id'] . '</th>
					<td>' . $row['user_name'] . '</td>
					<td>' . $row['email'] . '</td>
					<td>' . $row['description'] . '';
					if (isset($_SESSION["is_admin"])) {
						echo '<div class="on-hover change_description" data-task-description="' . $row['description'] . '" data-task-id="' . $row['id'] . '">
								<small>Change</small>
							</div>';
					};
					echo '
					</td>
					<td>
						<div class="checkbox">
  							<label><input type="checkbox" data-task-id="' . $row['id'] . '" class="change_status"' . $isChecked . ' ' . $isDisabled . '>Done</label>
						</div>
						<div class="checkbox">
  							<label><input type="checkbox" data-task-id="' . $row['id'] . '" class="changed" ' . $isChenged . ' disabled>Changed by Admin</label>
						</div>
					</td>
				  </tr>';
		}
	?>
  </tbody>
</table>
<br />
<button type="button" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#myModal">Add Task</button>
<?php include './views/components/add_task_modal_view.php'; ?>
<?php include './views/components/change_description_modal.php'; ?>