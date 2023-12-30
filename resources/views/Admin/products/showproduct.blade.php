@php use Illuminate\Support\Facades\Storage; @endphp
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>پنل ادمین</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('Admin.styleSheets.dataStyle')
    @include('Admin.styleSheets.styleSheets')


</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        @include('navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Sidebar -->
            @include('Admin.Sidebar.Sidebar')
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->

            @include('Admin.header.data.productsData_header')
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="Data" class="table table-bordered table-striped table table-hover">

                                    <thead>
                                        <img width="400" , height="400" src="{{ $product->image_address }}">

                                        <tr>

                                            <th>نام کالا</th>
                                            <th>قیمت</th>
                                            <th>موجودی</th>
                                            <th>افزودن به سبد خرید</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                            <tr>

                                                <td>{{ $product->title }}</td>
                                                <td>{{ $product->price }}</td>
                                                <td>{{ $product->inventory }}</td>
                                                <td>
                                                    <form
                                                        action="{{ route('admin.orders.create') }}"
                                                        method="post">
                                                        @csrf
                                                        <button type="submit" ><i
                                                            class="fas fa-cart-arrow-down nav-icon"></i></button>
                                                    </form>
                                                </td>
                                            </tr>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>نام کالا</th>
                                            <th>قیمت</th>
                                            <th>موجودی</th>
                                            <th>افزودن به سبد خرید</th>

                                        </tr>
                                    </tfoot>
                                </table>
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
        <!-- /.content-wrapper -->
        @include('Admin.footer.main_footer')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/datatables/dataTables.bootstrap4.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('plugins/fastclick/fastclick.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dist/js/demo.js') }}"></script>
    <!-- page script -->



</body>

</html>
