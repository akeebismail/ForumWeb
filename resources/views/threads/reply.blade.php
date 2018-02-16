<?php
/**
 * Created by PhpStorm.
 * User: kibb
 * Date: 12/31/17
 * Time: 12:47 AM
 */
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <a href="#">
            {{$reply->owner->name}}
        </a>
        said {{$reply->created_at->diffForHumans()}}...</div>
    <div class="panel-body">
        <div class="body">{{$reply->body}}</div>
    </div>
</div>
