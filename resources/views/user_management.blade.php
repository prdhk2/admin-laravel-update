@include('include.header')
@include('sweetalert::alert')

<!-- page content -->
<form method="post" action="{{route('updateDataUser')}}" enctype="multipart/form-data">
	{!! csrf_field() !!}
	<div class="right_col" role="main">
		<div class="">
			<div class="page-title">
				<div class="title_left">
					<h3>Data User Management</h3>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="row">
				<div class="col-md-12 col-sm-12 ">
					<div class="x_panel">
						<div class="x_title">
							<h2>User Management</h2>
							<div class="clearfix"></div>
						</div>
						<div class="x_content">
							<div class="row">
								<div class="col-sm-6">
									<div class="card-box table-responsive">
										<label class="col-form-label col-md-4 col-sm-4" for="first-name">Username <span class="required">*</span></label>
										<div class="col-md-8 col-sm-8 ">
											<input type="text" required="required" class="form-control" name="username" value="{{$dataUser[0]->username}}">
										</div>
									</div>
									<br>
									<div class="card-box table-responsive">
										<label class="col-form-label col-md-4 col-sm-4" for="first-name">Email <span class="required">*</span></label>
										<div class="col-md-8 col-sm-8 ">
											<input type="text" required="required" class="form-control" name="email" value="{{$dataUser[0]->email}}">
										</div>
									</div>
									<br>
									<div class="card-box table-responsive">
										<label class="col-form-label col-md-4 col-sm-4" for="first-name">Role <span class="required">*</span></label>
										<div class="col-md-8 col-sm-8 ">
											<input type="text" required="required" class="form-control" name="role" value="{{$dataUser[0]->role}}" readonly>
										</div>
									</div>
									<br>
									<div class="card-box table-responsive">
										<label class="col-form-label col-md-4 col-sm-4" for="first-name">Password <span class="required">*</span></label>
										<div class="col-md-8 col-sm-8 ">
											<input type="text" required="required" class="form-control" name="password">
										</div>
									</div>
									<br>
									<div class="card-box table-responsive">
										<button type="submit" class="btn btn-primary editData" title="Update Data User" style="float: right;"><i class="fa fa-send"></i> Update Data User</button>
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