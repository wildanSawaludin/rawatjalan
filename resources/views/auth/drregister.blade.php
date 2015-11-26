@extends('master')

@section('content')
<div class="container-fluid" style="margin-top:1%;">
	<div class="row">
		<div class="col-md-6 col-md-offset-3" style="padding-top:3%;padding-bottom:3%;">
			<div class="panel panel-default" style="background-color:#FBFBFB;margin: 0 auto;">
				<div class="panel-heading" style="background-color:#FBFBFB; font-size:30px;text-align:center;">Register Doctor</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<div class="col-md-8 col-md-offset-2">
					<div class="col-md-12">
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/drregister') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="row">
							<div class="input-field col s12">
								<input id="nama_dokter" type="text" class="form-control" name="nama_dokter" value="{{ old('nama_dokter') }}">
								<label class="col-md-4 control-label">Nama</label>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">NIK</label>
							<div class="col-md-6">
								<input type="number" class="form-control" name="NIK" value="{{ old('NIK') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Alamat</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="alamat" value="{{ old('alamat') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Nomor Telepon</label>
							<div class="col-md-6">
								<input type="number" class="form-control" name="telepon" value="{{ old('telepon') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Tanggal Lahir</label>
							<div class="col-md-6">
								<input type="date" class="form-control" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Spesialisasi</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="spesialisasi" value="{{ old('spesialisasi') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirm Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Register
								</button>
							</div>
						</div>
					</form>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
