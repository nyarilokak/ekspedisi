<div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1> Data Kendaraan </h1>
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
                                            <th>Nomor Polisi</th>
                                            <th>Equipment</th>
											<th>Tipe </th>												
											<th>Silinder (CC)</th>												
											<th>BBM</th>												
											<th>Rasio</th>
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
                <h3 class="modal-title" id="myModalLabel">Tambah Kendaraan</h3>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">
				
				<div class="alert alert-danger display-error" style="display: none"> </div>
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" > Nomor Polisi </label>
                        <div class="col-xs-9">
                            <input name="skode" id="textkode" class="form-control" type="text"  required>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="control-label col-xs-3" > Equipment </label>
                        <div class="col-xs-9">
                            <input name="smaterial" id="textmaterial" class="form-control" type="text"   required>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="control-label col-xs-3" > Tipe  </label>
                        <div class="col-xs-9">
                            <input name="sqty" id="texttipe"   class="form-control" type="text"  required>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="control-label col-xs-3" > Silinder (CC)  </label>
                        <div class="col-xs-9">
                            <input name="scc" id="textcc"   class="form-control" type="text" onkeypress="return goodchars(event,'0123456789<>',this)" required>
                        </div>
                    </div>
					
					
					<div class="form-group">
                        <label class="control-label col-xs-3" > BBM </label>
                        <div class="col-xs-9">
						<select name="sjenis" class="form-control" id="textjenis" required>
							<option value="">Pilih</option>
							<?php foreach ($bbm as $row) : 
							echo "<option value='".$row->idbbm."'>$row->bbm => $row->harga</option>	";
							endforeach; ?>
							</select>
                        </div>
                    </div>		
					
					<div class="form-group">
                        <label class="control-label col-xs-3" > Rasio  </label>
                        <div class="col-xs-9">
                            <input name="srasio" id="textrasio" onkeypress="return goodchars(event,'0123456789',this)"  class="form-control" type="text"   required>
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
                <h3 class="modal-title" id="myModalLabel">Edit Kendaraan </h3>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">
					<div class="form-group">
					 <input name="id" id="tid" class="form-control" type="hidden">
                        <label class="control-label col-xs-3" > Nomor Polisi </label>
                        <div class="col-xs-9">
						  <input name="kode" id="tkode" class="form-control" type="text" Readonly>                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3"> Equipment </label>						
                        <div class="col-xs-9">						 
                            <input name="material" id="tmaterial" class="form-control" type="text" >
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="control-label col-xs-3"> Tipe </label>						
                        <div class="col-xs-9">						 
                            <input name="tipe" id="ttipe" class="form-control" type="text" >
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="control-label col-xs-3" > Silinder (CC) </label>
                        <div class="col-xs-9">
                            <input name="cc" id="tcc" onkeypress="return goodchars(event,'0123456789<>',this)"  class="form-control" type="text" placeholder="Quantity Stock Opname"  required>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="control-label col-xs-3" > BBM </label>
                        <div class="col-xs-9">
						<select name="jenis" class="form-control" id="tjenis" required>
							<option value="">Pilih</option>
							<?php foreach ($bbm as $row) : 
							echo "<option value='".$row->idbbm."'>$row->bbm => $row->harga </option>	";
							endforeach; ?>
							</select>
                        </div>
                    </div>	
					
					<div class="form-group">
                        <label class="control-label col-xs-3" > Rasio </label>
                        <div class="col-xs-9">
                            <input name="rasio" id="trasio" onkeypress="return goodchars(event,'0123456789',this)"  class="form-control" type="text" placeholder="Quantity Stock Opname"  required>
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
                        <h4 class="modal-title" id="myModalLabel">Hapus Kendaraan</h4>
                    </div>
                    <form class="form-horizontal">
                    <div class="modal-body">
                                           
                            <input type="hidden" name="kode" id="idkendaraan" value="">
                            <div class="alert alert-warning"><p>Apakah Anda yakin ingin menghapus Kendaraan ini?</p></div>
                                         
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
                url   : '<?php echo base_url()?>index.php/apps/master/material/view_Data',
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].nopol+'</td>'+                     
                                '<td>'+data[i].equipment+'</td>'+   
								'<td>'+data[i].tipe+'</td>'+  
								'<td>'+data[i].silinder+'</td>'+   								  
								'<td>'+data[i].bbm+'</td>'+   
							    '<td>'+data[i].rasio+'</td>'+
                                '<td style="text-align:right;">'+
                                    '<a href="javascript:;" class="btn btn-success btn-xs item_edit" data="'+data[i].idkendaraan+'" title="Edit"><i class="fa fa-edit"></i></a>'+' '+
                                    <?php if($this->session->userdata('levelapps')=='administrator') { ?>
									'<a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="'+data[i].idkendaraan+'" title="Hapus"><i class="fa fa-trash"></i></a>'+
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
                url  : "<?php echo base_url('index.php/apps/master/material/get_Data_by_id')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $.each(data,function(id,satuan,aktif,kode,material){
                        $('#ModalaEdit').modal('show');
                        $('[name="tipe"]').val(data.tipe);						
						$('[name="rasio"]').val(data.rasio);  
						$('[name="material"]').val(data.equipment); 
						$('[name="jenis"]').val(data.bbm); 
						$('[name="kode"]').val(data.nopol);  
                        $('[name="id"]').val(data.idkendaraan);
						$('[name="cc"]').val(data.silinder);
						
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
            var silinder=$('#textcc').val();
			var nopol=$('#textkode').val();
			var equipment=$('#textmaterial').val();
			var bbm=$('#textjenis').val();
			var tipe=$('#texttipe').val();
			var rasio=$('#textrasio').val();
			
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/apps/master/material/add')?>",
                dataType : "JSON",
                data : {tipe:tipe, nopol:nopol, equipment:equipment,bbm:bbm,rasio:rasio,silinder:silinder},
                success: function(data){
					if (data.code == "200"){
                    $('[name="ssatuan"]').val("");	
					$('[name="sjenis"]').val("");	
					$('[name="skode"]').val("");	
					$('[name="smaterial"]').val("");
					$('[name="scc"]').val("");	
					$('[name="srasio"]').val("");
					$('[name="sqty"]').val("");					
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
            var tipe=$('#ttipe').val();
            var silinder=$('#tcc').val();
			var nopol=$('#tkode').val();
			var bbm=$('#tjenis').val();
			var equipment=$('#tmaterial').val();
			var rasio=$('#trasio').val();
			
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/apps/master/material/update')?>",
                dataType : "JSON",
                data : {id:id, silinder:silinder, nopol:nopol, equipment:equipment, rasio:rasio, bbm:bbm, tipe:tipe},
                success: function(data){
                    $('[name="tid"]').val("");
                    $('[name="tipe"]').val("");                    
					$('[name="cc"]').val("");
					$('[name="jenis"]').val("");
					$('[name="material"]').val("");
					$('[name="kode"]').val("");
					$('[name="rasio"]').val("");
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
            url  : "<?php echo base_url('index.php/apps/master/material/hapus')?>",
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