<div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1> Group Property </h1>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
                                        <div class="btn btn-primary" data-toggle="modal" data-target="#ModalaAdd">Tambah Group </div>
                                    </div>
								<div id="reload">	
								<table  id="mydata" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="false" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                       
									<thead>
										<tr>
                                            <th>ID Group</th>
                                            <th>Nama Group Property</th>	
											<th>Alamat</th>	
											<th>Luas Tanah (M2) </th>												
											<th>Aktif </th>
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
                <h3 class="modal-title" id="myModalLabel">Tambah Group</h3>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" > Nama Property  </label>
                        <div class="col-xs-9">
                            <input name="snama" id="textnama" class="form-control" type="text" placeholder="Nama Perumahan"  required>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="control-label col-xs-3" > Alamat </label>
                        <div class="col-xs-9">
                            <textarea name="salamat" id="textalamat" class="form-control"  placeholder="Alamat"  required></textarea>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="control-label col-xs-3" > Luas Tanah (M2) </label>
                        <div class="col-xs-9">
                            <input name="sluas" id="textluas" class="form-control" type="text" placeholder="Luas Tanah"  required>
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
                <h3 class="modal-title" id="myModalLabel">Edit Group </h3>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">
					<div class="form-group">
					 
                        
						  <input name="id" id="tid" class="form-control" type="hidden" placeholder="">
                            
                        
                    <div class="form-group">
                        <label class="control-label col-xs-3"> Nama Property </label>
						
                        <div class="col-xs-9">						 
                            <input name="group_rumah" id="tnama" class="form-control" type="text" placeholder="Nama Material">
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="control-label col-xs-3" > Alamat </label>
                        <div class="col-xs-9">
                            <textarea name="alamat" id="talamat" class="form-control"  placeholder="Alamat"  required></textarea>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="control-label col-xs-3"> Luas Tanah (M2) </label>
						
                        <div class="col-xs-9">						 
                            <input name="luas_tanah" id="tluas" class="form-control" type="text" placeholder="Luas Tanah">
                        </div>
                    </div>
					
					
					<div class="form-group">
                        <label class="control-label col-xs-3" >Aktif</label>
                        <div class="col-xs-9">
							<select name="aktif" class="form-control" id="taktif" required>
							<option value="">Pilih</option>
							<option value="1">Yes</option>
							<option value="0">No </option>						
							</select>
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
                        <h4 class="modal-title" id="myModalLabel">Hapus Property</h4>
                    </div>
                    <form class="form-horizontal">
                    <div class="modal-body">
                                           
                            <input type="hidden" name="kode" id="textkode" value="">
                            <div class="alert alert-warning"><p>Apakah Anda yakin ingin menghapus Property ini?</p></div>
                                         
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
                url   : '<?php echo base_url()?>index.php/apps/master/group_property/view_Data',
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].idgroup+'</td>'+                     
                                '<td>'+data[i].group_rumah+'</td>'+   
								'<td>'+data[i].alamat+'</td>'+ 
								'<td>'+data[i].luas_tanah+'</td>'+ 
							    '<td>'+data[i].aktif+'</td>'+
                                '<td style="text-align:right;">'+
                                    '<a href="javascript:;" class="btn btn-success btn-xs item_edit" data="'+data[i].idgroup+'" title="Edit"><i class="fa fa-edit"></i></a>'+' '+
                                    <?php if($this->session->userdata('level')=='administrator') { ?>
									'<a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="'+data[i].idgroup+'" title="Hapus"><i class="fa fa-trash"></i></a>'+
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
                url  : "<?php echo base_url('index.php/apps/master/group_property/get_Data_by_id')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $.each(data,function(id,idgroup,group_rumah,alamat,luas_tanah){
                        $('#ModalaEdit').modal('show');
                        $('[name="group_rumah"]').val(data.group_rumah);						
						$('[name="aktif"]').val(data.aktif);  
						$('[name="alamat"]').val(data.alamat); 
						$('[name="luas_tanah"]').val(data.luas_tanah);  
                        $('[name="id"]').val(data.idgroup);
						
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
            var nama=$('#textnama').val();
			var alamat=$('#textalamat').val();
			var luas=$('#textluas').val();
			
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/apps/master/group_property/add')?>",
                dataType : "JSON",
                data : {nama:nama, alamat:alamat, luas:luas},
                success: function(data){
                    $('[name="snama"]').val("");	
					$('[name="salamat"]').val("");	
					$('[name="sluas"]').val("");	
                    $('#ModalaAdd').modal('hide');
                    tampil_data_barang();
                }
            });
            return false;
        });
 
        //Update Data
        $('#btn_update').on('click',function(){
            var id=$('#tid').val();
            var alamat=$('#talamat').val();
            var aktif=$('#taktif').val();
			var luas=$('#tluas').val();
			var nama=$('#tnama').val();
			
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/apps/master/group_property/update')?>",
                dataType : "JSON",
                data : {id:id, alamat:alamat, nama:nama, luas:luas, aktif:aktif},
                success: function(data){
                    $('[name="tid"]').val("");
                    $('[name="tnama"]').val("");                    
					$('[name="taktif"]').val("");
					$('[name="tluas"]').val("");
					$('[name="talamat"]').val("");
                    $('#ModalaEdit').modal('hide');
                    tampil_data_barang();
                }
            });
            return false;
        });
 
        //Hapus Barang
        $('#btn_hapus').on('click',function(){
            var kode=$('#textkode').val();
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/apps/master/group_property/hapus')?>",
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