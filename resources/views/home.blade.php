@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
    <div class="col-md-3">
      <div class="card-counter primary">
        <i class="fas fa-vote-yea nav-icon"></i>
        <span class="count-numbers">12</span>
        <span class="count-name">vote</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter danger">
        <i class="fas fa-question nav-icon"></i>
        <span class="count-numbers">599</span>
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
        <span class="count-numbers">35</span>
        <span class="count-name">Users</span>
      </div>
    </div>
  </div>
</div>
@endsection
