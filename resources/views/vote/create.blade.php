@extends('layouts.admin1')

@section('title')
Create Vote
@endsection
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Add new Vote</h3>
        <div class="card-tools">
            <a href="{{route('vote.show')}}" class="btn btn-danger"><i class="fas fa-shield-alt"></i> See all votes</a>
        </div>
    </div>
    <form method="POST" action="{{ route('vote.store') }}">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="name">Vote Title</label>
                <input type="text" name="title"  id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('title') }}" required placeholder="Vote Title">
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Vote Description</label>
                <input type="text" name="description"  id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('description') }}" required placeholder="Vote description">
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Create Vote</button>
        </div>
    </form>
</div>
@endsection
