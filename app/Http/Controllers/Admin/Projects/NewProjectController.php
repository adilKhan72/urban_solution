<?php

namespace App\Http\Controllers\Admin\Projects;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator,Redirect,Response;
use Carbon\Carbon;
use DataTables;
use App\RequirementType;
use App\Project;
use Illuminate\Support\Facades\URL;

class NewProjectController extends Controller
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
        Return view('admin_dashboard.project.index');
    }
    public function newProject()
    {
        Return view('admin_dashboard.project.newproject.index');
    }

    public function edit()
    {
        Return view('admin_dashboard.project.newproject.index');
    }

    public function getdatatable()
    {
        $projects = Project::with('projectrequirementtype','projectunitforarea.unitforarea','user','reqcusfieldanswers.requirementcustomfield.requirementtype','projectservice','projectscopeofprojectsubtype.scopeofprojectsubtype')->get();

        //dd($projects);
        return Datatables::of($projects)
        ->addColumn('basic', function ($projects) {
            $html = ' <div class="list-group">
            
            <li  class="list-group-item cardheadercolor" >Name <span class="badge float-right" style="font-size: 100%;">'.$projects->name.'</span></li>
            <li  class="list-group-item">Status<span class="badge float-right" style="font-size: 100%;">'.$projects->status.'</span></li>
            <li  class="list-group-item">Progress<span class="badge float-right" style="font-size: 100%;">'.$projects->progress_in_percent.'%</span></li>
            <li  class="list-group-item">Area<span class="badge float-right" style="font-size: 100%;">'.$projects->area.'</span></li>
            <li  class="list-group-item">Unit<span class="badge float-right" style="font-size: 100%;">'.$projects->projectunitforarea->unitforarea->unit_type.'</span></li>
          </div> ';
            return $html;
        })
        ->addColumn('details', function ($projects) {
            $html = ' <div class="list-group">
            <li  class="list-group-item cardheadercolor">Number <span class="badge float-right" style="font-size: 100%;">'.$projects->project_number.'</span></li>
            <li  class="list-group-item">Created By<span class="badge float-right" style="font-size: 100%;">'.$projects->user->first_name.'</span></li>
            <li  class="list-group-item">Completion date<span class="badge float-right" style="font-size: 100%;">'.$projects->expected_completion_date.'</span></li>
            <li  class="list-group-item">Project Type<span class="badge float-right" style="font-size: 100%;">'.$projects->projectscopeofprojectsubtype->scopeofprojectsubtype->name.'</span></li>
            <li  class="list-group-item">Req Performa<span class="badge float-right" style="font-size: 100%;">'.$projects->reqcusfieldanswers->requirementcustomfield->requirementtype->type.'</span></li>

          </div> ';
            return $html;
        })
        ->addColumn('action', function ($projects) {

            $html = '<a class="fa fa-edit" href="'.URL::route("admindashboard.projecttab.edit").'" style="color:#0069d9; font-size: 30px; padding:5px" title="Edit This project"></a>';

            $html .= ' <i class="fa fa-trash " data-toggle="modal" data-target="#deleteprojectmodal" style="color:#c82333; padding:5px; font-size: 30px; "id="'.$projects->id.'" title="Delete This project" data-id="'.$projects->id.'"></i>';

            return $html;  

        })
        ->rawColumns(['action','basic','details'])
        ->make(true);
    }


    public function delete(Request $request)
    {
       // dd($request->all());
       
       try { 
                DB::table('projects')->delete($request->id);
            } catch(\Illuminate\Database\QueryException $ex){ 
                $arr = array('msg' => $ex->getMessage(), 'status' => false);
            }
        $request->session()->flash('skill_deleted', 'checklist Deleted Successfully');
        $arr = array('msg' => 'checklist Deleted Successfully', 'status' => true );
        return Response()->json($arr);
    }


    public function FetchReqDetailsById(Request $request)
    {
        $requirementtype = RequirementType::where('id',$request->requirements_performa_id)->with('requirementcustomfield')->get();
        //dd($requirementtype);
        $arr = array('data' => $requirementtype, 'status' => true);
        return Response()->json($arr);
    }

    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'project_name' => 'bail|required',
            'project_area' => 'bail|required',
            'project_unit' => 'bail|required',
            'project_service' => 'bail|required',
            'project_client' => 'bail|required',
            'project_project_type' => 'bail|required',
            'project_requirement' => 'bail|required',
            'expected_completion_date' => 'bail|date',
            'project_design_1' => 'bail|nullable|mimes:jpeg,jpg,pdf|max:3000',
            'project_design_2' => 'bail|nullable|mimes:jpeg,jpg,pdf|max:3000',
            'nic_scan' => 'bail|nullable|mimes:jpeg,jpg,pdf|max:3000',
            'allotment_letter_scan' => 'bail|nullable|mimes:jpeg,jpg,pdf|max:3000',
            'fard_scan' => 'bail|nullable|mimes:jpeg,jpg,pdf|max:3000',
            'asc_scan' => 'bail|nullable|mimes:jpeg,jpg,pdf|max:3000',
            'company_document_scan' => 'bail|nullable|mimes:jpeg,jpg,pdf|max:3000',
        ]);

        $date = Carbon::createFromDate(); 

        try {

            $project_id = DB::table('projects')->insertGetId(
                array('name' => $request->project_name,
                'area' => $request->project_area,
                'expected_completion_date' => $request->expected_completion_date,
                'progress_in_percent' => '0.00',
                'status' => 'created',
                'project_number' => 'project_number',
                'user_id' => Auth::user()->id,
                'created_at' => Carbon::now(),
                )
            );

            $project_number = '00'.$project_id.'_'.strtotime($date);

            DB::table('projects')->where('id', $project_id)->update(
                ['project_number' => $project_number,]
            );


            DB::table('project_scope_of_project_subtypes')->insert(
                ['project_id' => $project_id,'scope_of_project_subtype_id' => $request->project_project_type,'created_at' => Carbon::now(),]
            );

            DB::table('project_unit_for_areas')->insert(
                ['project_id' => $project_id,'unit_for_area_id' => $request->project_unit,'created_at' => Carbon::now(),]
            );

            DB::table('project_street_addresses')->insert(
                ['project_id' => $project_id,'home' => $request->project_home,'plot' => $request->project_plot, 'street' => $request->project_street,'phase' => $request->project_phase,'sector' => $request->project_sector,'society' => $request->project_society,'city' => $request->project_city,'created_at' => Carbon::now(),]
            );

            if($request->project_mouza != null){

                foreach($request->project_mouza as $mouza){

                    DB::table('project_mouzas')->insert(
                        array(
                            'project_id' => $project_id,
                            'mouza_id' => $mouza,
                            'created_at' => Carbon::now(),
                        )
                    );

                }
            }

            if($request->project_zone != null){

                foreach($request->project_zone as $zone){

                    DB::table('project_zones')->insert(
                        array(
                            'project_id' => $project_id,
                            'zone_id' => $zone,
                            'created_at' => Carbon::now(),
                        )
                    );

                }
            }

            if($request->project_societies != null){

                foreach($request->project_societies as $society){

                    DB::table('project_societies')->insert(
                        array(
                            'project_id' => $project_id,
                            'society_id' => $society,
                            'created_at' => Carbon::now(),
                        )
                    );

                }
            }


            if($request->project_client != null){

                foreach($request->project_client as $clients){

                    DB::table('project_clients')->insert(
                        array(
                            'project_id' => $project_id,
                            'clients_contact_user_id' => $clients,
                            'created_at' => Carbon::now(),
                        )
                    );

                }
            }


            if($request->project_service != null){

                foreach($request->project_service as $service){

                    DB::table('project_services')->insert(
                        array(
                            'project_id' => $project_id,
                            'service_id' => $service,
                            'created_at' => Carbon::now(),
                        )
                    );

                }
            }


            if($request->req_cus_field_answer_answer_id != null){

                $keysOne = array_keys($request->req_cus_field_answer_answer_id);
                $keysTwo = array_keys($request->req_cus_field_answer_answer);

                $min = min(count($request->req_cus_field_answer_answer_id), count($request->req_cus_field_answer_answer));
                
                $ad = [];
                for($i = 0; $i < $min; $i++) {

                    DB::table('req_cus_field_answers')->insert(
                        array(
                            'project_id' => $project_id,
                            'requirement_custom_field_id' => $request->req_cus_field_answer_answer_id[$keysOne[$i]],
                            'answer' => $request->req_cus_field_answer_answer[$keysTwo[$i]],
                            'created_at' => Carbon::now(),
                        )
                    );
                }      
            }


            if($request->project_design_1 != null){


            $file_name_with_ext = $request->file('project_design_1')->getClientOriginalName();

            $just_file_name = pathinfo($file_name_with_ext, PATHINFO_FILENAME);

            $extension = $request->file('project_design_1')->getClientOriginalExtension();

            $name_to_store = 'project_design_1.'.$extension;

            $path = $request->file('project_design_1')->storeAs('public/project_files/project_info_files/'.$project_id, $name_to_store);

            DB::table('project_previous_designs')->insert(['project_id' => $project_id,'design_document' => $path, 'created_at' => Carbon::now()]);

            }

            if($request->project_design_2 != null){


                $file_name_with_ext = $request->file('project_design_2')->getClientOriginalName();
    
                $just_file_name = pathinfo($file_name_with_ext, PATHINFO_FILENAME);
    
                $extension = $request->file('project_design_2')->getClientOriginalExtension();
    
                $name_to_store = 'project_design_2.'.$extension;
    
                $path = $request->file('project_design_2')->storeAs('public/project_files/project_info_files/'.$project_id, $name_to_store);
    
                DB::table('project_previous_designs')->insert(['project_id' => $project_id,'design_document' => $path, 'created_at' => Carbon::now()]);
    
            }
            

            if($request->nic_scan != null){
                $file_name_with_ext = $request->file('nic_scan')->getClientOriginalName();
    
                $just_file_name = pathinfo($file_name_with_ext, PATHINFO_FILENAME);
    
                $extension = $request->file('nic_scan')->getClientOriginalExtension();
    
                $name_to_store = 'nic_scan.'.$extension;
    
                $path = $request->file('nic_scan')->storeAs('public/project_files/project_info_files/'.$project_id, $name_to_store);
    
                DB::table('project_previous_designs')->insert(['project_id' => $project_id,'design_document' => $path, 'created_at' => Carbon::now()]);
    
            }


            if($request->allotment_letter_scan != null){
                $file_name_with_ext = $request->file('allotment_letter_scan')->getClientOriginalName();
    
                $just_file_name = pathinfo($file_name_with_ext, PATHINFO_FILENAME);
    
                $extension = $request->file('allotment_letter_scan')->getClientOriginalExtension();
    
                $name_to_store = 'allotment_letter_scan.'.$extension;
    
                $path = $request->file('allotment_letter_scan')->storeAs('public/project_files/project_info_files/'.$project_id, $name_to_store);
    
                DB::table('project_previous_designs')->insert(['project_id' => $project_id,'design_document' => $path, 'created_at' => Carbon::now()]);
    
            }


            if($request->fard_scan != null){
                $file_name_with_ext = $request->file('fard_scan')->getClientOriginalName();
    
                $just_file_name = pathinfo($file_name_with_ext, PATHINFO_FILENAME);
    
                $extension = $request->file('fard_scan')->getClientOriginalExtension();
    
                $name_to_store = 'fard_scan.'.$extension;
    
                $path = $request->file('fard_scan')->storeAs('public/project_files/project_info_files/'.$project_id, $name_to_store);
    
                DB::table('project_previous_designs')->insert(['project_id' => $project_id,'design_document' => $path, 'created_at' => Carbon::now()]);
    
            }

            if($request->asc_scan != null){
                $file_name_with_ext = $request->file('asc_scan')->getClientOriginalName();
    
                $just_file_name = pathinfo($file_name_with_ext, PATHINFO_FILENAME);
    
                $extension = $request->file('asc_scan')->getClientOriginalExtension();
    
                $name_to_store = 'asc_scan.'.$extension;
    
                $path = $request->file('asc_scan')->storeAs('public/project_files/project_info_files/'.$project_id, $name_to_store);
    
                DB::table('project_previous_designs')->insert(['project_id' => $project_id,'design_document' => $path, 'created_at' => Carbon::now()]);
    
            }

            if($request->company_document_scan != null){
                $file_name_with_ext = $request->file('company_document_scan')->getClientOriginalName();
    
                $just_file_name = pathinfo($file_name_with_ext, PATHINFO_FILENAME);
    
                $extension = $request->file('company_document_scan')->getClientOriginalExtension();
    
                $name_to_store = 'company_document_scan.'.$extension;
    
                $path = $request->file('company_document_scan')->storeAs('public/project_files/project_info_files/'.$project_id, $name_to_store);
    
                DB::table('project_previous_designs')->insert(['project_id' => $project_id,'design_document' => $path, 'created_at' => Carbon::now()]);
    
            }



            $arr = array('msg' => 'New Project Created Successfully', 'status' => true);
            $request->session()->flash('form_success', 'New Project Created Successfully');
        } catch(\Illuminate\Database\QueryException $ex){ 
             $arr = array('msg' => $ex->getMessage(), 'status' => false);
        }
        
        return Response()->json($arr);





        
    }

}
