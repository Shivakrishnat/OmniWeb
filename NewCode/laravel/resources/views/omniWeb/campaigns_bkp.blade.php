@extends('app')
@section('title')
    OmniWeb - Create Campaign
@stop
@section('content')
 
     <form action="{{route('addentry', [])}}" method="post" enctype="multipart/form-data" >
        <input type="file" name="filefield" id="filefield">
        <input type="submit"  >
        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
    </form>
 
 <h1>List of Brochures added</h1>
 <div class="row">
        <ul class="thumbnails">
 @foreach($entries as $entry)
            <div class="col-md-2">
                <div class="thumbnail">
                    <img src="{{route('getentry', $entry->filename)}}" alt="ALT NAME" class="img-responsive" />
                    <div class="caption">
                        <p>{{$entry->original_filename}}</p>
                    </div>
                </div>
            </div>
 @endforeach

@endsection