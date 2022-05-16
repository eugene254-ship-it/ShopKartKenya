@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="mb-4 col-12 col-xl-8 mb-xl-0">
                        <h3 class="font-weight-bold">Settings</h3>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="justify-content-end d-flex">
                            <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                <button class="bg-white btn btn-sm btn-light dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                                    <a class="dropdown-item" href="#">January - March</a>
                                    <a class="dropdown-item" href="#">March - June</a>
                                    <a class="dropdown-item" href="#">June - August</a>
                                    <a class="dropdown-item" href="#">August - November</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Password Update</h4>
                  @if(Session::has('error_message'))
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <strong>Error:</strong> {{ Session::get('error_message')}}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                          </div>
                  @endif

                  @if(Session::has('success_message'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Success:</strong> {{ Session::get('success_message')}}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                  </div>
                  @endif

                  <form class="forms-sample" action="{{ url('admin/update-admin-password')}}"
                   method="post">@csrf
                    <div class="form-group">
                      <label for="current_password">Current Password</label>
                      <input type="password" class="form-control" id="current_password" placeholder="Enter Current Password" name="current_password" required="">
                      <span id="check_password"></span>
                    </div>
                    <div class="form-group">
                      <label for="new_password">New Password</label>
                      <input type="password" class="form-control" id="new_password" placeholder="Enter New Password" name="new_password" required="">
                    </div>
                    <div class="form-group">
                      <label for="confirm_password">Confirm Password</label>
                      <input type="password" class="form-control" id="confirm_password" placeholder="Confirm Password" name="confirm_password" required=""  >
                    </div>
                   
                    <button type="submit" class="mr-2 btn btn-primary">Update Password</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
        </div>
        <div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->
    <div class="row">
    <div class="col-lg-8">
        <!-- Email notifications preferences card-->
        <div class="card card-header-actions mb-4">
            <div class="card-header">
                Email Notifications
                <div class="form-check form-switch">
                    <input class="form-check-input" id="flexSwitchCheckChecked" type="checkbox" checked="" />
                    <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                </div>
            </div>
            <div class="card-body">
                <form>
                    <!-- Form Group (default email)-->
                    <div class="mb-3">
                        <label class="small mb-1" for="inputNotificationEmail">Default notification email</label>
                        <input class="form-control" id="inputNotificationEmail" type="email" value="{{ Auth::guard('admin')->user()->email }}" disabled="" />
                    </div>
                    <!-- Form Group (email updates checkboxes)-->
                    <div class="mb-0">
                        <label class="small mb-2">Choose which types of email updates you receive</label>
                        <div class="form-check mb-2">
                            <input class="form-check-input" id="checkAccountChanges" type="checkbox" checked="" />
                            <label class="form-check-label" for="checkAccountChanges">Changes made to your account</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" id="checkAccountGroups" type="checkbox" checked="" />
                            <label class="form-check-label" for="checkAccountGroups">Changes are made to groups you're part of</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" id="checkProductUpdates" type="checkbox" checked="" />
                            <label class="form-check-label" for="checkProductUpdates">Product updates for products you've purchased or starred</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" id="checkProductNew" type="checkbox" checked="" />
                            <label class="form-check-label" for="checkProductNew">Information on new products and services</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" id="checkPromotional" type="checkbox" />
                            <label class="form-check-label" for="checkPromotional">Marketing and promotional offers</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" id="checkSecurity" type="checkbox" checked="" disabled="" />
                            <label class="form-check-label" for="checkSecurity">Security alerts</label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- SMS push notifications card-->
        <div class="card card-header-actions mb-4">
            <div class="card-header">
                Push Notifications
                <div class="form-check form-switch">
                    <input class="form-check-input" id="smsToggleSwitch" type="checkbox" checked="" />
                    <label class="form-check-label" for="smsToggleSwitch"></label>
                </div>
            </div>
            <div class="card-body">
                <form>
                    <!-- Form Group (default SMS number)-->
                    <div class="mb-3">
                        <label class="small mb-1" for="inputNotificationSms">Default SMS number</label>
                        <input class="form-control" id="inputNotificationSms" type="tel" value="{{ Auth::guard('admin')->user()->mobile}}" disabled="" />
                    </div>
                    <!-- Form Group (SMS updates checkboxes)-->
                    <div class="mb-0">
                        <label class="small mb-2">Choose which types of push notifications you receive</label>
                        <div class="form-check mb-2">
                            <input class="form-check-input" id="checkSmsComment" type="checkbox" checked="" />
                            <label class="form-check-label" for="checkSmsComment">Someone comments on your post</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" id="checkSmsShare" type="checkbox" />
                            <label class="form-check-label" for="checkSmsShare">Someone shares your post</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" id="checkSmsFollow" type="checkbox" checked="" />
                            <label class="form-check-label" for="checkSmsFollow">A user follows your account</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" id="checkSmsGroup" type="checkbox" />
                            <label class="form-check-label" for="checkSmsGroup">New posts are made in groups you're part of</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" id="checkSmsPrivateMessage" type="checkbox" checked="" />
                            <label class="form-check-label" for="checkSmsPrivateMessage">You receive a private message</label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <!-- Notifications preferences card-->
        <div class="card">
            <div class="card-header">Notification Preferences</div>
            <div class="card-body">
                <form>
                    <!-- Form Group (notification preference checkboxes)-->
                    <div class="form-check mb-2">
                        <input class="form-check-input" id="checkAutoGroup" type="checkbox" checked="" />
                        <label class="form-check-label" for="checkAutoGroup">Automatically subscribe to group notifications</label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" id="checkAutoProduct" type="checkbox" />
                        <label class="form-check-label" for="checkAutoProduct">Automatically subscribe to new product notifications</label>
                    </div>
                    <!-- Submit button-->
                    <button class="btn btn-danger-soft text-danger">Unsubscribe from all notifications</button>
                </form>
            </div>
        </div>
    </div>
</div>

</div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    @include('admin.layout.footer')
    <!-- partial -->
</div>
@endsection