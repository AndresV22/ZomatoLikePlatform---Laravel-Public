<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<script>$('.select2').select2();</script>

@extends('layouts.app')
@section('title', 'Welcome')
@section('content')
<link href="{{ asset('css/search.css') }}" rel="stylesheet">
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6 align-self-center">
			<font size="7" color="white"><p class="text-center">Nice food. Is that simple.</p></font>
			<font size="4" color="white"><p class="text-center">Zomato666 is the best site for finding the best food in the best places. Want some juicy empanadas de pino, a cold Antillanca beer or the tastiest completos in your area? We've got you covered.</p></font>
		</div>
	</div>
</div>

<form action="/search" method="POST" role="search">
	{{ csrf_field() }}
	<font size="6" color="white"><p class="text-center">Search places by name, category, food...</p></font>
	<div class="d-flex justify-content-center">
		<div class="searchbar">
			<input type="text" class="search_input" name="query" placeholder="Search...">
			<button type="submit" class="btn btn-default">
				<a class="search_icon"><i class="fas fa-search"></i></a>
	        </button>
		</div>
	</div>
</form>

<div class="container">
    @if(isset($details))
        <p> The Search results for your query <b> {{ $query }} </b> are :</p>
    <h2>Sample Place details</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Go</th>

                
            </button>
            </tr>
        </thead>
        <tbody>
            @foreach($details as $place)
            <tr>
                <td>{{$place->name}}</td>
                <td>{{$place->address}}</td>
                <Form method="get" action="{{"profile/edit"}}">
                    <td><button type="Submit" class="btn btn-outline-primary btn-custom-outline-primary btn-custom"></td>
                        </Form><hr>
                
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection