@extends('layouts.app')

@section('content')
@if(Auth::id())
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($favorite as $fav)
                <div class="card">
                    <div class="card-header"><a href="/catalog/{{$fav->id}}">{{$fav->title}}</a></div>
                    <div class="card-body">
                        <h2>{{$fav->subtitle}}</h2>
                        <div>
                            {{$fav->content}}
                        </div>
                        <a href="/catalog/{{$fav->id}}/deletefavorite">delete from Favotites</a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">User data</div>

                <div class="card-body">
                    <a href="/changemydata">Change user data</a>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Enter in system</div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
