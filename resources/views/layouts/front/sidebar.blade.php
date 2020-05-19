<?php
$route_name = \Request::route()->getName();
?>
<nav>
    <div class="nav-container" style="z-index: 9999;">
        <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <ul class="nav-wrap">
            <!-- new 클래스 추가시 아이콘 추가 -->
            <li onclick="location.href='{{ route("front.dashboard") }}'"
                class="{{ $route_name == 'front.dashboard' ? 'active' : '' }} draw-list"><img
                    src="/front/dist/img/ico_home.png" alt="" class="list-ico">@lang('front.menu.dashboard')<span><img
                        src="/front/dist/img/ico_new.png" class="new-ico" alt=""></span></li>
            <li class="draw-list {{ $route_name == 'front.buyplan.index' ? 'active' : '' }}
            {{ $route_name == 'front.rebuyplan.index' ? 'active' : '' }}">
                <ul>
                    <li><img src="/front/dist/img/ico_basket.png" alt="" class="list-ico">@lang('front.menu.buy_plans')
                        <span><img
                                src="/front/dist/img/ico_new.png" class="new-ico" alt=""><img
                                src="/front/dist/img/right_arrowW.png" class="drop-arrow" alt=""></span></li>
                    <li class="draw-item {{ $route_name == 'front.buyplan.index'  ? 'active' : '' }}
                    {{ $route_name == 'front.rebuyplan.index'  ? 'active' : '' }}">
                        <ul>
                            <li onclick="location.href='{{ route("front.buyplan.index") }}'">· @lang('menu.buy_pack')</li>
                            <li onclick="location.href='{{ route("front.rebuyplan.index") }}'">· @lang('menu.repurchase')</li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li onclick="location.href='{{ route("front.payment.index") }}'"
                class="{{ $route_name == 'front.payment.index' ? 'active' : '' }} draw-list
@if(\App\Models\Order::where('users_id', Auth::guard('front')->user()->id)->where('check_status','N')->count()>0) new @endif">
                <img src="/front/dist/img/ico_list.png" alt="" class="list-ico">
                @lang('front.menu.payment_history')
                <span><img src="/front/dist/img/ico_new.png" class="new-ico" alt=""></span>
            </li>
            <li onclick="location.href='{{ route("front.citizen.index") }}'"
                class="{{ $route_name == 'front.citizen.index' ? 'active' : '' }} draw-list
@if(\App\Models\Users::where('referrer', Auth::guard('front')->user()->id)->whereNull('directed_at')->count()>0) new @endif">
                <img
                    src="/front/dist/img/ico_people.png" alt="" class="list-ico">@lang('front.menu.common_list')
                <span><img src="/front/dist/img/ico_new.png" class="new-ico" alt=""></span></li>
            <li onclick="location.href='{{ route("front.tree.detail", Auth::guard("front")->user()->email) }}'"
                class="{{ $route_name == 'front.tree.detail' ? 'active' : '' }} draw-list"><img
                    src="/front/dist/img/ico_tree.png" alt="" class="list-ico">@lang('front.menu.common_tree')<span><img
                        src="/front/dist/img/ico_new.png" class="new-ico" alt=""></span></li>
            <li onclick="location.href='{{ route("front.allowance.index") }}'"
                class="{{ $route_name == 'front.allowance.index' ? 'active' : '' }} draw-list
@if(\App\Models\Commission::where('users_id', Auth::guard('front')->user()->id)->whereNotIn('type',['7,8'])->where('check_status','N')->count()>0) new @endif">
                <img
                    src="/front/dist/img/ico_money.png" alt="" class="list-ico">@lang('front.menu.allowance_list')<span><img
                        src="/front/dist/img/ico_new.png" class="new-ico" alt=""></span></li>
            <li class="draw-list {{ $route_name == 'front.withdraw.index' ? 'active' : '' }}">
                <ul>
                    <li><img src="/front/dist/img/ico_payback.png" alt=""
                             class="list-ico">@lang('front.menu.withdrawal_cash')<span><img
                                src="/front/dist/img/ico_new.png" class="new-ico" alt=""><img
                                src="/front/dist/img/right_arrowW.png" class="drop-arrow" alt=""></span></li>
                    <li class="draw-item {{ $route_name == 'front.withdraw.index' ? 'active' : '' }}">
                        <ul>
                            <li onclick="location.href='{{ route("front.withdraw.index") }}'">· @lang('menu.withdraw')</li>
                            <li onclick="location.href='{{ route("front.forwarding.index") }}'">· @lang('menu.forwarding')</li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li onclick="location.href='{{ route("front.support.index") }}'"
                class="{{ $route_name == 'front.support.index' ? 'active' : '' }} draw-list"><img
                    src="/front/dist/img/ico_support.png" alt="" class="list-ico">@lang('menu.support')<img
                    src="/front/dist/img/ico_new.png" class="new-ico" alt=""></li>
            <li class="draw-list">
                <ul>
                    <li><img src="/front/dist/img/ico_mining.png" alt="" class="list-ico">@lang('menu.mining')<img
                            src="/front/dist/img/ico_new.png" class="new-ico" alt=""><img
                            src="/front/dist/img/right_arrowW.png" class="drop-arrow" alt=""></li>
                    <li class="draw-item">
                        <ul>
                            <li onclick="location.href='{{ route("front.mining.status") }}'">· @lang('menu.mining_status')</li>
                            {{--<li onclick="location.href='{{ route("front.mining.repurchase") }}'">· Repurchase</li>--}}
                            <li onclick="location.href='{{ route("front.mining.withdraw") }}'">· @lang('menu.withdraw')</li>
                            {{--<li onclick="location.href='{{ route("front.mining.forwarding") }}'">· Forwarding</li>--}}
                        </ul>
                    </li>
                </ul>
            </li>
            <li onclick="location.href='{{ route("front.setting") }}'"
                class="{{ $route_name == 'front.setting' ? 'active' : '' }} draw-list"><img
                    src="/front/dist/img/ico_setting.png" alt="" class="list-ico">@lang('front.menu.setting')<span><img
                        src="/front/dist/img/ico_new.png" class="new-ico" alt=""></span></li>
        </ul>
        <ul class="nav-footer">
            <li><img src="/front/dist/img/login_logo.png" alt="Logo"></li>
            <li><a href="javascript:void(0);"
                   onclick="$('#front_term').addClass('active').parent('body').addClass('active');">@lang('front.auth.terms_conditions')</a>
            </li>
            <li><a href="javascript:void(0);"
                   onclick="$('#front_privacy').addClass('active').parent('body').addClass('active');">@lang('front.auth.privacy_policy')</a>
            </li>
            <li>@lang('menu.copyright')</li>
        </ul>
    </div>
</nav>
<script>
    $(document).ready(function () {
        $('.draw-list').click(function () {
            $(this).find('.draw-item').toggleClass('active');
            $(this).siblings().find('.draw-item').removeClass('active');
        });
    });
</script>
