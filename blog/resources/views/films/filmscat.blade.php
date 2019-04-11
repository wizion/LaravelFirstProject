@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">        
            @foreach($films as $film)
                <div class="card">
                    <div class="card-header">
                      {{$film->title}}
                    </div>
                    <div class="card-body">
                      <h5 class="card-title">{{$film->subtitle}}</h5>
                      <p class="card-text">{{$film->content}}</p>
                      <a href="/catalog/{{$film->id}}" class="btn btn-primary">More</a>
                    </div>
                    <div class="card-footer text-muted">
                      {{$film->updated_at}}
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Filters
                </div>
                <div class="card-body">
                    <ul>
                        @foreach($filter as $item)
                        <li><a href="/?category={{$item->category}}">{{$item->category}}</a></li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
