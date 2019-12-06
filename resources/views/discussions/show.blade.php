@extends('layouts.app')

@section('content')
    <div class="card">
        @include('partials.discussion-header')
        <div class="card-body">
            <div class="text-center font-weight-bold">
                {{ $discussion->title }}
            </div>
            <hr>
            {!! $discussion->content !!}
        </div>
    </div>

    @foreach($discussion->replies()->paginate(3) as $reply)
        <div class="card my-5">
            <div class="card-header">
                <img width="40px" height="40px" class="rounded-circle"
                     src="{{ Gravatar::src($reply->owner->email) }}" alt=""/>
                <span class="ml-2 font-weight-bold"> {{$reply->owner->name}}</span>
            </div>
            <div class="card-body">
                {!! $reply->content !!}
            </div>
        </div>
    @endforeach
    {{$discussion->replies()->paginate(3)->links()}}


    <div class="card my-5">
        <div class="card-header">Add a reply</div>
        <div class="card-body">
            @auth
                <form action="{{route('replies.store', $discussion->slug)}}" method="POST">
                    @csrf
                    <input type="hidden" name="content" id="content">
                    <trix-editor input="content"></trix-editor>

                    <button type="submit" class="btn btn-success btn-sm my-2">Add reply</button>
                </form>
            @else
                <a href="{{route('login')}}" class="btn btn-info text-white">Sign in to add a reply</a>
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>

@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet"/>
@endsection