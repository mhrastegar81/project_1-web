@include('Buyer.Sidebar.brand')
<div class="sidebar" style="direction: ltr">
    <div style="direction: rtl">
        <!-- Sidebar user panel (optional) -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="#" class="nav-link user-panel mt-3 pb-3 mb-3 info">
                         پروفایل
                    </a>
                    <ul class="nav nav-treeview">
                        
                        <li class="nav-item">
                            <a href="{{route('logout')}}" class="nav-link">
                                <i class="fas fa-sign-out-alt"></i>
                                <p>خروج</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link active">
                        <i class="fas fa-tachometer-alt nav-icon"></i>
                        <p>
                            داشبوردها
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./workplace" class="nav-link active">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>داشبورد اول</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-file-invoice nav-icon"></i>
                        <p>
                            فاکتورها
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('buyer.factor.index')}}" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p>لیست فاکتورها</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-tags nav-icon"></i>
                        <p>
                            محصولات
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('workplace')}}" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p>لیست محصولات</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-cart-arrow-down nav-icon"></i>
                        <p>
                            سبد خرید
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('buyer.orders.index')}}" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p>سبد خرید</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-cash-register nav-icon"></i>
                        <p>
                            فرصت های فروش
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>ثبت فرصت جدید</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p> لیست فرصتها</p>
                            </a>
                        </li>

                    </ul>
                </li>
            </ul>

        </nav>

        <!-- /.sidebar-menu -->

    </div>
</div>
