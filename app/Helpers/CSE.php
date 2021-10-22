<?php
namespace App\Helpers;

use Illuminate\Http\Request;
use App\Helpers\SubjectChecker;
class CSE extends SubjectChecker
{

    public function check($request=null)
    {
        if( $request->physics_score >= 6 || $request->math_score >= 6){
            info('got CSE!');
            if(!empty($request['subjects']))
                $request->merge(['subjects'=> array_merge($request['subjects'],["Computer Science and Engineering"])]);
            else
                $request->merge(['subjects'=>["Computer Science and Engineering"]]);
        }

        return $this->next($request);
    }
}
