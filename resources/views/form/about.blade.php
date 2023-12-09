
@include('include.header')
@include('sweetalert::alert')
<style type="text/css">
	tr.MyDatatable > td.center{
		text-align: center;
	}
	h2.title{
		background-color: #007bff;
	    width: fit-content;
	    color: #ffffff;
	    padding: 5px 15px;
	    border-radius: 25px;
	}
</style>
<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>About Us</h3>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 ">
				<div class="x_panel">
					<div class="x_title">
						<h2>View Data<small>About Us</small></h2>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="row">
							@foreach($dataAbout as $val)
							<div class="col-sm-12" style="margin-bottom: 15px;">
								<div class="card-box table-responsive">
									@if($val->content_code == '1')
										<h2 class="title">About Us</h2>
									@elseif($val->content_code == '2')
										<h2 class="title">Visi Perusahaan</h2>
									@elseif($val->content_code == '3')
										<h2 class="title">Misi Perusahaan</h2>
									@endif
									<div class="col-sm-10" style="padding: 0;">
										<p style="font-size: 14px; padding-left: 15px;">{{$val->description}}</p>
									</div>
									<div class="col-sm-2" style="padding: 0;">
										<button class="btn btn-primary btn-sm editAbout" data-toggle="modal" data-target="#formEditData" data-id="{{$val->content_code}}" style="float: right; margin-top: 10px;">Ubah Data</button>
									</div>
								</div>
							</div>
							@endforeach()
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="formEditData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Form Edit<small> Data About</small></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="{{route('updateDataAbout')}}" enctype="multipart/form-data">
				{!! csrf_field() !!}
				<input type="hidden" name="idData" id="data_id">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="">
								<div class="x_content">
									<br/>
									<div class="item form-group">
										<div class="col-md-12 col-sm-12">
											<textarea class="form-control" id="valContent" name="dataContent" style="min-height: 250px;"></textarea>
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

@include('include.script')

<script type="text/javascript">
	$(document).on('click', '.editAbout', function(){
		var idData = $(this).data('id');
		bindingData(idData);
		
		function bindingData($idData){
			$.ajax({
				url: "{{url('/')}}/getDataAboutEdit/"+idData,
				success: function(data){
					console.log(data[0].content_code);
					$('#valContent').val(data[0].description);
					$('#data_id').val(data[0].id);
				},
			});
		}
	})
</script>