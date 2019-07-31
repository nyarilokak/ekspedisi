<div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1><i class="fa fa-file-text-o"></i>  Request Ekspedisi </h1>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
									                                  
									</div>
								<div id="reload">	
								<table  id="mydata" data-toggle="table" data-pagination="false" data-search="true" data-show-columns="false" data-show-pagination-switch="false" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                       
									<thead>
										<tr>
                                            <th>No</th>											
                                            <th>Ekspedisi</th>	
											<th>Time Request </th>													
											<th> Customer </th>										
											<th>Dari</th>
											<th>Tujuan</th>
											<th>Nopol 1</th>
											<th>Nopol 2</th>
											<th>Total Biaya</th>
										    <th> Requestor </th>
											<th></th>
											
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
									
									<td>  <?=$row->type_ekspedisi?> </td>
									<td>  <?=$row->waktu?></td>
									<td>  <?=$row->customer?></td>									
									<td>  <?=$row->dari?></td>
									<td>  <?=$row->tujuan?> </td>
									<td>  <?=$row->nopol1?></td>
									<td>  <?=$row->nopol2?> </td>
									<td>  <?=rupiah($row->biaya_ekspedisi)?> </td>
									<td>  <?=$row->nama?></td>
									<td>  <a href="<?=base_url()?>index.php/apps/transaction/expedition/detail/<?=$row->idekspedisi;?>" class="btn btn-xs btn-default"> <i class="fa fa-search"></i> </a> </td>								
									
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
		
		
	