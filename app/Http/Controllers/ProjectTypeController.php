<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\ScopeOfProjectSubtype;

class ProjectTypeController extends Controller
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
    public function ProjectTypeSelect(Request $request)
    {
        
        if(isset($request->searchTerm)){   
            $query = ScopeOfProjectSubtype::where('name', 'LIKE', '%' .$request->searchTerm. '%')->orderBy('name', 'desc')->limit(10)->get();
            //dd( $query );
        }else{
            $query = ScopeOfProjectSubtype::limit(10)->get();
        }

        $response = array();

            // Read Data
            foreach($query as $project_type){
            $response[] = array(
                "id" => $project_type['id'],
                "text" => $project_type['name']
            );
            }
            //dd($response);
            return json_encode($response);

    }


}
