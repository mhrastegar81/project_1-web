<div id="accordionHead">
    <form role="form" method="get" action="{{-- {{ route('filterUsers') }} --}}">
        <div class="card">
            <div class="card-header bg-light">
                <a class="btn btn-secondary" data-bs-toggle="collapse" href="#fillters">
                    فیلتر ها
                </a>
            </div>
            <div class="collapse" id="fillters" data-bs-parent="#accordionHead">
                <div class="card-body">
                    <div class="form-control">
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="filterEmail">ایمیل</label>
                                    <input type="text" class="form-control"
                                        id="filterEmail" name="filterEmail"
                                        placeholder="email"
                                        @if (isset($_GET['filterEmail'])) value="{{ $_GET['filterEmail'] }}" @endif>
                                </div>
                                <div class="col">
                                    <label for="filterFirstName">نام</label>
                                    <input type="text" class="form-control"
                                        id="filterFirstName" name="filterFirstName"
                                        placeholder="نام"
                                        @if (isset($_GET['filterFirstName'])) value="{{ $_GET['filterFirstName'] }}" @endif>
                                </div>
                                <div class="col">
                                    <label for="filterLastName">نام خانوادگی</label>
                                    <input type="text" class="form-control"
                                        id="filterLastName" name="filterLastName"
                                        placeholder="نام خانوادگی"
                                        @if (isset($_GET['filterLastName'])) value="{{ $_GET['filterLastName'] }}" @endif>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">

                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="filterUserName">نام کاربری</label>
                                    <input type="text" class="form-control"
                                        id="filterUserName" name="filterUserName"
                                        placeholder="نام کاربری"
                                        @if (isset($_GET['filterUserName'])) value="{{ $_GET['filterUserName'] }}" @endif>
                                </div>
                                <div class="col">
                                    <label for="filterPhoneNumber">شماره همراه</label>
                                    <input type="number" class="form-control"
                                        id="filterPhoneNumber" name="filterPhoneNumber"
                                        placeholder="9120000000"
                                        @if (isset($_GET['filterPhoneNumber'])) value="{{ $_GET['filterPhoneNumber'] }}" @endif>
                                </div>
                                <div class="col">
                                    <div class="row">

                                        <div class="col">
                                            <label for="filterAge">سن</label>
                                            <label for="filterAgeMin"
                                                id="filterAge">از</label>
                                            <input type="number" class="form-control"
                                                id="filterAgeMin" name="filterAgeMin"
                                                placeholder="از"
                                                @if (isset($_GET['filterAgeMin'])) value="{{ $_GET['filterAgeMin'] }}" @endif>
                                        </div>
                                        <div class="col">
                                            <label for="filterAgeMax">تا</label>
                                            <input type="number" class="form-control"
                                                id="filterAgeMax" name="filterAgeMax"
                                                placeholder="تا"
                                                @if (isset($_GET['filterAgeMax'])) value="{{ $_GET['filterAgeMax'] }}" @endif>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="filterGender">جنسیت</label>
                                    <select class="form-control" id="filterGender"
                                        name="filterGender">
                                        <option value="male"
                                            @if (isset($_GET['filterGender'])) @if ($_GET['filterGender'] == 'male')
                                                    selected @endif
                                            @endif>مرد
                                        </option>
                                        <option value="female"
                                            @if (isset($_GET['filterGender'])) @if ($_GET['filterGender'] == 'female')
                                                    selected @endif
                                            @endif>زن
                                        </option>
                                        <option value="other"
                                            @if (isset($_GET['filterGender'])) @if ($_GET['filterGender'] == 'other')
                                                    selected @endif
                                            @endif>سایر
                                        </option>
                                        <option value="all" selected
                                            @if (isset($_GET['filterGender'])) @if ($_GET['filterGender'] == 'all')
                                                    selected @endif
                                        @else selected @endif
                                            >همه
                                        </option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="filterEducation">تحصیلات</label>
                                    <select class="form-control" id="filterEducation"
                                        name="filterEducation">
                                        <option value="high_school"
                                            @if (isset($_GET['filterEducation'])) @if ($_GET['filterEducation'] == 'high_school')
                                                    selected @endif
                                            @endif>دیپلم
                                        </option>
                                        <option value="bachelor"
                                            @if (isset($_GET['filterEducation'])) @if ($_GET['filterEducation'] == 'bachelor')
                                                    selected @endif
                                            @endif>کارشناسی
                                        </option>
                                        <option value="master"
                                            @if (isset($_GET['filterEducation'])) @if ($_GET['filterEducation'] == 'master')
                                                    selected @endif
                                            @endif>کارشناسی ارشد
                                        </option>
                                        <option value="doctorate"
                                            @if (isset($_GET['filterEducation'])) @if ($_GET['filterEducation'] == 'doctorate')
                                                    selected @endif
                                            @endif>دکتری
                                        </option>
                                        <option value="all"
                                            @if (isset($_GET['filterEducation'])) @if ($_GET['filterEducation'] == 'all')
                                                    selected @endif
                                        @else selected @endif
                                            >همه
                                        </option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="filterPostalCode">کد پستی</label>
                                    <input type="number" class="form-control"
                                        id="filterPostalCode" name="filterPostalCode"
                                        placeholder="کد پستی را وارد کنید"
                                        @if (isset($_GET['filterPostalCode'])) value="{{ $_GET['filterPostalCode'] }}" @endif>
                                </div>
                                <div class="col">
                                    <label for="filterOccupation">شغل</label>
                                    <input type="text" class="form-control"
                                        id="filterOccupation" name="filterOccupation"
                                        placeholder="شغل را وارد کنید"
                                        @if (isset($_GET['filterOccupation'])) value="{{ $_GET['filterOccupation'] }}" @endif>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-control">
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="filterOrderStatus">سفارش</label>
                                    <select class="form-control"
                                        id="filterOrderStatus"
                                        name="filterOrderStatus">
                                        <option value="true"
                                            @if (isset($_GET['filterOrderStatus'])) @if ($_GET['filterOrderStatus'] == 'true')
                                                    selected @endif
                                            @endif>دارد
                                        </option>
                                        <option value="false"
                                            @if (isset($_GET['filterOrderStatus'])) @if ($_GET['filterOrderStatus'] == 'false')
                                                    selected @endif
                                            @endif>ندارد
                                        </option>
                                        <option value="all"
                                            @if (isset($_GET['filterOrderStatus'])) @if ($_GET['filterOrderStatus'] == 'all')
                                                    selected @endif
                                        @else selected @endif
                                            >همه
                                        </option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="filterFactorStatus">فاکتور</label>
                                    <select class="form-control"
                                        id="filterFactorStatus"
                                        name="filterFactorStatus">
                                        <option value="true"
                                            @if (isset($_GET['filterFactorStatus'])) @if ($_GET['filterFactorStatus'] == 'true') selected @endif
                                            @endif>دارد
                                        </option>
                                        <option value="false"
                                            @if (isset($_GET['filterFactorStatus'])) @if ($_GET['filterFactorStatus'] == 'false') selected @endif
                                            @endif>ندارد
                                        </option>
                                        <option value="all"
                                            @if (isset($_GET['filterFactorStatus'])) @if ($_GET['filterFactorStatus'] == 'all')
                                                    selected @endif
                                        @else selected @endif
                                            >همه
                                        </option>
                                    </select>
                                </div>
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <label for="filterOrderCount">تعداد
                                                سفارشات</label>
                                            <label for="filterOrderCountMin"
                                                id="filterOrderCount">از</label>
                                            <input type="number" class="form-control"
                                                id="filterOrderCountMin"
                                                name="filterOrderCountMin"
                                                placeholder="از"
                                                @if (isset($_GET['filterOrderCountMin'])) value="{{ $_GET['filterOrderCountMin'] }}" @endif>
                                        </div>
                                        <div class="col">
                                            <label for="filterOrderCountMax">تا</label>
                                            <input type="number" class="form-control"
                                                id="filterOrderCountMax"
                                                name="filterOrderCountMax"
                                                placeholder="تا"
                                                @if (isset($_GET['filterOrderCountMax'])) value="{{ $_GET['filterOrderCountMax'] }}" @endif>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col">
                                            <label for="filterOrderTotalPrice">قیمت کل
                                                سفارشات</label>
                                            <label for="filterOrderTotalPriceMin"
                                                id="filterOrderTotalPrice">از</label>
                                            <input type="number" class="form-control"
                                                id="filterOrderTotalPriceMin"
                                                name="filterOrderTotalPriceMin"
                                                placeholder="از">
                                        </div>
                                        <div class="col">
                                            <label
                                                for="filterOrderTotalPriceMax">تا</label>
                                            <input type="number" class="form-control"
                                                id="filterOrderTotalPriceMax"
                                                name="filterOrderTotalPriceMax"
                                                placeholder="تا">
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="filterRole">سطح دسترسی</label>
                                        <select class="form-control" id="filterRole"
                                            name="filterRole">
                                            <option value="1"
                                                @if (isset($_GET['filterRole'])) @if ($_GET['filterRole'] == '1') selected @endif
                                                @endif>مشتری
                                            </option>
                                            <option value="2"
                                                @if (isset($_GET['filterRole'])) @if ($_GET['filterRole'] == '2') selected @endif
                                                @endif>فروشنده
                                            </option>
                                            <option value="3"
                                                @if (isset($_GET['filterRole'])) @if ($_GET['filterRole'] == '3') selected @endif
                                                @endif>
                                                ادمین
                                            </option>
                                            <option value="all"
                                                @if (isset($_GET['filterRole'])) @if ($_GET['filterRole'] == 'all') selected @endif
                                            @else selected @endif>
                                                همه
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">فیلتر</button>
                    <a href="{{-- {{ route('Users_data') }} --}}">
                        <button type="button" class="btn btn-warning">حذف فیلتر
                            ها</button>
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>
