<div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1> Biaya Pengiriman </h1>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
                                        <div class="btn btn-primary" data-toggle="modal" data-target="#ModalaAdd">Tambah  </div>
                                    </div>
								<div id="reload">	
								<table  id="mydata" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="false" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                       
									<thead>
										<tr>
                                            <th>Asal</th>
                                            <th>Tujuan</th>
											<th>KM </th>												
											<th>Jasa Driver</th>												
											<th>Transport</th>												
											<th>ASDP</th>
											<th>Tol</th>
											<th>Lain-lain</th>
											<th style="text-align: right;">Aksi</th>
										</tr>
									</thead>
									<tbody id="show_data">
										 
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
									

<!-- MODAL ADD -->
        <div class="modal fade" id="ModalaAdd" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Tambah Biaya Kirim</h3>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">
				
				<div class="alert alert-danger display-error" style="display: none"> </div>
				
				<div class="form-group">
                        <label class="control-label col-xs-3" > Kota Asal *</label>
                        <div class="col-xs-9 chosen-select-single">
						<select name="sasal" class="chosen-select" id="textasal" required>
							<option value="">Pilih</option>
							<?php foreach ($bbm as $row) : 
							echo "<option value='".$row->namarute."'>$row->namarute</option>	";
							endforeach; ?>
							</select>
                        </div>
                    </div>	
					
					<div class="form-group">
                        <label class="control-label col-xs-3" > Kota Tujuan  *</label>
                        <div class="col-xs-9 chosen-select-single">
						<select name="stujuan" class="chosen-select" id="texttujuan" required>
							<option value="">Pilih</option>
							<?php foreach ($bbm as $row) : 
							echo "<option value='".$row->namarute."'>$row->namarute</option>	";
							endforeach; ?>
							</select>
                        </div>
                    </div>	
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" > Kilometer (KM) *</label>
                        <div class="col-xs-9">
                            <input name="skm" id="textkm" class="form-control" type="text"  required>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="control-label col-xs-3" > Biaya Transport  *</label>
                        <div class="col-xs-9">
                            <input name="stransport" id="texttransport"   class="form-control" type="text" onkeypress="return goodchars(event,'0123456789',this)" required>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="control-label col-xs-3" > Jasa Driver </label>
                        <div class="col-xs-9">
                            <input name="sdriver" id="textdriver"   class="form-control" type="text" onkeypress="return goodchars(event,'0123456789',this)" required>
                        </div>
                    </div> 
					
					
					<div class="form-group">
                        <label class="control-label col-xs-3" > Biaya ASDP </label>
                        <div class="col-xs-9">
                            <input name="sasdp" id="textasdp"   class="form-control" type="text" onkeypress="return goodchars(event,'0123456789',this)" required>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="control-label col-xs-3" > Biaya Tol</label>
                        <div class="col-xs-9">
                            <input name="stol" id="texttol"   class="form-control" type="text" onkeypress="return goodchars(event,'0123456789',this)" required>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="control-label col-xs-3" > Biaya Lain-Lain * </label>
                        <div class="col-xs-9">
                            <input name="slain" id="textlain"   class="form-control" type="text" onkeypress="return goodchars(event,'0123456789',this)" required>
                        </div>
                    </div>
					
                </div>
 
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info" id="btn_simpan">Simpan</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <!--END MODAL ADD-->
 
        <!-- MODAL EDIT -->
        <div class="modal fade" id="ModalaEdit" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="false">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Edit Biaya Kirim </h3>
            </div>
            <form class="form-horizontal">
			 <input name="idongkir" id="tid" class="form-control" type="hidden">
                <div class="modal-body">
					<div class="form-group">
                        <label class="control-label col-xs-3" > Kota Asal *</label>
                        <div class="col-xs-9">
                            <input name="asal" id="tasal" class="form-control" type="text" readonly required>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="control-label col-xs-3" > Kota Tujuan *</label>
                        <div class="col-xs-9">
                            <input name="tujuan" id="ttujuan" class="form-control" type="text" readonly  required>
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" > Kilometer (KM) *</label>
                        <div class="col-xs-9">
                            <input name="km" id="tkm" class="form-control" type="text"  required>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="control-label col-xs-3" > Biaya Transport  *</label>
                        <div class="col-xs-9">
                            <input name="transport" id="ttransport"   class="form-control" type="text" onkeypress="return goodchars(event,'0123456789',this)" required>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="control-label col-xs-3" > Jasa Driver </label>
                        <div class="col-xs-9">
                            <input name="driver" id="tdriver"   class="form-control" type="text" onkeypress="return goodchars(event,'0123456789',this)" required>
                        </div>
                    </div> 
					
					
					<div class="form-group">
                        <label class="control-label col-xs-3" > Biaya ASDP </label>
                        <div class="col-xs-9">
                            <input name="asdp" id="tasdp"   class="form-control" type="text" onkeypress="return goodchars(event,'0123456789',this)" required>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="control-label col-xs-3" > Biaya Tol</label>
                        <div class="col-xs-9">
                            <input name="tol" id="ttol"   class="form-control" type="text" onkeypress="return goodchars(event,'0123456789',this)" required>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="control-label col-xs-3" > Biaya Lain-Lain * </label>
                        <div class="col-xs-9">
                            <input name="lain" id="tlain"   class="form-control" type="text" onkeypress="return goodchars(event,'0123456789',this)" required>
                        </div>
                    </div>
 
                </div>
 
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info" id="btn_update">Update</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <!--END MODAL EDIT-->
 
        <!--MODAL HAPUS-->
        <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Biaya Kirim</h4>
                    </div>
                    <form class="form-horizontal">
                    <div class="modal-body">
                                           
                            <input type="hidden" name="kode" id="idkendaraan" value="">
                            <div class="alert alert-warning"><p>Apakah Anda yakin ingin menghapus Biaya Kirim ini?</p></div>
                                         
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button class="btn_hapus btn btn-danger" id="btn_hapus">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!--END MODAL HAPUS-->

