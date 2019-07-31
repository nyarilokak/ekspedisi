<?php  error_reporting(0); ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Cetak Ekspedisi </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
	<link rel="shortcut icon" type="image/x-icon" href="<?=base_url()?>kialap/img/logo/logonew.png">
    
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url()?>kialap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url()?>kialap/css/font-awesome.min.css">
	
	</head>
	
	<body  onload="window.print()">
	
	<?php foreach($result as $row);?>
				
				<div class="row">
				 
				 <div class="col-lg-12"> <img class="main-logo" src="<?=base_url()?>kialap/img/logo/logonew1.png" alt="" />  <h1 class="text-center"> Rekapitulasi Tarif Ekspedisi </h1> </div>
				 
				 <br> 
                    
					<div id="printableArea">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h3><i class="fa fa-info-circle"></i> Informasi Ekspedisi </h3>
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
                                    <h3><i class="fa fa-car"></i> Informasi Pengiriman </h3>
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
                                    <h3><i class="fa fa-share"></i> Biaya Keberangkatan </h3>
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
                                    <h3><i class="fa fa-reply"></i> Biaya Kepulangan </h3>
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
                                    <h3><i class="fa fa-user"></i> Informasi Driver </h3>
                                </div>
                            </div>
							
							
							<table class="table-condensed table-striped"  width="100%">					
						  <tr>
							<td width="31%"> Nama Driver </td>
							<td width="2%"> :  </td>
							<td width="67%"> <?=$row->driver;  ?>
							</td>
						  </tr>
							
							<tr>
							<td> Nama Bank </td>
							<td> : </td>
							<td><?=$row->bank; ?> </td>
							</tr>
							<tr>
							<td> Nomor Rekening</td>
							<td> : </td>
							<td> <?=$row->norek; ?> </td>
							</tr>
							<tr>
							<td> Atas Nama</td>
							<td> :</td>
							<td> <?=$row->atasnama;?></td>
							</tr>
							<tr>
							
							</table>
							
							</form>
							
							</div>
							
							</div>
							
							
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h3 style=" color:#000"><i class="fa fa-calculator"></i> Kalkulasi Biaya </h3>
                                </div>
                            </div>
							
							<table class="table-condensed table-striped"  width="100%" style="font-size:20px; color:#000">					
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
							
							
				  </div>
				</div>
				<br>
				<br>
				<br>
					
					<div class="clearfix"></div>
						<div class="footer-copyright-area" style="position:fixed; bottom:0; width:100%; margin-top:3000px;">
            
                        <div class="footer-copy-right">
                            <p>Copyright © 2019 Trac Palembang - Ekspedisi - Create By Ardi</p>
                        </div>
						
						</div>
						
	
	</body>
	</html>