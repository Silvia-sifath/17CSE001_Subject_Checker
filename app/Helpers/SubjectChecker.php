<?php
namespace App\Helpers;

use App\Helpers\Checker;
use Illuminate\Http\Request;

abstract class SubjectChecker implements Checker{
    protected $next;

    public function setNext(Checker $next)
    {
        $this->next = $next;
    }

    public function next($request)
    {
        if ($this->next) {
            return $this->next->check($request);
        }
    }
}
