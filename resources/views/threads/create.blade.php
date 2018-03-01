<?php
/**
 * Created by PhpStorm.
 * User: kibb
 * Date: 12/24/17
 * Time: 2:22 AM
 */
?>
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create Forum Threads</div>

                    <div class="panel-body">
                        <form action="/threads" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="channel_id">Choose Channel:</label>
                                <select name="channel_id" id="channel_id" class="form-control" required>
                                    @foreach($channels as $channel)
                                        <option value="{{$channel->id}}" {{ old('channel_id') == $channel->id? 'selected':'' }}>{{$channel->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" name="title" required value="{{old('title')}}" class="form-control" id="title" placeholder="title">
                            </div>
                            <div class="form-group">
                                <label for="title">Body:</label>
                                <textarea rows="8" name="body"  required class="form-control" id="body" placeholder="body">
                                    {{old('body')}}
                                </textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Publish</button>
                        </form>
                        @if(count($errors))
                            <ul class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                    @endforeach
                            </ul>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

