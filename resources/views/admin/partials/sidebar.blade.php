<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu"
            data-keep-expanded="false"
            data-auto-scroll="true"
            data-slide-speed="200">
            @if(Auth::user()->isAdmin == true)
                <li @if(Request::path() == config('quickadmin.route').'/menu') class="active" @endif>
                    <a href="{{ url(config('quickadmin.route').'/menu') }}">
                        <i class="fa fa-list"></i>
                        <span class="title">Menu</span>
                    </a>
                </li>
                <li @if(Request::path() == 'admin/users') class="active" @endif>
                    <a href="{{ url('/admin/users') }}">
                        <i class="fa fa-users"></i>
                        <span class="title">Users</span>
                    </a>
                </li>
				<li @if(Request::path() == 'admin/carriers') class="active" @endif>
					<a href="{{ url('/admin/carriers') }}">
						<span class="title">Thong tin hang hoa</span>
					</a>
				</li>
				<li @if(Request::path() == 'admin/goods') class='active' @endif>
					<a href="{{ url('/admin/goods') }}">
						<span class="title">Thong tin van tai</span>
					</a>
				</li>
            @endif
            <li>
                <a href="{{ url('logout') }}">
                    <i class="fa fa-sign-out fa-fw"></i>
                    <span class="title">Logout</span>
                </a>
			
</li>
        </ul>
    </div>
</div>
