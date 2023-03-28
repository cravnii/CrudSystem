<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\job;
use App\Http\Requests\CreateJobRequest;
use App\Http\Requests\UpdatejobRequest;

class JobsController extends Controller
{
 public function index(){
  $data=job::select("*")->orderby("id","ASC")->paginate(10);

  return view('index', ['data'=>$data]);

 }

 public function create(){
   return view('create');
 }

 public function store(CreateJobRequest $request){
   
  $datatoinsert['name']=$request->job_name;
  $datatoinsert['active']=$request->job_active;
  $datatoinsert['created_at']=date("Y-m-d H:i:s");
  job::create($datatoinsert);

  return redirect()->route('jobindex')->with(['success'=>'Added successfully']);
 }

 public function edit($id){
  $data=job::select("*")->find($id);
  return view('edit',['data'=>$data]);
 }

 public function update($id,UpdatejobRequest $request){

  $datatoinsert['name']=$request->job_name;
  $datatoinsert['active']=$request->job_active;
  $datatoinsert['updated_at']=date("Y-m-d H:i:s");
  job::where(['id'=>$id])->update($datatoinsert);

  return redirect()->route('jobindex')->with(['success'=>'Updated successfully']);
 }

 public function destroy($id){
  job::where(['id'=>$id])->delete();
  return redirect()->route('jobindex')->with(['success'=>'Deleted successfully']);
 }

 public function ajax_search(Request $request){
  if($request->ajax()){
    $searchbyjobname=$request->searchbyjobname;
    $data=job::where("name" , "like" ,"%{$searchbyjobname}%")->orderby("id","ASC")->paginate(1);
    return view ('ajax_search', ['data'=>$data]);
  }
 }




}



