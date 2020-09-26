$(document).ready(function(){
	listEmployee();		
	var table = $('#employeeListing').dataTable({     
		"bPaginate": false,
		"bInfo": false,
		"bFilter": false,
		"bLengthChange": false,
		"pageLength": 5		
	}); 
	// list all employee in datatable
	function listEmployee(){
		$.ajax({
			type  : 'ajax',
			url   : 'participant/show',
			async : false,
			dataType : 'json',
			success : function(data){
				console.log(data);
				var html = '';
				var i;
				for(i=0; i<data.length; i++){
					html += '<tr id="'+data[i].id+'">'+
							'<td>'+data[i].name+'</td>'+
							'<td>'+data[i].age+'</td>'+
							'<td>'+data[i].dob+'</td>'+		                        
							'<td>'+data[i].profession+'</td>'+
							'<td>'+data[i].locality+'</td>'+
							'<td>'+data[i].no_of_guests+'</td>'+							
							'<td>'+data[i].address+'</td>'+
							'<td style="text-align:right;">'+
								'<a href="javascript:void(0);" class="btn btn-info btn-sm editRecord" data-id="'+data[i].id+'" data-name="'+data[i].name+'" data-age="'+data[i].age+'" data-dob="'+data[i].dob+'" data-profession="'+data[i].profession+'" data-locality="'+data[i].locality+'" data-guests="'+data[i].no_of_guests+'" data-address="'+data[i].address+'">Edit</a>'+' '+
								'<a href="javascript:void(0);" class="btn btn-danger btn-sm deleteRecord" data-id="'+data[i].id+'">Delete</a>'+
							'</td>'+
							'</tr>';
				}
				$('#listRecords').html(html);					
			}

		});
	}
	// save new employee record
	$('#savePartiForm').submit('click',function(){
		var name = $('#name').val();
		var age = $('#age').val();
		var dob = $('#dob').val();
		var profession = $('#profession').val();
		var locality = $('#locality').val();
		var no_of_guests = $('#no_of_guests').val();
		var address = $('#address').val();
		$.ajax({
			type : "POST",
			url  : "participant/save",
			dataType : "JSON",
			data : {name:name, age:age, dob:dob, profession:profession, locality:locality, no_of_guests:no_of_guests, address:address},
			success: function(data){
				$('#savePartiForm').trigger("reset");
				$('#addPartiModal').modal('hide');
				listEmployee();
			}
		});
		return false;
	});
	// show edit modal form with emp data
	$('#listRecords').on('click','.editRecord',function(){
		$('#editPartiModal').modal('show');
		$("#partiId").val($(this).data('id'));
		$("#e_name").val($(this).data('name'));
		$("#e_age").val($(this).data('age'));
		$("#e_dob").val($(this).data('dob'));
		$("#e_locality").val($(this).data('locality'));
		$("#e_address").val($(this).data('address'));

		$('#e_profession').val($(this).data('profession'));
		$('#e_no_of_guests').val($(this).data('guests'));

	});
	// save edit record
	 $('#editPartiForm').on('submit',function(){
		var partiId = $('#partiId').val();
		var name = $('#e_name').val();
		var age = $('#e_age').val();
		var dob = $('#e_dob').val();
		var profession = $('#e_profession').val();
		var locality = $('#e_locality').val();
		var no_of_guests = $('#e_no_of_guests').val();
		var address = $('#e_address').val();

		$.ajax({
			type : "POST",
			url  : "participant/update",
			dataType : "JSON",
			data : {id:partiId,name:name, age:age, dob:dob, profession:profession, locality:locality, no_of_guests:no_of_guests, address:address},
			success: function(data){
				$('#editPartiForm').trigger("reset");
				$('#editPartiModal').modal('hide');
				listEmployee();
			}
		});
		return false;
	});
	// show delete form
	$('#listRecords').on('click','.deleteRecord',function(){
		var partiId = $(this).data('id');            
		$('#deletePartiModal').modal('show');
		$('#deletePartiId').val(partiId);
	});
	// delete emp record
	 $('#deletePartiForm').on('submit',function(){
		var partiId = $('#deletePartiId').val();
		$.ajax({
			type : "POST",
			url  : "participant/delete",
			dataType : "JSON",  
			data : {id:partiId},
			success: function(data){
				$("#"+partiId).remove();
				$('#editPartiForm').trigger("reset");
				$('#deletePartiModal').modal('hide');
				listEmployee();
			}
		});
		return false;
	});
});