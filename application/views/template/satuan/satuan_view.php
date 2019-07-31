<div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1> Data BBM (Bahan Bakar Minyak) </h1>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
                                        <div class="btn btn-primary" data-toggle="modal" data-target="#ModalaAdd">Tambah BBM </div>
                                    </div>
								<div id="reload">	
								<table  id="mydata" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="false" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                       
									<thead>
										<tr>
                                           
                                            <th>Nama BBM</th>											
											<th>Harga</th>
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
                <h3 class="modal-title" id="myModalLabel">Tambah BBM</h3>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" > Nama BBM </label>
                        <div class="col-xs-9">
                            <input name="ssatuan" id="textsatuan" class="form-control" type="text" placeholder="Nama BBM"  required>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="control-label col-xs-3" > Harga BBM </label>
                        <div class="col-xs-9">
                            <input name="sharga" id="textharga" class="form-control" type="text" placeholder="Harga BBM"  required>
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
                <h3 class="modal-title" id="myModalLabel">Edit BBM </h3>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">
				
						  <input name="id" id="tid" class="form-control" type="hidden" placeholder="" >
                            
                      
                    <div class="form-group">
                        <label class="control-label col-xs-3"> Nama BBM </label>
						
                        <div class="col-xs-9">						 
                            <input name="satuan" id="tsatuan" class="form-control" type="text" placeholder="Nama BBM">
                        </div>
                    </div>	

					<div class="form-group">
                        <label class="control-label col-xs-3"> Harga BBM </label>
						
                        <div class="col-xs-9">						 
                            <input name="harga" id="tharga" class="form-control" type="text" placeholder="Harga">
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
                        <h4 class="modal-title" id="myModalLabel">Hapus BBM</h4>
                    </div>
                    <form class="form-horizontal">
                    <div class="modal-body">
                                           
                            <input type="hidden" name="kode" id="textkode" value="">
                            <div class="alert alert-warning"><p>Apakah Anda yakin ingin menghapus BBM ini?</p></div>
                                         
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
                url   : '<?php echo base_url()?>index.php/apps/master/satuan/view_data',
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+                                                    
                                '<td>'+data[i].bbm+'</td>'+                              
							    '<td>'+data[i].harga+'</td>'+
                                '<td style="text-align:right;">'+
                                    '<a href="javascript:;" class="btn btn-success btn-xs item_edit" data="'+data[i].idbbm+'" title="Edit"><i class="fa fa-edit"></i></a>'+' '+
                                    <?php if($this->session->userdata('levelapps')=='administrator') { ?>
									'<a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="'+data[i].idbbm+'" title="Hapus"><i class="fa fa-trash"></i></a>'+
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
                url  : "<?php echo base_url('index.php/apps/master/satuan/get_data_by_id')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $.each(data,function(idsatuan,satuan,aktif){
                        $('#ModalaEdit').modal('show');
                        $('[name="satuan"]').val(data.bbm);						
						$('[name="harga"]').val(data.harga);                       
                        $('[name="id"]').val(data.idbbm);
						
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
            var satuan=$('#textsatuan').val();
			var harga=$('#textharga').val();
			
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/apps/master/satuan/add')?>",
                dataType : "JSON",
                data : {satuan:satuan,harga:harga},
                success: function(data){
                    $('[name="ssatuan"]').val("");	
					$('[name="sharga"]').val("");							
                    $('#ModalaAdd').modal('hide');
                    tampil_data_barang();
                }
            });
            return false;
        });
 
        //Update Data
        $('#btn_update').on('click',function(){
            var id=$('#tid').val();
            var satuan=$('#tsatuan').val();
            var aktif=$('#tharga').val();
			
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/apps/master/satuan/update')?>",
                dataType : "JSON",
                data : {id:id, satuan:satuan, aktif:aktif},
                success: function(data){
                    $('[name="tid"]').val("");
                    $('[name="satuan"]').val("");                    
					$('[name="harga"]').val("");					
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
            url  : "<?php echo base_url('index.php/apps/master/satuan/hapus')?>",
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