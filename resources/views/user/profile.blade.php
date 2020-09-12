@extends('layouts.app1')
@section('content')

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Edit Profile</h4>
                <p class="card-category">Complete your profile</p>
            </div>
            <div class="card-body">
                <form action="{{ route('user.update', auth()->user()->uuid) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">First Name</label>
                                <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ auth()->user()->first_name }}">
                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Last Name</label>
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ auth()->user()->last_name }}">
                                @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Email address</label>
                                <input disabled type="email" name="email" class="form-control" value="{{ auth()->user()->email }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Phone</label>
                                <input disabled type="text" class="form-control" name="phone" value="{{ auth()->user()->phone }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Position</label>
                                <input type="text" class="form-control @error('position') is-invalid @enderror" name="position" value="{{ auth()->user()->position }}">
                                @error('position')
                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Department</label>
                                <input type="text" class="form-control @error('department') is-invalid @enderror" name="department" value="{{ auth()->user()->department }}">
                                @error('department')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Job Description</label>
                                    <textarea class="form-control @error('job_description') is-invalid @enderror"  name="job_description" rows="5">{{ auth()->user()->job_description }}</textarea>
                                    @error('job_description')
                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="bmd-label-floating">Passport</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-profile">
            <div class="card-avatar">
                <a href="javascript:;">
                    <img class="img" src="{{ (!empty(auth()->user()->image))? asset('storage/'.auth()->user()->image) : Gravatar::src(auth()->user()->email) }}" width="350" />
                </a>
            </div>
            <div class="card-body">
                <h6 class="card-category text-gray">{{ auth()->user()->position }}</h6>
                <h4 class="card-title">{{ auth()->user()->first_name.' '.auth()->user()->last_name }}</h4>
                <p class="card-description" style="text-align: left">
                    {{ auth()->user()->job_description }}
                </p>
                <a href="javascript:;" class="btn btn-primary btn-round">Follow</a>
            </div>
        </div>
    </div>
</div>

@endsection
