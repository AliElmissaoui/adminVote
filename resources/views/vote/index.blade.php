@extends('layouts.admin1')
@section('title')
Votes
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Vote Table</h3>
        <div class="card-tools">
            <a href="{{ route('vote.index') }} " class="btn btn-primary"><i class="fas fa-shield-alt"></i> Add new vote</a>
        </div>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>title</th>
                    <th>Description</th>
                    <th>date postée</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($votes as $vote )
                    <tr>
                        <td>{{ $vote->id }}</td>
                        <td>{{ $vote->title }}</td>
                        <td>
                           {{ $vote->description }}
                        </td>
                        <td><span class="tag tag-success">{{ $vote->created_at }}</span></td>
                        {{--  <td>
                            <a href="{{ route('role.show', $role->id ) }}" class="btn btn-info">Change Permission</a>
                            <a href="{{ route('role.destroy',$role->id ) }}" class="btn btn-danger">Delete</a>
                        </td>  --}}
                    </tr>
                @empty
                    <tr>
                        <td><i class="fas fa-folder-open"></i> No Record found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
