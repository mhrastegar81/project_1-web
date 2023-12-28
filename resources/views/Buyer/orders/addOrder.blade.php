<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>پنل کاربران</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('Buyer.styleSheets.styleSheets')
    <link rel="stylesheet" href="{{ asset('persenalCss/app.css') }}">
    <link href="{{ asset('bt5.css') }}" rel="stylesheet">
    <script src="{{ asset('js/bt5.js') }}"></script>
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
            @include('Buyer.header.adding.addOrder_header')
            <!-- /.content-header -->
            <!-- Main row -->
            <section class="content">
                <!-- form start -->
                <div class="container-fluid">
                    <form role="form" method="post" action="{{ route('buyer.orders.store') }}">
                        @csrf
                        <div class="form-group">
                            <div class="col">
                                <label for="title">اسم سفارش</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    placeholder="اسم سفارش">
                            </div>
                            <label for="user_id">customers</label>
                            <select class="form-control" id="user_id" name="user_id">

                                    <option value="{{ $user->id }}">
                                        name: {{ $user->last_name }},
                                        Email: {{ $user->email }}
                                    </option>

                            </select>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="product_id">products_available</label>
                                <div class="accordion" id="productAccordion">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="productHeading">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#productCollapse" aria-expanded="true"
                                                aria-controls="productCollapse">
                                                Product Information
                                            </button>
                                        </h2>
                                        <div id="productCollapse" class="accordion-collapse collapse show"
                                            aria-labelledby="productHeading">
                                            <div class="accordion-body">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>نام محصول</th>
                                                            <th>قیمت</th>
                                                            <th>موجودی</th>
                                                            <th>تعداد</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                                <tr>
                                                                    <td>{{ $product->title }}</td>
                                                                    <td>{{ $product->price }}</td>
                                                                    <td>{{ $product->inventory }}</td>
                                                                    <td>
                                                                        <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                                            <button class="btn btn-link px-2"
                                                                                type="button"
                                                                                onclick="changeProductQuantity(this, -1)">
                                                                                <i class="fas fa-minus"></i>
                                                                            </button>
                                                                            <input min="0"
                                                                                name="Product_{{ $product->id }}"
                                                                                value="0" type="number"
                                                                                max="{{ $product->inventory }}"
                                                                                class="form-control form-control-sm"
                                                                                style="width: 70px;" />
                                                                            <button class="btn btn-link px-2"
                                                                                type="button"
                                                                                onclick="changeProductQuantity(this, 1)">
                                                                                <i class="fas fa-plus"></i>
                                                                            </button>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    function changeProductQuantity(button, step) {
                                        var input = button.parentNode.querySelector('input[type=number]');
                                        input.stepUp(step);
                                    }
                                </script>
                            </div>
                            <div class="form-group">
                                <label for="explanations">explanations</label>
                                <textarea class="form-control" id="explanations" name="explanations" placeholder="explanations"></textarea>
                            </div>
                        </div>
                        <!-- /.card-body -->
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
    <!-- /.content -->
    <!-- /.content-wrapper -->

    @include('Buyer.footer.main_footer')

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- ./wrapper -->
    @include('Buyer.scripts')
</body>

</html>
