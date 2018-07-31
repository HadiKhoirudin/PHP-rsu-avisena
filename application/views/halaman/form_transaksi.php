<div class="col-lg-12 col-md-12">
                        <div class="card">

                            <div class="content">
                                <form action="<?php echo base_url('layanan/simpan_form_transaksi');?>" method="POST" target="_blank" onsubmit="javascript: setTimeout(function(){location.reload();}, 1000);return true;">
								 <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>No Transaksi</label>
                                                <input type="text" class="form-control border-input" id="no_transaksi_dis" name="no_transaksi_dis" placeholder="No Transaksi" value="<?php echo $t_kode_transaksi;?>" disabled="disabled">
                                                <input type="text" id="no_transaksi" name="no_transaksi" value="<?php echo $t_kode_transaksi;?>" hidden="hidden">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tanggal</label>
                                                <input type="Date" class="form-control border-input" name="tanggal" value="<?php echo date('Y-m-d');?>">
                                            </div>
                                        </div>	
								 </div>										

<hr size=50% width=100%>
                                    <div class="row"><div class="col-md-12">
                                            <div class="form-group">
                                                <label>Nama Pasien</label>
                                                <input type="text" class="form-control border-input" id="nama_pasien" name="nama_pasien" required>
                                            </div>
                                        </div>
                                    </div>
									
                                    <div class="row">
									<div class="col-md-12">
                                            <div class="form-group">
                                                <label>Guna Bayar</label>
                                                <input type="text" class="form-control border-input" id="guna_bayar" name="guna_bayar" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Nominal</label>
                                                <input type="text" class="form-control border-input" id="input_nominal" name="input_nominal">
                                                <input type="text" id="output_nominal_hidden" name="output_nominal_hidden" hidden="hidden">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Jumlah</label>
                                                <input type="number" class="form-control border-input" name="jumlah" placeholder="Jumlah" onclick="changeValue(this.value)">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button class="btn btn-info btn-fill btn-wd" id="submit" onclick="reset_kwitansi();"> Cetak </button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
