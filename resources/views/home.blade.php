@extends('layouts.master')
@section('title')
        home page
@endsection
@section('content')
    <div class="centered">
        <a href="{{route('niceAction', ['action' => 'greet'])}}">Greet</a>
        <a href="{{route('niceAction', ['action' => 'greet'])}}">Hug</a>
        <a href="{{route('niceAction', ['action' => 'greet'])}}">Kiss</a>
        <br>
        <form action="{{route('benice')}}" method="post">
            <label for="select-action">i want to..</label>
            <select id="select-action" name="action">
                <option value="greet">greet</option>
                <option value="hug">hug</option>
                <option value="kiss">kiss</option>

            </select>
            <input type="text" name="name"/>
            <button type="submit">Ok !</button>
            <input type="hidden" value="{{Session::token()}}" name="_token">
        </form>
    </div>

@endsection