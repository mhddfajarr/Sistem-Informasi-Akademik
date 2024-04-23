<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <!-- Bootstrap -->
    <link href="../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login" style="background-color: blanchedalmond;">
        <div class="login_wrapper">
            <section class="login_content">
                <form method="POST" action="/login">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <h1 style="color: #171716;"><img style="width: 250px; height: 80px; margin-right:5px;" src="img/logo1.png" alt=".."></h1>
                            <hr><br>
                            @if (session()->has('loginError'))
                                <div class="alert alert-danger alert-dismissible " role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                    </button>
                                    {{ session('loginError') }}
                                </div>
                            @endif
                            <div>
                                <input type="text" class="form-control" placeholder="NIP/NISN" id="nip" name="nip" autofocus value="{{ old('nip') }}"/>
                                @error('nip')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div><br>
                            <div>
                                <input type="password" class="form-control" placeholder="Password" id="password" name="password" />
                                @error('password')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div><br>
                            <div>
                                <button type="submit" class="btn btn-success" style="margin-right: 5px; width:100%;" href="/login"><i class="fas fa-sign-in-alt"></i> Login</button>
                            </div>
                        </div>
                    </div>
                </form>
            </section>
        </div>
</body>



</html>