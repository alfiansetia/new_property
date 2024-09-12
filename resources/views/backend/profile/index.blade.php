@extends('layouts.backend', ['title' => 'Profile'])

@push('css')
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="{{ $user->avatar }}"
                                alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{ $user->name }}</h3>

                        <p class="text-muted text-center">{{ $user->role }}</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Property</b> <a class="float-right">{{ hrg($user->properties()->count()) }}</a>
                            </li>
                        </ul>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-block"
                                onclick="return confirm('Sign Out?')"><b>Sign Out</b></button>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- About Me Box -->

                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <h5>Edit Profile</h5>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <form class="form-horizontal" method="POST" action="{{ route('backend.profile.update') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror" id="name"
                                        placeholder="Name" value="{{ $user->name }}" maxlength="50" autofocus required>
                                    @error('name')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror" id="email"
                                        placeholder="Email" value="{{ $user->email }}" maxlength="50" readonly disabled>
                                    @error('email')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                                <div class="col-sm-10">
                                    <select name="gender" id="gender"
                                        class="form-control @error('gender') is-invalid @enderror" required>
                                        <option value="male" @selected($user->gender == 'male')>Male</option>
                                        <option value="female" @selected($user->gender == 'female')>Female</option>
                                    </select>
                                    @error('gender')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-10">
                                    <input type="tel" name="phone"
                                        class="form-control @error('phone') is-invalid @enderror" id="phone"
                                        value="{{ $user->phone }}" placeholder="Phone" required>
                                    @error('phone')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="birthday" class="col-sm-2 col-form-label">Birthday</label>
                                <div class="col-sm-10">
                                    <input type="date" name="birthday"
                                        class="form-control @error('birthday') is-invalid @enderror" id="birthday"
                                        placeholder="Birthday" value="{{ $user->birthday }}" required>
                                    @error('birthday')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="avatar" class="col-sm-2 col-form-label">Avatar</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="avatar"
                                                class="custom-file-input @error('avatar') is-invalid @enderror"
                                                id="avatar" accept="image/jpeg, image/png, image/jpg">
                                            <label class="custom-file-label" for="avatar">Choose file</label>
                                        </div>
                                    </div>
                                    @error('avatar')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <img src="{{ $user->avatar }}" alt="Avatar" width="100">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address" class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <textarea name="address" class="form-control @error('address') is-invalid @enderror" id="address"
                                        placeholder="Address" maxlength="200" required>{{ $user->address }}</textarea>
                                    @error('address')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> I agree to the <a href="#">terms and
                                                conditions</a>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger">Submit</button>
                                </div>
                            </div>
                        </form>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>

                <div class="card">
                    <div class="card-header p-2">
                        <h5>Edit Password</h5>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <form method="POST" class="needs-validation" action="{{ route('backend.password.update') }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="password" class="col-sm-2 col-form-label">New Password</label>
                                    <div class="col-sm-10">
                                        <input name="password" type="password" id="password"
                                            class="form-control @error('password') is-invalid @enderror" value=""
                                            required autofocus>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password_confirmation" class="col-sm-2 col-form-label">Confirm
                                        Password</label>
                                    <div class="col-sm-10">
                                        <input name="password_confirmation" type="password" id="password_confirmation"
                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                            value="" required>
                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@push('js')
    <!-- bs-custom-file-input -->
    <script src="{{ asset('backend/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            bsCustomFileInput.init();
        })
    </script>
@endpush
