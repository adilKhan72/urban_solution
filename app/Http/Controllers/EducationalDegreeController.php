<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\EducationalDegree;

class EducationalDegreeController extends Controller
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
    public function DegreeSelect(Request $request)
    {
        
        if(isset($request->searchTerm)){   
            $query = EducationalDegree::where('title', 'LIKE', '%' .$request->searchTerm. '%')->orderBy('title', 'desc')->limit(10)->get();
            //dd( $query );
        }else{
            $query = EducationalDegree::limit(10)->get();
        }

        $response = array();

            // Read Data
            foreach($query as $degree){
            $response[] = array(
                "id" => $degree['id'],
                "text" => $degree['title']
            );
            }
            //dd($response);
            return json_encode($response);

    }


}
