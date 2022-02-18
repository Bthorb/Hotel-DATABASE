<div class="modal fade" id="show_modal<?php echo $one['tenant_code']; ?>" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="GET" action="test.php">
				<div class="modal-header">
					<h3 class="modal-title">Renter</h3>
				</div>
				<div class="modal-body">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<div class="form-group" style="text-align: left;">
							<label>No.</label>
							<input type="hidden" name="Renter_id" value="<?php echo $one['Renter_id']; ?>" />
							<input style="width: 20%;" disabled type="text" name="Room_number" value="<?php echo $one['Room_number']; ?>" class="form-control" required="required" />
						</div>
						<div class="form-group" style="text-align: left;">
							<label>Name</label>
							<input disabled type="text" name="Name" value="<?php echo $one['Name'], " ", $one['Last_name']; ?>" class="form-control" required="required" />
						</div>
						<div class="form-group" style="text-align: left;">
							<label>Room_Type</label>
							<input disabled type="text" name="Last_name" value="<?php echo $one['Room_type']; ?>" class="form-control" required="required" />
						</div>
						<div class="form-group" style="text-align: left;">
							<label>Room_Remake</label>
							<input disabled type="text" name="Room_status" value="<?php echo $one['Room_Remake']; ?>" class="form-control" required="required" />
						</div>
						<div class="form-group" style="text-align: left;">
							<label>Room_price</label>
							<input disabled style="width: 20%;" type="text" name="Last_name" value="<?php echo $one['Room_price']; ?>" class="form-control" required="required" />
						</div>

					</div>
				</div>
				<div style="clear:both;"></div>
				<div class="modal-footer">

					<button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
				</div>
		</div>
		</form>
	</div>
</div>
</div>