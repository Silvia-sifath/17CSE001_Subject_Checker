<?php
namespace App\Helpers;

use Illuminate\Http\Request;
use App\Helpers\SubjectChecker;
class Biology extends SubjectChecker
{

    public function check($request=null)
    {
        if( $request->hsc_biology && $request->biology_score >= 6){
            info('got Biology!');
            if(!empty($request['subjects']))
                $request->merge(['subjects'=> array_merge($request['subjects'],["Biology"])]);
            else
                $request->merge(['subjects'=>["Biology"]]);
        }

        return $this->next($request);
    }
}
