<!-- 인풋안의 텍스트가 false 인 경우 input-bar 태그에 error 클래스 추가 -->
<!-- 팝업 acitve 클래스 추가스 on -->
<div class="index-popup close_modal">
    <div class="popup-box">
        <div class="popup-content">
            <div class="popup-title">
                <h2>NOTICE</h2>
                <div class="y-box"></div>
            </div>
            <div class="popup-text">
                <div style="font-size: 20px; line-height: 30px;">
Hello. Commonwealth members.

Commonwealth started a global business with Bitcoin mining
For common wealth and a stable life.

However, the loss of the company is very high due to the volcanic eruption in the Philippines.
And because of the global economic collapse caused by the ongoing Corona 19, not only the
Commonwealth but the whole world can no longer continue to do business.

For those who have loved Commonwealth,
We are sincerely sorry

Unfortunately, Commonwealth has tentatively decided to close the business.

Your property is finely settled internally.
At the end of the settlement, we will notify the members.

And hope not to give in to Corona 19

We wish you healthy and safety.

Commonwealth Team


Refund Procedure Guide

1. Please send the BTC address to be refunded to the email below.
However, you must use the email you used to register.

<p style="font-weight: bold;">Email: cwminingno1@gmail.com</p>

2. The deadline is April 7, 2020.

Commonwealth Team.
                </div>
            </div>
        </div>
        <div class="popup-footer">
            <button type="button" class="clear full-btn">@lang('front.global.ok')</button>
        </div>
    </div>
</div>

<div class="index-popup close_modal2">
    <div class="popup-box">
        <div class="popup-content">
            <div class="popup-title">
                <h2>NOTICE</h2>
                <div class="y-box"></div>
            </div>
            <div class="popup-text">
                <div style="font-size: 20px; line-height: 30px;">

                </div>
            </div>
        </div>
        <div class="popup-footer">
            <button type="button" class="clear full-btn">@lang('front.global.ok')</button>
        </div>
    </div>
</div>

<div class="index-popup privacyPolicy_modal">
    <div class="popup-box">
        <div class="popup-content">
            <div class="popup-title">
                <h2>@lang('front.auth.privacy_policy')</h2>
                <div class="y-box"></div>
            </div>
            <div class="popup-text"><p>@lang('front.privacy_policy.content')</p></div>
        </div>
        <div class="popup-footer">
            <button type="button" class="clear full-btn">@lang('front.global.ok')</button>
        </div>
    </div>
</div>

