@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Member') }}</div>
                <!-- <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('home.index') }}"> Back</a>
            </div> -->
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
                <div class="card-body">

                    <form action="{{ route('home.update',$users->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $users->name }}" required autocomplete="name" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $users->email }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <textarea id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" required autocomplete="address" autofocus>{{ $users->address }}</textarea>

                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <div class="form-group row">
                                <label for="phone_no" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                                <div class="col-md-6">
                                    <input id="phone_no" type="number" class="form-control @error('phone_no') is-invalid @enderror" name="phone_no" value="{{ $users->phone_no }}" required autocomplete="phone_no" autofocus>

                                    @error('phone_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>
                                <div class="col-md-6">
                                    <label>
                                        <input type="radio" name="gender" value="male" {{ ($users->gender == 'male') ? 'checked' : '' }}>Male
                                    </label>
                                    <label>
                                        <input type="radio" name="gender" value="female" {{ ($users->gender == 'female') ? 'checked' : '' }}>Female
                                    </label>
                                    <label>
                                        <input type="radio" name="gender" value="others" {{ ($users->gender == 'others') ? 'checked' : '' }}>Others
                                    </label>


                                    @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="dropdown form-group row">
                                <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>
                                <div class="col-md-6">
                                    <select name="role" class="btn btn-secondary dropdown-toggle" id="dropdownMenuButton pickone" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <option class="dropdown-item" disabled selected>-- Select Role --</option>

                                            <option value="English teacher" {{ ($users->role == 'English teacher') ? 'selected' : '' }}>English teacher</option>
                                            <option value="Tamil teacher" {{ ($users->role == 'Tamil teacher') ? 'selected' : '' }}>Tamil teacher</option>
                                            <option value="Maths teacher" {{ ($users->role == 'Maths teacher') ? 'selected' : '' }}>Maths teacher</option>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>
                            <div class="col-md-6">
                                    <img  src="{{ Storage::url($users->image) }}" height="40" alt="" />
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>


                    </form>
                    @endsection