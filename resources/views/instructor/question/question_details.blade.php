
@extends('instructor.instructor_dashboard')
@section('instructor')

<div class="page-content">
    <div class="chat-wrapper">
        <div class="chat-sidebar">
            <div class="chat-sidebar-header">
                <div class="d-flex align-items-center">
                    <div class="chat-user-online">
                        <img src="assets/images/avatars/avatar-1.png" width="45" height="45" class="rounded-circle" alt="" />
                    </div>
                    <div class="flex-grow-1 ms-2">
                        <p class="mb-0">Rachel Zane</p>
                    </div>
                    <div class="dropdown">
                        <div class="cursor-pointer font-24 dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded'></i>
                        </div>
                       
                    </div>
                </div>
                <div class="mb-3"></div>
                <div class="input-group input-group-sm"> <span class="input-group-text bg-transparent"><i class='bx bx-search'></i></span>
                    <input type="text" class="form-control" placeholder="People, groups, & messages"> <span class="input-group-text bg-transparent"><i class='bx bx-dialpad'></i></span>
                </div>
              
            </div>
                <div class="chat-sidebar-content">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-Chats">
                            <div class="p-3">
                
                            </div>
                            <div class="chat-list">
                                <div class="list-group list-group-flush">

                                    <a href="javascript:;" class="list-group-item">
                                        <div class="d-flex">
                                            <div class="chat-user-online">
                                                <img src="assets/images/avatars/avatar-2.png" width="42" height="42" class="rounded-circle" alt="" />
                                            </div>
                                            <div class="flex-grow-1 ms-2">
                                                <h6 class="mb-0 chat-title">Louis Litt</h6>
                                                <p class="mb-0 chat-msg">You just got LITT up, Mike.</p>
                                            </div>
                                            <div class="chat-time">9:51 AM</div>
                                        </div>
                                    </a>

                            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        <div class="chat-header d-flex align-items-center">
            <div class="chat-toggle-btn"><i class='bx bx-menu-alt-left'></i>
            </div>
           
            <div class="chat-top-header-menu ms-auto"> <a href="javascript:;"><i class='bx bx-video'></i></a>
                <a href="javascript:;"><i class='bx bx-phone'></i></a>
                <a href="javascript:;"><i class='bx bx-user-plus'></i></a>
            </div>
        </div>

        <div class="chat-content">
            <div class="chat-content-leftside">
                <div class="d-flex">
                    <img src="assets/images/avatars/avatar-3.png" width="48" height="48" class="rounded-circle" alt="" />
                    <div class="flex-grow-1 ms-2">
                        <p class="mb-0 chat-time">Harvey, 2:35 PM</p>
                        <p class="chat-left-msg">Hi, harvey where are you now a days?</p>
                    </div>
                </div>
            </div>
            <div class="chat-content-rightside">
                <div class="d-flex ms-auto">
                    <div class="flex-grow-1 me-2">
                        <p class="mb-0 chat-time text-end">you, 2:37 PM</p>
                        <p class="chat-right-msg">I am in USA</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="chat-footer d-flex align-items-center">
            <div class="flex-grow-1 pe-2">
                <div class="input-group">	<span class="input-group-text"><i class='bx bx-smile'></i></span>
                    <input type="text" class="form-control" placeholder="Type a message">
                </div>
            </div>
            <div class="chat-footer-menu"> <a href="javascript:;"><i class='bx bx-file'></i></a>
                <a href="javascript:;"><i class='bx bxs-contact'></i></a>
                <a href="javascript:;"><i class='bx bx-microphone'></i></a>
                <a href="javascript:;"><i class='bx bx-dots-horizontal-rounded'></i></a>
            </div>
        </div>
        <!--start chat overlay-->
        <div class="overlay chat-toggle-btn-mobile"></div>
        <!--end chat overlay-->
    </div>
</div>


@endsection