<div class="sidebar" data-color="purple" data-image="{{ asset(config('setting.font_image.data_image')) }}">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="" class="simple-text">
                {{ trans('setting.create') }}
            </a>
        </div>
        <ul class="nav">
            <li class="active">
                <a href="">
                    <i class="pe-7s-graph"></i>
                    <p>{{ trans('setting.dash') }}</p>
                </a>
            </li>
            <li>
                <a href="{{ route('user.index') }}">
                    <i class="pe-7s-user"></i>
                    <p>{{ trans('setting.user') }}</p>
                </a>
            </li>
            <li>
                <a href="{{ route('category.index') }}">
                    <i class="pe-7s-note2"></i>
                    <p>{{ trans('setting.cat') }}</p>
                </a>
            </li>
            <li>
                <a href="{{ route('cake.index') }}">
                    <i class="pe-7s-news-paper"></i>
                    <p>{{ trans('setting.product') }}</p>
                </a>
            </li>
            <li>
                <a href="{{ route('order.index') }}">
                    <i class="pe-7s-science"></i>
                    <p>{{ trans('setting.or') }}</p>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="pe-7s-map-marker"></i>
                    <p>{{ trans('setting.comment') }}</p>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="pe-7s-bell"></i>
                    <p>{{ trans('setting.not') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
