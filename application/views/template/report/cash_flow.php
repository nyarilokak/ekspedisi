<div class="row">


                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd text-center">
                                    <h1> Rincian Cash Flow  </h1>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
									<!--
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
									-->
									</div>
									<br>
								<a href="<?=base_url()?>index.php/apps/report/cash_flow/export" class=" pull-right btn btn-xs btn-warning"> Export Excel </a>
								<table   class="table table-condensed table-bordered table-striped table-hover">
									<thead>
										<tr>
                                            <th>No</th>
                                            
											<th>Tanggal </th>													
											<th>Alokasi Biaya</th>
											<th>Penerimaan (Rp)</th>
											<th>Pengeluaran (Rp)</th>
											<th>Saldo Akhir(Rp)</th>																					
											
											
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
									<td>  <?=tanggal($row->tglflow)?></td>
									<td>  <?=$row->alokasi?></td>
									<td style="text-align:right">  <?=rupiah($row->debet)?></td>
									<td style="text-align:right">  <?=rupiah($row->Kredit)?></td>
									<td style="text-align:right"> <b> <?=rupiah($row->saldo)?> </b></td>
															
									
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
		
	
     