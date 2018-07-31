<?php 
	switch($_GET['fn'])
	{
		case 'add': $nama_title='FORM DATA LOGIN';
		$value_id_login = $t_id_login;
		$value_form_action = base_url('layanan/simpan_settings');
		$value_username = '';
		$value_password = ''; 
		$value_akses = ''; 
		$value_nama = ''; 
		$value_no_ponsel = ''; 
		$value_submit = 'add'; 
		$value_tombol = 'Simpan Data Baru';
		
		break;
		
		
		case 'edit': $nama_title='FORM EDIT DATA LOGIN'; 
		$value_id_login = $_GET['id']; 
		$value_form_action = base_url('layanan/update_settings');
		$value_username = $_GET['usr'];
		$value_password = $_GET['pws'];
		$value_akses = $_GET['aks'];
		$value_nama = $_GET['nm'];
		$value_no_ponsel = $_GET['nope'];
		$value_submit = 'edit'; 
		$value_tombol = 'Simpan Perubahan Data';
		
		break;
		
	}
?>
<div class="col-lg-8 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title"><?php echo $nama_title;?></h4>
                            </div>
                            <div class="content">
                                <form method="POST" action="<?php echo $value_form_action;?>">
								
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>ID Login</label>
                                                <input type="text" name="id_login_dis" class="form-control border-input" value="<?php echo $value_id_login;?>" disabled="disabled">
                                                <input type="text" name="id_login" value="<?php echo $value_id_login;?>" hidden="hidden">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row"><div class="col-md-12">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" name="username" class="form-control border-input" placeholder="Username" value="<?php echo $value_username;?>" required="required">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row"><div class="col-md-12">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" name="password" class="form-control border-input" placeholder="Masukan Password" value="<?php echo $value_password;?>" required="required">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row"><div class="col-md-12">
                                            <div class="form-group">
                                                <label>Akses</label>
                                                <select type="text" name="akses" class="form-control border-input" placeholder="Akses" value="<?php echo $value_akses;?>" required="required">
												<option>Admin</option>
												<option>User</option>
												</select>
                                            </div>
                                        </div>
                                    </div>
									
                                    <div class="row"><div class="col-md-12">
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input type="text" name="nama" class="form-control border-input" placeholder="Nama" value="<?php echo $value_nama;?>" required="required">
                                            </div>
                                        </div>
                                    </div>
									
                                    <div class="row"><div class="col-md-12">
                                            <div class="form-group">
                                                <label>No Ponsel</label>
                                                <input type="text" name="no_ponsel" class="form-control border-input" placeholder="No ponsel" value="<?php echo $value_no_ponsel;?>" required="required">
                                            </div>
                                        </div>
                                    </div>
									
							  <div class="text-Left">
                                        <button type="submit" name="<?php echo $value_submit;?>" class="btn btn-info btn-fill btn-wd"><?php echo $value_tombol;?></button>
                                        <a class="btn btn-danger btn-fill btn-wd" href="<?php echo base_url('layanan/simpan_settings');?>">Batal</a>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
					<hr>