<?php
use Illuminate\Support\Str;

    function message(string $string = '')
    {
        $caps = Str::ucfirst($string);
        return "Hello $caps! <br> Greetings from the helper class";
    }

?>