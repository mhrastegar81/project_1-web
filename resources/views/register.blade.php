{{-- {{$errors}} --}}
{{-- @if($errors->any())
    {!! implode('', $errors->all('<div>:message</div>')) !!}
@endif --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @break
            @endforeach
        </ul>
    </div>
@endif

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>صفحه ثبت نام</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('first_project.styleSheets.styleSheets')
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <b>ثبت نام در سایت</b>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">ثبت نام کاربر جدید</p>

                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="نام کاربری" name="user_name"
                        value="{{ old('user_name') }}">
                        <div class="input-group-append">
                            <span class="fa fa-user input-group-text"></span>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <select class="form-control" placeholder="نقش" name="role"
                        value="{{ old('role') }}">
                            <option value="seller">فروشنده</option>
                            <option value="buyer">خریدار</option>
                        </select>
                        <div class="input-group-append">
                            <span class="fa fa-user input-group-text"></span>
                        </div>

                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="ایمیل" name="email"
                        value="{{ old('email') }}">
                        <div class="input-group-append">
                            <span class="fa fa-envelope input-group-text"></span>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="رمز عبور" name="password">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="fa-solid fa-fingerprint"></i>
                            </span>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control"
                            placeholder="تکرار رمز عبور"name="password_confirmation">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="fa-solid fa-lock"></i>
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="checkbox icheck">
                                <label>
                                    <input type="checkbox"> با <a href="#">شرایط</a> موافق هستم
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">ثبت نام</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <div class="social-auth-links text-center">
                    <p>- یا -</p>
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fa-brands fa-facebook fa-lg"></i>
                        ثبت نام با اکانت فیسوبک
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fa-brands fa-google"></i>
                        ثبت نام با گوگل
                    </a>
                </div>

                <a href="{{ route('login') }}" class="text-center">من قبلا ثبت نام کرده ام</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>
    <script>
        $(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            })
        })
    </script>
</body>

</html>
