<div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1><i class="fa fa-file-text-o"></i> Stock On Hand Material </h1>
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
                                            <th>Kode Material</th>	
											<th>Nama Material </th>													
											<th> Satuan </th>
											<th>Stock</th>											
										</tr>
									</thead>
									<tbody>
									<?php 
									 $no=1;
									  foreach($material as $row ) {  ?>
									<tr>
									<td>  <?=$no?> </td>
									<td>  <?=$row->kode_material?> </td>
									<td>  <?=$row->nama_material?></td>
									<td>  <?=$row->satuan?></td>
									<td>  <?=$row->stock_quantity?></td>								
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