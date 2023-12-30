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
        .d1 {

            position: relative;
            margin-right: 110px;
            margin-left: 110px;
            display: inline-block;
        }

        .img {
            border-radius: 15px;
            box-shadow: 7px 5px 15px rgb(31, 31, 31);
        }

        .d1:hover .p1 {
            border-radius: 15px;
            box-shadow: 0 0 5px 0 black;
            width: 100%;
            height: 100%;
            visibility: visible;
            opacity: 1;
            text-align: center;
            color: white;
            font-size: 25px;
            backdrop-filter: blur(5px);
            top: 15px;
            bottom: 0;
            right: 15px;
            left: 0;

        }

        .p1 {
            padding: 120px;
            visibility: hidden;
            opacity: 0;
            position: absolute;

        }
    </style>

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        @include('navbar')
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

            @include('Seller.header.data.productsData_header')
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">


                                @foreach ($categories as $category)
                                    <div class="d1">

                                        <a href="{{ route('seller.products.index', ['category_id' => $category->id]) }}">
                                            <img width="400px" height="300px" src="{{ URL("images/$category->image_address") }}"
                                                class="img">
                                                <p class="p1">
                                                    {{ $category->name }}
                                                </p>
                                        </a>



                                    </div>

                                    @if ($category->id % 2 == 0)
                                        <br><br><br><br>
                                    @endif
                                @endforeach


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
        @include('Seller.footer.main_footer')

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

    <script>
        $(function() {
            $('#Data').DataTable({
                "language": {
                    "paginate": {
                        "next": "بعدی",
                        "previous": "قبلی"
                    },
                    "search": "جست و جو : ",
                },

                "info": true,
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "autoWidth": true,
                "pageLength": 5
            });
        });
    </script>

</body>

</html>
