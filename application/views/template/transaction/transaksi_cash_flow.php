<div class="row">

 <div class="col-lg-12">  <?=$this->session->flashdata('sukses');?>  </div> 
 
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1><i class="fa fa-file-text-o"></i> Transaksi Cash Flow  <?php if($_SESSION['level']!='supervisi') { ?><a href="#" data-toggle="modal" data-target="#modalContactForm" class="btn  btn-xs pull-right btn-warning"> <i class="fa fa-plus"></i> Transaksi  Baru </a> <?php } ?> </h1>
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
								<br>
									<div class="table-responsive">
								<table   class="table table-condensed table-bordered">
									<thead>
										<tr>
                                            <th>No</th>
                                            <th>No Transaksi</th>	
											<th>Tanggal </th>													
											<th>Cash Flow </th>
											<th>Biaya</th>
											<th>Alokasi Biaya </th>	
											<?php if($_SESSION['level']=='supervisi') { ?>	
											<th>Action</th>
											<?php } ?>
											
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
									<td>  <?=$row->no_trx?> </td>
									<td>  <?=tanggal($row->tglflow)?></td>
									<td>  <?=cash_flow($row->type)?></td>
									<td>  <?=rupiah($row->nominal)?></td>
									<td>  <?=$row->alokasi?></td>
									<?php if($_SESSION['level']=='supervisi') { 
									
									?>	
									<td> <?php if(date('Y-m-d',strtotime($row->createflow))==date('Y-m-d')) { ?> <a href="<?=base_url()?>index.php/apps/transaction/cash_flow/failed/<?=$row->idcashflow?>" class="btn btn-xs btn-danger" title="Batal" onclick="return confirm('Yakin ingin membatalkan transaksi ini?')" style="color:white"><i class="fa fa-times"></i></a>  <?php } ?> </td>									
									<?php  } ?>						
									
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
		
		
		<div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <form action="<?=base_url()?>index.php/apps/transaction/cash_flow/save_cash_flow" method="post">
		  <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Transaksi Cash Flow </h4>
                
              </div>
              <div class="modal-body">
			 
									
                <div class="form-group">
                  <i class="fa fa-key"></i> No Transaksi
                  <input type="text" name="notransaksi" class="form-control" value="BJP/CF/<?php echo $kode_masuk;?>" readonly>
                </div>

                <div class="form-group" id="data_1">
					 <i class="fa fa-calendar"></i> Tanggal Cash Flow
					<div class="input-group date col-lg-12 col-md-12 col-sm-12 col-xs-12">
                       <span class="input-group-addon"></span>
                       <input type="text" name="tanggal"  value="<?=$this->input->get('start')?>" class="form-control">
					</div>
			  </div>

                <div class="form-group">
                  <i class="fa fa-list"></i>  Cash Flow<br>
				  <div class="alert well well-sm">
				    <label class="radio-inline i-checks">
				  <input type="radio" name="jenis" value="D" required class="radio"> <b> Penerimaan </b>
				  </label>
				    <label class="radio-inline i-checks">
				  <input type="radio" name="jenis" value="K" required> <b> Pengeluaran </b>
					</label>
					</div>
                </div>

                <div class="form-group">
                  <i class="fa fa-info-circle"></i> Alokasi Biaya 
                  <input type="text" name="alokasi" class=" form-control" required>
                </div>
				
				
				<div class="form-group">
                 <i class="fa fa-dollar"></i> Jumlah  Biaya
                  <input type="text" name="biaya" class="form-control" onkeypress="return goodchars(event,'0123456789',this)"  required>
                  
                </div>

              </div>
              <div class="modal-footer">
			  <button  class="btn btn-danger" data-dismiss="modal" aria-label="Close" id="close"> Close </button>
			  <button class="btn btn-warning" type="reset" name="simpan"> Clear </button>
                <button class="btn btn-primary" type="submit" name="simpan"> Save</button>
              </div>
            </div>
          </div>
		  </form>
        </div>

     
	 <script type="text/javascript">
      $(document).ready(function() {
        $("#close").on('click',function(e) {
			
					$('[name="biaya"]').val("");	
					$('[name="tanggal"]').val("");	
					$('[name="jenis"]').val("");	
					$('[name="alokasi"]').val("");	
					$('[name="keterangan"]').val("");	
					
			});
		});
			
	</script>