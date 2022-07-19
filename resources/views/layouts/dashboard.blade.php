<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Admin - Dashboard</title>
    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb_admin.css') }}" rel="stylesheet">
</head>

<body id="page-top">
 
    <div id="wrapper">      
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Hello Admin </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">            
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
           
            <hr class="sidebar-divider">
            
           
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('admin.indexadmin') }}"  data-toggle="ollapse" data-target="#ollapse"
                    aria-expanded="true" aria-controls="ollapse">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Orders</span>
                </a>
                     
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('admin.Restaurant.index')}}"  data-toggle="ollaps" data-target="#ollaps"
                    aria-expanded="true" aria-controls="ollaps">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Restaurants</span>
                </a>
                     
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Vendor</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">                        
                        <a class="collapse-item" href="{{ route('admin.Vendor.index') }}"> All </a>
                        <a class="collapse-item" href="{{ route('admin.Vendor.create') }}"> Create </a>

                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseT"
                    aria-expanded="true" aria-controls="collapseT">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Delivery</span>
                </a>
                <div id="collapseT" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">                     
                        <a class="collapse-item" href="{{ route('admin.Delivery.index') }}"> All </a>
                        <a class="collapse-item" href="{{ route('admin.Delivery.create') }}"> Create </a>
                    </div>    
                </div>        
            </li>

            @if (Auth::guard('admin')->user()->is_super ===1)
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTw"
                    aria-expanded="true" aria-controls="collapseTw">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Admin</span>
                </a>
                
                <div id="collapseTw" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">                 
                        <a class="collapse-item" href="{{ route('admin.Admin.index') }}"> All </a>
                        <a class="collapse-item" href="{{ route('admin.Admin.create') }}"> Create </a>          
                    </div>
                </div>
                
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse"
                    aria-expanded="true" aria-controls="collapse">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Super Admin</span>
                </a>
                <div id="collapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">                     
                        <a class="collapse-item" href="{{ route('admin.super') }}"> Remove From super </a>
                        <a class="collapse-item" href="{{ route('admin.all') }}"> New Super </a>

                    </div>    
                </div>        
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Status</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('admin.Status.index') }}">All</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTot"
                    aria-expanded="true" aria-controls="collapseTot">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>City</span>
                </a>
                <div id="collapseTot" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">                     
                        <a class="collapse-item" href="{{ route('admin.City.index') }}"> All </a>
                        <a class="collapse-item" href="{{ route('admin.City.create') }}"> Create </a>
                    </div>    
                </div>        
            </li>
            

            @endif

        
            <hr class="sidebar-divider d-none d-md-block">

            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                       <!-- Nav Item - Alerts -->
                        
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::guard('admin')->user()->name }}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{ asset('profile.svg') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                
                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('admin.profile') }}">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                            
                        </li>
                    </ul>
                </nav>
                
                <div class="container-fluid">
                   
                        @yield('content')  
                                                              
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                     <a class="btn btn-primary" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>

                    <form id="logout-form" action="{{ route('admin.logout') }}">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>    
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="{{ asset('jquery/jquery.js') }}"></script>

    <script src="{{ asset('jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('jquery/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <script type="text/javascript">
       
       const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");
        if(togglePassword){
       
          togglePassword.addEventListener("click", function () {
   
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            // toggle the eye icon
            this.classList.toggle('fa-eye');
             this.classList.toggle('fa-eye-slash');
          });
        };
        $(document).ready(function(){
            $('#status_id').on('change', function(e){
                var id_status = e.target.value;
                $.get('{{ url('admin/OrderStatus')}}/'+id_status, function(data){
                    
                    $('#news_data').empty();
                    $.each(data, function(index, element){
                        $('#news_data').append("<tr><td>"+element.id+"</td><td>"+element.user.email+"</td>"+
                        "<td>"+element.phone+"</td><td>"+element.city.city+"</td><td> <span style='font-size: 13px' class='badge rounded-pill bg-danger text-light'> "+element.status.status+"</span> </td> <td> <a class='btn btn-info' href='http://127.0.0.1:8000/admin/Order/"+element.id+"'> <i class='fas fa-eye'></i> </a> </td> </tr>");
                    });
                });
            }); 
        });
    </script>
</body>

</html>