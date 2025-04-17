<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{asset('/assets/admin/img/logo.png')}}" alt=" Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Mains Orbit</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('admin.dashboard')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>																
                </li>
               
                @php
                    $user = Auth::guard('admin')->user();
                @endphp

                @if ($user && $user->role == 3) 
                    <li class="nav-item">
                        <a href="{{route('student.questionList')}}" class="nav-link">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>Assigned Answer</p>
                        </a>																
                    </li>
                    <li class="nav-item">
                        <a href="{{route('checked.list')}}" class="nav-link">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>Evaluated Answer</p>
                        </a>																
                    </li>
                    <li class="nav-item">
                        <a href="{{route('message.list')}}" class="nav-link">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>Doubt Messages</p>
                        </a>																
                    </li>
                @endif

                @if ($user && $user->role != 3) 
                    {{-- <li class="nav-item">
                        <a href="{{route('evaluate.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>Evaluate</p>
                        </a>
                    </li> --}}
                    <li class="nav-item has-treeview">
                        <a href="{{route('evaluate.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>
                                Evaluator
                            
                            </p>
                        </a>
                        
                    </li>

                    <li class="nav-item">
                        <a href="{{route('enquerylist.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>Enquiry List</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('Doubtlist.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>Student Doubt</p>
                        </a>
                    </li>

                    {{-- <li class="nav-item">
                        <a href="{{route('plan.pending')}}" class="nav-link">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>Pending Plan List</p>
                        </a>
                    </li> --}}
                    {{-- <li class="nav-item">
                        <a href="{{route('plan.purchase')}}" class="nav-link">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>Plan Purchase student</p>
                        </a>
                    </li> --}}
                    {{-- <li class="nav-item">
                        <a href="{{route('plan.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-tag"></i>
                            <p>Plans</p>
                        </a>
                    </li> --}}

                    <li class="nav-item has-treeview">
                        <a href="" class="nav-link">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>
                                Plans
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('plan.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Plan List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('plan.purchase')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Plan Purchase Student</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{route('plan.pending')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Plan Pending Student</p>
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                    
                    <li class="nav-item">
                        <a href="{{route('student.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p> CG Student
                                {{-- <i class="right fas fa-angle-left"></i> --}}
                            </p>
                        </a>

                        {{-- <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Student</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Question</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Weekly Test</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Plan</p>
                                </a>
                            </li>
                        </ul> --}}
                    </li>
                    <li class="nav-item">
                        <a href="{{route('student.mpstudentList')}}" class="nav-link">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p> MP Student
                                {{-- <i class="right fas fa-angle-left"></i> --}}
                            </p>
                        </a>
                        {{-- <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Student</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Question</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Weekly Test</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Plan</p>
                                </a>
                            </li>
                        </ul> --}}
                    </li>
                    
                    <li class="nav-item">
                        <a href="{{route('slider.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>Slider</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('about.index')}}" class="nav-link">
                            <svg class="h-6 nav-icon w-6 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <p>About</p>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="{{route('sample.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-tag"></i>
                            <p>Add Sample</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('mainspractice.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-tag"></i>
                            <p>Mains Practice question</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('weekly.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-tag"></i>
                            <p>Monthly Current affairs</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('question.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>Previous Year Questions</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('guide.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-tag"></i>
                            <p>Supporter</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('offer.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-tag"></i>
                            <p>Offers</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('setting.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-tag"></i>
                            <p>Web Settings</p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="" class="nav-link">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>
                                Login Student
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('cglogin.student')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>CG Student</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('mplogin.student')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>MP Student</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                
                							
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
 </aside>