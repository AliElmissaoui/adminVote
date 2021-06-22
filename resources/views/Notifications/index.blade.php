@extends('layouts.admin1')
@section('title')
Votes
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">user Table</h3>
         <div class="card-tools">
            <b-spinner variant="primary" type="grow" label="Spinning"></b-spinner>
        </div>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>name</th>
                    <th>email</th>
                    <th>phone</th>
                    <th>date postée</th>
                    <th>status</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user )
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>
                           {{ $user->email }}
                        </td>
                         @if($user->phone!="")
                        <td>
                           {{ $user->phone }}
                        </td>
                        @else

                         <td><span class="tag tag-danger">empty</span></td>


                          @endif
                        <td><span class="tag tag-success">{{ $user->created_at }}</span></td>


                      {{-- <td> --}}
                   {{-- <input data-id="{{$user->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $user->status ? 'checked' : '' }}>
                     </td> --}}
                     <td id="resp{{ $user->id}}">
                        @if($user->status==1)
                        <button type="button" class="btn btn-sm btn-success">active</button>
                        @else
                        <button type="button" class="btn btn-sm btn-danger">active</button>
                        @endif
                     </td>
                     {{-- <td>

                        <label class="switch">
                            <input data-id="{{ $user->id }}" class="mi_checkbox" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $user->status ? 'checked' : '' }}>
                            <span class="slider round"></span>
                        </label>
                    </td> --}}
                     <td>
                        <input rel="{{ $user->id }}" class="toggle-class" class="statususer" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $user->status == true ? 'checked' : ''}}>
                     </td>
                     {{-- <td> <input type="checkbox" class="toggle-class" data-id="{{ $user->id }}" data-toggle="toggle" data-style="slow" data-on="Enabled" data-off="Disabled" {{ $user->status == true ? 'checked' : ''}}></td> --}}
                     {{-- @if($user->status==1)
                       <a href="{{ route('admin.change',$user->id) }}" class="btn btn-success">Enable</a>
                     @else
                       <a href="{{ route('admin.change',$user->id) }}" class="btn btn-warning">Disible</a>
                     @endif
                    </td>  --}}
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

@push('scripts')

{{-- <script>
    $(document).ready(function(){
        $('.statususer').change(function() {
            var id = $(this).attr('rel');
            if($(this).prop("checked")==true)
            {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type:'POST',
                    url:"{{ route('admin.change') }}",
                    data: {
                        'status': '1',
                        'id': id
                    },
                    success:function(data) {
                        console.log(Success);
                     }
                })
            }
            else{
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type:'POST',
                    url:"{{ route('admin.change') }}",
                    data: {
                        'status': '0',
                        'id': id
                    },
                    success:function(data) {
                        console.log(Success);
                     }
                })
            }


        });
    })

</script> --}}
<script type="text/javascript">
    $('.toggle-class').change(function() {
        //Verifico el estado del checkbox, si esta seleccionado sera igual a 1 de lo contrario sera igual a 0
        var status = $(this).prop('checked') == true ? 1 : 0;
        var id = $(this).data('id');
            console.log(status);
        $.ajax({
            type: "GET",
            dataType: "json",
            //url: '/StatusNoticia',
            url: '{{ route('admin.change') }}',
            data: {'status': status, 'id': id},
            success: function(data){
                $('#resp' + id).html(data.var);
                console.log(data.var)

            }
        });
    })
    </script>

@endpush
