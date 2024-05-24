<!DOCTYPE html>
<html lang="en">
<head>
    @include('dash.inc.head')
    <style>
        body {
            background-color: #f9f9f9;
        }
        .card {
            border-radius: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .profile-img {
            border-radius: 50%;
        }
        .btn-update {
            background-color: #ff7f50;
            border-color: #ff7f50;
        }
        .btn-update:hover {
            background-color: #ff6347;
            border-color: #ff6347;
        }
    </style>
</head>
<body class="sb-nav-fixed">
    @include('dash.inc.topnav')

    <div id="layoutSidenav">
        @include('dash.inc.leftsidenav')

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard / Profile</li>
                    </ol>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card p-4">
                                <div class="text-center mb-4">
                                  @if($student && $student->image)
    <img src="{{ asset('upload/student_postimage/' . $student->image) }}" class="profile-img" width="150" height="150" alt="Profile Image">
@else
    <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" class="profile-img" width="150" height="150" alt="Profile Image">
@endif

                                <div class="card-body">
                                    <p class="text-center"><strong>User Name:</strong> {{ $user->name }}</p>
                                    <p class="text-center"><strong>Email:</strong> {{ $user->email }}</p>
                                    @if ($student)
                                        <p class="text-center"><strong>Student ID:</strong> {{ $student->id }}</p>
                                        <p class="text-center"><strong>Payment ID:</strong> {{ $student->payment_id }}</p>
                                    @else
                                        <p class="text-center">Please update your profile.</p>
                                    @endif
                                    <div class="text-center">
                                      <a href="{{ route('profile.edit') }}" class="btn btn-success btn-lg">Update Profile</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            @include('dash.inc.footer')
        </div>
    </div>
    @include('dash.inc.scripts')
</body>
</html>
