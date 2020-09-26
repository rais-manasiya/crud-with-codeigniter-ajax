<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Participants List</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/jquery.dataTables.css'?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/dataTables.bootstrap4.css'?>">

<link id="bsdp-css" href="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">
<style>
.dataTables_wrapper .dataTables_paginate .paginate_button {
	box-sizing: border-box;
	display: inline-block;
	min-width: 1.5em;
	padding: 1px;
	margin-left: 2px;
	text-align: center;
	text-decoration: none !important;
	cursor: pointer;
	color: #333 !important;
	border: 1px solid transparent;
	border-radius: 2px;
}
</style>
</head>
<body>
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a href="http://www.webdamn.com" class="navbar-brand">Ajax CRUD Operations with CodeIgniter</a>
 
</nav> 
<div class="container fluid">	
    <div class="row">		
        <div class="col-12">		
            <div class="col-md-12 mt-5">				
                <h4>Example: Ajax CRUD Operations in CodeIgniter</h4>
                <div class="float-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#addPartiModal"><span class="fa fa-plus"></span> Add New</a></div><br>
            </div>            
            <table class="table table-striped" id="employeeListing">
                <thead>
                    <tr>
                        <th>Name</th>
						<th>Age</th>
                        <th>DOB</th>
						<th>Profession</th>
						<th>Locality</th>
						<th>No of Guests</th>
						<th>Address</th>
                        <th style="text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody id="listRecords">                    
                </tbody>
            </table>
        </div>
    </div>
        
</div>	
<form id="savePartiForm" method="post">
	<div class="modal fade" id="addPartiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Add New Participant</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">                       
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Name*</label>
					<div class="col-md-10">
					  <input type="text" name="name" id="name" class="form-control" required>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Age*</label>
					<div class="col-md-10">
					  <input type="text" name="age" id="age" class="form-control" required> 
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Date of Birth*</label>
					<div class="col-md-10">
					  <input type="text" name="dob" id="dob" class="form-control" readonly="readonly" required>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Profession*</label>
					<div class="col-md-10">
					  <select name="profession" id="profession" class="form-control" required>
					  	<option value="Employed">Employed</option>
					  	<option value="Student">Student</option>
					  </select>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Locality*</label>
					<div class="col-md-10">
					  <input type="text" name="locality" id="locality" class="form-control" required>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-2 col-form-label">No of Guests*</label>
					<div class="col-md-10">
					  <select name="no_of_guests" id="no_of_guests" class="form-control" required>
					  	<option value="1">1</option>
					  	<option value="2">2</option>
					  	<option value="3">3</option>
					  	<option value="4">4</option>
					  	<option value="5">5</option>
					  	<option value="6">6</option>
					  	<option value="7">7</option>
					  	<option value="8">8</option>
					  	<option value="9">9</option>
					  	<option value="10">10</option>
					  </select>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Address*</label>
					<div class="col-md-10">
					  <textarea name="address" id="address" class="form-control" rows="2" required></textarea>
					</div>
				</div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Save</button>
		  </div>
		</div>
	  </div>
	</div>
</form>
<form id="editPartiForm" method="post">
	<div class="modal fade" id="editPartiModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="editModalLabel">Edit Participant</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Name*</label>
					<div class="col-md-10">
					  <input type="text" name="e_name" id="e_name" class="form-control" required>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Age*</label>
					<div class="col-md-10">
					  <input type="text" name="e_age" id="e_age" class="form-control" required> 
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Date of Birth*</label>
					<div class="col-md-10">
					  <input type="text" name="e_dob" id="e_dob" class="form-control" readonly="readonly" required>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Profession*</label>
					<div class="col-md-10">
					  <select name="e_profession" id="e_profession" class="form-control" required>
					  	<option value="Employed">Employed</option>
					  	<option value="Student">Student</option>
					  </select>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Locality*</label>
					<div class="col-md-10">
					  <input type="text" name="e_locality" id="e_locality" class="form-control" required>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-2 col-form-label">No of Guests*</label>
					<div class="col-md-10">
					  <select name="e_no_of_guests" id="e_no_of_guests" class="form-control" required>
					  	<option value="1">1</option>
					  	<option value="2">2</option>
					  	<option value="3">3</option>
					  	<option value="4">4</option>
					  	<option value="5">5</option>
					  	<option value="6">6</option>
					  	<option value="7">7</option>
					  	<option value="8">8</option>
					  	<option value="9">9</option>
					  	<option value="10">10</option>
					  </select>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Address*</label>
					<div class="col-md-10">
					  <textarea name="e_address" id="e_address" class="form-control" rows="2" required></textarea>
					</div>
				</div>
		  </div>
		  <div class="modal-footer">
			 <input type="hidden" name="partiId" id="partiId" class="form-control">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Update</button>
		  </div>
		</div>
	  </div>
	</div>
</form>
<form id="deletePartiForm" method="post">
	<div class="modal fade" id="deletePartiModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="deleteModalLabel">Delete Participant</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			   <strong>Are you sure to delete this record?</strong>
		  </div>
		  <div class="modal-footer">
			<input type="hidden" name="deletePartiId" id="deletePartiId" class="form-control">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
			<button type="submit" class="btn btn-primary">Yes</button>
		  </div>
		</div>
	  </div>
	</div>
</form>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.2.1.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.dataTables.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/dataTables.bootstrap4.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/crud_operation.js'?>"></script>
<script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
    $('#dob').datepicker({
        autoclose: true,
        format:'yyyy-mm-dd'
    });

    $('#e_dob').datepicker({
        autoclose: true,
        format:'yyyy-mm-dd'
    });

</script>
</body>
</html>