@php use Illuminate\Support\Facades\Storage; @endphp
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>پنل فروشندگان</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('Seller.styleSheets.dataStyle')
    @include('Seller.styleSheets.styleSheets')
    <style>
        #d1 {
            display: inline-block;
            width: 100%;
        }

        .img {
            display: inline;
            margin: 15px 30em;
            background-color: black;
            border-radius: 15px;
            box-shadow: 7px 5px 15px rgb(60, 57, 57);
        }


        pre {
            font-size: 30px;
            margin: 30px;
            font-family: Arial, Helvetica, sans-serif;

        }
        body{

        }
    </style>

</head>

<body class="hold-transition sidebar-mini">

            <section class="content">
                <div class="row" >
                    <div class="col-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body" >
                                        <div>
                                            <pre>
                                                سلام کاربر محترم برای ثبت نام در سایت ما از شما ممنونیم اطلاعات شما برای ما ارسال شده
                                                        و به محض تایید توسط ادمین شما میتوانید از پنل کاربری خود استفاده کنید
                                                                        بابت صبر و شکیبایی شما سپاسگزاریم
                                            </pre>
                                        </div>
                                            <div id="d1">
                                                <img width="700" height="400" src="{{ URL("images/waiting_seller/hand_shacke.jpg") }}" class="img">
                                            </div>



                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
</body>

</html>
