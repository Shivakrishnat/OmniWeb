@extends('app')
@section('title')
    OmniWeb - List Campaigns
@stop
@section('content')
 

 
 <h1>List of Campaigns added</h1>
 <div class="row">
        <ul class="thumbnails">
 @foreach($entries as $entry)
            <div class="col-md-2">
                <div class="thumbnail">
                   
                
                    <div class="caption">
                        <p><b>Campaign Name :  </b>{{$entry->campaignname}}</p>
                    </div>
                    <div class="caption">
                        <p><b>Start Date : </b>{{$entry->campaign_start}}</p>
                    </div>
                    <div class="caption">
                        <p><b>End Date : </b> {{$entry->campaign_end}}</p>
                    </div>
                    <a href="{{route('getentry', $entry->filename)}}"> <img src="{{route('getentry', $entry->filename)}}" alt="ALT NAME" class="img-responsive" /></a>
                </div>
            </div>
 @endforeach

@endsection