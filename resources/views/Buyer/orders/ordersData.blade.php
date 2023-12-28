<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>پنل مدیریت | جدول داده</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('Buyer.styleSheets.dataStyle')
    @include('Buyer.styleSheets.styleSheets')

    <style>
        .td{
            width: 200px;
            height: 70px;
            margin: 59;
        }
    </style>

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        @include('Buyer.navbar.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Sidebar -->
            @include('Buyer.Sidebar.Sidebar')
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->

            @include('Buyer.header.data.ordersData_header')
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            {{-- <div class="card-header">
                            <h3 class="card-title"></h3>
                        </div> --}}
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="container">
                                    <table id="Data" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>تصویر</th>
                                                <th>اسم سفارش</th>
                                                <th>نام محصولات</th>
                                                <th>قیمت</th>
                                                <th>تعداد</th>
                                                <th>حذف</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php($temp = 0)
                                            @foreach ($orders as $order)
                                                <tr>
                                                    @if ($order->status == 'red')
                                                        <td
                                                            style="background-color: red; color:white;border-radius:5px;">

                                                            <a class="btn" data-bs-toggle="collapse"
                                                                href="#collapseC{{ $order->id }}{{ $temp }}">

                                                                {{ $order->id }}

                                                            </a>
                                                            <div id="collapseC{{ $order->user->id }}{{ $temp++ }}"
                                                                class="collapse" data-bs-parent="#accordion">
                                                                <div class="card-body">
                                                                    <table>
                                                                        <tr>
                                                                            <div style="width: 10em;">
                                                                                <th> وضعیت سفارش :
                                                                                    {{ 'تاریخ ارسال کالا به پایان رسیده است' }}
                                                                                </th>
                                                                            </div>

                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    @else
                                                        <td>
                                                            {{ $order->id }}
                                                        </td>
                                                    @endif






                                                    @foreach ($products as $product)
                                                        @foreach ($order->products as $order_product)
                                                            @if ($order->id == $order_product->pivot->order_id)
                                                                @if ($product->id == $order_product->pivot->product_id)
                                                                    <td><img width="100" height="100"
                                                                            src="{{ $product->image_address }}">

                                                                    </td>
                                                                    <td>{{ $order->title }}</td>
                                                                    <td>
                                                                        <a
                                                                            href="{{ route('buyer.orders.show', ['id' => $order->id]) }}">
                                                                            {{ $product->title }}
                                                                        </a>
                                                                    </td>
                                                                    <td>{{ $order->total_price }}</td>
                                                                    <td>
                                                                        {{ $count = $order_product->pivot->count }}
                                                                    </td>

                                                                @break
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                @endforeach






                                                <td>
                                                    <form class=""
                                                        action="{{ route('buyer.orders.destroy', ['id' => $order->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        <button type="submit"
                                                            onclick="return confirm('Are you sure?')">
                                                            <i class="fa-regular fa-trash-can"></i>
                                                        </button>
                                                    </form>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            
                                            <td>
                                                <form class=""
                                                    action="{{ route('buyer.orders.pay', ['id' => $order->user_id]) }}"
                                                    method="post">
                                                    @csrf
                                                    <button type="submit">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="200"
                                                            height="50" fill="currentColor"
                                                            class="bi bi-currency-dollar" viewBox="0 0 16 16">
                                                            <path
                                                                d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
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
    <!-- /.content-wrapper -->
    @include('Buyer.footer.main_footer')

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
            "autoWidth": true
        });
    });
</script>

</body>

</html>
