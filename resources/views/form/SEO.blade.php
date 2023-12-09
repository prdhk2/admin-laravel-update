@include('include.header')
@include('sweetalert::alert')

<!-- page content -->
<form method="post" action="{{route('updateDataSEO')}}" enctype="multipart/form-data">
	{!! csrf_field() !!}
	<div class="right_col" role="main">
		<div class="">
			<div class="page-title">
				<div class="title_left">
					<h3>Data SEO Management</h3>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="row">
				<div class="col-md-12 col-sm-12 ">
					<div class="x_panel">
						<div class="x_title">
							<h2>Form SEO <small>Search Engine Optimization</small></h2>
							<div class="clearfix"></div>
						</div>
						<div class="x_content">
							<div class="row">
								<div class="col-sm-12">
									<div class="card-box table-responsive">
										<div class="col-md-12 col-sm-12">
											<textarea type="text" required="required" class="form-control" name="desc_seo" style="min-height: 250px;">{{$dataSEO[0]->description}}</textarea>
										</div>
									</div>
									<br>
									<div class="card-box table-responsive">
										<button type="submit" class="btn btn-primary editData" title="Update Data User" style="float: right;"><i class="fa fa-send"></i> Update Data SEO</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>

@include('include.script')