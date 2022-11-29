<x-app-layout>
    <section class="login_area section--padding rtl">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <form action="{{ route('login') }}" method="post">
                        @include('errors.message')
                        @csrf
                        <div class="cardify login">
                            <div class="login--header">
                                <h3>خوش آمدید</h3>
                                <p>شما میتوانید وارد سایت شوید</p>
                            </div>
                            <!-- end .login_header -->

                            <div class="login--form">
                                <div class="form-group">
                                    <label for="email">{{ __('Email') }}</label>
                                    <input id="email" name="email" type="email" class="text_field"
                                        placeholder="ایمیل خود را وارد کنید">
                                </div>

                                <div class="form-group">
                                    <label for="password">{{ __('Password') }}</label>
                                    <input id="password" name="password" type="password" class="text_field"
                                        placeholder="پسورد خود را وارد کنید">
                                </div>

                                <div class="form-group">
                                    <div class="custom_checkbox">
                                        <input type="checkbox" id="ch2" name="remember">
                                        <label for="ch2">
                                            <span class="shadow_checkbox"></span>
                                            <span class="label_text">{{ __('Remember me') }}</span>
                                        </label>
                                    </div>
                                </div>

                                <button class="btn btn--md btn-primary" type="submit">ورود</button>

                            </div>
                            <!-- end .login--form -->
                        </div>
                        <!-- end .cardify -->
                    </form>
                </div>
                <!-- end .col-md-6 -->
            </div>
            <!-- end .row -->
        </div>
        <!-- end .container -->
    </section>
</x-app-layout>
