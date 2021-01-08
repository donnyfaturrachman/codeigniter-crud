<script>
$(document).ready(function(){
	$('#datatable').dataTable();

	$('.date').daterangepicker({
		singleDatePicker: true,
		calender_style: "picker_1",
		format: 'YYYY-MM-DD',
		minDate: '2020-01-01',
		maxDate: '2020-12-31',
	});

	$('.edit').on('click',function(){
	    var cek = $(this).attr('data-id');		
	    $.ajax({
	        url:"<?php echo base_url();?>/pegawai/edit/"+cek,
	        type:"GET",
	        dataType:"JSON",
	        success: function(data){	
	            $("#frm_data").find("input[name=id]").val(data.id);	
	            $("#frm_data").find("input[name=name]").val(data.name);
	            $("#frm_data").find("input[name=email]").val(data.email);
	            if (data.gender == 1) {
	            	$("#gender1").prop("checked", true);
	            } else {
	            	$("#gender2").prop("checked", true);
	            }
	            if (data.hobby == 1) {
	            	$("#hobby1").prop("checked", true);
	            } else if (data.hobby == 2) {
	            	$("#hobby2").prop("checked", true);
	            } else {
	            	$("#hobby3").prop("checked", true);
	            }
	            $("#frm_data").find("input[name=nip]").val(data.nip);
	            if (data.path) {
	            	$("#path").prop("required", false);	
	            }
	            $("#frm_data").find("input[name=paths]").val(data.path);	
	            $('#formModal').modal('show');
	        }
	    });
	});

	$('.hapus').on('click',function(){
	    var cek = $(this).attr('data-id');	
	    $.ajax({
	        url:"<?php echo base_url();?>/pegawai/hapus/"+cek,
	        type: "POST",
	        success: function(msg){
	            //jika berhasil menghapus maka akan di redirect ke url dibawah
	            window.location.href= "<?php echo base_url();?>/pegawai";
	        }
	    });
	});
});
</script>