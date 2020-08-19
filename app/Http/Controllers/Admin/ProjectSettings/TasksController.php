<?php

namespace App\Http\Controllers\Admin\ProjectSettings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator,Redirect,Response;
use Carbon\Carbon;
use DataTables;

class TasksController extends Controller
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
            Return view('admin_dashboard.project_setting.tasks.taskslist');
        }
    public function fetchtaskdatatable()
        {
            $tasks =  DB::table('tasks')->select('id','name','discription')->get();

            return Datatables::of($tasks)

            ->addColumn('action', function ($tasks) {

                $html = '<i class="fa fa-edit" style="color:#0069d9; padding-right:5px" data-toggle="modal" data-target="#edittaskmodal" data-id="'.$tasks->id.'" id="'.$tasks->id.'" title="Edit This tasks"></i>';

                $html .= ' <i class="fa fa-trash " data-toggle="modal" data-target="#deletetaskmodal" style="color:#c82333" id="'.$tasks->id.'" title="Delete This tasks" data-id="'.$tasks->id.'"></i>';

                return $html;  

            })
            ->rawColumns(['action'])
            ->make(true);
        }

        public function store(Request $request)
        {
            $validatedData = $request->validate([
                'name' => 'bail|required',
                'discription' => 'bail|required',
                ]);
            
            try {
    
                DB::table('tasks')->insert(
                    ['name' => $request->name,'discription' => $request->discription, 'created_at' => Carbon::now(),]
                );
    
                $arr = array('msg' => 'New Skill task Successfully', 'status' => true);
                $request->session()->flash('form_success', 'New task Added Successfully');
            } catch(\Illuminate\Database\QueryException $ex){ 
                $arr = array('msg' => $ex->getMessage(), 'status' => false);
            }
    
            return Response()->json($arr);
    
            //dd($request->all());
        }

        public function fetch(Request $request)
        {
    
            $skill = DB::table('tasks')->where('id',$request->task_id)->select('id','name','discription')->first();
            $arr = array('data' => $skill, 'status' => true);
            return Response()->json($arr);
        }

        public function edit(Request $request)
        {
            
            $validatedData = $request->validate([
                'name' => 'bail|required',
                'discription' => 'bail|required',
                ]);
                try {
                    DB::table('tasks')->where('id', $request->custId)->update(
                        ['name' => $request->name,'discription' => $request->discription,'updated_at' => Carbon::now(),]
                    );
    
                    $arr = array('msg' => 'Task Updated Successfully', 'status' => true);
                    $request->session()->flash('form_success', 'Task Updated Successfully');
                } catch(\Illuminate\Database\QueryException $ex){ 
                    $arr = array('msg' => $ex->getMessage(), 'status' => false);
                }
                return Response()->json($arr);
        }

        public function delete(Request $request)
        {
           // dd($request->all());
           
           try { 
                    DB::table('tasks')->delete($request->id);
                } catch(\Illuminate\Database\QueryException $ex){ 
                    $arr = array('msg' => $ex->getMessage(), 'status' => false);
                }
            $request->session()->flash('skill_deleted', 'task Deleted Successfully');
            $arr = array('msg' => 'task Deleted Successfully', 'status' => true );
            return Response()->json($arr);
        }

        

}
