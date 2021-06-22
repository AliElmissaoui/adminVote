@extends('layouts.admin1')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card-counter danger">
              <i class="fas fa-vote-yea nav-icon"></i>
              @if($votes->count()>0)
              @foreach($votes as $vote )
              <span class="count-numbers">{{ $vote->count() }}</span>
              @endforeach
              @else
              <span class="count-numbers">0</span>
              @endif
              <span class="count-name">Vote</span>
            </div>
          </div>

    <div class="col-md-3">
      <div class="card-counter danger">
        <i class="fas fa-question nav-icon"></i>
        @if($questions->count()>0)
        @foreach($questions as $question )
        <span class="count-numbers">{{ $question->count() }}</span>
        @endforeach
        @else
        <span class="count-numbers">0</span>
        @endif
        <span class="count-name">Question</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter success">
        <i class="fas fa-reply"></i>
        <span class="count-numbers">70%</span>
        <span class="count-name">répondre</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter info">
        <i class="fas fa-users-cog nav-icon"></i>
        @if($users->count())
        @foreach($users as $user )
        <span class="count-numbers">{{ $user->count() }}</span>
        @endforeach
        @else
        <span class="count-numbers">0</span>
        @endif
        <span class="count-name">Users</span>
      </div>
    </div>
  </div>
</div>
@endsection
