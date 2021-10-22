<?php
namespace App\Helpers;

use Illuminate\Http\Request;
use App\Helpers\SubjectChecker;
class Math extends SubjectChecker
{


    public function check($request=null)
    {
        if($request->hsc_math && $request->math_score >= 6){
            info('got math!');

            if(!empty($request['subjects']))
                $request->merge(['subjects'=> array_merge($request['subjects'],["Math"])]);
            else
                $request->merge(['subjects'=>["Math"]]);

        }

        return $this->next($request);
    }
}
