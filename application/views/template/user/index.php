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
                                        <div class="btn btn-primary" data-toggle="modal" data-target="#PrimaryModalhdbgcl">Tambah User </div>
                                    </div>

<table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="false" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                               <th data-field="id">ID</th>
                                                <th data-field="id">Nama Lengkap</th>
                                                <th data-field="name">Username</th>
                                                
                                                <th data-field="action">Tindakan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php foreach ($user as $row) { ?>
                                            <tr>
												<td><?=$row->id_user?></td>
                                                <td><?=$row->nama_lengkap?></td>
                                                <td><?=$row->nama_user?></td>
                                                
                                                <td class="datatable-ct"> 
												<div class="button-ap-list responsive-btn">
												<div class="btn-group btn-custom-groups btn-custom-groups-one btn-mg-b-10">
												<a href="" class="btn btn-danger" title="Hapus"><i class="fa fa-trash"></i> </a>
												<a data-toggle="modal" data-target="#exampleModal" data-whatever="<?=$row->id_user?>" class="btn btn-success" title="Edit"> <i class="fa fa-edit"></i>  </a>
												</div>
												</div>
                                                </td>
                                            </tr>
										<?php } ?>
											</tbody>
											</table>
											
								 </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
		<!--- Modal -->
		 <div id="PrimaryModalhdbgcl" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
				<form action="<?=base_url()?>apps/setting/user/add" method="post">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header header-color-modal bg-color-1">
                                        <h4 class="modal-title"> Tambah User Baru </h4>
                                        <div class="modal-close-area modal-close-df">
                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                       <div class="all-form-element-inner">
                                                
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Nama</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" class="form-control" name="nama"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Username </label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" class="form-control" name="username"/>
                                                            </div>
                                                        </div>
                                                    </div>
													<div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Password  </label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="password" class="form-control" name="password" />
                                                            </div>
                                                        </div>
                                                    </div>
													
													
													
											</div>
								    </div>
                                    <div class="modal-footer">
                                        <button data-dismiss="modal"  class="btn btn-danger">Batal</button>
									    <button type="submit" name="save" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </div>
						</form>	
                    </div>
					
					

	<script>
    $('#exampleModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'id=' + recipient;
 
            $.ajax({
                type: "GET",
                url: "<?=base_url()?>apps/setting/user/get_Modal",
                data: dataString,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal.find('.dash').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });  
    })
 </script>
 
 
 <!-- Modal  Edit -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="memberModalLabel">Edit User</h4>
            </div>
            <div class="dash">
             <!-- Content goes in here -->
            </div>
        </div>
    </div>
</div>