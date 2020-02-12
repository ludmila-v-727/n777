<?php
function __autoload($class)

{
    require 'class/' .$class.'.php';

}