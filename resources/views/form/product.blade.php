
@include('include.header')
@include('sweetalert::alert')
<style type="text/css">
	tr.MyDatatable > td.center{
		text-align: center;
	}
</style>
<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Form Input Product</h3>
			</div>
		</div>
		<div class="clearfix"></div>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addDataProduct">
		  	Add Data Product
		</button>
		<div class="row">
			<div class="col-md-12 col-sm-12 ">
				<div class="x_panel">
					<div class="x_title">
						<h2>View Data<small>Product</small></h2>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="row">
							<div class="col-sm-12">
								<div class="card-box table-responsive">
									<table id="datatable" class="table table-striped table-bordered dataSlider" style="width:100%">
										<thead>
											<tr>
												<th style="width: 5%;">No</th>
												<th>Kategori</th>
												<th>Product Name</th>
												<th>Images</th>
												<th>Publish Date</th>
												<th>Create By</th>
												<th>Create Date</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											@php $no = 1; @endphp
											@foreach($dataProduct as $key => $val)
											<tr class="MyDatatable">
												<td class="center">{{$no++}}</td>
												<td>{{$val->category_product}}</td>
												<td>{{$val->filename}}</td>
												<td style="width: 100px !important;"><img src="{{$val->path}}{{$val->images}}" style="width: 100%;"></td>
												<td>{{$val->publish_date}}</td>
												<td>{{$val->create_by}}</td>
												<td>{{$val->create_date}}</td>
												<td class="center" style="width: 15%;">
													{{-- <a href="" class="btn btn-primary editData" data-toggle="modal" data-target="#cok" data-id="{{$val->id}}"><i class="fa fa-pencil"></i></a> --}}
													<button type="button" class="btn btn-primary editData" data-toggle="modal" data-target="#modalEdit" data-id="{{$val->id}}" title="Edit Data"><i class="fa fa-pencil"></i></button>
													<button class="btn btn-danger deleteData" title="Delete Data" data-toggle="modal" data-target="#ModalDelete" data-id="{{encrypt($val->id)}}"><i class="fa fa-trash"></i></button>
												</td>
											</tr>
											@endforeach
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
</div>

