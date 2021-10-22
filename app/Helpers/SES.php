<?php
namespace App\Helpers;

use Illuminate\Http\Request;
use App\Helpers\SubjectChecker;
class SES extends SubjectChecker
{

    public function check($request=null)
    {
        if( $request->chemistry_score >= 6){
            info('got Soil & Environmental Sciences!');
            if(!empty($request['subjects']))
                $request->merge(['subjects'=> array_merge($request['subjects'],["Soil & Environmental Sciences"])]);
            else
                $request->merge(['subjects'=>["Soil & Environmental Sciences"]]);
        }

        return $this->next($request);
    }
}
