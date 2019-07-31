

		<div class="row">
		
		 <div class="col-lg-12">  <?=$this->session->flashdata('sukses');?>  </div>
		 
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1><i class="fa fa-money"></i> Pengaturan Harga Material </h1>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
									                                 
									</div>
								<div id="reload">										
								
								
								
								<br>
								
								<form action="<?=base_url()?>index.php/apps/master/material/do_update_harga" method="post">								
								
								<div class="table-responsive">
								<table class="table-condensed table-bordered table">
                                       
									<thead>
										<tr style='background-color:blue; font-weight:bold; color:#fff'>
										   
                                            <td>No</td>
                                            <td>Kode Material</td>	
											<td>Nama Material </td>		
											<td>Satuan </td>
											<td>Harga Satuan </td>						
																							
										</tr>
									</thead>
									<tbody>
									<?php 
									
									    
										
										$sql=$this->db->query("SELECT * FROM tbl_jenis where aktif='1' ORDER BY jenis ASC");
										
										foreach ($sql->result() as $row) { 
										
										echo "<tr style='background-color:#efefef; font-weight:bold; color:#000'> <td colspan='5'> $row->jenis </td> ";
									
										
										
										$query=$this->db->query("SELECT * FROM tbl_material a  INNER JOIN tbl_satuan b ON a.idsatuan=b.idsatuan  WHERE idjenis='$row->idjenis' AND a.aktif='1' ");
									  $no=1;
									   foreach($query->result() as $row ) { 		
											
										?>
									<input type="hidden" name="idmaterial[]" value="<?=$row->idmaterial?>">
									<tr>
									<td>  <?=$no?> </td>
									<td>  <?=$row->kode_material?> </td>
									<td>  <?=$row->nama_material?></td>
									<td>  <?=$row->satuan?></td>																	
									<td>   <input type="text" name="harga[]" value="<?=$row->harga_material?>" onkeypress="return goodchars(event,'0123456789',this)"  class="form-control input-sm"  ></td>			
									
									</tr>
									
									  <?php 
									 $no++; }
									  
									echo "</tr>";
									
										 }
										
									  ?>
										 
									</tbody>
								</table>
								</div>
								
								<button type="submit" class="btn btn-primary pull-right"> Update Harga </button>
								
								<div class="clearfix"></div>
								 
								
								
								</form>
								</div>
		
								</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>