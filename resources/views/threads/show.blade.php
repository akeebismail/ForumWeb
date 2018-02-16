<?php
/**
 * Created by PhpStorm.
 * User: kibb
 * Date: 12/24/17
 * Time: 2:32 AM
 */
?>
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="#">
                            {{$thread->creator->name}}
                        </a> posted:
                        {{$thread->title}}</div>

                    <div class="panel-body">
                        <div class="body">{{$thread->body}}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @foreach($thread->replies as $reply)
                    @include('threads.reply')
                @endforeach
            </div>
        </div>
        @if(auth()->check())
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <form method="post" action="{{$thread->path().'/replies'}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <textarea rows="5" name="body" id="" class="form-control"></textarea>
                        </div>

                        <button type="submit">Post</button>
                    </form>
                </div>
            </div>
            @else
            <p class="text-center">Please <a href="{{route('login')}}">SignIn </a> to reply </p>
        @endif
    </div>
@endsection

