@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Check all members</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('register')  }}"> Create new Member</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered" enctype="multipart/form-data">
    <tr>
        <th>No</th>
        <th>Profile</th>
        <th>Name</th>
        <th>Email</th>
        <th>Gender</th>
        <th>Role</th>
        <th>Address</th>
        <th>Phone</th>
        <th width="250px">Action</th>
    </tr>
    @foreach ($users as $member)
    <tr>
        <td>{{ ++$i }}</td>

        <td><img src="{{ Storage::url($member->image) }}" height="40" alt="" /></td>
        <td>{{ $member->name }}</td>
        <td>{{ $member->email }}</td>
        <td>{{ $member->gender }}</td>
        <td>{{ $member->role }}</td>
        <td>{{ $member->address }}</td>
        <td>{{ $member->phone_no }}</td>
        <td>
        <form action="{{ route('home.destroy',$member->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('home.show',$member->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('home.edit', $member->id)}}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
    </tr>
    @endforeach
</table>
{!! $users->links() !!}

@endsection