<div class="index-popup signUp_modal">
    <div class="popup-box">
        <button class="closed">
            <img src="/front/dist/img/pop_close.png" alt="">
        </button>
        <div class="popup-content">
            <div class="popup-title">
                <h2>@lang('front.auth.sign_up')</h2>
                <div class="y-box"></div>
            </div>
            <form action="/front/signup" method="post" id="signup_form">
                {{csrf_field()}}
                <div class="left-content">
                    <!-- 에러텍스트 필요시 active클래스 추가 -->
                    <div class="etc-text">
                        <p>@lang('front.auth.signup_step_joining') @lang('front.auth.signup_remember')</p>
                        <div class="alert error-text"></div>
                        {{--<div class="error-text">
                            <span>The referrer you entered is not a member.</span>
                        </div>--}}
                    </div>
                    <div class="form-box">
                        <div class="input-wrap">
                            <div class="input-box">
                                <span class="input-title">
                                    @lang('front.auth.referrer')
                                </span>
                                <div class="input-bar">
                                    {{ Form::text('referrer','',['required' => 'required', 'placeholder' => trans('front.placeholder.enter_referrer')]) }}
                                    <p>The username you entered is not a member.</p>
                                </div>
                            </div>
                            <div class="input-box harf-box">
                                <span class="input-title">
                                    @lang('front.user.first_name')
                                </span>
                                <div class="input-bar">
                                    {{ Form::text('first_name','', ['placeholder' => trans('front.placeholder.enter_your_firstname')]) }}
                                    <p>@lang('front.global.field_required')</p>
                                </div>
                            </div>
                            <div class="input-box harf-box right-box">
                                <span class="input-title">
                                    @lang('front.user.last_name')
                                </span>
                                <div class="input-bar">
                                    {{ Form::text('last_name','', ['placeholder' => trans('front.placeholder.enter_your_lastname')]) }}
                                    <p>@lang('front.global.field_required')</p>
                                </div>
                            </div>
                            <div class="input-box">
                                <span class="input-title">
                                    Nationality
                                </span>
                                <div class="input-bar">
                                    <p class="nation"><span>Choose the nationality</span><img
                                            src="/front/dist/img/right_arrow.png" alt=""></p>
                                    <input type="hidden" name="nationality">
                                    <ul>
                                        {{--<li onclick="nationalitySel('US');">U.S</li>--}}
                                        {{--<li onclick="nationalitySel('China');">中国</li>--}}
                                        <li onclick="nationalitySel('Thailand');">ประเทศไทย</li>
                                        <li onclick="nationalitySel('Japan');">日本</li>
                                        <li onclick="nationalitySel('Korea');">대한민국</li>
                                        <li onclick="nationalitySel('Vietnam');">Việt Nam</li>
                                        <li onclick="nationalitySel('Philippines');">Philippines</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="right-content">
                    <div class="form-box">
                        <div class="input-wrap">
                            <div class="input-box">
                                <span class="input-title">
                                    @lang('front.user.email')
                                </span>
                                <div class="input-bar">
                                    {{ Form::text('email','', ['placeholder' => trans('front.placeholder.enter_your_email')]) }}
                                    <p>This email is already used.</p>
                                </div>
                                <span class="input-title">
                                    @lang('front.user.password')
                                </span>
                                <div class="input-bar">
                                    {{ Form::password('password',['autocomplete' => 'off', 'placeholder' => trans('front.placeholder.enter_your_password')]) }}
                                    <p>Please enter a minimum of 8 digits and a maximum of 20 digits.</p>
                                </div>
                                <span class="input-title">
                                    @lang('front.user.repeat_password')
                                </span>
                                <div class="input-bar">
                                    {{ Form::password('repeat_password',['autocomplete' => 'off','placeholder' => trans('front.placeholder.enter_your_repeat_password')]) }}
                                    <p>Password does not match. Please check again.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="check-item checkbox-wrap" onclick="agree(this)">
                        <input type="checkbox" id="check-item01" name="check-item01"/>
                        <label for="check-item01"><span class="checkbox-custom"></span><span
                                class="checkbox-label">@lang('front.auth.agree_privacy_policy')</span></label>
                    </div>
                    <div class="test">
                        <a href="javascript:void(0);"
                           onclick="openModal('.termsAndConditions_modal'); return false;">@lang('front.auth.terms_conditions')</a>
                        | <a href="javascript:void(0);"
                             onclick="openModal('.privacyPolicy_modal'); return false;">@lang('front.auth.privacy_policy')</a>
                    </div>
                    <div class="popup-btn">
                        <!-- 작성완료시 submit 클래스 추가 -->
                        <button type="submit" class="submit" {{--href="#sign" --}}disabled="disabled">
                            @lang('front.auth.create_new_account')
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="index-popup forgotPassword_modal">
    <div class="popup-box">
        <button class="closed">
            <img src="/front/dist/img/pop_close.png" alt="">
        </button>
        <div class="popup-content none-padding">
            <div class="imgPop-img">
            </div>
            <div class="imgPop-content">
                <div class="popup-title">
                    <h2>@lang('front.auth.forgot_password')</h2>
                    <div class="y-box"></div>
                </div>
                <div class="etc-text">
                    <div class="alert error-text"></div>
                    <p>@lang('front.auth.recover_password_via_email')</p>
                </div>
                <form action="/front/password/forgot" method="post" id="forgot_form">
                    {{csrf_field()}}
                    <div class="form-box">
                        <div class="input-wrap">
                            <div class="input-box">
                                <span class="input-title m-t-100">
                                    @lang('front.user.email')
                                </span>
                                <div class="input-bar">
                                    {{ Form::email('email','',['placeholder' => trans('front.placeholder.enter_your_email')]) }}
                                    <p>@lang('front.global.field_required')</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="popup-btn">
                        <!-- 작성완료시 submit 클래스 추가 -->
                        <button type="submit" class="submit">
                            @lang('welcome.home.send')
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="index-popup authenticationEmail_modal">
    <div class="popup-box">
        <button class="closed">
            <img src="/front/dist/img/pop_close.png" alt="">
        </button>
        <div class="popup-content none-padding">
            <div class="imgPop-img">
            </div>
            <div class="imgPop-content">
                <div class="popup-title">
                    <h2>@lang('front.auth.authentication_email')</h2>
                    <div class="y-box"></div>
                </div>
                <div class="etc-text">
                    <p>@lang('front.auth.authentication_via_email')</p>
                    <div class="alert error-text"></div>
                </div>
                <form action="/front/auth/email" method="post" id="email_form">
                    {{csrf_field()}}
                    <div class="form-box">
                        <div class="input-wrap">
                            <div class="input-box">
                                <span class="input-title">
                                    @lang('front.user.email')
                                </span>
                                <div class="input-bar">
                                    {{ Form::email('email','',['placeholder' => trans('front.placeholder.enter_your_email')]) }}
                                    <p>@lang('front.global.field_required')</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="popup-btn">
                        <!-- 작성완료시 submit 클래스 추가 -->
                        <button type="submit" class="submit">
                            @lang('welcome.home.send')
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="index-popup login_modal">
    <div class="popup-box">
        <button class="closed">
            <img src="/front/dist/img/pop_close.png" alt="">
        </button>
        <div class="popup-content none-padding">
            <div class="imgPop-img">
            </div>
            <div class="imgPop-content">
                <div class="popup-title">
                    <h2 class="text-uppercase">@lang('front.auth.login')</h2>
                    <div class="y-box"></div>
                </div>
                <div class="etc-text">
                    <div class="alert error-text"></div>
                </div>
                <form action="{{route('front.login')}}" method="post" id="frmLogin">
                    {{csrf_field()}}
                    <div class="form-box">
                        <div class="input-wrap">
                            <div class="input-box">
                                <span class="input-title">
                                    @lang('front.user.email')
                                </span>
                                <div class="input-bar">
                                    <input type="text" autocomplete="off"
                                           placeholder="@lang('front.placeholder.enter_your_email')" name="email"
                                           value="">
                                    <p>@lang('front.global.field_required')</p>
                                </div>
                                <span class="input-title">
                                    @lang('front.user.password')
                                </span>
                                <div class="input-bar">
                                    {{ Form::password('password', ['id' => 'pass-input',  'autocomplete' => 'off', 'placeholder' => trans('front.placeholder.enter_your_password')]) }}
                                    <p>@lang('front.global.field_required')</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sub-list">
                        <ul>
                            <li><a href="javascript:void(0);"
                                   onclick="openModal('.signUp_modal'); return false;">· @lang('front.auth.sign_up')</a>
                            </li>
                            <li><a href="javascript:void(0);"
                                   onclick="openModal('.forgotPassword_modal'); return false;">· @lang('front.auth.forgot_my_password')</a>
                            </li>
                            <li><a href="javascript:void(0);"
                                   onclick="openModal('.authenticationEmail_modal'); return false;">· @lang('front.auth.authentication_email')</a>
                            </li>
                        </ul>
                    </div>
                    <div class="popup-btn">
                        <!-- 작성완료시 submit 클래스 추가 -->
                        <button type="submit" class="submit">
                            @lang('front.auth.login')
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="index-popup termsAndConditions_modal">
    <div class="popup-box">
        <div class="popup-content">
            <div class="popup-title">
                <h2>@lang('front.auth.terms_conditions')</h2>
                <div class="y-box"></div>
            </div>
            <div class="popup-text"><p>@lang('front.terms_conditions.content')</p></div>
        </div>
        <div class="popup-footer">
            <button type="button" class="clear full-btn">@lang('front.global.ok')</button>
        </div>
    </div>