<script src="<?=base_url()?>kialap/js/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        tampil_data_barang();   //pemanggilan fungsi tampil barang.
         
        $('#mydata');
          
        //fungsi tampil barang
        function tampil_data_barang(){
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo base_url()?>index.php/apps/setting/ongkir/view_Data',
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].dari+'</td>'+                     
                                '<td>'+data[i].tujuan+'</td>'+   
								'<td>'+data[i].km+'</td>'+  
								'<td>'+data[i].jasa_driver+'</td>'+   								  
								'<td>'+data[i].biaya_transport+'</td>'+   
							    '<td>'+data[i].biaya_asdp+'</td>'+
								'<td>'+data[i].biaya_tol+'</td>'+
								'<td>'+data[i].biaya_lain+'</td>'+
                                '<td style="text-align:right;">'+
                                    '<a href="javascript:;" class="btn btn-success btn-xs item_edit" data="'+data[i].idongkir+'" title="Edit"><i class="fa fa-edit"></i></a>'+' '+
                                    <?php if($this->session->userdata('levelapps')=='administrator') { ?>
									'<a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="'+data[i].idongkir+'" title="Hapus"><i class="fa fa-trash"></i></a>'+
									<?php } ?>
								'</td>'+
                                '</tr>';
                    }
                    $('#show_data').html(html);
                }
 
            });
        }
 
        //GET UPDATE
        $('#show_data').on('click','.item_edit',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url('index.php/apps/setting/ongkir/get_Data_by_id')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $.each(data,function(id,satuan,aktif,kode,material){
                        $('#ModalaEdit').modal('show');
                        $('[name="asal"]').val(data.dari);						
						$('[name="tujuan"]').val(data.tujuan);  
						$('[name="km"]').val(data.km); 
						$('[name="transport"]').val(data.biaya_transport); 
						$('[name="asdp"]').val(data.biaya_asdp);  
                        $('[name="idongkir"]').val(data.idongkir);
						$('[name="tol"]').val(data.biaya_tol);
						$('[name="lain"]').val(data.biaya_lain);
						$('[name="driver"]').val(data.jasa_driver);
						
                    });
                }
            });
            return false;
        });
 
 
        // Tampil Hapus
        $('#show_data').on('click','.item_hapus',function(){
            var id=$(this).attr('data');
            $('#ModalHapus').modal('show');
            $('[name="kode"]').val(id);
        });
 
        //Simpan Data
        $('#btn_simpan').on('click',function(){
            var dari=$('#textasal').val();
			var tujuan=$('#texttujuan').val();
			var km=$('#textkm').val();
			var driver=$('#textdriver').val();
			var transport=$('#texttransport').val();
			var asdp=$('#textasdp').val();
			var tol=$('#texttol').val();
			var lain=$('#textlain').val();
			
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/apps/setting/ongkir/add')?>",
                dataType : "JSON",
                data : {dari:dari, tujuan:tujuan, km:km,driver:driver,transport:transport,asdp:asdp,tol:tol,lain:lain},
                success: function(data){
					if (data.code == "200"){
                    $('[name="sasal"]').val("");	
					$('[name="stujuan"]').val("");	
					$('[name="skm"]').val("");	
					$('[name="sdriver"]').val("");
					$('[name="stransport"]').val("");	
					$('[name="sasdp"]').val("");
					$('[name="stol"]').val("");
					$('[name="slain"]').val("");
                    $('#ModalaAdd').modal('hide');
					
					 tampil_data_barang();
					
					 } else {
						 
					$(".display-error").html("<ul>"+data.msg+"</ul>");

                    $(".display-error").css("display","block");
	 
					 }
                   
                }
            });
            return false;
        });
 
        //Update Data
        $('#btn_update').on('click',function(){
			var id=$('#tid').val();
            var dari=$('#tasal').val();
			var tujuan=$('#ttujuan').val();
			var km=$('#tkm').val();
			var driver=$('#tdriver').val();
			var transport=$('#ttransport').val();
			var asdp=$('#tasdp').val();
			var tol=$('#ttol').val();
			var lain=$('#tlain').val();
			
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/apps/setting/ongkir/update')?>",
                dataType : "JSON",
                data : {id:id, dari:dari, tujuan:tujuan, km:km, driver:driver, transport:transport, asdp:asdp, tol:tol,lain:lain},
                success: function(data){
                    $('[name="idongkir"]').val("");
                    $('[name="asal"]').val("");                    
					$('[name="tujuan"]').val("");
					$('[name="driver"]').val("");
					$('[name="transport"]').val("");
					$('[name="asdp"]').val("");
					$('[name="tol"]').val("");
					$('[name="lain"]').val("");
					$('[name="km"]').val("");
                    $('#ModalaEdit').modal('hide');
                    tampil_data_barang();
                }
            });
            return false;
        });
 
        //Hapus Barang
        $('#btn_hapus').on('click',function(){
            var kode=$('#idkendaraan').val();
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/apps/setting/ongkir/hapus')?>",
            dataType : "JSON",
                    data : {kode: kode},
                    success: function(data){
                            $('#ModalHapus').modal('hide');
                            tampil_data_barang();
                    }
                });
                return false;
            });
 
    });
 
</script>