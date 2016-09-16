@extends('layouts.master')
@section('title')
        home page
@endsection
@section('content')
    <div class="centered">
        @foreach($actions as $action)
            <a href="{{route('niceAction', ['action' => lcfirst($action->name)])}}">{{ $action->name }}</a>
        @endforeach

        <br>
        @if(count($errors)>0)
            <div>
                <ul>
                    @foreach($errors->all() as $error)
                        {{$error}}
                    @endforeach
                </ul>
            </div>
        @endif
        <br>
        <form action="{{route('add_action')}}" method="post">
            <label for="name">Name of action</label>
            <input type="text" name="name"/>
            <label for="niceness">Niceness</label>
            <input type="text" name="niceness" id="niceness"/>
            <button type="submit">Ok !</button>
            <input type="hidden" value="{{Session::token()}}" name="_token">
        </form>

        @foreach($actions_logged as $loggged)
            <p>{{$loggged->nice_action->name}}</p>

                 @foreach($loggged->nice_action->categories as $category)
                    <p>{{$category->name}}</p>
                @endforeach

        @endforeach

        <div>
            {{ dd($query) }}
        </div>

    </div>

@endsection