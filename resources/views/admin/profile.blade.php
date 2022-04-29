@include('admin.partials.header')
@include('admin.partials.topbar')

<div id="layoutSidenav">
    @include('admin.partials.sidebar')

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <div class="row mt-3">
                    <div class="col-md-4 card  p-5">
                        <div class="picture-section">
                                <img src="{{$user->image}}" style="border-radius:50%; height:160px; width:160px" alt="user-image">
                        </div>
                    </div>

                    <div class="col-md-8 card  p-5">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Name</label>
                            </div>
                            <div class="col-md-4">
                                <label>{{$user->name}}</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <label>Email</label>
                            </div>
                            <div class="col-md-4">
                                <label>{{$user->email}}</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <label>Email Verification Status</label>
                            </div>
                            <div class="col-md-4">
                                <label>
                                @if($user->email_verified_at != null)
                                <span class="badge badge-success">   {{'Verified'}}</span>
                                  
                                @else 
                                <span class="badge badge-warning">   {{'Not Verified'}}</span>
                                   

                                @endif
                                </label>
                            </div>
                        </div>
                        <a class="badge badge-info" href="{{route('edit_profile',$user->id)}}" ><i class="fa fa-edit"></i> Edit Profile</a>
                           

                    </div>
                </div>
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2021</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

@include('admin.partials.footer')