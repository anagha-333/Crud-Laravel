@extends('layouts.app')
@section('content')
<div class="card push-top">
 <div class="card-header">
 Create New employee
 </div>
 <div class="card-body">
 @if ($errors->any())
 <div class="alert alert-danger">
 <ul>
 @foreach ($errors->all() as $error)
 <li>{{$error}}</li>
 @endforeach
 </ul>
 </div><br />
 @endif
 <form method="post" action="{{route('employee.store')}}">
 <div class="form-group">
 @csrf
 <label for="name">FirstName</label>
 <input type="text" class="form-control" name="FirstName"/>
 </div>
 <label for="name">LastName</label>
 <input type="text" class="form-control" name="LastName"/>
 </div>
 <div class="form-group">
 <label for="companyid">companyid</label>
 <input type="text" class="form-control" name="companyid"/>
 </div>
 <div class="form-group">
 <label for="email">Email</label>
 <input type="email" class="form-control" name="Email"/>
 </div>
 <div class="form-group">
 <label for="phone">phone</label>
 <input type="tel" class="form-control" name="phone"/>
 </div>
 <button type="submit" class="btn btn-block btn-danger">Create Employee</button>
 </form>
 </div>



@endsection




