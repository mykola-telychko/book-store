<?php

function __autoload($class){

    require_once('classes/'.$class.'.php');

}

new Bootstrap();
