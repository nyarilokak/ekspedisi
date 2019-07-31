<div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1><i class="fa fa-file"></i>  Data Transaksi <?php if($this->uri->segment(6)=='in') { echo ' Masuk '; } else { echo 'Keluar'; } ?> </h1>
									<br>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
									                                 
									</div>
									<div id="reload">
									<?php
									if($this->uri->segment(6)=='in') {
										$where="";
									} else {
										$where="INNER JOIN tbl_unit b ON a.idunit=b.idunit JOIN tbl_group c ON b.idgroup=c.idgroup";
									}
									
									$sql=$this->db->query(" SELECT * FROM tbl_trans_warehouse a $where  WHERE idtransaksi='".$this->uri->segment(5)."' AND type_transaksi='".$this->uri->segment(6)."'");
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
									if($this->uri->segment(6)=='in') { ?>
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
									
									
									
								
									
										</div>
		
								</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
		
