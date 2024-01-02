
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
        .td {
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
                                                <th>تصویر محصول</th>
                                                <th>اسم سفارش</th>
                                                <th>مشاهده محصول</th>
                                                <th>قیمت کل</th>
                                                <th>تعداد</th>
                                                <th>ویرایش</th>
                                                <th>حذف</th>
                                                <th>صدور فاکتور</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php($temp = 0)
                                            @foreach ($orders as $order)
                                                <tr>
                                                    {{-- @if ($order->status == 'red')
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
                                                    @endif --}}






                                                    @foreach ($products as $product)
                                                        @foreach ($order->products as $order_product)
                                                            @if ($order->id == $order_product->pivot->order_id)
                                                                @if ($product->id == $order_product->pivot->product_id)
                                                                    <td><img width="100" height="100"
                                                                            src="{{ URL("images/products/$product->image_address") }}">

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
                                                    <form class="" action="{{ route('admin.orders.edit', ['id' => $order->id]) }}" method="get">
                                                        <button type="submit" @if ($order->pay_status == 'payed') disabled @endif>
                                                            <i class="fa-regular fa-pen-to-square fa-flip-horizontal"></i>
                                                        </button>
                                                    </form>
                                                </td>


                                                <td>
                                                    <form class=""
                                                        action="{{ route('buyer.orders.destroy', ['id' => $order->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        <button type="submit"
                                                            onclick="return confirm('Are you sure?')" @if ($order->pay_status == 'payed') disabled @endif>
                                                            <i class="fa-regular fa-trash-can"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form class=""
                                                        action="{{ route('buyer.orders.pay', ['id' => $order->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger"
                                                            style="width: 150px;margin:0px;"
                                                            @if ($order->pay_status == 'payed') disabled @endif>پرداخت</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                                <th>تصویر محصول</th>
                                                <th>اسم سفارش</th>
                                                <th>مشاهده محصول</th>
                                                <th>قیمت کل</th>
                                                <th>تعداد</th>
                                                <th>ویرایش</th>
                                                <th>حذف</th>
                                                <th>صدور فاکتور</th>

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
