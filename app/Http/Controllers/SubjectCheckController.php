<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Helpers\Math;
use App\Helpers\Physics;
use App\Helpers\CSE;
use App\Helpers\BCBT;
use App\Helpers\Biology;
use App\Helpers\Chemistry;
use App\Helpers\CSDM;
use App\Helpers\SES;
use App\Helpers\Statistics;
use App\Helpers\GM;
class SubjectCheckController extends Controller
{
     public function checkSubject(Request $request)
     {

        $validator = Validator::make($request->all(),[
            'hsc_math' => 'required|boolean',
            'hsc_biology' => 'required|boolean',
            'math_score' => 'required|numeric',
            'physics_score' => 'required|numeric',
            'chemistry_score' => 'required|numeric',
            'biology_score' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $math = new Math();
        $physics = new Physics();
        $cse = new CSE();
        $biochemistry_biotechnology = new BCBT();
        $biology = new Biology();
        $chemistry = new Chemistry();
        $coastal_science_disaster_management = new CSDM();
        $soil_environment_sciences = new SES();
        $statistics = new Statistics();
        $geology_mining = new GM();

        try{
            $math->setNext($physics);
            $physics->setNext($cse);
            $cse->setNext($biochemistry_biotechnology);
            $biochemistry_biotechnology->setNext($biology);
            $biology->setNext($chemistry);
            $chemistry->setNext($coastal_science_disaster_management);
            $coastal_science_disaster_management->setNext($soil_environment_sciences);
            $soil_environment_sciences->setNext($statistics);
            $statistics->setNext($geology_mining);

/**               Starting The Chain                   */

            $math->check($request);
        }catch (\Exception $exception){
            return response()->json([
                'success' => false,
                'message' => 'An error occured \n'.$exception
            ], 200);
        }
        if(count($request['subjects'])==0){
            return response()->json([
                'success' => false,
                'message' => "Eligible for no subject, Sorry. Better luck next time!",
            ], 200);
        }
        // if (count($request['subjects'])==1) {
        //     return response()->json([
        //         'success' => true,
        //         'subjects' => $request['subjects'],
        //     ], 200);
        // }

        return response()->json([
            'success' => true,
            'message' => "Eligible Subjects for 'A' unit of University of Barishal.",
            'subjects' => $request['subjects'],

        ], 200);
     }
}
