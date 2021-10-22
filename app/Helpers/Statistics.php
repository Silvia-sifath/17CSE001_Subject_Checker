<?php
namespace App\Helpers;

use Illuminate\Http\Request;
use App\Helpers\SubjectChecker;
class Statistics extends SubjectChecker
{
    public function check($request=null)
    {
        if($request->hsc_math){
            info('got Statistics!');

            if(!empty($request['subjects']))
                $request->merge(['subjects'=> array_merge($request['subjects'],["Statistics"])]);
            else
                $request->merge(['subjects'=>["Statistics"]]);
        }

        return $this->next($request);
    }
}
