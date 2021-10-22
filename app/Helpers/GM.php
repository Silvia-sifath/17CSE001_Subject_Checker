<?php
namespace App\Helpers;

use Illuminate\Http\Request;
use App\Helpers\SubjectChecker;
class GM extends SubjectChecker
{

    public function check($request=null)
    {
        if( $request->physics_score >= 6){
            info('got Geology And Mining!');
            if(!empty($request['subjects']))
                $request->merge(['subjects'=> array_merge($request['subjects'],["Geology And Mining"])]);
            else
                $request->merge(['subjects'=>["Geology And Mining"]]);
        }

        return $this->next($request);
    }
}
