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
    <style>
        #d1 {
            width: 400px;
            height: 300px;
            background-size: 100%;
            background-attachment: fixed;
            box-shadow: 0 0 5px 0;
            backdrop-filter: blur(10px);
            border-radius: 15px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            text-align: center;
            font-family: 'Arial';
            color: white;
            outline: none;
            border: none;
            box-sizing: border-box;
            display: inline;
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
                                        <tr>
                                            <th>id</th>
                                            <th>تصویر</th>
                                            <th>نام کالا</th>
                                            <th>توضیحات</th>
                                            <th>قیمت</th>
                                            <th>موجودی</th>
                                            <th>مشاهده کالا</th>
                                            <th>ویرایش</th>
                                            <th>حذف</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php($temp = 0)
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>{{ $product->id }}</td>
                                                <td><img width="100" height="100"
                                                        src="{{ $product->image_address }}">
                                                </td>
                                                <td>{{ $product->title }}</td>
                                                <td>{{ $product->description }}</td>
                                                <td>{{ $product->price }}</td>
                                                <td>{{ $product->inventory }}</td>
                                                <td>

                                                    <form
                                                        action="{{ route('admin.products.show', ['id' => $product->id]) }}"
                                                        method="get">
                                                        <button type="submit"><svg xmlns="http://www.w3.org/2000/svg"
                                                                width="16" height="16" fill="currentColor"
                                                                class="bi bi-box" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5 8 5.961 14.154 3.5zM15 4.239l-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z" />
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form
                                                        action="{{ route('admin.products.edit', ['id' => $product->id]) }}"
                                                        method="get">
                                                        <button type="submit"><i
                                                                class="fa-regular fa-pen-to-square fa-flip-horizontal"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form
                                                        action="{{ route('admin.products.destroy', ['id' => $product->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        <button type="submit"
                                                            onclick="return confirm('Are you sure?')"><i
                                                                class="fa-regular fa-trash-can"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>id</th>
                                            <th>تصویر</th>
                                            <th>نام کالا</th>
                                            <th>توضیحات</th>
                                            <th>قیمت</th>
                                            <th>موجودی</th>
                                            <th>مشاهده کالا</th>
                                            <th>ویرایش</th>
                                            <th>حذف</th>
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
