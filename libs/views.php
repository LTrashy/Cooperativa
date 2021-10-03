<?php
    class Views{
        function __construct(){
            
        }

        function render($name){
            require 'views/'. $name . '.php';
        }
    }