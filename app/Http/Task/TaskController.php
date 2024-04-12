<?php
namespace App\Http\Task;

use App\Http\Controllers\Controller;
use App\Models\TaskModule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function index()
    {
        $data = TaskModule::all();
        return view('index',['data'=>$data]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'task'=>'required',
            'description'=>'required',
            'category'=>'required',
            'tags'=>'required',
            'status'=>'required',
        ]);
        if($validator->fails()){
            return response()->json(['status'=>403,'msg'=>$validator->messages()->first()]);
        }else{
            $data = $request->all();
            $data['user_id'] = auth()->user()->id;
            $data['status'] = $data['status'] == 'true' ? true : false;
            TaskModule::create($data);
            return response()->json(['status'=>200,'msg'=>'Stored!']);
        }
    }
    public function edit(Request $request)
    {
        $data = TaskModule::find($request->id);
        return view('edit',['data'=>$data]);
    }
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'task'=>'required',
            'description'=>'required',
            'category'=>'required',
            'tags'=>'required',
            'status'=>'required',
        ]);
        if($validator->fails()){
            return response()->json(['status'=>403,'msg'=>$validator->messages()->first()]);
        }else{
            $data = $request->all();
            $data['user_id'] = auth()->user()->id;
            $data['status'] = $data['status'] == 'true' ? true : false;
            TaskModule::find($request->id)->update($data);
            return response()->json(['status'=>200,'msg'=>'Update!']);
        }
    }
    public function delete(Request $request)
    {
        TaskModule::find($request->id)->delete();
        return redirect()->back();
    }
}

?>