<header class="header">
    <!-- Row start -->
    <div class="row gutters">
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6" class="float-left">
            <a href="{{ url('/home') }}" class="logo">
                <img src="{{ url('assets/logo.gif') }}" alt="Systematix"  style="max-height: 50px;">
            </a>
        </div>
        <div class="col-xl-8 col-lg-8 col-md-6 col-sm-6 col-6">
            <!-- Header actions start -->
            <ul class="header-actions">
               
                <li class="dropdown">
                    <a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
                        <span class="user-name">
                            {{ auth()->user()->name }}
                        </span>
                        <span class="avatar">
                            {{-- AP --}}
                            <img src="{{ url('assets/img/user.jpg') }}" alt="Ashish Patel" style="max-height: 50px;border-radius: 50%" />
                            <span class="status busy"></span>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userSettings">
                        <div class="header-profile-actions">
                            <div class="header-user-profile">
                                <div class="header-user">
                                    <img src="{{ url('assets/img/user.jpg') }}" alt="Ashish Patel" />
                                </div>
                                <h5>
                                    {{ auth()->user()->name }}
                                </h5>
                                <p>Sr. Software Developer</p>
                            </div>
                            {{-- <a href="#"><i class="icon-user1"></i> My Profile</a> --}}
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="icon-log-out1"></i>
                            Sign Out
                        </a>

                        

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                        </div>
                    </div>
                </li>
            </ul>						
            <!-- Header actions end -->
        </div>
    </div>
    <!-- Row end -->
</header>