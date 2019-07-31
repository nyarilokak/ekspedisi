<div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1><i class="fa fa-file-text-o"></i> Transaksi Masuk <a href="<?=base_url()?>index.php/apps/transaction/warehouse/in" class="btn btn-xs pull-right btn-warning"> <i class="fa fa-plus"></i> Transaksi  Baru </a> </h1>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
									    <form action="" method="get" class="form-inline">
								<div class="panel-body text-center" style="border:1px solid #efefef">
									<div class="form-group" id="data_1">
									<label class="" for="email"> From :</label>
									<div class="input-group date col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input type="text" name="start"  value="<?=$this->input->get('start')?>" class="form-control">
								</div>
									</div>
									
									<div class="form-group"id="data_1">
									<label class="" for="email"> To : </label>
									    <div class="input-group date col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input type="text" name="end" value="<?=$this->input->get('end')?>" class="form-control">
								</div>
									</div>
									
									<div class="form-group">									
									<button type="submit" class="btn btn-primary" name="query">View </button>
									
								  </div>
									
								</div>
								</form>                             
									</div>
								<div id="reload">	
								<div class="table-responsive">
								<table   class="table table-condensed table-bordered">
									<thead>
										<tr>
                                            <th>No</th>
                                            <th>No Transaksi</th>	
											<th>Tanggal </th>													
											<th> Supplier </th>
											<th>Nopol</th>
											<th>Nama Driver</th>
											<th>Nama Material</th>											
											<th>Volume</th>
											
										</tr>
									</thead>
									<tbody>
									<?php 
									 $no=1;
									 $total=0;
									  foreach($report as $row ) { 
									
									?>
									<tr>
									<td>  <?=$no?> </td>
									<td>  <?=$row->no_transaksi?> </td>
									<td>  <?=$row->tgl_transaksi?></td>
									<td>  <?=$row->nama_supplier?></td>
									<td>  <?=$row->nopol?></td>
									<td>  <?=$row->nama_driver?> </td>
									<td>  <?=$row->nama_material?></td>									
									<td>  <?=$row->volume?> <?=$row->satuan?></td>								
									
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
        </div>
		
		
		
