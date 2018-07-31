<?php require_once('./proses/proses_simpan_edit_hapus_form_master.php');?>
<div class="col-lg-8 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title"><?php echo $nama_title;?></h4>
                            </div>
                            <div class="content">
                                <form method="POST">
								
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Kode Transaksi</label>
                                                <input type="text" name="kode_transaksi" class="form-control border-input" placeholder="Kode Transaksi" value="<?php echo $value_kode_transaksi;?>" required="required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row"><div class="col-md-12">
                                            <div class="form-group">
                                                <label>Guna Bayar</label>
                                                <input type="text" name="guna_bayar" class="form-control border-input" placeholder="Guna Bayar" value="<?php echo $value_guna_bayar;?>" required="required">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Nominal</label>
                                                <input type="text" id="input_nominal" name="input_nominal" class="form-control border-input" placeholder="Nominal" value="<?php echo $value_nominal;?>" required="required">
                                                <input type="text" id="output_nominal_hidden" name="output_nominal_hidden" hidden="hidden" value="<?php echo $value_nominal_hidden;?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-Left">
                                        <button type="submit" name="<?php echo $value_submit;?>" class="btn btn-info btn-fill btn-wd"><?php echo $value_tombol;?></button>
                                        <a class="btn btn-danger btn-fill btn-wd" href="master.php?f=active">Batal</a>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
					<hr>