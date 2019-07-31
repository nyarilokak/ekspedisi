		<div class="row">
		
		<div class="col-lg-12"> <?=$this->session->flashdata('sukses');?> </div>
		
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1><i class="fa fa-refresh"></i>  Pembatalan Transaksi </h1>
									<hr>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
									                                 
									</div>
									<div id="reload">
								
										<div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="basic-login-inner">
                                                
                                                <p> Masukan data :</p>
                                                <form action="<?=base_url()?>index.php/apps/transaction/warehouse/result" method="post">
                                                    <div class="form-group-inner">
                                                        <label>No Transaksi</label>
                                                        <input type="text" class="form-control"  name="no" placeholder="Masukan Nomor Transaksi" required />
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <label>Jenis Transaksi</label>
                                                        <select name="jenis" class="form-control" required>
														<option value=""> Pilih </option>
														<option value="in"> Material Masuk </option>
														<option value="out"> Material Keluar </option>
														</select>
														
                                                    </div>
                                                    <div class="login-btn-inner">
                                                        <div class="inline-remember-me">
                                                            <button class="btn btn-primary pull-right" type="submit">Submit</button>
                                                            
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
								
								
								
									</div>
		
								</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>