<div class="modal fade" id="info_modal<?php echo $row['tenant_code'];?>" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="GET" action="test.php">
				<div class="modal-header">
					<h3 class="modal-title">Info User</h3>
				</div>
				<div class="modal-body">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						
						<div class="form-group" style="text-align: left;">
							<label>No.</label>
							<input type="hidden" name="Renter_id" value="<?php echo $row['tenant_code'];?>"/>
							<input disabled type="text" name="Room_number" value="<?php echo $row['room_number'];?>" class="form-control" required="required" />
						</div>
						<div class="form-group" style="text-align: left;">
							<label>FirstName</label>
							<input disabled type="text" name="Name" value="<?php echo $row['tenant_fname'];?>" class="form-control" pattern="^[a-zA-Zก-๏\s]+$" title="กรุณากรอกเป็นตัวอักษร" required="required"/>
						</div>
                        <div class="form-group" style="text-align: left;">
							<label>LastName</label>
							<input disabled type="text" name="Last_name" value="<?php echo $row['tenant_lname'];?>" class="form-control" pattern="^[a-zA-Zก-๏\s]+$" title="กรุณากรอกเป็นตัวอักษร" required="required"/>
						</div>

						<div class="form-group" style="text-align: left;">
							<label>Date</label>
							<input disabled type="text" name="Last_name" value="<?php echo $row['contract_date'];?>" class="form-control" pattern="^[a-zA-Zก-๏\s]+$" title="กรุณากรอกเป็นตัวอักษร" required="required"/>
						</div>

						<div class="form-group" style="text-align: left;">
							<label>Exp</label>
							<input disabled type="text" name="Last_name" value="<?php echo $row['expiration_date'];?>" class="form-control" pattern="^[a-zA-Zก-๏\s]+$" title="กรุณากรอกเป็นตัวอักษร" required="required"/>
						</div>

                      
							
					
					</div>
				</div>
				<div style="clear:both;"></div>
				<div class="modal-footer">
					<a href="/motel/view/room/test.php"><button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button></a>
				</div>
				</div>
			</form>
		</div>
	</div>
</div>