 


	<div class="row">
			
		<div class="col-lg-12">  <?=$this->session->flashdata('sukses');?>  </div> 
 
			<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12" >
	
				<div class="sparkline13-list" style="background-color:#BBDEFB; border-left:3px  solid #; color:#000">
			
					<div class="sparkline13-hd">
                            <div class="main-sparkline13-hd" >
                                    <h1> <i class="fa fa-arrow-circle-right"></i> Request Ekspedisi </h1>
                            </div>
                    </div>
							
                                                        <div class="row">
														
														<form action="" method="get">
														
                                                             <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                                                
                                                                <div class="form-group">
																	Tipe Ekspedisi
                                                                    <select name="tipe" id="types" class="chosen-select" required>
																	<option value="">Pilih</option>
																	<option value="One Way" <?php echo $_GET['tipe']=='One Way' ? ' selected' : ''; ?>>One Way</option>
																	<option value="Two Way" <?php echo $_GET['tipe']=='Two Way' ? ' selected' : ''; ?>>Two Way</option>
																	<option value="Derek" 	<?php echo $_GET['tipe']=='Derek' ? ' selected' : ''; ?>>Derek</option>
																	</select>
																</div>
																
                                                                <div class="form-group">
																	Asal Pengiriman
                                                                    <select name="from" class="chosen-select" id="textasal" required>
																	<option value="">Pilih</option>
																	<?php foreach ($bbm as $row) : 
																	if($_GET['from']==$row->namarute) {
																	echo "<option value='".$row->namarute."' selected>$row->namarute</option>";
																	} else {
																	echo "<option value='".$row->namarute."'>$row->namarute</option>";	
																	}
																	endforeach; ?>
																	</select>
																</div>       
																
                                                                <div class="form-group res-mg-t-15">
																	Tujuan Pengiriman
																	<select name="to" class="chosen-select" id="textasal" required>
																	<option value="">Pilih</option>
																	<?php foreach ($bbm as $row) : 
																	if($_GET['to']==$row->namarute) {
																	echo "<option value='".$row->namarute."' selected>$row->namarute</option>";
																	} else {
																	echo "<option value='".$row->namarute."'>$row->namarute</option>";	
																	}
																	endforeach; ?>
																	</select>
                                                                </div>
																
																
																<div class="form-group res-mg-t-15">
																	Nomor Polisi 1
																	<select name="nopol1" class="chosen-select"  required>
																	<option value="">Pilih</option>
																	<?php foreach ($nopol as $row) : 
																	if($_GET['nopol1']==$row->nopol) {
																	echo "<option value='".$row->nopol."' selected>$row->nopol :: $row->tipe</option>";
																	} else {
																	echo "<option value='".$row->nopol."'>$row->nopol :: $row->tipe </option>";	
																	}
																	endforeach; ?>
																	</select>
                                                                </div>
																
																
																<div class="form-group" id="nopol">
																<div class="form-group res-mg-t-15">
																	Nomor Polisi 2
																	<select name="nopol2"  id="npl" class="chosen-select" >
																	<option value="">Pilih</option>
																	<?php foreach ($nopol as $row) : 
																	if($_GET['nopol2']==$row->nopol) {
																	echo "<option value='".$row->nopol."' selected>$row->nopol :: $row->tipe</option>";
																	} else {
																	echo "<option value='".$row->nopol."'>$row->nopol :: $row->tipe </option>";	
																	}
																	endforeach; ?>
																	</select>
                                                                </div>
																</div>
																
																
                                                                <div class="form-group res-mg-t-15">
																	Nama Driver
																	<select name='iddriver' class='chosen-select input-sm' >
																	<option value="">Pilih</option>
																	<?php									
																		
																		foreach ($driver as $d) { 
																			if($_GET['iddriver']==$d->iddriver) {
																			echo '<option value="'.$d->iddriver .'" selected>' . $d->nama . '</option>'; 
																			} else {
																			echo '<option value="'.$d->iddriver .'">' . $d->nama . '</option>'; 	
																			}
																		}     
																		?>   
																	</select>
                                                                </div>
																

																

																
                                                                <div class="form-group">
																<a href="<?=base_url()?>index.php/apps/transaction/expedition" class="btn btn-warning " > Reset Data</a>
                                                               
																<button type="submit" name="q" id="btn-submit"  class="btn btn-primary"> Cek Biaya</button>
																</div>
                                                               
                                                               
                                                           </div>
														   
														  </form> 
														  
                                                        </div>        

												</div>
												
												
							<div class="sparkline13-list" style="background-color:#FBC02D; border-left:3px  solid #F57C00; color:#000">
			
							<div class="sparkline13-hd">
                                <div class="main-sparkline13-hd" >
                                    <h1> <i class="fa fa-info-circle"></i> Information </h1>
									</div>
									</div>
							
									<ul>
									<li>- Jika Kendaraan belum terdaftar, mohon segera hubungi team admin.</li>
									<li>- Tampil Notif Rute Ekspedisi belum tersedia,  segera hubungi  admin.</li>
									<li>- Setiap melakukan cek tarif Ekspedisi untuk selalu reset data. </li>									
									<li>- Isikan data dengan benar untuk memudahkan pengiriman kendaraan. </li>
									
									</ul>
							
								</div>
							
							</div>
								
	
	
							<?php if(isset($_GET['q'])) { 
							

							
							$from=$this->input->get('from');
							$to=$this->input->get('to');
							$nopol1=$this->input->get('nopol1');
							$nopol2=$this->input->get('nopol2');
							$iddriver=$this->input->get('iddriver');
							
							// Query keberangkatan
							$hasil=$this->db->query("SELECT * FROM ongkir WHERE dari='$from' AND tujuan='$to'"); 				
							$sql=$this->db->query("SELECT * FROM kendaraan a INNER JOIN bbm b ON a.idbbm=b.idbbm WHERE nopol='$nopol1'");  
							
							// Query Kepulangan
							$hasil2=$this->db->query("SELECT * FROM ongkir WHERE dari='$to' AND tujuan='$from'"); 		
							$sql2=$this->db->query("SELECT * FROM kendaraan a INNER JOIN bbm b ON a.idbbm=b.idbbm WHERE nopol='$nopol2'"); 
							
							// Query Driver
							$driver=$this->db->query("SELECT * FROM driver  WHERE iddriver='$iddriver'"); 
							 //keberangkatan	
							 foreach($hasil->result() as $row);							
							 // nopol pertama
							 foreach($sql->result() as $row1);							 
							 // kembali
							 foreach($hasil2->result() as $row3);							 
							  // nopol kedua
							 foreach($sql2->result() as $row2);
							 // driver
							 foreach($driver->result() as $row4);
							 
							
							if($hasil->num_rows() > 0 ) {
								
							$biaya2=0;
							$biaya1=0;
							$total_biaya=0;
							
							if($_GET['tipe']=='One Way') {
								
								$biaya_transport1=$row->biaya_transport;
								$biaya_lain		 =$row->biaya_lain;
							
							} elseif($_GET['tipe']=='Derek') {
								
								$biaya_transport1=$row->biaya_transport;
								$biaya_lain		 =$row->biaya_lain;
								
							
							} else {
								
								$biaya_transport1=0;
								$biaya_lain		 =0;
								
							}
							
							//biaya bbm nopol pertama
							 $biaya_bbm1=ceil(($row->km / $row1->rasio) * $row1->harga);
							
							 // biaya keberangkatan
							$biaya1 = $biaya_transport1 + $row->biaya_asdp + $row->biaya_tol + $biaya_lain + $row->jasa_driver + $biaya_bbm1;
							
							
								
							if($_GET['tipe'] =='Two Way') {							

							  // biaya bbm nopol kedua
							 $biaya_bbm2=ceil(($row3->km / $row2->rasio) * $row2->harga);
							 
							  // Biaya kepulangan
							 $biaya2 = $row3->biaya_asdp + $row3->biaya_tol  + $biaya_bbm2;
														 
							} 	elseif($_GET['tipe'] =='Derek') {							

							  // biaya bbm nopol kedua
							 $biaya_bbm2=ceil(($row3->km / $row2->rasio) * $row2->harga);
							 
							  // Biaya kepulangan (mobil narik) + (mobil di tarik)
							  $biaya2 =  ($row3->biaya_asdp + $row3->biaya_tol  + $biaya_bbm2 ) + ($row->biaya_asdp + $row->biaya_tol  + $row->jasa_driver + $biaya_bbm1);
							
							
							} 	
							
							
							// perhitungan total biaya
							$total_biaya=round($biaya1 + $biaya2) ;		
							
							
							if($row4->npwp=='Y') {
								// 0.975
								$grossup=round($total_biaya/ 0.975);
								$pph21=round($grossup - $total_biaya);
								
							} else {
								// 0.97
								$grossup=round($total_biaya / 0.97);
								$pph21=round($grossup - $total_biaya);
							}
							 
							?>
							
							
							<form action="<?=base_url()?>index.php/apps/transaction/expedition/order" method="post">							
							<!-- keberangkatan -->
							<input type="hidden" value="<?=$biaya_transport1?>" name="biaya_transport1">
							<input type="hidden" value="<?=$row->biaya_asdp?>" name="biaya_asdp1">
							<input type="hidden" value="<?=$row->biaya_tol?>" name="biaya_tol1">
							<input type="hidden" value="<?=$biaya_lain?>" name="biaya_lain1">
							<input type="hidden" value="<?=$row->jasa_driver?>" name="biaya_driver1">
							<input type="hidden" value="<?=$biaya_bbm1?>" name="biaya_bbm1">
							
							<!-- Kepulangan -->
							<?php if($_GET['tipe']=='Two Way') { ?>
							<input type="hidden" value="<?=$biaya_transport1?>" name="biaya_transport2">
							<input type="hidden" value="<?=$row3->biaya_asdp?>" name="biaya_asdp2">
							<input type="hidden" value="<?=$row3->biaya_tol?>" name="biaya_tol2">
							<input type="hidden" value="<?=$biaya_lain?>" name="biaya_lain2">
							<input type="hidden" value="0" name="biaya_driver2">
							<input type="hidden" value="<?=$biaya_bbm2?>" name="biaya_bbm2">
							<?php } ?>
							
							<?php if($_GET['tipe']=='Derek') { ?>
							<input type="hidden" value="0" name="biaya_transport2">
							<input type="hidden" value="<?=$row3->biaya_asdp + $row->biaya_asdp?>" name="biaya_asdp2">
							<input type="hidden" value="<?=$row3->biaya_tol + $row->biaya_tol?>" name="biaya_tol2">
							<input type="hidden" value="" name="biaya_lain2">
							<input type="hidden" value="<?=$row3->jasa_driver?>" name="biaya_driver2">
							<input type="hidden" value="<?=$biaya_bbm2 + $biaya_bbm1?>" name="biaya_bbm2">
							<?php } ?>
							

							 <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
								<div class="sparkline13-list" style="border-top:5px solid #0288D1">			
									<div class="sparkline13-hd">
														<div class="main-sparkline13-hd">
															<h4> <i class="fa fa-th"></i> Detail Ekspedisi </h4>
														</div>
													</div>
							
												<div class="alert alert-danger display-error" style="display: none"> </div>
                                                    <div class="row">
													
															<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
																	CMD
																	<select name='cmd' class='chosen-select input-sm' id="cmd" onchange="changeValue2(this.value)" style="font-size:12px" required>
																	<option value="">Pilih</option>
																	<?php									
																		$jsArray2 = "var JsData = new Array();\n";       
																		foreach ($customer as $a) {   
																			echo '<option value="'.$a->cmd .'">' . $a->cmd . ' : ' . $a->customer . '</option>';   
																			$jsArray2 .= "JsData['". $a->cmd ."'] = {customer:'" . addslashes($a->customer) . "'};\n";   
																		}     
																		?>   
																	</select>
                                                                    </div>
																</div>
																
																<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
																	Customer
                                                                    <input name="customer" id="customer" type="text" class="form-control" readonly required>
                                                                </div>
																</div>
																
																<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
																	Tanggal Pengiriman
                                                                    <input name="kirim" id="tgl1" type="text" class="form-control" readonly required>
                                                                </div>
																</div>
																
																<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
																	Estimasi Sampai
                                                                    <input name="sampai" id="tgl2" type="text" class="form-control" readonly required>
                                                                </div>
																</div>
																
															
																<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
																	Pembebanan Ekspedisi
                                                                    <select name="beban" class="form-control" required>
																	<option value="">Pilih</option>
																	<option value="Charge To Customer">Charge To Customer</option>
																	<option value="Internal Expense">Internal Expense</option>																	
																	</select>
																	</div>
																</div>
																
																<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
																	Tipe Ekspedisi
                                                                    <input name="tipe" value="<?=$_GET['tipe']?>" type="text" class="form-control" readonly>
                                                                </div>
																</div>
																
																<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
																	Status
                                                                    <select name="status" class="form-control" required>
																	<option value="">Pilih</option>
																	<option value="Ambil">Ambil</option>
																	<option value="Antar">Antar</option>
																	<option value="PP">PP </option>
																	</select>
																	
                                                                </div>
																</div>
																<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
																	Metode Kirim
                                                                    <select name="metode" class="form-control" required>
																	<option value="">Pilih</option>
																	<option value="Darat">Darat</option>
																	<option value="Laut">Laut</option>
																	<option value="Udara">Udara</option>
																	</select>
                                                                </div>
																</div>
																
																<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
																	Asal Pengiriman
                                                                    <input name="asal" value="<?=$row->dari?>" type="text" class="form-control" readonly>
                                                                </div>
																</div>
																
																<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
																	Tujuan Pengiriman
                                                                    <input name="tujuan" value="<?=$row->tujuan?>" type="text" class="form-control" readonly>
                                                                </div>
																</div>
																
																<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
																	Nomor Polisi 1
                                                                    <input name="nopol1" value="<?=$row1->nopol?>" type="text" class="form-control" readonly>
                                                                </div>
																</div>
																
																<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
																	Nomor Polisi 2
                                                                    <input name="nopol2" value="<?=$row2->nopol?>"type="text" class="form-control" readonly>
                                                                </div>
																</div>
																
																<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
																	Alamat Detail
                                                                    <textarea name="lokasi"  class="form-control" required></textarea>
                                                                </div>
																</div>
																
																
																
																
																<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
																	Catatan
                                                                  <textarea name="catatan"  class="form-control"></textarea>
                                                                </div>
																</div>
																
																<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                                                <div class="form-group">
																	Total Biaya 
                                                                    <input name="total_biaya" value="<?=$total_biaya?>" style="font-size:24px" type="text" class="form-control" readonly>
                                                                </div>
																</div>	
																
																<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                                                <div class="form-group">
																	PPH 21
                                                                    <input name="pph21" value="<?=$pph21?>" style="font-size:24px" type="text" class="form-control" readonly>
                                                                </div>
																</div>	
																
																<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                                                <div class="form-group">
																	Gross Up  
                                                                    <input name="grossup" value="<?=$grossup?>" style="font-size:24px" type="text" class="form-control" readonly>
                                                                </div>
																</div>	
																
																<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                                                <div class="form-group">
																	&nbsp; <br>
																	<a href="#" data-toggle="modal" data-target="#Biaya" class="btn btn-info" title="Detail Biaya"><span class="fa fa-info-circle"></span></a>
                                                                    </div>
																</div>	
																
															<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
																	Nama Driver
																	<input type="text" class="form-control input-sm" id="email" name="nama" value="<?=$row4->nama;?>" readonly>
																	<input type="hidden"  name="npwp" value="<?=$row4->npwp;?>">
                                                               
                                                                </div>
																</div>
																

																<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
																	Email
																	<input type="text" class="form-control input-sm" id="email" name="email" value="<?=$row4->email;?>" readonly>
                                                                </div>
																</div> 

																<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
																	Nama Bank
                                                                     <input type="text" class="form-control input-sm" id="bank" name="bank" value="<?=$row4->bank;?>" readonly>
                                                                </div>
																</div> 

																<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
																	Nomor Rekening
																	<input type="text" class="form-control input-sm" id="norek" name="norek" value="<?=$row4->norek;?>" readonly> </div>
																</div> 

																<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
																	Atas Nama
                                                                    <input type="text" class="form-control input-sm" id="atasnama" name="atasnama"  value="<?=$row4->atasnama;?>" readonly>
                                                                </div>
																</div> 
																
																<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
																	Nomor Voucher
																	<input type="text" class="form-control input-sm" name="no_ekspedisi" required>
																	</div>
																</div> 


                                                            </div>
														
								
									
                                                           
                                                          <div class="row">
														
															<div class="col-lg-4 col-lg-offset-4 col-sm-6 col-md-4 col-xs-12">
                                                                
                                                                    <a href="<?=base_url()?>index.php/apps/transaction/expedition" class="btn btn-warning  btn-block" > Cancel </a>
                                                               
                                                            </div>
															 <div class="col-lg-4 col-sm-6 col-md-4 col-xs-12">
                                                                
                                                                    <button type="submit" name="simpan" id="btn-submit"  class="btn btn-primary  btn-block">Request</button>
                                                                
                                                            </div>
                                                        </div>
                                                    
						
											</div>
										</div>
					
									</form>	
									
									
<!-- MODAL DETAIL BIAYA -->
        <div class="modal fade" id="Biaya" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header" style="background-color:#1565C0; color:white">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel"> Rincian Biaya <?=$_GET['tipe'];?></h3>
            </div>
            <form class="form-horizontal">
			
                <div class="modal-body">
				
                    <table class="table-condensed table-striped"  width="100%">
					
					<tr>
					<td> <h4> Keberangkatan </h4> </td>
					<td>  </td>
					<td> </td>
					</tr>
					
					<tr>
					<td> Biaya Transport </td>
					<td> :  </td>
					<td> <?=rupiah($biaya_transport1); ?> </td>
					</tr>
					<tr>
					<td> Biaya ASDP </td>
					<td> : </td>
					<td> <?=rupiah($row->biaya_asdp); ?> </td>
					</tr>
					<tr>
					<td> Biaya Tol</td>
					<td> : </td>
					<td> <?=rupiah($row->biaya_tol); ?> </td>
					</tr>
					<tr>
					<td> Biaya Lain-lain</td>
					<td> :</td>
					<td> <?=rupiah($biaya_lain); ?></td>
					</tr>
					<tr>
					<td> Biaya Jasa Driver</td>
					<td> : </td>
					<td> <?=rupiah($row->jasa_driver); ?> </td>
					</tr>					
					<tr>
					<td> Biaya BBM</td>
					<td> : </td>
					<td> <?=rupiah($biaya_bbm1); ?> </td>
					</tr>
					<tr>
					<td> Sub Total </td>
					<td> : </td>
					<td> <?=rupiah($biaya1); ?> </td>
					</tr>
					
					<?php if($_GET['tipe']=='Two Way') { ?>
					<tr>
					<td> <h4> Kepulangan </h4> </td>
					<td>  </td>
					<td> </td>
					</tr>
					
					<tr>
					<td> Biaya Transport </td>
					<td> :  </td>
					<td> <?=rupiah($biaya_transport1); ?> </td>
					</tr>
					<tr>
					<td> Biaya ASDP </td>
					<td> : </td>
					<td> <?=rupiah($row3->biaya_asdp); ?> </td>
					</tr>
					<tr>
					<td> Biaya Tol</td>
					<td> : </td>
					<td> <?=rupiah($row3->biaya_tol); ?> </td>
					</tr>
					<tr>
					<td> Biaya Lain-lain</td>
					<td> :</td>
					<td> <?=rupiah($biaya_lain); ?></td>
					</tr>
					<tr>
					<td> Biaya Jasa Driver</td>
					<td> : </td>
					<td> 0 </td>
					</tr>
					<tr>
					
					<td> Biaya BBM</td>
					<td> : </td>
					<td> <?=rupiah($biaya_bbm2); ?> </td>
					</tr>
								
					<tr>
					<td> Sub Total </td>
					<td> : </td>
					<td> <?=rupiah($biaya2); ?> </td>
					</tr>
					<?php } ?>
					
					<?php if($_GET['tipe']=='Derek') { ?>
					<tr>
					<td> <h4> Kepulangan </h4> </td>
					<td>  </td>
					<td> </td>
					</tr>
					
					<tr>
					<td> Biaya Transport </td>
					<td> :  </td>
					<td> 0 </td>
					</tr>
					<tr>
					<td> Biaya ASDP </td>
					<td> : </td>
					<td> <?=rupiah($row3->biaya_asdp + $row->biaya_asdp); ?> </td>
					</tr>
					<tr>
					<td> Biaya Tol</td>
					<td> : </td>
					<td> <?=rupiah($row3->biaya_tol + $row->biaya_tol ); ?> </td>
					</tr>
					<tr>
					<td> Biaya Lain-lain</td>
					<td> :</td>
					<td>  0</td>
					</tr>
					<tr>
					<td> Biaya Jasa Driver</td>
					<td> : </td>
					<td>  <?=rupiah($row->jasa_driver); ?> </td>
					</tr>
					<tr>
					
					<td> Biaya BBM</td>
					<td> : </td>
					<td> <?=rupiah($biaya_bbm2 + $biaya_bbm1); ?> </td>
					</tr>
								
					<tr>
					<td> Sub Total </td>
					<td> : </td>
					<td> <?=rupiah($biaya2); ?> </td>
					</tr>
					<?php } ?>
					
					
					<tr style="color:#1565C0">					
					<td>  <h4>  Total Biaya </h4> </td>
					<td> :  </td>
					<td> <h4> <?=rupiah($total_biaya);?> </h4></td>
					</tr>
					<tr style="color:#1565C0">					
					<td>  <h4>  PPH 21 </h4> </td>
					<td> :  </td>
					<td> <h4> <?=rupiah($pph21);?> </h4></td>
					</tr>
					
					<tr style="color:red">					
					<td>  <h4>  Gross Up  </h4> </td>
					<td> :  </td>
					<td> <h4> <?=rupiah($grossup);?> </h4></td>
					</tr>
					
					
					</table>
					
					
 
                </div>
 
                <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">X</button>
                   
                </div>
            </form>
            </div>
            </div>
        </div>
        <!--END MODAL -->
		
					
	<?php } else {  echo ' <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12"> <div class="alert alert-danger">Rute Ekspedisi belum tersedia <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times; </button> </div> </div>'; } }  ?>
  	
 <script src="<?=base_url()?>kialap/js/jquery.js"></script>
 
<script type="text/javascript">   
$(document).ready(function() {   
$('#types').change(function(){   
if($('#types').val() === 'Two Way' || $('#types').val() === 'Derek')   
   {   
   $('#nopol').show(); 
    
   document.getElementById('npl').required=true;
  
   }   
else 
   {   
    $('#nopol').hide(); 
    
	 document.getElementById('npl').required=false;
     
   
   }   
});   
});   
</script> 

	<script type="text/javascript">   
    <?php echo $jsArray; ?> 
    function changeValue(nim){ 
    document.getElementById('norek').value = dtMhs[nim].norek; 
    document.getElementById('bank').value = dtMhs[nim].bank; 
	document.getElementById('atasnama').value = dtMhs[nim].atasnama; 
    document.getElementById('npwp').value = dtMhs[nim].npwp; 
	document.getElementById('email').value = dtMhs[nim].email;     
    } 
	
	</script>
	
	<script type="text/javascript">   
    <?php echo $jsArray2; ?> 
    function changeValue2(cmd){ 
    document.getElementById('customer').value = JsData[cmd].customer;    
    } 
	
	</script>