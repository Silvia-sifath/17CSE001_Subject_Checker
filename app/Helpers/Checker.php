<?php
namespace App\Helpers;

use Illuminate\Http\Request;

interface Checker{
    public function setNext(Checker $checker);
    public function check(Request $request);
}
