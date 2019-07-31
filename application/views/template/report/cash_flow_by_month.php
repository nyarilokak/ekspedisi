<div class="row">


                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd text-center">
                                    <h1>  Laporan Cash Flow Per Tahun </h1>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
									
							
									
									</div>
									<br>
								<div class="table-responsive">
								<table   class="table table-condensed table-bordered">
									<thead>
									<tr>
											<th rowspan="2">Tahun</th>
                                            <th colspan="2">Januari</th>
                                            
											<th colspan="2">Februari </th>													
											<th colspan="2">Maret </th>
											<th colspan="2">April</th>
											<th colspan="2">Mei</th>
											<th colspan="2">Juni</th>													
											<th colspan="2">Juli</th>                                            
											<th colspan="2">Agustus </th>													
											<th colspan="2">September </th>
											<th colspan="2">Oktober</th>
											<th colspan="2">November</th>
											<th colspan="2">Desember</th
											
											
										</tr>										
										<tr>
											 
                                            <th>In</th>                                            
											<th>Out </th>													
											<th>In </th>
											<th>Out</th>
											<th>In</th>
											<th>Out</th>	
											<th>In</th>                                            
											<th>Out </th>													
											<th>In</th>
											<th>Out</th>
											<th>In</th>
											<th>Out</th>
											<th>In</th>                                            
											<th>Out </th>													
											<th>In</th>
											<th>Out</th>
											<th>In</th>
											<th>Out</th>
											<th>In</th>                                            
											<th>Out </th>													
											<th>In</th>
											<th>Out</th>
											<th>In</th>
											<th>Out</th>
											
											
										</tr>
									</thead>
									<tbody>
									<?php 
									 $no=1;
									 $total=0;
									  foreach($report as $row ) { 
									
									?>
									<tr>
									
									<td >  <?=$row->tahun?></td>
									
									<td style="text-align:right">  <?=rupiah($row->DebitJan)?></td>
									
									<td style="text-align:right">  <?=rupiah($row->KreditJan)?></td>
									
									<td style="text-align:right">  <?=rupiah($row->DebitFeb)?></td>
									<td style="text-align:right">  <?=rupiah($row->KreditFeb)?></td>
														
									<td style="text-align:right">  <?=rupiah($row->DebitMar)?></td>
									<td style="text-align:right">  <?=rupiah($row->KreditMar)?></td>
									
									<td style="text-align:right">  <?=rupiah($row->DebitApr)?></td>
									<td style="text-align:right">  <?=rupiah($row->KreditApr)?></td>
									
									<td style="text-align:right">  <?=rupiah($row->DebitMei)?></td>
									<td style="text-align:right">  <?=rupiah($row->KreditMei)?></td>
									
									<td style="text-align:right">  <?=rupiah($row->DebitJun)?></td>
									<td style="text-align:right">  <?=rupiah($row->KreditJun)?></td>
									
									<td style="text-align:right">  <?=rupiah($row->DebitJul)?></td>
									<td style="text-align:right">  <?=rupiah($row->KreditJul)?></td>
									
									<td style="text-align:right">  <?=rupiah($row->DebitAgus)?></td>
									<td style="text-align:right">  <?=rupiah($row->KreditAgus)?></td>
									
									<td style="text-align:right">  <?=rupiah($row->DebitSep)?></td>
									<td style="text-align:right">  <?=rupiah($row->KreditSep)?></td>
									
									<td style="text-align:right">  <?=rupiah($row->DebitOkto)?></td>
									<td style="text-align:right">  <?=rupiah($row->KreditOkto)?></td>
									
									
									<td style="text-align:right">  <?=rupiah($row->DebitNov)?></td>
									<td style="text-align:right">  <?=rupiah($row->KreditNov)?></td>
									
									
									<td style="text-align:right">  <?=rupiah($row->DebitDes)?></td>
									<td style="text-align:right">  <?=rupiah($row->KreditDes)?></td>
									
									
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
		
	
     