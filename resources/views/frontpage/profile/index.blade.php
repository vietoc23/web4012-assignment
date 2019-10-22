@extends('frontpage.profile.layouts')

@section('content')
  <div class="col-md-9">
      <div class="card">
          <div class="card-body">
              <div class="row">
                  <div class="col-md-12">
                      <h4>{{ $auth_user->name }}'s Profile</h4>
                      <hr>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-12">
                      <form action="{{ route('user.update-profile') }}" method="POST">
                              @csrf
                              @if ($errors->any())
                                  <div class="alert alert-danger">
                                      <ul>
                                          @foreach ($errors->all() as $error)
                                              <li>{{ $error }}</li>
                                          @endforeach
                                      </ul>
                                  </div>
                              @endif
                            <div class="form-group row">
                              <label for="name" class="col-4 col-form-label">Name</label> 
                              <div class="col-8">
                                <input id="name" name="name" placeholder="Name" class="form-control here" type="text" value="{{ old('name', $auth_user->name) }}">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="birthday" class="col-4 col-form-label">Birthday</label> 
                              <div class="col-8">
                                <input id="birthday" name="birthday" class="form-control here" type="date"  value="{{ old('birthday', $auth_user->birthday) }}">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="phone" class="col-4 col-form-label">Phone</label> 
                              <div class="col-8">
                                <input id="phone" name="phone" placeholder="Phone number" class="form-control here" type="text"  value="{{ old('phone', $auth_user->phone) }}">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="email" class="col-4 col-form-label">Email</label> 
                              <div class="col-8">
                                <input id="email" name="email" placeholder="First Name" class="form-control here" type="email"  value="{{ old('email', $auth_user->email) }}">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="role" class="col-4 col-form-label">Role</label> 
                              <div class="col-8">
                                <p>{{ $auth_user->role == 1 ? 'User' : 'Admin' }} </p>
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <div class="offset-4 col-8">
                                <button type="submit" class="btn btn-primary">Update My Profile</button>
                              </div>
                            </div>
                          </form>
                  </div>
              </div>
              
          </div>
      </div>
  </div>
@endsection


                                                      