<div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1> Data Customer  </h1>
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
                                            <th>CMD</th>
											<th>Customer</th>
											<th>Cabang</th>                                            
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
                <h3 class="modal-title" id="myModalLabel">Tambah Customer</h3>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" > CMD  </label>
                        <div class="col-xs-9">
                            <input name="snama" id="textnama" class="form-control" type="text" required>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="control-label col-xs-3" > Customer  </label>
                        <div class="col-xs-9">
                            <input name="stype" id="texttype" class="form-control" type="text" required>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="control-label col-xs-3" > Cabang  </label>
                        <div class="col-xs-9">
                            <input name="semail" id="textemail" class="form-control" type="email" required>
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
                <h3 class="modal-title" id="myModalLabel">Edit Customer </h3>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">
					
						  <input name="id" id="tid" class="form-control" type="hidden">
                            
                        
                    <div class="form-group">
                        <label class="control-label col-xs-3"> CMD </label>
						
                        <div class="col-xs-9">						 
                            <input name="nama" id="tnama" class="form-control" type="text" >
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="control-label col-xs-3" > Customer  </label>
                        <div class="col-xs-9">
                            <input name="nrp" id="tnrp" class="form-control" type="text" required>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="control-label col-xs-3" > Cabang  </label>
                        <div class="col-xs-9">
                            <input name="email" id="temail" class="form-control" type="text" required>
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
                        <h4 class="modal-title" id="myModalLabel">Hapus Customer</h4>
                    </div>
                    <form class="form-horizontal">
                    <div class="modal-body">
                                           
                            <input type="hidden" name="kode" id="textkode" value="">
                            <div class="alert alert-warning"><p>Apakah Anda yakin ingin menghapus Customer ini?</p></div>
                                         
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
                url   : '<?php echo base_url()?>index.php/apps/master/customer/view_Data',
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                  
								'<td>'+data[i].cmd+'</td>'+ 
                                '<td>'+data[i].customer+'</td>'+  
								'<td>'+data[i].cabang+'</td>'+
								
                                    ' <td> <a href="javascript:;" class="btn btn-success btn-xs item_edit" data="'+data[i].idcustomer+'" title="Edit"><i class="fa fa-edit"></i></a>'+' '+
                                    <?php if($this->session->userdata('levelapps')=='administrator') { ?>
									'<a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="'+data[i].idcustomer+'" title="Hapus"><i class="fa fa-trash"></i></a>'+
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
                url  : "<?php echo base_url('index.php/apps/master/customer/get_Data_by_id')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $.each(data,function(id,idgroup,idunit,type_unit, nama_unit,luas_unit, luas_bangunan){
                        $('#ModalaEdit').modal('show');                         
						$('[name="nama"]').val(data.cmd); 					
						$('[name="nrp"]').val(data.customer);
						$('[name="email"]').val(data.cabang);						
                        $('[name="id"]').val(data.idcustomer);
						
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
            var cmd=$('#textnama').val();			
			var customer=$('#texttype').val();			
			var cabang=$('#textemail').val();			
			
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/apps/master/customer/add')?>",
                dataType : "JSON",
                data : {cmd:cmd, customer:customer, cabang:cabang},
                success: function(data){
                    $('[name="snama"]').val("");
					$('[name="semail"]').val("");
					$('[name="sbangunan"]').val("");	
					$('[name="stype"]').val("");	
					$('[name="sgroup"]').val("");	
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
            var customer=$('#tnrp').val();			
			var cmd=$('#tnama').val();
			var cabang=$('#temail').val();
			
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/apps/master/customer/update')?>",
                dataType : "JSON",
                data : {id:id, cabang:cabang, cmd:cmd, customer:customer},
                success: function(data){
                    $('[name="tid"]').val("");
                    $('[name="tnama"]').val("");                    
					$('[name="taktif"]').val("");
					$('[name="tluas"]').val("");
					$('[name="tbangunan"]').val("");
					$('[name="email"]').val("");
					$('[name="ttype"]').val("");
					$('[name="tgroup"]').val("");
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
            url  : "<?php echo base_url('index.php/apps/master/customer/hapus')?>",
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