<?php

namespace App\Http\Controllers\Admin\SystemSettings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SystemSettingBasicController extends Controller
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
        Return view('admin_dashboard.system_setting.index');
    }

}
