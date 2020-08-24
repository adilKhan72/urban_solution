<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\ClientsContactUser;

class ClientsController extends Controller
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
    public function ClientSelect(Request $request)
    {
        
        if(isset($request->searchTerm)){   
            $query = ClientsContactUser::where('name', 'LIKE', '%' .$request->searchTerm. '%')->orderBy('name', 'desc')->limit(10)->get();
            //dd( $query );
        }else{
            $query = ClientsContactUser::limit(10)->get();
        }

        $response = array();

            // Read Data
            foreach($query as $unit){
            $clients = $unit['name']. " (" .$unit['designation'].")";
            $response[] = array(
                "id" => $unit['id'],
                "text" => $clients
            );
            }
            //dd($response);
            return json_encode($response);

    }


}
