		<div class="row">
		
		<div class="col-lg-12">  <?=$this->session->flashdata('sukses');?>  </div> 
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Reset Password </h1>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    
								<div id="reload">	
								<hr>
											<div class="all-form-element-inner">
                                                <form action="<?=base_url()?>index.php/apps/setting/user/do_reset" method="post">
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Username/Nama</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
															<div class="chosen-select-single mg-b-20">
                                                                <select name="iduser" class="chosen-select" required tabindex="-1">
																<option value=""> Pilih </option>
																<?php foreach($user as $row) {
																	
																	echo "<option value='$row->iduser'> $row->username  :: $row->nama </option>";
																	
																}?>
																</select>
																</div>
                                                            </div>
                                                        </div>
                                                    </div
													
													<div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Password Default</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" class="form-control"  readonly name="password" value="serasi123" />
                                                            </div>
                                                        </div>
                                                    </div>
													<br> 
														<div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">&nbsp;</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="submit"  value="Reset" class="btn btn-primary" />
                                                            </div>
                                                        </div>
                                                    </div>
													
													
												</form>
											</div>
								
								</div>
		
								</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>