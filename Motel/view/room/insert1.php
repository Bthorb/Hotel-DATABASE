<?php
$date = date_create();

?>
<div class="modal fade" id="insert_modal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="GET" action="test.php">
				<div class="modal-header">
					<h3 class="modal-title">Insert User</h3>
				</div>
				<div class="modal-body">
					<div class="col-md-2"></div>
					<div class="col-md-8">

						<div class="form-group" style="text-align: left;">
							<label>No.</label>
							<select class="form-control" name="room_number">
								<?php foreach ($search_result2 as $one1) { ?>
									<option value="<?php echo $one1['Room_number']; ?>">
										<?php echo $one1['Room_number']; ?>
									</option><?php } ?>
							</select>
						</div>
						<div class="form-group" style="text-align: left;">
							<label>Prefix</label>
							<select class="form-control" name="Prefix">
								<option value="นาย">นาย
								</option>
								<option value="นางสาว">นางสาว
								</option>
							</select>
						</div>

						<div class="form-group" style="text-align: left;">
							<label>FirstName</label>
							<input type="text" name="Name" class="form-control" pattern="^[a-zA-Zก-๏\s]+$" title="กรุณากรอกเป็นตัวอักษร" required="required" />
						</div>
						<div class="form-group" style="text-align: left;">
							<label>LastName</label>
							<input type="text" name="Last_name" class="form-control" pattern="^[a-zA-Zก-๏\s]+$" title="กรุณากรอกเป็นตัวอักษร" required="required" />
						</div>
						<div class="form-group" style="text-align: left;">
							<label></label>
							<input name="Room_status" type="hidden" value="1">
						</div>
						<div class="form-group" style="text-align: left;">
							<label>house registration</label>
							<input name="house_registration" type="text">
						</div>
						<div class="form-group" style="text-align: left;">
							<label><label>Contract date</label></label>
							<input name="Contract_date" type="text" value="<?php echo date_format($date, "Y-m-d"); ?>">
						</div>
						<div class="form-group" style="text-align: left;">
							<label><label>Expiration date</label></label>
							<input name="Expiration_date" type="text" value="<?php echo date_format($date, "Y-m-d"); ?>">
						</div>
					</div>
				</div>
				<div style="clear:both;"></div>
				<div class="modal-footer">
					<button name="insert" class="btn btn-primary"><i class='fas fa-user-plus'></i> Insert</button>
					<button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
				</div>
		</div>
		</form>
	</div>
</div>
</div>