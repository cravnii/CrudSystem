@extends('main')
@section('title')
اضافة وظيفة جديدة
@endsection

@section('content')

<form method="post" action="{{route('storejob')}}" style="width: 80%; margin:0 auto;">
  @csrf 
    <div class="form-group">
      <label for="job_name">Job name</label>
      <input type="text" class="form-control" id="job_name" name="job_name" value="{{old('job_name')}}">
      @error('job_name')
      <span class="text-danger"> {{$message}}</span>   
      @enderror
    </div>

    <div class="form-group">
        <label for="job_name"> active status</label>
        <select class="form-control" name= "job_active" id= "job_active">
            <option value=""> Select status</option>   
            <option @if (old('job_active')==1) selected @endif value="1">Yes</option>
            <option @if (old('job_active')==0 and old ('job_active')!='') selected @endif value="0">No</option>
        </select>
        @error('job_active')
      <span class="text-danger"> {{$message}}</span>   
      @enderror
    </div>


    <button type="submit" class="btn btn-primary">Add job</button>
  </form>

@endsection