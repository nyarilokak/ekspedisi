<div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1><i class="fa fa-file"></i>  Data Transaksi <?php if($this->input->post('jenis')=='in') { echo ' Masuk '; } else { echo 'Keluar'; } ?> </h1>
									<br>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
									                                 
									</div>
									<div id="reload">
									<?php
									if($this->input->post('jenis')=='in') {
										$where="";
									} else {
										$where="INNER JOIN tbl_unit b ON a.idunit=b.idunit JOIN tbl_group c ON b.idgroup=c.idgroup";
									}
									
									$sql=$this->db->query(" SELECT * FROM tbl_trans_warehouse a $where  WHERE no_transaksi='".$this->input->post('no')."' AND type_transaksi='".$this->input->post('jenis')."'");
									foreach($sql->result() as $row) : endforeach; 
									?>
									
									<table width="100%" class="table-condensed  table-striped" style="border:1px solid #efefef; border-bottom:4px solid #ccc">
									  <tr>
										<td width="20%"><b>No Transaksi </b></td>
										<td width="2%">:</td>
										<td width="78%"><b> <?=$row->no_transaksi?> </b> </td>
									  </tr>
									  <tr>
										<td>Tanggal Transaksi</td>
										<td>:</td>
										<td> <?=$row->tgl_transaksi?> </td>
									  </tr>
									  <?php
									if($this->input->post('jenis')=='in') { ?>
									  <tr>
										<td>Nama Supplier</td>
										<td>:</td>
										<td><?=$row->nama_supplier?> </td>
									  </tr>
									<?php } else { ?>
									  <tr>
										<td>Group Property</td>
										<td>:</td>
										<td> <?=$row->group_rumah?> </td>
									  </tr>
									  <tr>
										<td>Alokasi Unit Property</td>
										<td>:</td>
										<td><?=$row->nama_unit?></td>
									  </tr>
									<?php } ?>
									  <tr>
										<td>Nama Driver</td>
										<td>:</td>
										<td><?=$row->nama_driver?></td>
									  </tr>
									  <tr>
										<td>Plat Kendaraan</td>
										<td>:</td>
										<td><?=$row->nopol?></td>
									  </tr>
									  <tr>
										<td>Total Biaya</td>
										<td>:</td>
										<td>Rp. <?=$row->total_harga?></td>
									  </tr>
									  <tr>
										<td>Catatan</td>
										<td>:</td>
										<td><?=$row->remark?></td>
									  </tr>
									</table>
									<br>
									<h3> <i class="fa fa-list"></i> Rincian  </h3>
									
									<table class="table table-condensed table-striped table-bordered">
									  <tr style="font-weight:bold">
										<td>Kode Material</td>
										<td>Nama Material</td>
										
										<td>Harga Satuan</td>
										<td>Volume</td>
										<td>Subtotal</td>
										<td>Source</td>
										
									  </tr>
									  <?php
									  $total=0;
									  $query=$this->db->query("SELECT * FROM tbl_detail_trans a INNER JOIN tbl_material b ON a.idmaterial=b.idmaterial JOIN tbl_satuan c ON b.idsatuan=c.idsatuan WHERE a.idtransaksi='$row->idtransaksi'");
									  foreach ($query->result() as $view) {
										  $total += $view->harga_satuan * $view->volume;
										  ?>
									  <tr>
									    <td><?=$view->kode_material?></td>
										<td><?=$view->nama_material?></td>										
										<td><?=$view->harga_satuan?></td>
										<td><?=$view->volume?> <?=$view->satuan?></td>
										<td><?=$view->harga_satuan * $view->volume?> </td>
										<td><?=$view->source?></td>										
									  </tr>
									  <?php } ?>
									  <tr>
										<td colspan="4"><b> Total </b> </td>
										<td colspan="2"><b>  Rp. <?=$total?> </b> </td>
										
										
									  </tr>
									</table>
									
									
									<div class="pull-right">
									<a href="<?=base_url()?>index.php/apps/transaction/warehouse/cancel" class="btn btn-warning"> Batal </a>  <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#ModalaAdd"> Proses </button> 
									</div>
									<div class="clearfix"></div>
									
										</div>
		
								</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
		
		
		<!--MODAL BATAL-->
        <div class="modal fade" id="ModalaAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-info-circle"></i> Konfirmasi Pembatalan</h4>
                    </div>
                    <form class="form-horizontal" method="post" action="<?=base_url()?>index.php/apps/transaction/warehouse/do_batal_transaksi">
                    <div class="modal-body">
                                           
                            
                            <div class="alert alert-warning"><p>
							<b> Warning !!! </b> <br> 
							<ul>
							<li>1. Transaksi Masuk yang dibatalkan akan mengurangi stock material. </li>
							<li>2.  Transaksi Keluar dari Gudang yang dibatalkan, akan menambah stock material. </li>
							<li>3.  Transaksi Keluar langsung dari Supplier, tidak mengalami perubahan pada stock material. </li>
							
							</ul>
							
							</p>
							</div>
							<input type="hidden" name="idtransaksi" value="<?=$row->idtransaksi?>">
							<input type="hidden" name="typetransaksi" value="<?=$row->type_transaksi?>">
							<textarea class="form-control"  name="reason" placeholder="Masukan alasan pembatalan transaksi" required></textarea>
						
                                         
                    </div>
                    <div class="modal-footer">
                        
                        <button class="btn_hapus btn btn-primary" id="btn_hapus"> Lanjutkan </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!--END MODAL BATAL-->
		