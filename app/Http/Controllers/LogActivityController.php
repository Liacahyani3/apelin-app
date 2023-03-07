<?php

namespace App\Http\Controllers;
use App\Models\LogActivity;
use Gate;
use Illuminate\Http\Request;

class LogActivityController extends Controller
{

    public function index(Request $request)
    {
        $data = Gate::allows('admin') ? $this->all($request) : $this->kasir($request);

        return view('log_activity.index',[
            'data'=>$data,
        ]);
    }
    protected function all(Request $request){
        return LogActivity::list($request->nama);
    }
    protected function owner(Request $request){
        return LogActivity::list($request->nama,['owner']);
    }
    public function clear()
    {
        LogActivity::truncate();
        return back()->with('status','clear');
    
}

}