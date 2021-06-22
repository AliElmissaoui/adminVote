<!DOCTYPE html>
<html>
    <head>

        <link rel="stylesheet" type="text/css" href="{{ asset('materialize-css/css/materialize.css') }}">

        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    </head>

    <body>
        <div class="container">
            <div class="row" style="padding-top:10px;">

                <div class="col s12 m10 offset-m1 l8 offset-l2" style="margin-top:10px;">
                  <div>
      <div class="card">
          <div class="card-content">



          <span class="card-title">
              {{-- {{ $vots->title }}  --}}
            </span>
          <p>
              {{-- {{ $vots->description }} --}}
          </p>
          <br/>


          <div id="doDelete" class="modal bottom-sheet">
            <div class="modal-content">
              <div class="container">
                <div class="row">
                  <h4>Are you sure?</h4>
                  <p>Do you wish to delete this survey called ?</p>
                  <div class="modal-footer">
                    <a href="#" class=" modal-action waves-effect waves-light btn-flat red-text">Yep yep!</a>
                    <a class=" modal-action modal-close waves-effect waves-light green white-text btn">No, stop!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="divider" style="margin:20px 0px;"></div>
          <p class="flow-text center-align">Questions</p>
          <ul class="collapsible" data-collapsible="expandable">
                @forelse ($question as $questions)
              <li style="box-shadow:none;">
                <div class="collapsible-header">{{ $questions->title }} </div>
                <div class="collapsible-body">
                  <div style="margin:5px; padding:10px;">
                      {!! Form::open() !!}
                      @if($questions->question_type ==='text')
                        {{ Form::text('title')}}
                        @elseif($questions->question_type ==='range')
                        <input type="range" id="volume" name="volume"
                           min="0" max="11">
                      @elseif($questions->question_type ==='textarea')
                      <div class="row">
                        <div class="input-field col s12">
                          <textarea id="textarea1" class="materialize-textarea"></textarea>
                          <label for="textarea1">Provide answer</label>
                        </div>
                      </div>
                       @elseif($questions->question_type ==='radio')

                        @foreach((array)$questions->option_name as $key=>$value)
                          <p style="margin:0px; padding:0px;">
                            <input type="radio" />{{ $key }}
                            <label for="{{ $key }}">{{ $value }}</label>
                          </p>
                        @endforeach
                      @elseif($questions->question_type === 'checkbox')
                        @foreach((array)$questions->option_name as $key=>$value)
                        <p style="margin:0px; padding:0px;">
                          <input type="checkbox" />{{$key}}
                          <label for="{{$key}}">{{ $value }}</label>
                        </p>
                        @endforeach
                      @endif
                    {!! Form::close() !!}

                  </div>
                </div>
              </li>
              @empty
              <span style="padding:10px;">Nothing to show. Add questions below.</span>
            @endforelse

          </ul>

        <h2 class="flow-text">Add Question</h2>
          <form id="boolean" method="POST" action="{{route('admin.question') }}">
            @csrf
            <div class="row">
              <div class="input-field col s12">
                <select class="browser-default" name="question_type" id="question_type">
                  <option value="" disabled selected>Choose your option</option>
                  <option value="text">Text</option>
                  <option value="textarea">Textarea</option>
                  <option value="checkbox">Checkbox</option>
                  <option value="radio">Radio Buttons</option>
                  <option value="number">number</option>
                  <option value="range">slider</option>
                  <option value="span">emoji</option>
                </select>
              </div>

              <div class="input-field col s12">
                <input name="title" id="title" type="text" name="title">
                <label for="title">Question</label>
              </div>
              <!-- this part will be chewed by script in init.js -->
              <span class="form-g"></span>

              <div class="input-field col s12">

              <button type="submit" class="btn waves-effect waves-light">addQuestion</button>
              </div>
            </div>
            </form>

                </div>
            </div>
        </div>




    </body>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

    <script src="{{ asset('materialize-css/js/materialize.js') }}"></script>
    <script src="{{ asset('assets/js/init.js') }}"></script>


</html>


