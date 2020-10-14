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

class EditProjectController extends Controller
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
    public function index($id)
    {
        $project = Project::where('id',$id)->with('projectpreviousdesign','projectstreetaddress','projectsociety.society','projectmouza.mouza','projectzone.zone','reqcusfieldanswers.requirementcustomfield','projectunitforarea.unitforarea','user','reqcusfieldanswers.requirementcustomfield.requirementtype','projectservice.service','projectscopeofprojectsubtype.scopeofprojectsubtype','projectclient.clientscontactuser')->first();
         //dd($project);
            
        Return view('admin_dashboard.project.newproject.edit',['project' => $project]);
    }




    public function store(Request $request)
    {
        
        
        $validatedData = $request->validate([
            'edit_project_id' => 'bail|required',
            'project_name' => 'bail|required',
            'project_area' => 'bail|required',
            'project_unit' => 'bail|required',
            'project_service' => 'bail|required',
            'project_client' => 'bail|required',
            'project_project_type' => 'bail|required',
            'expected_completion_date' => 'bail|date',
            'project_design_1' => 'bail|nullable|mimes:jpeg,jpg,pdf|max:3000',
            'project_design_2' => 'bail|nullable|mimes:jpeg,jpg,pdf|max:3000',
            'nic_scan' => 'bail|nullable|mimes:jpeg,jpg,pdf|max:3000',
            'allotment_letter_scan' => 'bail|nullable|mimes:jpeg,jpg,pdf|max:3000',
            'fard_scan' => 'bail|nullable|mimes:jpeg,jpg,pdf|max:3000',
            'asc_scan' => 'bail|nullable|mimes:jpeg,jpg,pdf|max:3000',
            'company_document_scan' => 'bail|nullable|mimes:jpeg,jpg,pdf|max:3000',
        ]);


        // $project = Project::where('id',$request->edit_project_id)->with('reqcusfieldanswers.requirementcustomfield')->first();
        // dd($project);

        $date = Carbon::createFromDate(); 

        try {


            $project_id = DB::table('projects')
                ->where('id', $request->edit_project_id)
                ->update(
                    array('name' => $request->project_name,
                    'area' => $request->project_area,
                    'expected_completion_date' => $request->expected_completion_date,
                    'status' => 'updated',
                    'updated_at' => Carbon::now(),
                    
                    )
                );

                DB::table('project_scope_of_project_subtypes')
                ->where('project_id', $request->edit_project_id)
                ->update(
                    ['scope_of_project_subtype_id' => $request->project_project_type,
                    'updated_at' => Carbon::now(),]
                );

                DB::table('project_unit_for_areas')
                ->where('project_id', $request->edit_project_id)
                ->update(
                    ['unit_for_area_id' => $request->project_unit,
                    'updated_at' => Carbon::now(),]
                );

                DB::table('project_street_addresses')
                ->where('project_id', $request->edit_project_id)
                ->update(
                    ['home' => $request->project_home,'plot' => $request->project_plot, 'street' => $request->project_street,'phase' => $request->project_phase,'sector' => $request->project_sector,'society' => $request->project_society,'city' => $request->project_city,'updated_at' => Carbon::now(),]
                );

                

            if($request->project_mouza != null){

                DB::table('project_mouzas')->where('project_id', $request->edit_project_id)->delete();

                foreach($request->project_mouza as $mouza){

                    DB::table('project_mouzas')->insert(
                        array(
                            'project_id' => $request->edit_project_id,
                            'mouza_id' => $mouza,
                            'created_at' => Carbon::now(),
                        )
                    );


                }
            }

            if($request->project_zone != null){

                DB::table('project_zones')->where('project_id', $request->edit_project_id)->delete();

                foreach($request->project_zone as $zone){

                    DB::table('project_zones')->insert(
                        array(
                            'project_id' => $request->edit_project_id,
                            'zone_id' => $zone,
                            'created_at' => Carbon::now(),
                        )
                    );

                }
            }

            if($request->project_societies != null){

                DB::table('project_societies')->where('project_id', $request->edit_project_id)->delete();

                foreach($request->project_societies as $society){

                    DB::table('project_societies')->insert(
                        array(
                            'project_id' => $request->edit_project_id,
                            'society_id' => $society,
                            'created_at' => Carbon::now(),
                        )
                    );

                }
            }


            if($request->project_client != null){

                DB::table('project_clients')->where('project_id', $request->edit_project_id)->delete();

                foreach($request->project_client as $clients){

                    DB::table('project_clients')->insert(
                        array(
                            'project_id' => $request->edit_project_id,
                            'clients_contact_user_id' => $clients,
                            'created_at' => Carbon::now(),
                        )
                    );

                }
            }


            if($request->project_service != null){


                DB::table('project_services')->where('project_id', $request->edit_project_id)->delete();
                
                foreach($request->project_service as $service){

                    DB::table('project_services')->insert(
                        array(
                            'project_id' => $request->edit_project_id,
                            'service_id' => $service,
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

            $path = $request->file('project_design_1')->storeAs('public/project_files/project_info_files/'.$request->edit_project_id, $name_to_store);



            }

            if($request->project_design_2 != null){


                $file_name_with_ext = $request->file('project_design_2')->getClientOriginalName();
    
                $just_file_name = pathinfo($file_name_with_ext, PATHINFO_FILENAME);
    
                $extension = $request->file('project_design_2')->getClientOriginalExtension();
    
                $name_to_store = 'project_design_2.'.$extension;
    
                $path = $request->file('project_design_2')->storeAs('public/project_files/project_info_files/'.$request->edit_project_id, $name_to_store);
    

    
            }
            

            if($request->nic_scan != null){
                $file_name_with_ext = $request->file('nic_scan')->getClientOriginalName();
    
                $just_file_name = pathinfo($file_name_with_ext, PATHINFO_FILENAME);
    
                $extension = $request->file('nic_scan')->getClientOriginalExtension();
    
                $name_to_store = 'nic_scan.'.$extension;
    
                $path = $request->file('nic_scan')->storeAs('public/project_files/project_info_files/'.$request->edit_project_id, $name_to_store);
    

    
            }


            if($request->allotment_letter_scan != null){
                $file_name_with_ext = $request->file('allotment_letter_scan')->getClientOriginalName();
    
                $just_file_name = pathinfo($file_name_with_ext, PATHINFO_FILENAME);
    
                $extension = $request->file('allotment_letter_scan')->getClientOriginalExtension();
    
                $name_to_store = 'allotment_letter_scan.'.$extension;
    
                $path = $request->file('allotment_letter_scan')->storeAs('public/project_files/project_info_files/'.$request->edit_project_id, $name_to_store);
    

    
            }


            if($request->fard_scan != null){
                $file_name_with_ext = $request->file('fard_scan')->getClientOriginalName();
    
                $just_file_name = pathinfo($file_name_with_ext, PATHINFO_FILENAME);
    
                $extension = $request->file('fard_scan')->getClientOriginalExtension();
    
                $name_to_store = 'fard_scan.'.$extension;
    
                $path = $request->file('fard_scan')->storeAs('public/project_files/project_info_files/'.$request->edit_project_id, $name_to_store);
    

    
            }

            if($request->asc_scan != null){
                $file_name_with_ext = $request->file('asc_scan')->getClientOriginalName();
    
                $just_file_name = pathinfo($file_name_with_ext, PATHINFO_FILENAME);
    
                $extension = $request->file('asc_scan')->getClientOriginalExtension();
    
                $name_to_store = 'asc_scan.'.$extension;
    
                $path = $request->file('asc_scan')->storeAs('public/project_files/project_info_files/'.$request->edit_project_id, $name_to_store);
    

    
            }

            if($request->company_document_scan != null){
                $file_name_with_ext = $request->file('company_document_scan')->getClientOriginalName();
    
                $just_file_name = pathinfo($file_name_with_ext, PATHINFO_FILENAME);
    
                $extension = $request->file('company_document_scan')->getClientOriginalExtension();
    
                $name_to_store = 'company_document_scan.'.$extension;
    
                $path = $request->file('company_document_scan')->storeAs('public/project_files/project_info_files/'.$request->edit_project_id, $name_to_store);
    

    
            }



            $arr = array('msg' => 'Project Edited Successfully', 'status' => true);
            $request->session()->flash('form_success', 'Project Edited Successfully');
        } catch(\Illuminate\Database\QueryException $ex){ 
             $arr = array('msg' => $ex->getMessage(), 'status' => false);
        }
        
        return Response()->json($arr);





        
    }

}
