<div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1><i class="fa fa-file-text-o"></i> Data Request Ekspedisi </h1>
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
											<th>No. Voucher</th>
                                            <th>Ekspedisi</th>	
											<th>CMD </th>													
											<th> Customer </th>
											<th> Pembebanan </th>
											<th>Dari</th>
											<th>Tujuan</th>
											<th>Nopol 1</th>
											<th>Nopol 2</th>
											<th>Total Biaya</th>
											<th>Gross Up</th>
											<th> </th>
											
										</tr>
									</thead>
									<tbody>
									<?php 
									 $no=1;
									 $total=0;
									  foreach($result as $row ) { 
									 
									  ?>
									<tr>
									<td>  <?=$no?> </td>
									<td>  <?=$row->no_ekspedisi?> </td>
									<td>  <?=$row->type_ekspedisi?> </td>
									<td>  <?=$row->cmd?></td>
									<td>  <?=$row->customer?></td>
									<td>  <?=$row->pembebanan?></td>
									<td>  <?=$row->dari?></td>
									<td>  <?=$row->tujuan?> </td>
									<td>  <?=$row->nopol1?></td>
									<td>  <?=$row->nopol2?> </td>
									<td>  <?=rupiah($row->biaya_ekspedisi)?> </td>
									<td>  <?=rupiah($row->biaya_pph21)?> </td>	
									<td> <a href="<?=base_url()?>index.php/apps/transaction/expedition/detail/<?=$row->idekspedisi;?>" class="btn btn-xs btn-default"> <i class="fa fa-search"></i></a></td>
									
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
                                <input type="text" name="start" class="form-control">
                            </div>
                        </div>		
					
				   
				   
				   <div class="form-group" id="data_1">
                       <label class="control-label col-lg-3 col-md-3 col-sm-6 col-xs-12"> Sampai Tanggal </label>	
                            <div class="input-group date col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input type="text" name="end" class="form-control">
                            </div>
                        </div>	
							
					  <div class="form-group">
                       <label class="control-label col-lg-3 col-md-3 col-sm-6 col-xs-12"> Tipe Ekspedisi </label>	
                            <div class="input-group col-lg-7 col-md-7 col-sm-7 col-xs-12">   
								<span class="input-group-addon"><i class="fa fa-list"></i></span>							
                            <select name="tipe" id="types" class="chosen-select" >
							<option value="">Pilih</option>
							<option value="One Way" <?php echo $_GET['tipe']=='One Way' ? ' selected' : ''; ?>>One Way</option>
							<option value="Two Way" <?php echo $_GET['tipe']=='Two Way' ? ' selected' : ''; ?>>Two Way</option>
							<option value="Derek" 	<?php echo $_GET['tipe']=='Derek' ? ' selected' : ''; ?>>Derek</option>
							</select>
                            </div>
                        </div>	
						
						 <div class="form-group">
                       <label class="control-label col-lg-3 col-md-3 col-sm-6 col-xs-12"> Status </label>	
                            <div class="input-group col-lg-7 col-md-7 col-sm-7 col-xs-12">   
								<span class="input-group-addon"><i class="fa fa-list"></i></span>							
                            <select name="status" class="chosen-select" >
							<option value="">Pilih</option>
							<option value="Ambil">Ambil</option>
							<option value="Antar">Antar</option>
							<option value="PP">PP </option>
							</select>
                            </div>
                        </div>
						
						
					
					
				   </div>
				
                
 
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-primary" name="query">Lihat</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <!--END MODAL ADD-->