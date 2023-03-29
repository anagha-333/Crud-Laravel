@extends('layouts.app')
@section('content')
<div class="card push-top">
<div class="card-header">
Edit & Update
</div>
<div class="card-body">
@if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div><br />
@endif
<form method="post" action="{{ route('employee.update', $employee->id) }}">
<div class="form-group">
@csrf
@method('PATCH')
<label for="name">FirstName</label>
<input type="text" class="form-control" name="FirstName" value="{{ $employee->FirstName }}"/>
</div>
<div class="form-group">
<label for="name">LastName</label>
<input type="text" class="form-control" name="LastName" value="{{ $employee->LastName }}"/>
</div>
<div class="form-group">
<label for="name">companyid</label>
<input type="text" class="form-control" name="companyid" value="{{ $employee->companyid }}"/>
</div>
<div class="form-group">
<label for="email">Email</label>
<input type="email" class="form-control" name="Email" value="{{ $employee->Email }}"/>
</div>
<div class="form-group">
<label for="phone">phone</label>
<input type="tel" class="form-control" name="phone" value="{{ $employee->phone }}"/>
</div>
<button type="submit" class="btn btn-block btn-danger">Update employee</button>
</form>
</div>
</div>
@endsection