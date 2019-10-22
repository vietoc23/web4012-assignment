@extends('frontpage.profile.layouts')

@section('content')
<div class="col-md-9">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <h4>Change password</h4>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('user.change-password') }}" method="POST">
                        @csrf
                        @method('PUT')
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session('oldPwdError'))
                            <div class="alert alert-danger">
                                <ul>
                                    
                                    <li>{{ session('oldPwdError') }}</li>
                                    
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="old_password">Old password</label>
                            <input type="old_password" name="old_password" id="old_password" >
                        </div>
                        <div class="form-group">
                            <label for="new_password">New password</label>
                            <input type="new_password" name="new_password" id="new_password" >
                        </div>
                        <div class="form-group">
                            <label for="new_password_confirmation">Confirm new password</label>
                            <input type="new_password_confirmation" name="new_password_confirmation" id="new_password_confirmation" >
                        </div>
                        
                        
                        <button class="btn btn-primary">Submit</button>
                        
                        
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>

@endsection

                                                      