<!DOCTYPE html>
<html lang="en">
<head>
    @include('dash.inc.head')
    <!-- Adding Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
        .form-header {
            margin-bottom: 30px;
        }
        .form-group label {
            font-weight: bold;
        }
        .form-group input {
            border-radius: 5px;
        }
        .form-group button {
            width: 100%;
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>
<body class="sb-nav-fixed">
    @include('dash.inc.topnav')

    <div id="layoutSidenav">
        @include('dash.inc.leftsidenav')

        <div id="layoutSidenav_content">
            <div class="container form-container">
                <div class="form-header">
                    <h2 class="text-center">Edit Profile</h2>
                </div>
                <form id="profileForm" action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input type="text" id="phone" name="phone" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="image">Image:</label>
                        <input type="file" id="image" name="image" class="form-control-file">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary bg-custom">Update Profile</button>
                    </div>
                </form>
            </div>

            @include('dash.inc.footer')
        </div>
    </div>

    @include('dash.inc.scripts')
    <!-- Adding Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>