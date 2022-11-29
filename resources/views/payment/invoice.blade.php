<x-app-layout>
    <section class="dashboard-area rtl">
        <div class="dashboard_contents section--padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="dashboard_title_area">
                            <div class="">
                                <div class="dashboard__title">
                                    <h3>صورت حساب</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end /.col-md-12 -->
                </div>
                <!-- end /.row -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="invoice">
                            <div class="invoice__head">
                                <div class="info">
                                    <h4>اطلاعات صورت حساب</h4>
                                    <p>سفارش {{ $payment->order_id }}</p>
                                </div>
                            </div>
                            <!-- end /.invoice__head -->

                            <div class="invoice__meta">
                                <div class="date_info">
                                    <p>
                                        <span> تاریخ ثبت </span>{{ $payment->created_at->format('d - m - Y') }}
                                    </p>
                                    <div class="status">
                                        <span>وضعیت</span>
                                        @if ($status != 1)
                                            <h6 class="danger">{{ $message }}</h6>
                                        @else
                                            <h6 class="success">{{ $message }}</h6>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- end /.invoice__meta -->

                            <div class="table-responsive invoice__detail">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>تاریخ</th>
                                            <th>شناسه رهگیری</th>
                                            <th>شناسه سفارش</th>
                                            <th>شناسه تراکنش</th>
                                            <th>شماره کارت پرداخت کننده</th>
                                            <th>مبلغ</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <tr>
                                            <td>{{ $payment->created_at }}</td>
                                            <td>{{ $payment->ref_code }}</td>
                                            <td>{{ $payment->order_id }}</td>
                                            <td>{{ $payment->transaction_id }}</td>
                                            <td>{{ $payment->card_number }}</td>
                                            <td>{{ $payment->amount }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- end /.invoice_detail -->
                        </div>
                        <!-- end /.invoice -->


                    </div>
                    <!-- end /.row -->
                </div>
                <!-- end /.row -->
            </div>
            <!-- end /.container -->
        </div>
        <!-- end /.dashboard_menu_area -->
    </section>
</x-app-layout>
