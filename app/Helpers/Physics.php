<?php
namespace App\Helpers;

use Illuminate\Http\Request;
use App\Helpers\SubjectChecker;
class Physics extends SubjectChecker
{

    public function check($request=null)
    {
        if( $request->physics_score >= 6){
            info('got physics!');
            if(!empty($request['subjects']))
                $request->merge(['subjects'=> array_merge($request['subjects'],["Physics"])]);
            else
                $request->merge(['subjects'=>["Physics"]]);
        }

        return $this->next($request);
    }
}
