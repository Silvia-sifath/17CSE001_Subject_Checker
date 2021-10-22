<?php
namespace App\Helpers;

use Illuminate\Http\Request;
use App\Helpers\SubjectChecker;
class BCBT extends SubjectChecker
{

    public function check($request=null)
    {
        if( $request->hsc_biology && $request->biology_score >= 6){
            info('got Biochemistry & Biotechnology!');
            if(!empty($request['subjects']))
                $request->merge(['subjects'=> array_merge($request['subjects'],["Biochemistry and Biotechnology"])]);
            else
                $request->merge(['subjects'=>["Biochemistry and Biotechnology"]]);
        }

        return $this->next($request);
    }
}
