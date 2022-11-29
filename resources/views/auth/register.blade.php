<x-app-layout>
    <section class="login_area section--padding rtl">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <form action="{{ route('register') }}" method="post">
                        @csrf
                        @include('errors.message')
                        <div class="cardify login">
                            <div class="login--header">
                                <h3>خوش آمدید</h3>
                                <p>شما میتوانید ثبت نام کنید</p>
                            </div>
                            <!-- end .login_header -->

                            <div class="login--form">
                                <div class="form-group">
                                    <label for="user_name">{{__('User Name')}}</label>
                                    <input id="user_name" type="text" name="user_name" class="text_field" placeholder="نام کاربری خود را وارد کنید">
                                </div>

                                <div class="form-group">
                                    <label for="email">{{__('Email')}}</label>
                                    <input id="email" type="text" name="email" class="text_field" placeholder="ایمیل خود را وارد کنید">
                                </div>

                                <div class="form-group">
                                    <label for="password">{{__('Password')}}</label>
                                    <input id="password" type="password" name="password" class="text_field" placeholder="پسورد خود را وارد کنید">
                                </div>

                                <div class="form-group">
                                    <label for="password">{{__('Confirm Password')}}</label>
                                    <input id="password" type="password" name="password_confirmation" class="text_field" placeholder="پسورد خود را دوباره وارد کنید">
                                </div>

                                <button class="btn btn--md btn-primary" type="submit">ثبت نام</button>

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