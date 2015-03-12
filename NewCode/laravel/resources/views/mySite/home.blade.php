@extends ('master');

@section('content')
    
{{--
 Home Page

	<h1> {!! $name !!}</h1>

--}}
   


	@foreach ($lessons as $index => $lesson)
		<li><a href="lessons/{{ $index }}">{{ $lesson }}</a></li>

	@endforeach

@stop

