<?php
	$locale = App::getLocale();
?>
<header>
	<div class="dashHeader-container">
		<div class="hamburger">
			<span></span>
			<span></span>
			<span></span>
		</div>
		<div class="header-logo">
			<a href="{{ route("main") }}">
				<img src="/front/dist/img/login_logo.png" alt="">
			</a>
		</div>
		<div class="header-items">
			<div class="user-email">
                <span>
                   {{Auth::guard('front')->user()->email}}
                </span>
			</div>
			<div class="language-box">
				<span class="language-btn"><img src="/front/dist/img/{{ $locale }}.png" alt="{{ $locale }}"></span>
				<div class="flag-list">
					<!-- <ul>
						<li data-placement="2" class="lang-select"><img src="/front/dist/img/flag00.png" alt="">U.S</li>
						<li data-placement="4" class="lang-select"><img src="/front/dist/img/flag01.png" alt="">China</li>
						<li data-placement="6" class="lang-select"><img src="/front/dist/img/flag02.png" alt="">Thailand</li>
						<li data-placement="3" class="lang-select"><img src="/front/dist/img/flag03.png" alt="">Japan</li>
						<li data-placement="0" class="lang-select"><img src="/front/dist/img/flag04.png" alt="">Korea</li>
						<li data-placement="1" class="lang-select"><img src="/front/dist/img/flag05.png" alt="">Vietnam</li>
						<li data-placement="5" class="lang-select"><img src="/front/dist/img/flag06.png" alt="">Philippines</li>
					</ul> -->
					<ul>
					@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
						<li rel="alternate" hreflang="{{ $localeCode }}" onclick="window.location.href='{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}'">
							<img src="/front/dist/img/{{ $localeCode }}.png" alt="{{ $properties['native'] }}">
							<span>{{ $properties['native'] }}</span>
						</li>
					@endforeach
					</ul>
				</div>
			</div>
			<button onclick="location.href='/front/logout'" type="button"><span>@lang('front.auth.logout')</span><img src="/front/dist/img/btn_logout.png" alt=""></button>
		</div>
	</div>
</header>