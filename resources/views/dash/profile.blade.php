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
    background-color: #1e4b41; /* Darker green background */
    color: #fff; /* White text color */
    padding: 80px 20px 20px; /* Extra top padding to accommodate profile image */
    margin-top: 50px; /* Center the card in the view vertically */
    text-align: center; /* Center text inside the card */
    position: relative; /* For positioning the profile image */
}
.profile-img {
    border-radius: 50%;
    border: 3px solid #fff; /* White border */
    width: 100px; /* Adjusted size to better fit the card */
    height: 100px;
    margin: 0 auto 20px; /* Center image and add space below it */
    display: block; /* Ensure block display for centering */
    filter: grayscale(100%); /* Apply grayscale filter */
    object-fit: cover; /* Ensure the image covers the entire area */
    position: absolute; /* Absolute positioning */
    top: -50px; /* Position the image above the card */
    left: 50%;
    transform: translateX(-50%); /* Center the image horizontally */
}
.card-body p {
    margin-top: 10px; /* Space between profile picture and user name */
}
.btn-update {
    background-color: #81c995; /* Lighter green */
    border-color: #81c995;
    color: #fff; /* White text */
    padding: 10px 20px; /* Larger padding for a bigger button */
    border-radius: 10px; /* Rounded corners */
    font-size: 16px; /* Larger font size */
    font-weight: bold;
}
.btn-update:hover {
    background-color: #5baa77; /* Even lighter green on hover */
    border-color: #5baa77;
}
.text-center {
    text-align: center;
}

.highlight {
            background-color: #ffcccc; /* Light red background */
            color: #ff0000; /* Red text color */
            padding: 10px;
            border-radius: 5px;
            font-weight: bold;
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
                        <div class="col-md-6 offset-md-3">
                            <div class="card text-center p-4">
                                @if($student && $student->image)
                                    <img src="{{ asset('upload/student_postimage/' . $student->image) }}" class="profile-img" alt="Profile Image">
                                @else
                                    <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" class="profile-img" alt="Profile Image">
                                @endif

                                <div class="card-body">
                                    <p><strong>User Name:</strong> {{ $user->name }}</p>
                                    <p><strong>Email:</strong> {{ $user->email }}</p>
                                    @if ($student)
                                        <p><strong>Student ID:</strong> {{ $student->id }}</p>
                                        <p><strong>Payment ID:</strong> {{ $student->payment_id }}</p>
                                    @else
                                        <p class="highlight">Please update your profile.</p>
                                    @endif
                                    <a href="{{ route('profile.edit') }}" class="btn btn-update">Update Profile</a>
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