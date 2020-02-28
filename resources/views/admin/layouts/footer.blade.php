<footer class="footer">
    <div class="container-fluid">
        <nav class="pull-left">
            <ul>
                <li>
                    <a href="#">
                        {{ trans('setting.hom') }}
                    </a>
                </li>
                <li>
                    <a href="#">
                        {{ trans('setting.com') }}
                    </a>
                </li>
                <li>
                    <a href="#">
                        {{ trans('setting.blog') }}
                    </a>
                </li>
            </ul>
        </nav>
        <p class="copyright pull-right">
            <a href="{{ asset(config('setting.font_image.url')) }}">{{ trans('setting.create') }}</a>{{ trans('setting.text1') }}
        </p>
    </div>
</footer>
