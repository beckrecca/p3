@extends('_master')

@section('content')
<div class="row">

	{{ Form::open(array('url' => '/', 'method' => 'POST')) }}
		<div class="col-sm-6">
			<h3>Filler Text</h3>
			{{ Form::label('p', 'Select how many paragraphs of filler text you need. ')}}
			<br>
			@for ($i = 0; $i <= 10;  $i++)
				<input type="radio" value="{{$i}}" name="p" id="p"> {{ $i }}
			@endfor
		</div>
		<div class="col-sm-6">
			<h3>Random Users</h3>
		    {{ Form::label('u', 'Select how many users you would like to generate. ') }}
		    <br>
		    @for ($i = 0; $i <= 10;  $i++)
				<input type="radio" value="{{$i}}" name="u" id="u"> {{ $i }}
			@endfor
			<br>
			{{ Form::label('img', 'Include avatar image? ')}}
			{{ Form::checkbox('img', '1', true) }} <br>
			{{ Form::label('dob', 'Include date of birth? ')}}
			{{ Form::checkbox('dob', '1', true) }} <br>
			{{ Form::label('loc', 'Include location? ')}}
			{{ Form::checkbox('loc', '1', true) }}
			
		</div>
		<div class="row submit">
			{{ Form::submit('Submit', array('class' => 'btn btn-cute')); }}
		</div>
	{{ Form::close() }}
</div>

@if (isset($filler) || isset($users))
<div class="row results">
	@if (isset($filler))
	<div class="col-xs-12 col-sm-5">
		<div class="visible-xs">
			<h4>Filler Text</h4>
		</div>
		{{ $filler }}
	</div>
	@endif
	@if (isset($users))
	<div class="col-xs-6 col-xs-offset-2 col-sm-3 col-md-2 col-sm-offset-2">
		<div class="visible-xs">
			<h4>Users</h4>
		</div>
		@foreach ($users as $user)
		<div class="panel panel-cute">
			@if ($img)
			<div class="panel-heading">
				<img src="{{ $user["img"]}}" class="img-circle">
			</div>
			@endif
			<div class="panel-body">
				<span class="name">{{ $user["name"] }}</span> <br>
				@if ($dob)
				{{ $user["dob"] }} <br>
				@endif
				@if ($loc)
				{{ $user["loc"]}}
				@endif
			</div>
		</div>
		@endforeach
	</div>
	@endif
</div>
@endif

@stop