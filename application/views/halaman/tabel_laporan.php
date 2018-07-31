                <div class="row">
                    <div class="col-md-12">
                        <div class="card">

	<div><form action="<?php echo base_url('layanan/cetak_laporan');?>" method="POST" target="_blank" onsubmit="javascript: setTimeout(function(){location.reload();}, 1000);return true;">

	    
                        <div class="form-group">
                            <div class="col-md-3">
							<br>
							<br>
							<br>
                                <a style="" class="btn btn-default" onclick="export_table()"><i class="glyphicon glyphicon-download-alt"></i> Eksport Semua ke Excel </a>
                            </div>
                            <div class="col-md-3">
							<br>
                                <label class="control-label col-md-5">Tanggal awal </label>
                                <input type="date" name="tanggal_awal" class="form-control border-input" required/>
                            </div>
							<br>
                            <div class="col-md-3">
									<label class="control-label col-md-5">Tanggal akhir </label>
                                <input type="date" name="tanggal_akhir" class="form-control border-input" required/>
                            </div>
                            <div class="col-md-3">
							<br>
							<br>
                                <button type="submit" style="float: right;" class="btn btn-warning btn-fill btn-wd">Cetak Laporan ( 📄 )</button>
                            </div>
                        </div>
        
    </form></div>
	<br>
	<br>
	<br>
	<br>
	<br>
	<hr>
    <div class="container-fluid">

        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th><small><center>TANGGAL</center></small></th>
                    <th><small><center>NO TRANSAKSI</center></small></th>
                    <th><small><center>GUNA BAYAR</center></small></th>
                    <th><small><center>NOMINAL</center></small></th>
                    <th><small><center>JUMLAH</center></small></th>
                    <th><small><center>TOTAL</center></small></th>
                    <th style="width:125px;"><small><center>AKSI</center></center></small></th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
            <tr>
                    <th colspan="5"><center>Total  :</center></th>

                    <th style="width:125px;"><small><center></center></center></small></th>
            </tr>
            </tfoot>
        </table>
    </div>
    </div>

 </div>
 </div>
<!-- Bootstrap modal -->
<!-- <div class="modal fade" id="modal_form" role="dialog" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Form Data Transaksi</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Tanggal</label>
                            <div class="col-md-9">
                                <input name="tanggal" class="form-control border-input datepicker" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">No Transaksi</label>
                            <div class="col-md-9">
                                <input name="no_transaksi" placeholder="No Transaksi" class="form-control border-input" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">No Pasien</label>
                            <div class="col-md-9">
                                <input name="no_pasien" placeholder="No Pasien" class="form-control border-input" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Kode Transaksi</label>
                            <div class="col-md-9">
                                <select name="kode_transaksi" class="form-control border-input">
                                    <option value="">--</option>
                                    <option value="KDT-0001">KDT-0001</option>
                                    <option value="KDT-0002">KDT-0002</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Guna Bayar</label>
                            <div class="col-md-9">
                                <input name="guna_bayar" placeholder="Guna Bayar" class="form-control border-input" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Nominal</label>
                            <div class="col-md-9">
                                <input name="nominal" placeholder="Guna Bayar" class="form-control border-input" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Jumlah</label>
                            <div class="col-md-9">
                                <input name="jumlah" placeholder="Jumlah" class="form-control border-input" type="number">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Total</label>
                            <div class="col-md-9">
                                <input name="total" placeholder="Total" class="form-control border-input" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        <!-- </div><!-- /.modal-content -->
    <!-- </div> .modal-dialog -->
<!-- </div> /.modal -->
<!-- End Bootstrap modal -->
