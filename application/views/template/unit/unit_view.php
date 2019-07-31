<div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1> Data Driver  </h1>
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
                                            <th>Nama Driver</th>
											<th>NRP</th>
											<th>Email</th>
                                            <th>Ada NPWP?</th>	
											<th>Bank</th>	
											<th>No. Rekening</th>	
											<th>Atas Nama </th>												
											
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
                <h3 class="modal-title" id="myModalLabel">Tambah Driver</h3>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" > Nama Driver  </label>
                        <div class="col-xs-9">
                            <input name="snama" id="textnama" class="form-control" type="text" required>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="control-label col-xs-3" > NRP  </label>
                        <div class="col-xs-9">
                            <input name="stype" id="texttype" class="form-control" type="text" required>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="control-label col-xs-3" > Email  </label>
                        <div class="col-xs-9">
                            <input name="semail" id="textemail" class="form-control" type="email" required>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="control-label col-xs-3" > Memiliki NPWP? </label>
                        <div class="col-xs-9">
						<select name="sgroup" class="form-control" id="textgroup" required>
							<option value="">Pilih</option>
							<?php 
							$data=array('Y','N');
							foreach ($data as $y) : 
							echo "<option value='".$y."'>$y</option>	";
							endforeach; ?>
							</select>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="control-label col-xs-3" > Bank  </label>
                        <div class="col-xs-9">
                            <input name="sbank" id="textbank" class="form-control" type="text"   required>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="control-label col-xs-3" > Nomor Rekening </label>
                        <div class="col-xs-9">
                            <input name="sluas" id="textluas" class="form-control" type="text"  required>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="control-label col-xs-3" > Atas Nama </label>
                        <div class="col-xs-9">
                            <input name="sbangunan" id="textbangunan" class="form-control" type="text"   required>
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
                <h3 class="modal-title" id="myModalLabel">Edit Driver </h3>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">
					
						  <input name="id" id="tid" class="form-control" type="hidden">
                            
                        
                    <div class="form-group">
                        <label class="control-label col-xs-3"> Nama Driver </label>
						
                        <div class="col-xs-9">						 
                            <input name="nama" id="tnama" class="form-control" type="text" >
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="control-label col-xs-3" > NRP  </label>
                        <div class="col-xs-9">
                            <input name="nrp" id="tnrp" class="form-control" type="text" required>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="control-label col-xs-3" > Email  </label>
                        <div class="col-xs-9">
                            <input name="email" id="temail" class="form-control" type="text" required>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="control-label col-xs-3" > Memiliki NPWP? </label>
                        <div class="col-xs-9">
						<select name="group" class="form-control" id="tgroup" required>
							<option value="">Pilih</option>
							<?php 
							$data=array('Y','N');
							foreach ($data as $y) : 
							echo "<option value='".$y."'>$y</option>	";
							endforeach; ?>
							</select>
                        </div>
                    </div>
					 <div class="form-group">
                        <label class="control-label col-xs-3"> Bank </label>
						
                        <div class="col-xs-9">						 
                            <input name="type" id="ttype" class="form-control" type="text" >
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="control-label col-xs-3"> Nomor Rekening </label>
						
                        <div class="col-xs-9">						 
                            <input name="luas" id="tluas" class="form-control" type="text" >
                        </div>
                    </div>
					<div class="form-group">
                        <label class="control-label col-xs-3"> Atas Nama </label>
						
                        <div class="col-xs-9">						 
                            <input name="bangunan" id="tbangunan" class="form-control" type="text" >
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
                        <h4 class="modal-title" id="myModalLabel">Hapus Driver</h4>
                    </div>
                    <form class="form-horizontal">
                    <div class="modal-body">
                                           
                            <input type="hidden" name="kode" id="textkode" value="">
                            <div class="alert alert-warning"><p>Apakah Anda yakin ingin menghapus Driver ini?</p></div>
                                         
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
                url   : '<?php echo base_url()?>index.php/apps/master/unit/view_Data',
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                  
								'<td>'+data[i].nama+'</td>'+ 
                                '<td>'+data[i].nrp+'</td>'+  
								'<td>'+data[i].email+'</td>'+
								'<td>'+data[i].npwp+'</td>'+ 
								'<td>'+data[i].bank+'</td>'+
								'<td>'+data[i].norek+'</td>'+	
								'<td>'+data[i].atasnama+'</td>'+ 
                                '<td style="text-align:right;">'+
                                    '<a href="javascript:;" class="btn btn-success btn-xs item_edit" data="'+data[i].iddriver+'" title="Edit"><i class="fa fa-edit"></i></a>'+' '+
                                    <?php if($this->session->userdata('levelapps')=='administrator') { ?>
									'<a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="'+data[i].iddriver+'" title="Hapus"><i class="fa fa-trash"></i></a>'+
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
                url  : "<?php echo base_url('index.php/apps/master/unit/get_Data_by_id')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $.each(data,function(id,idgroup,idunit,type_unit, nama_unit,luas_unit, luas_bangunan){
                        $('#ModalaEdit').modal('show');
                        $('[name="group"]').val(data.npwp);						
						$('[name="bangunan"]').val(data.atasnama);  
						$('[name="nama"]').val(data.nama); 
						$('[name="type"]').val(data.bank);
						$('[name="nrp"]').val(data.nrp);
						$('[name="email"]').val(data.email);
						$('[name="luas"]').val(data.norek);
                        $('[name="id"]').val(data.iddriver);
						
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
			var bangunan=$('#textbangunan').val();
			var type=$('#texttype').val();
			var group=$('#textgroup').val();
			var email=$('#textemail').val();
			var luas=$('#textbank').val();
			var norek=$('#textluas').val();
			
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/apps/master/unit/add')?>",
                dataType : "JSON",
                data : {nama:nama, bangunan:bangunan, email:email, luas:luas, type:type, group:group,norek:norek},
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
            var bank=$('#ttype').val();
            var nrp=$('#tnrp').val();
			var norek=$('#tluas').val();
			var atasnama=$('#tbangunan').val();
			var npwp=$('#tgroup').val();
			var nama=$('#tnama').val();
			var email=$('#temail').val();
			
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/apps/master/unit/update')?>",
                dataType : "JSON",
                data : {id:id, bank:bank, nama:nama, nrp:nrp, email:email, norek:norek, npwp:npwp, bank:bank,atasnama:atasnama},
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
            url  : "<?php echo base_url('index.php/apps/master/unit/hapus')?>",
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