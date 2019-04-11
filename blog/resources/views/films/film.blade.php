@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$film->title}}</div>

                <div class="card-body">
                    <h1>{{$film->subtitle}}</h1>
                    <image src="{{$film->image}}" width="100" class="rounded float-left"/>
                    <div>{{$film->content}}</div>
                    @if(!empty($film->trailer_url))
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="{{$film->trailer_url}}" allowfullscreen></iframe>
                        </div>
                    @endif
                    
                    @if(empty($check->id) and Auth::id())
                        <a href="/catalog/{{$film->id}}/addfavorite" class="button">add to favoite</a>
                    @endif
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
