<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>پنل مدیریت | کاربر جدید</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('Seller.styleSheets.styleSheets')
    <link rel="stylesheet" href="{{ asset('persenalCss/app.css') }}">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        @include('Seller.navbar.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Sidebar -->
            @include('Seller.Sidebar.Sidebar')
            <!-- /.sidebar -->
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Content Header (Page header) -->
            @include('Seller.header.editingData.editing_product')
            <!-- /.content-header -->
            <!-- Main row -->
            <section class="content">
                <!-- form start -->
                <div class="container-fluid">
                    <form role="form" method="post" action="{{ route('seller.products.update', ['id' => $product->id]) }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">

                                <label for="title">نام محصول</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ $product->title }}">
                            </div>
                            <div class="form-group">
                                <label for="price">قیمت</label>
                                <input type="number" class="form-control" id="price" name="price"
                                    value="{{ $product->price }}">
                            </div>
                            <div class="form-group">
                                <label for="inventory">موجودی</label>
                                <input type="number" class="form-control" id="inventory" name="inventory"
                                    value="{{ $product->inventory }}">
                            </div>
                            <div class="form-group">
                                <label for="sold_number">فروش رقته</label>
                                <input type="number" class="form-control" id="sold_number" name="sold_number"
                                    value="{{ $product->sold_number }}">
                            </div>
                            <div class="form-group">
                                <label for="discription">توضیحات</label>
                                <textarea class="form-control" rows="4" id="discription" name="discription">{{ $product->discription }}</textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">ارسال</button>
                        </div>

                    </form>
                </div>
            </section>
        </div>
        <!-- /.card -->


        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @include('Seller.footer.main_footer')

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    @include('Seller.scripts')
</body>

</html>