</div>

<div class="index-popup resetPassword_modal">
    <div class="popup-box">
        <button class="closed">
            <img src="/front/dist/img/pop_close.png" alt="">
        </button>
        <div class="popup-content none-padding">
            <div class="imgPop-img">
            </div>
            <div class="imgPop-content">
                <div class="popup-title">
                    <h2>@lang('front.auth.reset_password')</h2>
                    <div class="y-box"></div>
                </div>
                <div class="etc-text">
                    <div class="alert error-text"></div>
                </div>
                <form method="POST" action="/front/password/reset" accept-charset="UTF-8" id="reset_password_form">
                    {{csrf_field()}}
                    <input type="hidden" name="code" value="{{ $code ?? ''}}"/>
                    <div class="form-box">
                        <div class="input-wrap">
                            <div class="input-box">
                                <span class="input-title">
                                    @lang('front.user.password')
                                </span>
                                <div class="input-bar">
                                    <input type="password" name="password"
                                           placeholder="@lang('front.placeholder.enter_your_password')">
                                    <p>@lang('front.global.field_required')</p>
                                </div>
                                <span class="input-title">
                                    @lang('front.user.repeat_password')
                                </span>
                                <div class="input-bar">
                                    <input type="password" name="password_same"
                                           placeholder="@lang('front.placeholder.enter_your_repeat_new_password')">
                                    <p>@lang('front.global.field_required')</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="popup-btn">
                        <!-- 작성완료시 submit 클래스 추가 -->
                        <button type="submit" class="submit">
                            @lang('front.auth.modify_password')
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="buy-popup none-etc" id="front_term">
    <div class="popup-box scroll-box">
        <div class="popup-content">
            <h2>@lang('front.auth.terms_conditions')</h2>
            <div class="popup-text"><p>@lang('front.terms_conditions.content')</p></div>
            <div class="popup-footer">
                <div class="button-box">
                    <button type="button" class="clear full-btn"
                            onclick="$('#front_term').removeClass('active').parent('body').removeClass('active');">Ok
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="buy-popup none-etc" id="front_privacy">
    <div class="popup-box scroll-box">
        <div class="popup-content">
            <h2>@lang('front.auth.privacy_policy')</h2>
            <div class="popup-text"><p>@lang('front.privacy_policy.content')</p></div>
            <div class="popup-footer">
                <div class="button-box">
                    <button type="button" class="clear full-btn"
                            onclick="$('#front_privacy').removeClass('active').parent('body').removeClass('active');">Ok
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
