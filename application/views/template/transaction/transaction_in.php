 
<form action="<?php echo base_url('index.php/apps/transaction/warehouse/simpan_transaksi_masuk')?>" method="post">
<div class="row">

 <div class="col-lg-12">  <?=$this->session->flashdata('sukses');?>  </div> 
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12" >
        <div class="sparkline13-list" style="background-color:#f6e58d; border-left:3px  solid #f9ca24">
			
			<div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1> <i class="fa fa-arrow-circle-right"></i> Material  Masuk </h1>
                                </div>
                            </div>
							
			
                                                        <div class="row">
                                                             <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
																	No Transaksi
                                                                    <input name="notransaksi" type="text" class="form-control" readonly value="BJP/IN/<?php echo $kode_masuk;?>">
                                                                </div>
                                                                <div class="form-group">
																	Tanggal Transaksi
                                                                    <input name="tgltransaksi" readonly value="<?=date('Y-m-d');?>" id="finish" type="text" class="form-control">
                                                                </div>
                                                                <div class="form-group">
																	Supplier
                                                                    <input name="supplier" type="text" id="supplier"  value="<?=$this->session->userdata('supplier')?>" required class="form-control" tabindex="1">
                                                                </div>
                                                                
                                                                
                                                                
                                                            
                                                                <div class="form-group res-mg-t-15">
																	Nomor Polisi
                                                                    <input name="nopol" type="text" id="cek" required value="<?=$this->session->userdata('nopol')?>" class="form-control" tabindex="2">
                                                                </div>
                                                                <div class="form-group">
																	Nama Driver
                                                                    <input name="driver" type="text" id="cek"  required class="form-control"value="<?=$this->session->userdata('driver')?>"  tabindex="3">
                                                                </div>
                                                                <div class="form-group">
																	Catatan
                                                                    <textarea name="catatan" class="form-control" tabindex="4"><?=$this->session->userdata('catatan')?></textarea>
                                                                </div>
                                                               
                                                           </div>
                                                        </div>
                                                        
                                                   
						
			</div>
	</div>
	
	
	
	 <div class="col-lg-9 col-md-6 col-sm-6 col-xs-12">
        <div class="sparkline13-list">			
			<div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h4> <i class="fa fa-th"></i> Input Material </h4>
                                </div>
                            </div>
							
												<div class="alert alert-danger display-error" style="display: none"> </div>
                                                    <div class="row">
													
													 <form>
														 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="form-group">
														Masukan Kode Material :
														<div class="input-group">
														<input type="text" name="str" placeholder="Ketik atau Scan Barcode" id="str" autofocus class=" autocomplete form-control">
														<span class="input-group-btn">
														<button class="btn btn-default btn-sm" type="button"  id="lets_search">Go</button> 
														</span>
														</div>
													    </div>
														</div>
														</form>
														
														<form role="form" id="contactForm" class="contact-form" data-toggle="validator" class="shake">
														
                                                                <input  type="hidden" name="sharga" id="textharga" tabindex="6" type="text" class="form-control" >
                                                                
																<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
																	Nama Material
                                                                    <input name="nama_material" id="textnama" type="text" class="form-control" disabled>
                                                                </div>
																</div>
																<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
																	Satuan
                                                                    <input name="satuan" id="textsatuan" type="text" class="form-control" disabled>
                                                                </div>
																</div>
																
																
																<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
																	Volume
																	<input name="sid" id="textid" type="hidden">
																	<div class="input-group custom-go-button">
                                                                        <input name="svolume" id="textvolume" onkeypress="return goodchars(event,'0123456789.',this)"  tabindex="7" type="text" class="form-control">
                                                                    <span class="input-group-btn"><button class="btn btn-sm btn-primary" id="btn_simpan"><i class="fa fa-plus"></i></button></span>
                                                                </div>
                                                                
                                                                </div>
																</div>
																
																                                                              
                                                                
                                                            </div>
														</form>
								
									<h4> <i class="fa fa-th"></i> List Data </h4>
								<div class="static-table-list table-responsive">
                                    <table  id="mydata" class="table table-bordered table-condensed table-hover" >
                                        <thead>
                                            <tr styl="background-color:#0984e3; color:white">
                                               
                                                <th>Kode Material</th>
                                                <th>Material</th>
                                                <th>Satuan</th>												
                                                <th>Volume</th>                                               
												<th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="show_data">
										 
									</tbody>
                                    </table>
                                </div>
								
								<br>
                                                           
                                                          <div class="row">
														
														 <div class="col-lg-4 col-sm-6 col-md-4 col-xs-12">
                                                                
                                                                 <a href="<?=base_url()?>index.php/apps/transaction/warehouse/report_in" class="btn btn-info  btn-block" > <i class="fa fa-th"></i> View Data</a>
                                                               
                                                            </div>
															
                                                            <div class="col-lg-4 col-sm-6 col-md-4 col-xs-12">
                                                                
                                                                    <button type="submit" name="batal" class="btn btn-warning  btn-block" > Cancel </button>
                                                               
                                                            </div>
															 <div class="col-lg-4 col-sm-6 col-md-4 col-xs-12">
                                                                
                                                                    <button type="submit" name="simpan" id="btn-submit"  class="btn btn-primary  btn-block">Received</button>
                                                                
                                                            </div>
                                                        </div>
                                                    
						
			</div>
	</div>
	
