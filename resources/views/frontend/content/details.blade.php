@extends('layouts.frontend.main')
@section('content')
    <div class="row">
        @if($models)
            <div class="col-md-12">
                <div class="content">
                    <div class="content-detail">
                        <h1><span>{{ $models->title }}</span></h1>
                        
                    </div>
                    <div class="content-wrapper">
                        {!! $models->content !!}
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection