<!DOCTYPE html>
<html lang="en">

    <head>


        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



        <title> Admin Login Form</title>


        <!-- FOR FONTAWESOME -->
        <link rel="stylesheet" href="{{ asset('assetEndUser/css/font-awesome/fontawesome.css') }}">

        <!-- FOR BOOTSTRAP -->
        <link rel="stylesheet" href="{{asset ('assetEndUser/css/bootstrap.min.css') }}">

        <!-- FOR COMMON STYLE -->
        <link rel="stylesheet" href="{{asset ('assetEndUser/css/main.css') }}">

        <!-- FOR USER FORM PAGE STYLE -->

        <link rel="stylesheet" href="{{ asset('assetEndUser/css/user-form.css') }}">



    </head>

    <body>



        <br>
        <div class="container" id="login-tab">

            <div class="user-form-title">
                <h2>Welcome!</h2>
                <p>Use credentials to access your account.</p>
            </div>

            <form method="post" action="{{ route('admin.login') }}">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" placeholder="Email">

                        </div>
                    </div>

                    @error('email')
                    <p class="text-danger">{{$message}}</p>
                    @enderror

                    <div class="col-12">
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" id="pass"
                                placeholder="Password">
                            <button type="button" class="form-icon"><i class="eye fas fa-eye"></i></button>

                        </div>
                    </div>
                    @error('password')
                    <p class="text-danger">{{$message}}</p>
                    @enderror

                    <div class="col-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-inline">
                                <i class="fas fa-unlock"></i>
                                <span>Enter your account</span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>

        </div>

        @include('sweetalert::alert')


    </body>

</html>