<div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>User </h1>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
                                        <div class="btn btn-primary" data-toggle="modal" data-target="#ModalaAdd">Tambah User </div>
                                    </div>
								<div id="reload">	
								<table  id="mydata" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="false" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                       
									<thead>
										<tr>
                                           
                                            <th>Username</th>
											<th>Nama </th>
											<th>Department </th>
											<th>Email </th>
											<th>Level </th>
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
                <h3 class="modal-title" id="myModalLabel">Tambah User</h3>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">
			
				<div class="alert alert-danger display-error" style="display: none"> </div>
			
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama</label>
                        <div class="col-xs-9">
                            <input name="snama" id="textnama" class="form-control" type="text" placeholder="Nama Lengkap"  required>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="control-label col-xs-3" >Department</label>
                        <div class="col-xs-9">
                            <input name="sdept" id="textdept" class="form-control" type="text" placeholder="Department"  required>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="control-label col-xs-3" >Email</label>
                        <div class="col-xs-9">
                            <input name="semail" id="textemail" class="form-control" type="email" placeholder="Email"  required>
                        </div>
                    </div>
					
					
					
					<div class="form-group">
                        <label class="control-label col-xs-3" >level</label>
                        <div class="col-xs-9">
							<select name="slevel" class="form-control" id="textlevel" required>
							<option value="">Pilih</option>
							<option value="admin">Admin  </option>
							<option value="user">User </option>
							<option value="pdi">Pre Delivery Inspection </option>
							<option value="adh">ADH </option>	
							</select>
                            </div>
                    </div>
					
					
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Username</label>
                        <div class="col-xs-9">
                            <input name="suser" id="textuser" class="form-control" type="text" placeholder="User Login"  required>
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Password</label>
                        <div class="col-xs-9">
                            <input name="spassword" id="textpassword" class="form-control" type="password" placeholder="Password"  required>
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
                <h3 class="modal-title" id="myModalLabel">Edit User</h3>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">
					
						  <input name="id" id="tid" class="form-control" type="hidden" placeholder="" Readonly>     
							
					 <div class="form-group">
                        <label class="control-label col-xs-3" >Username</label>
                        <div class="col-xs-9">
                            <input name="username" id="tuser" class="form-control" type="text" placeholder="Username"  readonly>
                        </div>
                    </div>		
                       
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama </label>
                        <div class="col-xs-9">
						 
                            <input name="nama" id="tnama" class="form-control" type="text" placeholder="Nama Lengkap">
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="control-label col-xs-3" >Department</label>
                        <div class="col-xs-9">
                            <input name="dept" id="tdept" class="form-control" type="text" placeholder="Department"  required>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="control-label col-xs-3" >Email </label>
                        <div class="col-xs-9">
						 
                            <input name="email" id="temail" class="form-control" type="email" placeholder="Email">
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="control-label col-xs-3" >level</label>
                        <div class="col-xs-9">
							<select name="level" class="form-control" id="tlevel" required>
							<option value="">Pilih</option>
							<option value="administrator">Administrator</option>
							<option value="admin">Admin  </option>
							<option value="user">User </option>
							<option value="pdi">Pre Delivery Inspection </option>
							<option value="adh">ADH </option>							
							</select>
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
                        <h4 class="modal-title" id="myModalLabel">Hapus User</h4>
                    </div>
                    <form class="form-horizontal">
                    <div class="modal-body">
                                           
                            <input type="hidden" name="kode" id="textkode" value="">
                            <div class="alert alert-warning"><p>Apakah Anda yakin ingin menghapus user ini?</p></div>
                                         
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
                url   : '<?php echo base_url()?>index.php/apps/setting/user/view_user',
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                                    
                                '<td>'+data[i].username+'</td>'+
                                '<td>'+data[i].nama+'</td>'+
								'<td>'+data[i].dept+'</td>'+
								'<td>'+data[i].email+'</td>'+
								'<td>'+data[i].level+'</td>'+
							    '<td>'+data[i].aktif+'</td>'+
                                '<td style="text-align:right;">'+
                                    '<a href="javascript:;" class="btn btn-success btn-xs item_edit" data="'+data[i].iduser+'" title="Edit"><i class="fa fa-edit"></i></a>'+' '+
									<?php if($this->session->userdata('level')=='administrator') { ?> 
									'<a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="'+data[i].iduser+'" title="Hapus"><i class="fa fa-trash"></i></a>'+ 
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
                url  : "<?php echo base_url('index.php/apps/setting/user/get_user_by_id')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $.each(data,function(nama,email,level,aktif, username, iduser){
                        $('#ModalaEdit').modal('show');
                        $('[name="nama"]').val(data.nama);
						$('[name="level"]').val(data.level);
						$('[name="email"]').val(data.email);
						$('[name="dept"]').val(data.dept);
						$('[name="aktif"]').val(data.aktif);
                        $('[name="username"]').val(data.username);
                        $('[name="id"]').val(data.iduser);
						
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
			var email=$('#textemail').val();            
            var level=$('#textlevel').val();
			var dept=$('#textdept').val();
            var user=$('#textuser').val();
            var pwd=$('#textpassword').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/apps/setting/user/add')?>",
                dataType : "JSON",
                data : {nama:nama,email:email, dept:dept,level:level, user:user, pwd:pwd},
                success: function(data){
					if (data.code == "200"){
                    $('[name="snama"]').val("");
					 $('[name="sdept"]').val("");
					$('[name="semail"]').val("");
					$('[name="slevel"]').val("");
                    $('[name="suser"]').val("");
                    $('[name="spassword"]').val("");
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
            var user=$('#tuser').val();
            var nama=$('#tnama').val();
			var dept=$('#tdept').val();
			var email=$('#temail').val();
			var level=$('#tlevel').val();
			var aktif=$('#taktif').val();
			
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/apps/setting/user/update')?>",
                dataType : "JSON",
                data : {id:id, user:user, nama:nama, dept:dept, email:email, level:level, aktif:aktif},
                success: function(data){
                    $('[name="tid"]').val("");
                    $('[name="user"]').val("");
                    $('[name="nama"]').val("");
					 $('[name="dept"]').val("");
					$('[name="email"]').val("");
					$('[name="level"]').val("");
					$('[name="aktif"]').val("");					
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
            url  : "<?php echo base_url('index.php/apps/setting/user/hapus')?>",
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