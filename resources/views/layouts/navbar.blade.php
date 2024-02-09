 <nav class="navbar">
     <a href="#" class="sidebar-toggler">
         <i data-feather="menu"></i>
     </a>
     <div class="navbar-content">
         <ul class="navbar-nav">
             <li class="nav-item dropdown">
                 <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button"
                     data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <i data-feather="bell"></i>
                     <div class="indicator">
                         <div class="circle"></div>
                     </div>
                 </a>
                 <div class="dropdown-menu p-0" aria-labelledby="notificationDropdown">
                     <div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
                         <p id="count"></p>
                         {{-- <a href="javascript:;" class="text-muted">Clear all</a> --}}
                     </div>
                     <div class="p-1" id="data-notifikasi">
                         {{-- data notificatoins --}}
                     </div>
                     <div class="px-3 py-2 d-flex align-items-center justify-content-center border-top">
                         <a href="{{ route('notifications.index') }}">View all</a>
                     </div>
                 </div>
             </li>
             <li class="nav-item dropdown">
                 <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                     data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <img class="wd-30 ht-30 rounded-circle" src="{{ asset('backoffice/assets/images/user.png') }}"
                         alt="profile">
                 </a>
                 <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                     <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                         <div class="mb-3">
                             <img class="wd-80 ht-80 rounded-circle"
                                 src="{{ asset('backoffice/assets/images/user.png') }}" alt="">
                         </div>
                         <div class="text-center">
                             <p class="tx-16 fw-bolder">{{ Auth::user()->name }}</p>
                             <p class="tx-12 text-muted">{{ Auth::user()->email }}</p>
                         </div>
                     </div>
                     <ul class="list-unstyled p-1">
                         {{-- <li class="dropdown-item py-2">
                             <a href="pages/general/profile.html" class="text-body ms-0">
                                 <i class="me-2 icon-md" data-feather="user"></i>
                                 <span>Profile</span>
                             </a>
                         </li> --}}
                         <li class="dropdown-item py-2">
                             <a href="javascript:;" class="text-body ms-0">
                                 <i class="me-2 icon-md" data-feather="edit"></i>
                                 <span>Edit Profile</span>
                             </a>
                         </li>
                         {{-- <li class="dropdown-item py-2">
                             <a href="javascript:;" class="text-body ms-0">
                                 <i class="me-2 icon-md" data-feather="repeat"></i>
                                 <span>Switch User</span>
                             </a>
                         </li> --}}
                         <li class="dropdown-item py-2">
                             <form method="POST" action="{{ route('logout') }}">
                                 @csrf
                                 <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="text-body ms-0">
                                     <i class="me-2 icon-md" data-feather="log-out"></i>
                                     <span>Log Out</span>
                                 </a>
                             </form>
                         </li>
                     </ul>
                 </div>
             </li>
         </ul>
     </div>
 </nav>


 @push('script-alt')
     <script>
         $(document).ready(function() {

             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });

             $.ajax({
                 type: "POST",
                 url: "{{ route('navbar.notifications') }}",
                 dataType: "JSON",
                 success: function(response) {
                     console.log('cek', response)

                     $('#count').html(response.count + ' Notifications')

                     var notif = ''

                     $.each(response.data, function(index, value) {
                         const subject         = value['subject']
                         const location        = value['location']
                         const space           = value['space']
                         const date            = value['date']
                         const description     = value['description']

                         notif += `<a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                                        <div
                                            class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                                            <i class="mdi mdi-account icon-sm text-white"></i>
                                        </div>
                                        <div class="flex-grow-1 me-2">
                                            <p>${subject} [${location}]</p>
                                            <p>Layanan ${space}</p>
                                            <p class="tx-12 text-muted">${date}</p>
                                            <p class="tx-12 text-muted">${description}</p>
                                        </div>
                                    </a>`;

                     });

                     $("#data-notifikasi").html(notif)
                 }
             });

         })
     </script>
 @endpush
