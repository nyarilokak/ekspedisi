<div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1><i class="fa fa-file-text-o"></i> Laporan Pembatalan Transaksi  </h1>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
									    <div class="btn btn-default" data-toggle="modal" data-target="#ModalaAdd"> Filter Report <i class="fa fa-search"></i> </div>
                                                                      
									</div>
								<div id="reload">	
								<table  id="mydata" data-toggle="table" data-pagination="false" data-search="true" data-show-columns="false" data-show-pagination-switch="false" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                       
									<thead>
										<tr>
                                            <th>No</th>
                                            <th>No Transaksi</th>	
											<th>Tanggal Transaksi</th>	
											<th>Tanggal Pembatalan</th>	
											<th> Jenis Transaksi </th>
											<th> Total Biaya</th>
											<th> Alasan Pembatalan</th>
											<th> Aksi</th>
											
										</tr>
									</thead>
									<tbody>
									<?php 
									 $no=1;
									
									  foreach($report as $row ) { 
									 
									?>
									<tr>
									<td>  <?=$no?> </td>
									<td>  <?=$row->no_transaksi?> </td>
									<td>  <?=$row->tgl_transaksi?></td>
									<td>  <?=$row->tgl_batal?></td>
									<td>  <?=$row->type_transaksi?></td>
									<td>  <?=$row->total_harga?></td>
									<td>  <?=$row->reason_cancel?> </td>
									<td>  <a href="<?=base_url()?>index.php/apps/transaction/warehouse/detail_transaksi/<?=$row->idtransaksi?>/<?=$row->type_transaksi?>" class="btn btn-default btn-sm"> Detail </a> </td>
									
									</tr>
									
									  <?php $no++; } ?>
										 
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
		
		
		
		<!-- MODAL ADD -->
        <div class="modal fade" id="ModalaAdd" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel"> Filter Report </h3>
            </div>
            <form class="form-horizontal" method="get" action="">
                <div class="modal-body">
				
				
                   <div class="form-group" id="data_1">
                       <label class="control-label col-lg-3 col-md-3 col-sm-6 col-xs-12"> Dari Tanggal </label>	
                            <div class="input-group date col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input type="text" name="start" class="form-control" placeholder="Tanggal Pembatalan">
                            </div>
                        </div>		
					
				   
				   
				   <div class="form-group" id="data_1">
                       <label class="control-label col-lg-3 col-md-3 col-sm-6 col-xs-12"> Sampai Tanggal </label>	
                            <div class="input-group date col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input type="text" name="end" class="form-control" placeholder="Tanggal Pembatalan">
                            </div>
                        </div>	
							
					 	
						
						
					
					
				   </div>
				
                
 
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-primary" name="query">Report</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <!--END MODAL ADD-->