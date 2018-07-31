</body>

    <!--   Core JS Files   -->
	<?php echo assets::js('jquery-1.10.2.js'); ?>
	<?php echo assets::js('bootstrap.min.js'); ?>
	<?php echo assets::js('bootstrap-checkbox-radio.js'); ?>
	<?php echo assets::js('chartist.min.js'); ?>
	<?php echo assets::js('bootstrap-notify.js'); ?>
	<?php echo assets::js('paper-dashboard.js'); ?>
	<?php echo assets::js('jquery.dataTables.js'); ?>
	<?php echo assets::js('dataTables.bootstrap.js'); ?>
	<?php echo assets::js('select2.min.js'); ?>
	<?php echo assets::js('jquery.maskMoney.min.js'); ?>
	<?php echo assets::js('function_matauang.js'); ?>
	<?php echo assets::js('function_select2_custom.js'); ?>
	<?php echo assets::js('bootstrap-datepicker.min.js');?>
<script type="text/javascript">
    //datepicker
    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,  
    });
</script>
	<?php echo assets::js('function_dataTable_custom.js'); ?>
	
	
	<!-- { tabel laporan -->

<script type="text/javascript">
 
var save_method; //for save method string
var table;
 
$(document).ready(function() {
 
    //datatables
    table = $('#table').DataTable({ 
 
     	"footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // converting to interger to find total
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\Rp.]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // computing column Total of the complete result 
            var monTotal = api
                .column( 5 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
			
				
            // Update footer by showing the total with the reference of the column index 
			
	    $( api.column( 5 ).footer() ).html('Rp. '+monTotal);

        },
 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('layanan/ajax_list_laporan')?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column untuk aksi gunakan -1
            "orderable": false, //set not orderable
        },
        ],
 
    });

});
 
 
//
//function add_person()
//{
//    save_method = 'add';
//    $('#form')[0].reset(); // reset form on modals
//    $('.form-group').removeClass('has-error'); // clear error class
//    $('.help-block').empty(); // clear error string
//    $('#modal_form').modal('show'); // show bootstrap modal
//    $('.modal-title').text('Tambah data transaksi'); // Set Title to Bootstrap modal title
//}
 
//function edit_person(id)
//{
//    save_method = 'update';
//    $('#form')[0].reset(); // reset form on modals
//    $('.form-group').removeClass('has-error'); // clear error class
//    $('.help-block').empty(); // clear error string
// 
//    //Ajax Load data from ajax
//    $.ajax({
//       url : "<?php echo site_url('layanan/ajax_edit_laporan/')?>/" + id,
//        type: "GET",
//        dataType: "JSON",
//        success: function(data)
//        {
// 
//            $('[name="id"]').val(data.id);
//           $('[name="no_transaksi"]').val(data.no_transaksi);
//            $('[name="tanggal"]').datepicker('update',data.tanggal);
//            $('[name="no_pasien"]').val(data.no_pasien);
//            $('[name="kode_transaksi"]').val(data.kode_transaksi);
//            $('[name="guna_bayar"]').val(data.guna_bayar);
//            $('[name="nominal"]').val(data.nominal);
//            $('[name="jumlah"]').val(data.jumlah);
//            $('[name="total"]').val(data.total);
//            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
//           $('.modal-title').text('Ubah Data Transaksi'); // Set title to Bootstrap modal title
// 
//        },
//        error: function (jqXHR, textStatus, errorThrown)
//        {
//            alert('Error get data from ajax');
//        }
//    });
//}
 
function export_table()
{
	var newWindow = window.open("<?php echo site_url('layanan/export_laporan')?>","_blank");

    table.ajax.reload(null,false); //reload datatable ajax 

        	demo.initChartist();

        	$.notify({
            	icon: 'ti-info',
            	message: '<b> Silahkan simpan berkas Excelnya ^_^ </b>'

            },{
                type: 'info',
                timer: 2000
            });
}
function reload_table_afterdelete()
{
    table.ajax.reload(null,false); //reload datatable ajax 

        	demo.initChartist();

        	$.notify({
            	icon: 'ti-info',
            	message: 'Data telah berhasil di-Hapus ^_^'

            },{
                type: 'danger',
                timer: 2000
            });
}
//function save()
//{
//    $('#btnSave').text('saving...'); //change button text
//    $('#btnSave').attr('disabled',true); //set button disable 
//    var url;
// 
//    if(save_method == 'add') {
//        url = "<?php echo site_url('layanan/ajax_add_laporan')?>";
//    } else {
//        url = "<?php echo site_url('layanan/ajax_update_laporan')?>";
//    }
// 
//    // ajax adding data to database
//    $.ajax({
//        url : url,
//       type: "POST",
//        data: $('#form').serialize(),
//        dataType: "JSON",
//        success: function(data)
//        {
// 
//            if(data.status) //if success close modal and reload ajax table
//            {
//                $('#modal_form').modal('hide');
//                reload_table();
//            }
//
//            $('#btnSave').text('save'); //change button text
//            $('#btnSave').attr('disabled',false); //set button enable 
// 
// 
//        },
//        error: function (jqXHR, textStatus, errorThrown)
//        {
//            alert('Error adding / update data');
//            $('#btnSave').text('save'); //change button text
//            $('#btnSave').attr('disabled',false); //set button enable 
// 
//        }
//    });
//}
 
function delete_data_laporan(id)
{
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('layanan/ajax_delete_laporan')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table_afterdelete();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });
 
}
 
</script>
	<!-- tabel laporan } -->
	
	<?php echo assets::js('demo.js'); ?>
	<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: '<?php echo $t_icon_notififikasi;?>',
            	message: '<?php echo $t_notififikasi;?>'

            },{
                type: '<?php echo $t_notififikasi_type;?>',
                timer: 3000
            });

    	});
	</script>
	
    <!-- { AWAL CRUD AJAX   -->

    <!-- { awal form transaksi   -->
	
    <!--  akhir form transaksi }  -->

    <!--  AKHIR CRUD AJAX  } -->	
	
	
</html>
