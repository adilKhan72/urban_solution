<?php

namespace App\Http\Controllers\Admin\ProjectSettings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator,Redirect,Response;
use Carbon\Carbon;
use DataTables;

class AreaUnitController extends Controller
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
    public function index()
    {
        $unit_for_areas =  DB::table('unit_for_areas')->select('id','unit_type', 'area_in_feet')->get();

        return Datatables::of($unit_for_areas)

        ->addColumn('action', function ($unit_for_areas) {

            $html = '<i class="fa fa-edit" style="color:#0069d9; padding-right:5px" data-toggle="modal" data-target="#editareaunitmodal" data-id="'.$unit_for_areas->id.'" id="'.$unit_for_areas->id.'" title="Edit This areaunit"></i>';

            $html .= ' <i class="fa fa-trash " data-toggle="modal" data-target="#deleteareaunitmodal" style="color:#c82333" id="'.$unit_for_areas->id.'" title="Delete This areaunit" data-id="'.$unit_for_areas->id.'"></i>';

            return $html;  

        })
        ->rawColumns(['action'])
        ->make(true);
    }

}