<!-- Modal -->
<div class="modal fade" id="addDataProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Form Input<small> Data Product</small></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="{{route('saveDataProduct')}}" enctype="multipart/form-data">
				{!! csrf_field() !!}
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_content">
									<br />
									<div class="item form-group">
										<label class="col-form-label col-md-4 col-sm-4 label-align" for="first-name">Category Product <span class="required">*</span></label>
										<div class="col-md-8 col-sm-8 ">
											<select class="form-control" name="category_product">
												<option disabled selected>- Pilih Data Kategori -</option>
												@foreach($getDataCategory as $val)
												<option value="{{$val->id}}">{{$val->name_category}}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="item form-group">
										<label class="col-form-label col-md-4 col-sm-4 label-align" for="first-name">Product Name <span class="required">*</span></label>
										<div class="col-md-8 col-sm-8 ">
											<input type="text" id="first-name" required="required" class="form-control" name="filenameImage">
										</div>
									</div>
									<div class="item form-group">
										<label class="col-form-label col-md-4 col-sm-4 label-align" for="last-name">Images <span class="required">*</span></label>
										<div class="col-md-8 col-sm-8 ">
											<input type="file" id="last-name" name="filename" required="required" class="form-control" style="padding: 3px 5px;">
											<p style="color: #f00; margin-bottom: 0;">*) File Extension : .jpg, .png, .jpeg <br>
												*) Maximal Upload : 500kb
											</p>
										</div>
									</div>
									<div class="item form-group">
										<label class="col-form-label col-md-4 col-sm-4 label-align" for="first-name">Description <span class="required">*</span></label>
										<div class="col-md-8 col-sm-8 ">
											<input type="text" id="first-name" required="required" class="form-control" name="description">
										</div>
									</div>
									<div class="item form-group">
										<label class="col-form-label col-md-4 col-sm-4 label-align">Publish Date <span class="required">*</span></label>
										<div class="col-md-8 col-sm-8 ">
											<input id="birthday" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" name="publish_date">
											<script>
												function timeFunctionLong(input) {
													setTimeout(function() {
														input.type = 'text';
													}, 60000);
												}
											</script>
										</div>
									</div>
									<div class="ln_solid"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Form Edit<small> Data Slider</small></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="{{route('UpdateDataProduct')}}" enctype="multipart/form-data">
				{!! csrf_field() !!}
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_content">
									<br />
									<div class="item form-group">
										<label class="col-form-label col-md-4 col-sm-4 label-align" for="first-name">Category Product <span class="required">*</span></label>
										<div class="col-md-8 col-sm-8">
											<input type="text" name="categoryORI" id="ori_category" class="form-control" readonly>
											<input type="hidden" name="categoryORIcode" id="oriCodeCategory" class="form-control" readonly>
											<input type="hidden" name="idData" id="Data_ID">
											{{-- <select class="form-control" name="category_product" id="kategoriSel">
												
											</select> --}}
											<select class="form-control" name="categoryEDIT" id="">
												<option disabled selected>- Pilih Data Kategori -</option>
												@foreach($getDataCategory as $val)
												<option value="{{$val->id}}">{{$val->name_category}}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="item form-group">
										<label class="col-form-label col-md-4 col-sm-4 label-align" for="first-name">Filename <span class="required">*</span></label>
										<div class="col-md-8 col-sm-8">
											<input type="text" id="filenameImage" required="required" class="form-control" name="filenameImage">
										</div>
									</div>
									<div class="item form-group">
										<label class="col-form-label col-md-4 col-sm-4 label-align" for="last-name">Images <span class="required">*</span></label>
										<div class="col-md-8 col-sm-8">
											<input type="file" id="last-name" name="filename" required="required" class="form-control" style="padding: 3px 5px;">
											<p style="color: #f00; margin-bottom: 0;">*) File Extension : .jpg, .png, .jpeg <br>
												*) Maximal Upload : 500kb
											</p>
											<img src="" id="images" style="width: 150px;">
										</div>
									</div>
									<div class="item form-group">
										<label class="col-form-label col-md-4 col-sm-4 label-align" for="first-name">Description <span class="required">*</span></label>
										<div class="col-md-8 col-sm-8 ">
											<input type="text" id="description" required="required" class="form-control" name="description">
										</div>
									</div>
									<div class="item form-group">
										<label class="col-form-label col-md-4 col-sm-4 label-align">Publish Date <span class="required">*</span></label>
										<div class="col-md-8 col-sm-8">
											<input class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" id="date_publish" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" name="publish_date">
											<script>
												function timeFunctionLong(input) {
													setTimeout(function() {
														input.type = 'text';
													}, 60000);
												}
											</script>
										</div>
									</div>
									<div class="ln_solid"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal Delete -->
<div id="ModalDelete" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header flex-column">
				<h4 class="modal-title w-100">Are you sure?</h4>	
            </div>
			<div class="modal-body">
				<p style="margin-top: 1rem;">Apakah anda yakin akan menghapus Data ini ?</p>
			</div>
			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
				<a href="" name="delete_data" class="btn btn-danger corfmDelete">Yes</a>
			</div>
		</div>
	</div>
</div>
<!-- End Modal Delete -->


@include('include.script')

<script type="text/javascript">
	$(document).ready(function(){
		$(document).on("click", ".editData", function(){
			var idData = $(this).data('id');
			bindingData(idData);
		});

		function bindingData(idData){
			$.ajax({
				url: "{{url('/')}}/getDataEditProduct/"+idData,
				success: function(data){
					console.log(data[0].filename);
					$('#filenameImage').val(data[0].filename);
					$('#images').attr('src', data[0].path + "/" + data[0].images);
					$('#date_publish').val(data[0].publish_date);
					$('#description').val(data[0].description);
					// $("#kategoriSel").append("<option value='"+data[0].code_category+"' selected>"+data[0].category_product+"</option>");
					$('#ori_category').val(data[0].category_product);
					$('#oriCodeCategory').val(data[0].code_category);
					$('#Data_ID').val(data[0].id);
				},
			});
		}

		$(document).on("click", ".deleteData", function() {
	        var delete_id = $(this).data('id');
	        $(".corfmDelete").attr("href", "{{url('/')}}/deleteDataProduct/" + delete_id);
	    });
	});
</script>