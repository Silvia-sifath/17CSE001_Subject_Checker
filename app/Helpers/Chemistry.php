<?php
namespace App\Helpers;

use Illuminate\Http\Request;
use App\Helpers\SubjectChecker;
class Chemistry extends SubjectChecker
{

    public function check($request=null)
    {
        if( $request->chemistry_score >= 6){
            info('got Chemistry!');
            if(!empty($request['subjects']))
                $request->merge(['subjects'=> array_merge($request['subjects'],["Chemistry"])]);
            else
                $request->merge(['subjects'=>["Chemistry"]]);
        }

        return $this->next($request);
    }
}
