<?php
namespace App\Helpers;

use Illuminate\Http\Request;
use App\Helpers\SubjectChecker;
class CSDM extends SubjectChecker
{

    public function check($request=null)
    {
        if( $request->physics_score >= 6 || $request->math_score >= 6){
            info('got Coastal Studies and Disaster Management!');
            if(!empty($request['subjects']))
                $request->merge(['subjects'=> array_merge($request['subjects'],["Coastal Studies and Disaster Management"])]);
            else
                $request->merge(['subjects'=>["Coastal Studies and Disaster Management"]]);
        }

        return $this->next($request);
    }
}
