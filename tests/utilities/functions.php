<?php

function create($class, $attr= [], $time = null){
   return factory($class, $time)->create($attr);
}
function make($class, $attr = [], $time = null){
    return factory($class, $time)->make($attr);
}