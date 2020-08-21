<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\RequirementType;

class RequirementController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function RequirementSelect(Request $request)
    {
        
        if(isset($request->searchTerm)){   
            $query = RequirementType::where('type', 'LIKE', '%' .$request->searchTerm. '%')->orderBy('type', 'desc')->limit(10)->get();
            //dd( $query );
        }else{
            $query = RequirementType::limit(10)->get();
        }

        $response = array();

            // Read Data
            foreach($query as $unit){
            $response[] = array(
                "id" => $unit['id'],
                "text" => $unit['type']
            );
            }
            //dd($response);
            return json_encode($response);

    }


}
