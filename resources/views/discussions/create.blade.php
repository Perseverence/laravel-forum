@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Add Discussion</div>

    <div class="card-body">
        <form action="{{route('discussions.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" value="" >
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <input type="hidden" id="content" name="content">
                <trix-editor input="content"></trix-editor>
            </div>
            <div class="form-group">
                <label for="channel">Channel</label>
                <select class="custom-select" name="channel" id="channel">
                    @foreach($channels as $channel)
                        <option value="{{$channel->id}}">{{$channel->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Create Discussion</button>
            </div>
        </form>
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