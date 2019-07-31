
<div class="row">
 <div class="col-lg-12">  <?=$this->session->flashdata('sukses');?>  </div> 
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1><?php if($_SESSION['levelapps']=='admin' || $_SESSION['levelapps']=='administrator') {
									echo 'Verifikasi Ekspedisi'; }
									else if($_SESSION['levelapps']=='adh') {
									echo ' Pending Transfer';
									} else if($_SESSION['levelapps']=='pdi') { 
									echo' Proses Verifikasi';
									} ?></h1>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
									                                  
									</div>
								<div id="reload">	
								<table width="100%"  id="mydata" data-toggle="table" data-pagination="false" data-search="true" data-show-columns="false" data-show-pagination-switch="false" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                       
					  <thead>
										<tr>
                                            <th width="3%">No</th>
										  <th width="12%">No. Voucher </th>												
                                          <th width="9%">Ekspedisi</th>																								
										  <th width="9%"> Customer </th>										
										  <th width="4%">Dari</th>
										  <th width="6%">Tujuan</th>
										  <th width="7%">Nopol 1</th>
										  <th width="7%">Nopol 2</th>
										  <th width="11%">Total Biaya</th>
										  <th width="9%">Gross Up</th>
									      <th width="11%"> Requestor </th>
										  <th width="12%"></th>
											
						</tr>
									</thead>
									<tbody >
									<?php 
									 $no=1;
									 $total=0;
									  foreach($result as $row ) { 
									 
									  ?>
									<tr >
									<td>  <?=$no?> </td>
									<td >  <?=$row->no_ekspedisi?></td>
									<td>  <?=$row->type_ekspedisi?> </td>
									
									<td>  <?=$row->customer?></td>									
									<td>  <?=$row->dari?></td>
									<td>  <?=$row->tujuan?> </td>
									<td>  <?=$row->nopol1?></td>
									<td>  <?=$row->nopol2?> </td>
									<td>  <?=rupiah($row->biaya_ekspedisi)?> </td>
									<td>  <?=rupiah($row->biaya_pph21)?> </td>
									<td>  <?=$row->nama?></td>
									<td> 
									<form action="<?=base_url()?>index.php/apps/transaction/expedition/action_process_admin" method="post">
									<input type="hidden" value="<?=$row->idekspedisi?>" name="idekspedisi">
									<div class="btn-group" role="group" aria-label="Basic example">
									<a href="<?=base_url()?>index.php/apps/transaction/expedition/detail/<?=$row->idekspedisi;?>" class="btn btn-xs btn-default"> <i class="fa fa-search"></i> </a> 
									<?php if($_SESSION['levelapps']=='admin' || $_SESSION['levelapps']=='administrator') { ?>									
									<button type="submit" name="adminpost" class="btn btn-xs btn-success" onclick="return confirm('Yakin data ini sudah benar?')"> <i class="fa fa-check"></i> </button>
									<button type="submit" name="adminpostDelete" class="btn btn-xs btn-danger" onclick="return confirm('Yakin akan hapus data ini?')"> <i class="fa fa-times"></i> </button>
									
									<?php } ?>
									</div>
									</form>	
									</td>								
									
									</tr>
									
									  <?php $no++; } ?>	
									<tr>
									
									
									
									</tbody>
								</table>
								</div>
		
								</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		