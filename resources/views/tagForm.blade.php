@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Add Tag</div>
                    <div class="card-body">
                        @if($edit === FALSE)
                            {!! Form::model($tag, ['route' => ['tags.store', $question], 'method' => 'post']) !!}

                        @else()
                            {!! Form::model($tag, ['route' => ['tags.update', $question, $tag], 'method' => 'patch']) !!}
                        @endif
                        <div class="form-group">
                            {!! Form::label('tagname', 'Tagname') !!}
                            {!! Form::text('tagname', $tag->tagname, ['class' => 'form-control','required' => 'required']) !!}
                        </div>
                        <button class="btn btn-success float-right" value="submit" type="submit" id="submit">Save
                        </button>
                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection