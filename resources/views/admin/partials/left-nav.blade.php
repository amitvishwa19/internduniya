<!-- Left Sidenav -->
<div class="left-sidenav">
    <!-- LOGO -->
    <div class="brand">
        <a href="{{route('admin.dashboard')}}" class="logo">
            <span class="admin-sidebar-logo-title">
                <img src="{{asset('public/admin/assets/images/logo-sm.png')}}" alt="logo-small" class="logo-sm">
                <span class="title-text">DevloMatix</span>
            </span>
            {{-- <span>
                <img src="{{asset('public/admin/assets/images/logo.png')}}" alt="logo-large" class="logo-lg logo-light">
                <img src="{{asset('public/admin/assets/images/logo-dark.png')}}" alt="logo-large" class="logo-lg logo-dark">
            </span> --}}
        </a>
    </div>
    <!--end logo-->
    <div class="menu-content h-100" data-simplebar>
        <ul class="metismenu left-sidenav-menu">
            
            <li>
                <a href="{{route('admin.dashboard')}}">
                     <i data-feather="home" class="align-self-center menu-icon"></i><span>Dashboard</span>
                </a>
            </li>

            <hr class="hr-dashed hr-menu">
            <li>
                <a href="{{route('post.index')}}">
                     <i data-feather="send" class="align-self-center menu-icon"></i><span>Posts</span>
                </a>
            </li>
            <li>
                <a href="{{route('category.index')}}">
                     <i data-feather="pause" class="align-self-center menu-icon"></i><span>Category</span>
                </a>
            </li>
            <li>
                <a href="{{route('subscription.index')}}">
                    <i data-feather="thumbs-up" class="align-self-center menu-icon"></i><span>Subscriptions</span>
                </a>
            </li>

            <li>
                <a href="{{route('inquiry.index')}}">
                    <i data-feather="zap" class="align-self-center menu-icon"></i><span>Inquiries</span>
                </a>
            </li>

           

            <li>
                <a href="{{route('corporate.index')}}">
                    <i data-feather="zap" class="align-self-center menu-icon"></i><span>Corporates</span>
                </a>
            </li>

            <li>
                <a href="{{route('resume.index')}}">
                    <i data-feather="zap" class="align-self-center menu-icon"></i><span>Students</span>
                </a>
            </li>

            <li>
                <a href="{{route('internship.index')}}">
                    <i data-feather="zap" class="align-self-center menu-icon"></i><span>Internships</span>
                </a>
            </li>

            <li>
                <a href="{{route('payment.index')}}">
                    <i data-feather="dollar-sign" class="align-self-center menu-icon"></i><span>Payments</span>
                </a>
            </li>
            



            <!-- <hr class="hr-dashed hr-menu"> -->

            <!-- <li>
                <a href="{{route('mtemplate.index')}}">
                    <i data-feather="send" class="align-self-center menu-icon"></i><span>Mail Templates</span>
                </a>
            </li>

            <li>
                <a href="{{route('file.index')}}">
                    <i data-feather="file" class="align-self-center menu-icon"></i><span>File Manager</span>
                </a>
            </li>

            <li>
                <a href="{{route('chat.index')}}">
                    <i data-feather="message-square" class="align-self-center menu-icon"></i><span>Chat</span>
                </a>
            </li> -->

            

            <hr class="hr-dashed hr-menu">

            <li>
                <a href="javascript: void(0);"><i data-feather="key" class="align-self-center menu-icon"></i><span>Access Control</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li>
                        <a href="{{route('user.index')}}">
                            <i class="ti-control-record"></i>Users</a>
                    </li>

                    <li>
                        <a href="{{route('role.index')}}">
                            <i class="ti-control-record"></i>Roles</a>
                    </li>

                    <li>
                        <a href="{{route('permission.index')}}">
                            <i class="ti-control-record"></i>Permissions</a>
                    </li>

                </ul>
            </li>



            <hr class="hr-dashed hr-menu">

            

            <li>
                <a href="{{route('setting.index')}}">
                    <i data-feather="settings" class="align-self-center menu-icon"></i><span>Settings</span>
                </a>
            </li>

        </ul>

        <div class="update-msg text-center bottom-brand">
            <a href="javascript: void(0);" class="btn btn-outline-warning btn-sm"> &copy; 2021 Devlomatix Solutions Version: {{config('app.version')}}</a>
        </div>
    </div>
</div>
<!-- end left-sidenav-->
