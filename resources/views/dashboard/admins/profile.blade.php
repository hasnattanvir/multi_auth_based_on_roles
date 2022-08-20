@extends('dashboard.admins.layouts.admin-dash-layout')

@section('title', 'profile')


@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle admin_picture" src="{{Auth::user()->picture}}" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>

                <p class="text-muted text-center">Admin</p>  
                <input type="file" name="admin_image" id="admin_image" style="opacity:0;height:1px;display:none;">
                <br>
                <br>
                <a href="javascript:void(0)" id="change_picture_btn" class="btn btn-primary">Change Picture</a>        

                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                <p class="text-muted">
                  B.S. in Computer Science from the University of Tennessee at Knoxville
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted">Malibu, California</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                  <span class="tag tag-danger">UI Design</span>
                  <span class="tag tag-success">Coding</span>
                  <span class="tag tag-info">Javascript</span>
                  <span class="tag tag-warning">PHP</span>
                  <span class="tag tag-primary">Node.js</span>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#personalinfo" data-toggle="tab">Personal Information</a></li>
                  <li class="nav-item"><a class="nav-link" href="#changepassword" data-toggle="tab">change password</a></li>
                  {{-- <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li> --}}
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="personalinfo">
                    <form action="{{route('adminUpdateinfo')}}" class="form-horizontal" method="POST"  id="AdminInfoForm">
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputName" placeholder="Name" value="{{Auth::user()->name}}" name="name" >
                            <span class="text-danger error-text name_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail" placeholder="Email" value="{{Auth::user()->email}}" name="email">
                            <span class="text-danger error-text email_error"></span>
                          </div>
                        </div>

                        <div class="form-group row">
                            <label for="color" class="col-sm-2 col-form-label">Favorite Color</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="color" placeholder="Color" value="{{Auth::user()->favoritecolor}}" name="favoritecolor">
                              <span class="text-danger error-text favoritecolor_error"></span>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            {{-- <button type="submit" class="btn btn-danger">Submit</button> --}}
                            <input type="submit" class="btn btn-danger" value="Submit">
                          </div>
                        </div>
                    </form>                  
                   
                  </div>
                  <!-- /.tab-pane -->                

                  <div class="tab-pane" id="changepassword">
                    <form action="{{route('changePassword')}}" method="POST" class="form-horizontal" id="changePasswordAdminForm">
                      <div class="form-group row">
                        <label for="oldpassword" class="col-sm-2 col-form-label">Old Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="oldpassword" placeholder="Your Old Password" name="oldpassword">
                          <span class="text-danger error-text oldpassword_error"></span>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="newpassword" class="col-sm-2 col-form-label">New Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="newpassword" placeholder="Your New Passsword" name="newpassword">
                          <span class="text-danger error-text newpassword_error"></span>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="confirmpassword" class="col-sm-2 col-form-label">Confirm New Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="confirmpassword" placeholder="ReEnter New Passsword" name="cnewpassword">
                          <span class="text-danger error-text cnewpassword_error"></span>
                        </div>
                      </div>           
                
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Reset Password</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  
@endsection