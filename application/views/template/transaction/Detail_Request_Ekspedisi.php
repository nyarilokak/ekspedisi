				<?php foreach($result as $row);?>
				
				<div class="row">
				<div class="col-lg-12"> <?=$this->session->flashdata('sukses');?>  </div>
				 <div class="col-lg-12"> <?php if($_SESSION['levelapps']=='admin') { ?><a href="#" data-toggle="modal" data-target="#ModalaAdd" class="btn btn-sm btn-danger pull-right"> Adjustment </a>  <?php } ?> <a href="#" onclick="window.open('<?=base_url();?>index.php/apps/transaction/expedition/print_out/<?=$row->idekspedisi?>' ,'_blank', 'location=yes,height=700,width=1000,scrollbars=yes,status=yes,position=center')"  class="btn btn-sm btn-warning pull-right">Print</a>   </div> 
                    
					<div id="printableArea">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1><i class="fa fa-info-circle"></i> Informasi Ekspedisi </h1>
                                </div>
                            </div>
							
					<table class="table-condensed table-striped"  width="100%">					
					<tr>
					<td width="31%"> <b> Nomor Voucher </b> </td>
					<td width="2%"> :  </td>
					<td width="67%"> <b> <?php  echo $row->no_ekspedisi;  ?></b></td>
					</tr>
					<tr>
					<td> Tipe Ekspedisi </td>
					<td> : </td>
					<td> <?=$row->type_ekspedisi; ?> </td>
					</tr>
					<tr>
					<td> Tanggal Pengiriman </td>
					<td> : </td>
					<td> <?=tanggal($row->tglekspedisi); ?> </td>
					</tr>
					<tr>
					<td> Estimasi Sampai</td>
					<td> : </td>
					<td> <?=tanggal($row->tglsampai); ?> </td>
					</tr>
					<tr>
					<td> Waktu Request</td>
					<td> : </td>
					<td> <?=$row->waktu; ?> </td>
					</tr>
					<tr>
					<td> Status Ekspedisi </td>
					<td> :</td>
					<td> <?=$row->status_ekspedisi; ?></td>
					</tr>
					<tr>
					<td> Pembebanan</td>
					<td> : </td>
					<td> <?=$row->pembebanan; ?> </td>
					</tr>					
					<tr>
					<td> Mode Transport </td>
					<td> : </td>
					<td> <?=$row->mode_transport; ?> </td>
					</tr>					
					
					</table>							
							
				</div>
							
				</div>
							
							
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1><i class="fa fa-car"></i> Informasi Pengiriman </h1>
                                </div>
                            </div>
							
					<table class="table-condensed table-striped"  width="100%">					
					<tr>
					<td width="31%"> CMD </td>
					<td width="2%"> :  </td>
					<td width="67%"> <?=$row->cmd; ?> </td>
					</tr>
					<tr>
					<td> Customer </td>
					<td> : </td>
					<td> <?=$row->customer; ?> </td>
					</tr>
					<tr>
					<td> Asal Pengiriman</td>
					<td> : </td>
					<td> <?=$row->dari; ?> </td>
					</tr>
					<tr>
					<td> Tujuan Pengiriman</td>
					<td> :</td>
					<td> <?=$row->tujuan; ?></td>
					</tr>
					<tr>
					<td> Nomor Polisi 1</td>
					<td> : </td>
					<td> <?=$row->nopol1; ?> </td>
					</tr>					
					<tr>
					<td> Nomor Polisi 2</td>
					<td> : </td>
					<td> <?=$row->nopol2; ?> </td>
					</tr>
					<tr>
					<td> Alamat Detail  </td>
					<td> : </td>
					<td> <?=$row->alamat; ?> </td>
					</tr>
					<tr>
					<td> Catatan </td>
					<td> : </td>
					<td> <?=$row->remark; ?> </td>
					</tr>
					
					</table>
							
							
							</div>
							
							</div>
							
				
							
							
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1><i class="fa fa-share"></i> Biaya Keberangkatan </h1>
                                </div>
                            </div>
							
					<table class="table-condensed table-striped"  width="100%">					
					<tr>
					<td width="31%"> Biaya Transport </td>
					<td width="2%"> :  </td>
					<td width="67%"> <?=rupiah($row->biaya_transport); ?> </td>
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
					<td> <?=rupiah($row->biaya_lain); ?></td>
					</tr>
					<tr>
					<td> Biaya Jasa Driver</td>
					<td> : </td>
					<td> <?=rupiah($row->jasa_driver); ?> </td>
					</tr>					
					<tr>
					<td> Biaya BBM</td>
					<td> : </td>
					<td> <?=rupiah($row->biaya_bbm); ?> </td>
					</tr>
					<tr>
					<td> Sub Total </td>
					<td> : </td>
					<td> <b> <?=rupiah($row->subtotal1); ?> </b> </td>
					</tr>
					
					</table>
							
							
							</div>
							
							</div>
							
							
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1><i class="fa fa-reply"></i> Biaya Kepulangan </h1>
                                </div>
                            </div>
							
					<table class="table-condensed table-striped"  width="100%">					
					<tr>
					<td width="31%"> Biaya Transport </td>
					<td width="2%"> :  </td>
					<td width="67%"> <?=rupiah($row->biaya_transport2); ?> </td>
					</tr>
					<tr>
					<td> Biaya ASDP </td>
					<td> : </td>
					<td> <?=rupiah($row->biaya_asdp2); ?> </td>
					</tr>
					<tr>
					<td> Biaya Tol</td>
					<td> : </td>
					<td> <?=rupiah($row->biaya_tol2); ?> </td>
					</tr>
					<tr>
					<td> Biaya Lain-lain</td>
					<td> :</td>
					<td> <?=rupiah($row->biaya_lain2); ?></td>
					</tr>
					<tr>
					<td> Biaya Jasa Driver</td>
					<td> : </td>
					<td> <?=rupiah($row->jasa_driver2); ?> </td>
					</tr>					
					<tr>
					<td> Biaya BBM</td>
					<td> : </td>
					<td> <?=rupiah($row->biaya_bbm2); ?> </td>
					</tr>
					<tr>
					<td> Sub Total </td>
					<td> : </td>
					<td> <b> <?=rupiah($row->subtotal2); ?> </b></td>
					</tr>
					
					</table>
							
							
							</div>
							
							</div>
							
							
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1><i class="fa fa-user"></i> Informasi Driver </h1>
                                </div>
                            </div>
							<form action="<?=base_url()?>index.php/apps/transaction/expedition/update_ekspedisi" method="post">
							
							<table class="table-condensed table-striped"  width="100%">					
							<tr>
							<td width="31%"> Nama Driver </td>
							<td width="2%"> :  </td>
							<td width="67%"> <?php if($this->session->userdata('levelapps')=='pdi' AND $row->flag_transaksi=='1') { ?>
							<select name='nama' class='chosen-select input-sm' id="nim" onchange="changeValue(this.value)">
								<option value="">Pilih</option>
								<?php									
									$jsArray = "var dtMhs = new Array();\n";       
									foreach ($driver as $d) {   
										echo '<option value="'.$d->nama .'">' . $d->nama . '</option>';   
										$jsArray .= "dtMhs['". $d->nama ."'] = {npwp:'" . addslashes($d->npwp) . "',
										norek:'".addslashes($d->norek)."',atasnama:'".addslashes($d->atasnama)."'
										,bank:'".addslashes($d->bank)."',email:'".addslashes($d->email)."'};\n";   
									}     
									?>   
								</select>
							<?php } else { echo $row->driver; } ?>
							</td>
						  </tr>
							<tr>
							<td> Email  </td>
							<td> : </td>
							<td> <?php if($this->session->userdata('levelapps')=='pdi' AND $row->flag_transaksi=='1') { ?>  <input type="text" class="form-control input-sm" id="email" name="email">  <?php } else { echo $row->email_driver; } ?> </td>
							</tr>
							<tr>
							<tr>
							<td> Nama Bank </td>
							<td> : </td>
							<td> <?php if($this->session->userdata('levelapps')=='pdi' AND $row->flag_transaksi=='1') { ?> <input type="hidden" class="form-control input-sm" id="npwp" name="npwp" >  <input type="text" class="form-control input-sm" id="bank" name="bank" readonly>  <?php } else { echo $row->bank; } ?> </td>
							</tr>
							<tr>
							<td> Nomor Rekening</td>
							<td> : </td>
							<td> <?php if($this->session->userdata('levelapps')=='pdi' AND $row->flag_transaksi=='1') { ?>  <input type="text" class="form-control input-sm" id="norek" name="norek" readonly> <?php } else {  echo $row->norek; } ?> </td>
							</tr>
							<tr>
							<td> Atas Nama</td>
							<td> :</td>
							<td> <?php if($this->session->userdata('levelapps')=='pdi' AND $row->flag_transaksi=='1') { ?> <input type="text" class="form-control input-sm" id="atasnama" name="atasnama" readonly>  <?php } else { echo $row->atasnama; } ?></td>
							</tr>
							<tr>
							<?php if($this->session->userdata('levelapps')=='pdi' AND $row->flag_transaksi=='1') { ?>
							<tr>
							<td>  Nomor Voucher/Order </td>
							<td>  :  </td>
							<td> <input type="text" class="form-control input-sm" name="no_ekspedisi">
								<input type="hidden" class="form-control input-sm" value="<?=$row->idekspedisi;?>" name="idekspedisi">
								<input type="hidden" class="form-control input-sm" value="<?=$row->biaya_ekspedisi;?>" name="biaya">
							</td>
							</tr>
							<tr>
							<td>   </td>
							<td>    </td>
							<td> <input type="submit" class="btn btn-primary" name="simpan" value="Update Ekspedisi"> </td>
							</tr>
							
							<?php } ?>
							</table>
							
							</form>
							
							</div>
							
							</div>
							
							
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                           <div class="sparkline13-list" style="background-color:#ffda79; border:2px solid #cc8e35">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1 style=" color:#000"><i class="fa fa-calculator"></i> Kalkulasi Biaya </h1>
                                </div>
                            </div>
							
							<table class="table-condensed"  width="100%" style="font-size:20px; color:#000">
							<tr>
								<td width="31%">  Adjustment  </td>
								<td width="2%"> :  </td>
								<td width="67%" align="right"> <?=rupiah($row->nilai_adjust); ?> </td>
							  </tr>
							  <tr>
								<td width="31%"> Keterangan  </td>
								<td width="2%"> :  </td>
								<td width="67%" align="right"> <?=$row->keterangan_adjust; ?> </td>
							  </tr>
							  <tr>
								<td width="31%"> Total Biaya  </td>
								<td width="2%"> :  </td>
								<td width="67%" align="right"> <?=rupiah($row->biaya_ekspedisi); ?> </td>
							  </tr>				
							
							<tr>
							<td> PPH 21 </td>
							<td> : </td>
							<td align="right"> <?=rupiah($row->pph21);?> </td>
							</tr>
							<tr>
							<td> Gross Up </td>
							<td> : </td>
							<td align="right"> <?=rupiah($row->biaya_pph21); ?> </td>
							</tr>
							</table>
							
							
							</div>
							
							</div>
							<?php if($this->session->userdata('levelapps')=='adh' AND $row->flag_transaksi=='3') { ?>
							<div class="clearfix"></div>
						 <br>	
						<div class="col-lg-12"> 
						<form action="<?=base_url()?>index.php/apps/transaction/expedition/action_process_adh" method="post">
						<input type="hidden" value="<?=$row->idekspedisi?>" name="idekspedisi">				
						<button type="submit" class="btn btn-block btn-lg btn-success" name="adhpost"> Konfirmasi Transfer </button>
						</form>
						</div>			
						<?php } ?>								
					  </div>
					</div>
				
				
				<!-- MODAL ADD -->
        <div class="modal fade" id="ModalaAdd" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel"> Adjustment Biaya </h3>
            </div>
			
            <form  method="post" action="<?=base_url()?>index.php/apps/transaction/expedition/adjust_biaya">
			<input type="hidden" class="form-control input-sm" name="npwp" value="<?=$row->npwp;?>">
			<input type="hidden" class="form-control input-sm" name="idekspedisi" value="<?=$row->idekspedisi;?>">
			<input type="hidden" class="form-control input-sm" name="total_biaya" value="<?=$row->subtotal1 + $row->subtotal2;?>">
                <div class="modal-body">				
					
					<div class="form-group">
                       <label class="control-label col-lg-3 col-md-3 col-sm-6 col-xs-12"> Nominal  </label>	
                            <div class="input-group date col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                <input type="text" name="nominal" class="form-control" required onkeypress="return goodchars(event,'0123456789',this)">
                            </div>
                        </div>
						
						<div class="form-group">
                       <label class="control-label col-lg-3 col-md-3 col-sm-6 col-xs-12"> Keterangan </label>	
                            <div class="input-group date col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                <span class="input-group-addon"><i class="fa fa-info-circle"></i></span>
                                <input type="text" name="keterangan" class="form-control" required>
                            </div>
                        </div>
						
				   </div>
				
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-primary" name="adminpostAdjust">Adjust</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <!--END MODAL ADD-->
		
				
	<script type="text/javascript">   
    <?php echo $jsArray; ?> 
    function changeValue(nim){ 
    document.getElementById('norek').value = dtMhs[nim].norek; 
    document.getElementById('bank').value = dtMhs[nim].bank; 
	document.getElementById('atasnama').value = dtMhs[nim].atasnama; 
    document.getElementById('npwp').value = dtMhs[nim].npwp; 
	document.getElementById('email').value = dtMhs[nim].email; 
	
    
    } 
	
	function printPageArea(areaID){
    var printContent = document.getElementById(areaID);
    var WinPrint = window.open('', '', 'width=800,height=650');
    WinPrint.document.write(printContent.innerHTML);
    WinPrint.document.close();
    WinPrint.focus();
    WinPrint.print();
    WinPrint.close();
}
    </script> 