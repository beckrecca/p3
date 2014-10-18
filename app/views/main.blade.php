@extends('_master')

@section('content')
<div class="row">

	{{ Form::open(array('url' => '/', 'method' => 'POST')) }}
		<div class="col-sm-6">
			{{ Form::label('p', 'Select how many paragraphs of filler text you need. ')}}
			<br>
			@for ($i = 0; $i <= 10;  $i++)
				<input type="radio" value="{{$i}}" name="p"> {{ $i }}
			@endfor
		</div>
		<div class="col-sm-6">
		    {{ Form::label('u', 'Select how many users you would like to generate. ') }}
		    <br>
		    @for ($i = 0; $i <= 10;  $i++)
				<input type="radio" value="{{$i}}" name="u"> {{ $i }}
			@endfor
		</div>
	    {{ Form::submit('Submit', array('class' => 'btn btn-success')); }}
	{{ Form::close() }}
</div>

@if (isset($filler) || isset($users))
<div class="row">
	@if (isset($filler))
	<div class="col-sm-6">
		{{ $filler }}
	</div>
	@endif
	@if (isset($users))
	<div class="col-sm-3 col-sm-offset-2">
		@foreach ($users as $user)
		<div class="user">
			<img src="/img/{{rand(1,20)}}.png" class="img-circle img-responsive">
			<span class="name">{{ $user["name"] }}</span> <br>
			{{ $user["dob"] }} <br>
			{{ $user["loc"]}}
		</div>
		@endforeach
	</div>
	@endif
</div>
@endif

@stop