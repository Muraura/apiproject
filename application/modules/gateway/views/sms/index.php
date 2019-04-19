<?php
$errors = $this->session->flashdata("eror_message");
$success= $this->session->flashdata("success_message");
if(!empty($erors))
{
   ?>
   <div class= "alert alert-danger"><?php echo $errors;?></div>
   <?php
}

if(!empty($success))
{
   ?>
   <div class= "alert alert-success"><?php echo $success;?></div>
   <?php
}?>
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<button type="button" class="btn btn-success" data-toggle="modal" data-target="#send">create message</button>
		<?php echo anchor("sms/save" , "Fetch Places", "class='btn btn-danger btn-lg' ") ?>

<div class="modal fade" id="send" tabindex="-1" role="dialog" aria-labelledby="send messages"
		 aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="sendLabel">Send Message</h5>

						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>

					</div>
					<div class="modal-body">
						<?php echo form_open(base_url() . 'gateway/sms/send_sms') ?>
						<div class="form-group row">
							<div class="col-sm-12 col-md-12">
								<input type="text" class="form-control" id="message" name="message">
							</div>
						</div>
					</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Send</button>
						</div>
						<?php form_close();?>
					</div>

				</div>
			</div>
		</div>


      <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>#</th>
						<!--  -->
						<th>statusCode</th>
						<th>Cost</th>
                  <th>Status</th>
						<th>Message id</th>
                  <th>number</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>#</th>
						<th>statusCode</th>
						<th>Cost</th>
                  <th>Status</th>
						<th>Message id</th>
                  <th>number</th>

					</tr>
				</tfoot>
				<tbody>
					<?php
       if ($query->num_rows() > 0) {
         $count = 0;
       foreach ($query->result() as $row) {
        $count++;
        ?>
					<tr>
						<td>
							<?php echo $count ?>
						</td>
						<td>
							<?php echo $row->statusCode; ?>
						</td>
						<td>
							<?php echo $row->cost; ?>
						</td>
                  <td>
							<?php echo $row->status; ?>
						</td>
                  <td>
							<?php echo $row->messageId; ?>
						</td>
                  <td>
							<?php echo $row->number; ?>
						</td>
					
					</tr>
					<?php
}
}
?>
				</tbody>
			</table>
		</div>

	</div>
      </div>
     