</form>	
	
	<!--MODAL HAPUS-->
        <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Item</h4>
                    </div>
                    <form class="form-horizontal">
                    <div class="modal-body">
                                           
                            <input type="hidden" name="kode" id="iddetil" value="">
							<input type="hidden" name="type" id="type" value="in">
                            <div class="alert alert-warning"><p>Apakah Anda yakin ingin menghapus Material ini?</p></div>
                                         
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
                url   : '<?php echo base_url()?>index.php/apps/transaction/warehouse/view_Data_in',
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
					var total=0;
                    for(i=0; i<data.length; i++){
						total+=data[i].harga_satuan * data[i].volume;
                        html += '<tr>'+
                                '<td>'+data[i].kode_material+'</td>'+                     
                                '<td>'+data[i].nama_material+'</td>'+   
								'<td>'+data[i].satuan+'</td>'+  						    
								'<td>'+data[i].volume+'</td>'+							
                                '<td style="text-align:center;">'+
                                    '<a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="'+data[i].iddetail+'" title="Hapus"><i class="fa fa-times"></i></a>'+
                                '</td>'+
                                '</tr>';
                    }
					
					
					
                    $('#show_data').html(html);
                }
 
            });
        }
 
        
 
 
        // Tampil Hapus
        $('#show_data').on('click','.item_hapus',function(){
            var id=$(this).attr('data');
            $('#ModalHapus').modal('show');
            $('[name="kode"]').val(id);
        });
 
        //Simpan Data
        $('#btn_simpan').on('click',function(){
            var harga=$('#textharga').val();
			var kode=$('#textid').val();
			var volume=$('#textvolume').val();
			var kodematerial=$('#str').val();
			var nama=$('#textnama').val();
			var satuan=$('#textsatuan').val();
			
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/apps/transaction/warehouse/add_Detail_In')?>",
                dataType : "JSON",
                data : {harga:harga, kode:kode, volume:volume, kodematerial:kodematerial, nama:nama, satuan:satuan},
                success: function(data){
					if (data.code == "200"){
						
                    $('[name="sharga"]').val("");	
					$('[name="str"]').val("");	
					$('[name="svolume"]').val("");	
					$('[name="nama_material"]').val("");	
					$('[name="satuan"]').val("");	
					$('[name="sid"]').val("");
                //    $('#ModalaAdd').modal('hide');
				$(".display-error").css("display","none");

                } else {

                    $(".display-error").html("<ul>"+data.msg+"</ul>");

                    $(".display-error").css("display","block");

                }
                    tampil_data_barang();
                }
            });
            return false;
        });
 
        
 
        //Hapus Barang
        $('#btn_hapus').on('click',function(){
            var kode=$('#iddetil').val();
			var type=$('#type').val();
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/apps/transaction/warehouse/hapus')?>",
            dataType : "JSON",
                    data : {kode: kode,type:type},
                    success: function(data){
                            $('#ModalHapus').modal('hide');
                            tampil_data_barang();
                    }
                });
                return false;
            });
 
    });
 
</script>


    <script type='text/javascript'>
	
        var site = "<?php echo site_url();?>";
        $(function(){
            $('.autocomplete').autocomplete({
                // serviceUrl berisi URL ke controller/fungsi yang menangani request kita
                serviceUrl: site+'/index.php/apps/transaction/warehouse/search_Auto_Material',
                // fungsi ini akan dijalankan ketika user memilih salah satu hasil request
				autoFocus:true,
                onSelect: function (suggestion) {
                    $('#textnama').val(''+suggestion.nim); // membuat id 'v_nim' untuk ditampilkan
                    $('#textharga').val(''+suggestion.jurusan); // membuat id 'v_jurusan' untuk ditampilkan
					$('#textsatuan').val(''+suggestion.satuan); // membuat id 'v_jurusan' untuk ditampilkan
					$('#textid').val(''+suggestion.id); // membuat id 'v_jurusan' untuk ditampilkan
                }
            });
        });
    </script>

<script type="text/javascript">
      $(document).ready(function() {
        $("#lets_search").on('click',function(e) {
		  e.preventDefault();
          var kode = $('#str').val();
		  
		  $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/apps/transaction/warehouse/Search_Data_Barcode_Reader')?>",
            dataType : "JSON",
			data     : {kode:kode},           
			success   : function(data){
				$.each(data,function(id,satuan,aktif,kode,material){
				if (data.code == "200"){
				
                    $('#textnama').val(''+data.msg.nim); // membuat id 'v_nim' untuk ditampilkan
                    $('#textharga').val(''+data.msg.jurusan); // membuat id 'v_jurusan' untuk ditampilkan
					$('#textsatuan').val(''+data.msg.satuan); // membuat id 'v_jurusan' untuk ditampilkan
					$('#textid').val(''+data.msg.id); // membuat id 'v_jurusan' untuk ditampilkan
					$('#textqty').val(''+data.msg.qty);
					$('#textkode').val(''+data.msg.value);
					$(".display-error").css("display","none");
				
				
				} else {
					
					$(".display-error").html("<ul>"+data.msg+"</ul>");

                    $(".display-error").css("display","block");
					
					$('[name="sharga"]').val("");	
					$('[name="skode"]').val("");	
					$('[name="svolume"]').val("");	
					$('[name="nama_material"]').val("");	
					$('[name="satuan"]').val("");	
					$('[name="sid"]').val("");
					$('[name="sqty"]').val("");					
					$('[name="ssource"]').val("");
					
				}
				
				});
			}
           });
           return false;
        });
      });
    </script>
