@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">

            <div class="col-md-12">
                <a class="btn btn-primary float-left"
                   href="{{ route('tags.create', ['question_id'=> $question->id])}}">
                    Add Tags
                </a>

            </div>
        </div>
        <div class="row ">


            <br><br>
            @forelse($question->tags as $tag)
                <div class="col-md-4">
                    {{$tag->tagname}}
                </div>
                <div class="col-md-3">
                    <a class="btn btn-primary float-right" href="{{ route('tags.edit',['question_id'=> $question->id, 'tag_id'=> $tag->id ])}}">
                        Edit Tag
                    </a>
                </div>

                <div class="col-md-5">
                    {{ Form::open(['method'  => 'DELETE', 'route' => ['tags.destroy', 'question_id'=> $question, 'tag_id'=> $tag->id ]])}}
                    <button class="btn btn-danger" value="submit" type="submit" id="submit">Delete Tag
                    </button>
                    {!! Form::close() !!}
                </div>

            @empty
                <div class="col-md-12">
                    No Tags
                </div>
            @endforelse

        </div>



    </div>

    </div>



@endsection
