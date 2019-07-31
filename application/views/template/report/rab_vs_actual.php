

		<div class="row">
		
		 <div class="col-lg-12">  <?=$this->session->flashdata('sukses');?>  </div>
		 
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1><i class="fa fa-file-text-o"></i> Laporan RAB vs Actual </h1>
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
									<label class="" for="email"> Unit Property </label>
									<select name="unit" class="form-control">
									<option value="">Pilih</option>
									<?php
									
									
									foreach ($unit as $data) {
										if($data->idunit==$this->input->get('unit')) {
											
											echo 	"<option value='$data->idunit' selected> $data->nama_unit </option> ";
										
										} else {
											
											echo 	"<option value='$data->idunit' > $data->nama_unit </option> ";
										}
									
									}
									?>
								</select>
									</div>
									
									<div class="form-group">									
									<button type="submit" class="btn btn-primary" name="query">View </button>
								  </div>
									
								</div>
								</form>
								
								<br>
								
									<div id="reload">
										<table class="table-condensed table-bordered table" data-toggle="tabl"  data-search="true"   data-resizable="true" 
                                         data-show-export="true"  data-toolbar="#toolbar">
                                       
									<thead>
										<tr style='background-color:blue; font-weight:bold; color:#fff'>
                                            <th>Nama Material</th>
                                            <th>Volume RAB</th>	
											<th>Satuan</th>	
											<th>Harga Satuan</th>												
											<th>Jan</th>
											<th>Feb</th>
											<th>Apr</th>
											<th>Mar</th>
											<th>May</th>
											<th>Jun</th>
											<th>Jul</th>
											<th>Aug</th>
											<th>Sep</th>
											<th>Oct</th>
											<th>Nov</th>
											<th>Dec</th>
											<th>Volume Actual </th>
										</tr>
									</thead>
									<tbody>
									
									<?php 
									 $no=1;
									 $total=0;
									 if(isset($_GET['query'])) { 
									 
									 $sql=$this->db->query("SELECT * FROM tbl_jenis ORDER BY jenis ASC");
									 foreach ($sql->result() as $data) { 
									 
									 echo "<tr style='background-color:#f1f2f6'> <td colspan='17'><b> $data->jenis </b></td>";
									 
									 
									 $tahun=$this->input->get('year');
									 $unit=$this->input->get('unit');
									 
									 $query=$this->db->query("SELECT
									  nama_material,
									  quantity,
									  satuan,
									  harga_material,
									  sum(if(month(tgl_transaksi) = 1, volume, 0))  AS Jan,
									  sum(if(month(tgl_transaksi) = 2, volume, 0))  AS Feb,
									  sum(if(month(tgl_transaksi) = 3, volume, 0))  AS Mar,
									  sum(if(month(tgl_transaksi) = 4, volume, 0))  AS Apr,
									  sum(if(month(tgl_transaksi) = 5, volume, 0))  AS May,
									  sum(if(month(tgl_transaksi) = 6, volume, 0))  AS Jun,
									  sum(if(month(tgl_transaksi) = 7, volume, 0))  AS Jul,
									  sum(if(month(tgl_transaksi) = 8, volume, 0))  AS Aug,
									  sum(if(month(tgl_transaksi) = 9, volume, 0))  AS Sep,
									  sum(if(month(tgl_transaksi) = 10, volume, 0)) AS Oct,
									  sum(if(month(tgl_transaksi) = 11, volume, 0)) AS Nov,
									  sum(if(month(tgl_transaksi) = 12, volume, 0)) AS December
									FROM tbl_set_rab a INNER JOIN tbl_material b ON a.idmaterial=b.idmaterial 
									INNER JOIN tbl_satuan k ON b.idsatuan=k.idsatuan
									LEFT JOIN 
									tbl_detail_trans c ON b.idmaterial=c.idmaterial INNER JOIN tbl_trans_warehouse d 
									ON c.idtransaksi=d.idtransaksi
									WHERE d.type_transaksi='out' AND d.status_transaksi='finish'
									AND a.tahun_rab='$tahun' AND d.idunit='$unit' AND YEAR(d.tgl_transaksi)='$tahun' AND b.idjenis='$data->idjenis'
									GROUP BY a.idmaterial
									ORDER BY nama_material ASC");
									 
									 
									  foreach($query->result() as $row ) {  
									  $total =$row->Jan + $row->Feb + $row->Mar + $row->Apr + $row->May + $row->Jun + $row->Jul + $row->Aug + $row->Sep + $row->Oct + $row->Nov + $row->December;
									  if($total >= $row->quantity) {
										  $bg='#e66767';
									  } else {
										  $bg='#badc58';
									  }
									  ?>
									
									<tr>
									<td>  <?=$row->nama_material?> </td>
									<td>  <b><?=$row->quantity?></b> </td>
									<td>  <?=$row->satuan?></td>
									<td>  <?=$row->harga_material?></td>
									<td>  <?=$row->Jan?></td>
									<td>  <?=$row->Feb?></td>
									<td>  <?=$row->Mar?></td>
									<td>  <?=$row->Apr?> </td>
									<td>  <?=$row->May?></td>
									<td>  <?=$row->Jun?> </td>
									<td>  <?=$row->Jul?></td>
									<td>  <?=$row->Aug?> </td>
									<td>  <?=$row->Sep?></td>
									<td>  <?=$row->Oct?> </td>
									<td>  <?=$row->Nov?> </td>
									<td>  <?=$row->December?></td>
									<td style="background-color:<?=$bg?>"> <b> <?=$total?> </b></td>
									
									</tr>
									
									  <?php $no++;  } 
									 echo "</tr>"; 
									  }
									  
									 }
									  ?>	
									
									
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