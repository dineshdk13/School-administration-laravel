@extends('layouts.app')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Member</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('home.index') }}"> Back</a>
            </div>
        </div>
    </div>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Warning!</strong> Please check input field code<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('home.update',$users->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name"  value="{{ $users->name }}" class="form-control" placeholder="Username">
            </div>
        </div>
      
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Address:</strong>
                <textarea class="form-control" style="height:80px" name="address"  placeholder="Address">{{ $users->address }}</textarea>
            </div>
        </div>
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Phone Number:</strong>
                <input type="number" name="phone_no" value="{{ $users->phone_no }}" class="form-control" placeholder="Phone NUmber">
            </div>
        </div>
        <div>
                            <input type="radio" id="in-category-male" name="gender" value="male" @if ($users->gender == "male") {
                                                                                                       <?php echo "checked";?>
                                                                                                    } @endif>
                            <label for="male">Male</label>
                            <input type="radio" id="in-category-female" name="gender" value="female" @if ($users->gender == "female") {
                                                                                                       <?php echo "checked";?>
                                                                                                    } @endif>
                            <label for="female">Female</label>
                            <input type="radio" id="in-category-other" name="gender" value="other" @if ($users->gender == "other") {
                                                                                                       <?php echo "checked";?>
                                                                                                    } @endif>
                            <label for="other">Other</label>
                        </div>

        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Role:</strong>
                <input type="text" name="role" value="{{ $users->role }}" class="form-control" placeholder="Role">
            </div>
        </div>
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="text" name="email" value="{{ $users->email }}" class="form-control" placeholder="Email">
            </div>
        </div>
        
            <div class="form-group">
              <img src="{{ Storage::url($users->image) }}" height="40"  alt="" />
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
   
    </form>
@endsection