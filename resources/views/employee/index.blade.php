@extends('layouts.app')
@section('content')
<h1>employee</h1>
<div class="card-header">
<a href="{{ route('employee.create')}}" class="btn btn-primary btn-sm"">Create</a>
</div>
<div class="push-top">
@if(session()->get('success'))
<div class="alert alert-success">
{{ session()->get('success') }}
</div><br />
@endif
<table class="table">
<thead>
<tr class="table-warning">
<td>id</td>
<td>FirstName</td>
<td>LastName</td>
<td>companyid</td>
<td>Email</td>
<td>phone</td>
<td class="text-center">Action</td>
</tr>
</thead>
<tbody>
@foreach($employee as $employees)
<tr>
<td>{{$employees->id}}</td>
<td>{{$employees->FirstName}}</td>
<td>{{$employees->LastName}}</td>
<td>{{$employees->companyid}}</td>
<td>{{$employees->Email}}</td>
<td>{{$employees->phone}}</td>
<td class="text-center">
<a href="{{ route('employee.edit', $employees->id)}}" class="btn btn-primary btn-sm"">Edit</a>
<form action="{{ route('employee.destroy', $employees->id)}}" method="post" style="display: inline-block">
@csrf
@method('DELETE')
<button class="btn btn-danger btn-sm"" type="submit">Delete</button>
</form>
</td>
</tr>
@endforeach
</tbody>
</table>
@endsection

