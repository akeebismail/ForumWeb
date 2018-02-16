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
                        <form action="{{route('threads.store')}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="title">
                            </div>
                            <div class="form-group">
                                <label for="title">Body:</label>
                                <textarea rows="8" name="body" class="form-control" id="body" placeholder="body"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Publish</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

