<nav class="navbar navbar-default navbar-fixed">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">{{ trans('setting.not') }}</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-left">
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-dashboard"></i>
                        <p class="hidden-lg hidden-md">{{ trans('setting.not') }}</p>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="fa fa-search"></i>
                        <p class="hidden-lg hidden-md">{{ trans('setting.sea') }}</p>
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="{{ route('role.index') }}">
                        <p>{{ trans('setting.acc') }}</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <p>{{ trans('setting.out') }}</p>
                    </a>
                </li>
                <li class="separator hidden-lg"></li>
            </ul>
        </div>
    </div>
</nav>
