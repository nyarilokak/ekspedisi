

		<div class="row">
		
		 <div class="col-lg-12">  <?=$this->session->flashdata('sukses');?>  </div>
		 
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1><i class="fa fa-wrench"></i> Pengaturan RAB <small>(Rencana Anggaran Biaya)</small> </h1>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
									                                 
									</div>
								<div id="reload">										
								
								<form action="" method="get" class="form-inline">
								<div class="panel-body text-center" style="border:1px solid #efefef">
									<div class="form-group">
									<label class="" for="email"> Tahun RAB :</label>
									<select name="year" class="form-control">
									<option value="">Pilih</option>
									<?php
									
									$thn_skr =2019;
									for ($x = $thn_skr; $x <= date('Y') + 1; $x++) {
										if($x==$this->input->get('year')) {
											
											echo 	"<option value='$x' selected> $x </option> ";
										
										} else {
											
											echo 	"<option value='$x' > $x </option> ";
										}
									
									}
									?>
								</select>
									</div>
									
									<div class="form-group">									
									<input type="submit" class="btn btn-primary" value="View">
								  </div>
									
								</div>
								</form>
								
								<br>
								
								<form action="<?=base_url()?>index.php/apps/setting/rab/save_rab" method="post">
								
								<input type="hidden" value="<?=$this->input->get('year')?>" name="tahun">
								
								<?php							
								
								$data = $this->db->get_where('tbl_set_rab', array('tahun_rab'=>$this->input->get('year')));
				
								 $root_array=array();
								 
								 foreach ($data->result() as $value) {
									
									$root_array[] =$value->idmaterial;
																
									
								 }							 
								 
								 
								
								?>
								
								
								<div class="table-responsive">
								<table class="table-condensed table-bordered table">
                                       
									<thead>
										<tr style='background-color:blue; font-weight:bold; color:#fff'>
										    <td></td>
                                            <td>No</td>
                                            <td>Kode Material</td>	
											<td>Nama Material </td>													
											<td>Harga Satuan </td>
											<td>Satuan </td>
											<td>Quantity </td>	
																							
										</tr>
									</thead>
									<tbody>
									<?php 
									
										$sql=$this->db->query("SELECT * FROM tbl_jenis where aktif='1' ORDER BY jenis ASC");
										
										foreach ($sql->result() as $row) { 
										
										echo "<tr style='background-color:#efefef; font-weight:bold; color:#000'> <td colspan='7'> $row->jenis </td> ";
									
										$no=1;
										
										$query=$this->db->query("SELECT * FROM tbl_material a  INNER JOIN tbl_satuan b ON a.idsatuan=b.idsatuan  WHERE idjenis='$row->idjenis' AND a.aktif='1' ");
									  
									   foreach($query->result() as $row ) { 						
										
										if(in_array($row->idmaterial, $root_array,TRUE )) { // check for a match with current checkbox
										$checked 	= "checked";
										
										$sql=$this->db->query("SELECT quantity FROM tbl_set_rab WHERE idmaterial='$row->idmaterial' AND tahun_rab='".$this->input->get('year')."'");
										 foreach ($sql->result() as $ok) : 										
										 
										  $value	= $ok->quantity;
										  
										  endforeach;
										  
										} else {
										  $checked 	= "";
										  $value	= "";
										}
										
										
											
										?>
									<tr>
									<td> <div class="i-checks pull-left"> <label> <input type="checkbox" name="idmaterial[]" value="<?=$row->idmaterial?>" <?=$checked?>> </label> </div> </td>
									<td>  <?=$no?> </td>
									<td>  <?=$row->kode_material?> </td>
									<td>  <?=$row->nama_material?></td>
									<td>  <?=$row->harga_material?></td>
									<td>  <?=$row->satuan?></td>
									<td>   <input type="text" name="quantity[]" value="<?=$value?>" onkeypress="return goodchars(event,'0123456789.',this)"  class="form-control input-sm"  ></td>			
									
									</tr>
									
									  <?php $no++; }
									  
									echo "</tr>";
									
										}
										
									  ?>
										 
									</tbody>
								</table>
								</div>
								
							
								<br>
								<?php if(!empty($this->input->get('year'))) { ?>
								<button type="submit" class="btn btn-primary pull-right"> SIMPAN PERUBAHAN </button>
								
								<div class="clearfix"></div>
								 
								<?php } ?>
								
								</form>
								</div>
		
								</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>