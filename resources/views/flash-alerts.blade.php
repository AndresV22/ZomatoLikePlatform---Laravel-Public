<link href="{{ asset('css/alerts.css') }}" rel="stylesheet">

@if ($message = Session::get('success'))
<div class="fixed-bottom">
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<strong>{{ $message }}</strong>
	</div>
</div>
@endif


@if ($message = Session::get('error'))
<div class="fixed-bottom">
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<strong>Error</strong> - {{ $message }}
	</div>
</div>
@endif


@if ($message = Session::get('warning'))
<div class="fixed-bottom">
	<div class="alert alert-warning alert-dismissible fade show" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<strong>Warning</strong> - {{ $message }}
	</div>
</div>
@endif


@if ($message = Session::get('info'))
<div class="fixed-bottom">
	<div class="alert alert-info alert-dismissible fade show" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<strong>Info</strong> - {{ $message }}
	</div>
</div>
@endif


@if ($errors->any())
<div class="container-fluid">
	<div class="fixed-bottom">
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert">×</button>
			Please check the form below for errors
		</div>
	</div>
</div>
@endif
