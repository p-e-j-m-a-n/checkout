<section class="dashboard-area p-top-100 p-bottom-70 rtl">
    <div class="dashboard_contents">
        <div class="container">
            <div class="setting_form">
                <form class="row" action="{{ route('payment.pay') }}" method="post">
                    @csrf
                    <div class="col-lg-6 col-md-12">
                        <div class="information_module order_summary">
                            <div class="toggle_title">
                                <h4>خلاصه سفارش</h4>
                            </div>
                            <input type="hidden" name="order_id" value="{{ $order_id }}">
                            <ul>
                                <li class="item">
                                    <a href="#" target="_blank">قالب مدیریتی </a>
                                    <span>4000 تومان</span>
                                </li>
                                <li class="item">
                                    <a href="#" target="_blank">طرح فوتوشاپ</a>
                                    <span>1000 تومان</span>
                                </li>
                                <li>
                                    <p>مجموع محصول:</p>
                                    <span>2</span>
                                </li>
                                <li class="total_ammount">
                                    <p>جمع قیمت</p>
                                    <span>{{ $amount }} تومان</span>
                                    <input type="hidden" name="amount" value="{{ $amount }}">
                                </li>
                            </ul>
                        </div>
                        <!-- end /.information_module-->

                    </div>
                    <!-- end /.col-md-6 -->

                    <div class="col-lg-6 col-md-12">
                        @include('errors.message')
                        <div class="information_module payment_options">
                            <div class="toggle_title">
                                <h4>پرداخت</h4>
                            </div>

                            <div class="payment_info modules__content">
                                <div class="form-group">
                                    <label for="card_number">انتخاب کارت</label>
                                    <div class="select-wrap select-wrap2">
                                        <select name="card_number">
                                            <option value="">انتخاب کنید</option>
                                            @foreach ($cards as $card)
                                                <option value="{{ $card->card_number }}">{{ $card->card_number }}</option>
                                            @endforeach
                                        </select>
                                        <span class="icon-arrow-down"></span>
                                    </div>
                                </div>

                                <!-- lebel for date selection -->
                                <label for="name">افزودن کارت اعتباری</label>

                                <div class="row">
                                    <div class="col-md-6">
                                        <input id="card_number" type="text" class="text_field" wire:model="newCard"
                                            placeholder="شماره کارت اعتباری ">
                                    </div>
                                    <div class="col-md-6">
                                        <button wire:click="addCard" class="btn btn--md btn-info"
                                            type="button">افزودن</button>
                                    </div>
                                </div>

                                <div class="row p-5">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn--lg btn-primary">پرداخت</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end /.information_module-->
                    </div>
                    <!-- end /.col-md-6 -->
                </form>
                <!-- end /.row -->
            </div>
            <!-- end /form -->
        </div>
        <!-- end /.container -->
    </div>
    <!-- end /.dashboard_menu_area -->
</section>
