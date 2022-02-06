@extends('layouts.app')
@section('bradcrum')
<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
    <!--begin::Info-->
    <div class="d-flex align-items-center flex-wrap mr-2">
        <!--begin::Page Title-->
        <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Dashboard</h5>
        <!--end::Page Title-->
    </div>
    <!--end::Info-->
    <!--begin::Toolbar-->
    <div class="d-flex align-items-center">
        <!--begin::Actions-->
        <a href="#" class="btn btn-clean btn-sm font-weight-bold font-size-base mr-1">Today</a>
        <a href="#" class="btn btn-clean btn-sm font-weight-bold font-size-base mr-1">Month</a>
        <a href="#" class="btn btn-clean btn-sm font-weight-bold font-size-base mr-1">Year</a>
        <!--end::Actions-->
        <!--begin::Daterange-->
        <a href="#" class="btn btn-sm btn-light font-weight-bold mr-2" id="kt_dashboard_daterangepicker" data-toggle="tooltip" title="Select dashboard daterange" data-placement="left">
            <span class="text-muted font-size-base font-weight-bold mr-2" id="kt_dashboard_daterangepicker_title">Today</span>
            <span class="text-primary font-size-base font-weight-bolder" id="kt_dashboard_daterangepicker_date">Aug 16</span>
        </a>
        <!--end::Daterange-->
        <!--begin::Dropdowns-->
        <div class="dropdown dropdown-inline" data-toggle="tooltip" title="Quick actions" data-placement="left">
            <a href="#" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="svg-icon svg-icon-success svg-icon-lg">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/Files/File-plus.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24" />
                            <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                            <path d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z" fill="#000000" />
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>
            </a>
            <div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right py-3">
                <!--begin::Navigation-->
                <ul class="navi navi-hover py-5">
                    <li class="navi-item">
                        <a href="#" class="navi-link">
                            <span class="navi-icon">
                                <i class="flaticon2-drop"></i>
                            </span>
                            <span class="navi-text">New Group</span>
                        </a>
                    </li>
                    <li class="navi-item">
                        <a href="#" class="navi-link">
                            <span class="navi-icon">
                                <i class="flaticon2-list-3"></i>
                            </span>
                            <span class="navi-text">Contacts</span>
                        </a>
                    </li>
                    <li class="navi-item">
                        <a href="#" class="navi-link">
                            <span class="navi-icon">
                                <i class="flaticon2-rocket-1"></i>
                            </span>
                            <span class="navi-text">Groups</span>
                            <span class="navi-link-badge">
                                <span class="label label-light-primary label-inline font-weight-bold">new</span>
                            </span>
                        </a>
                    </li>
                    <li class="navi-item">
                        <a href="#" class="navi-link">
                            <span class="navi-icon">
                                <i class="flaticon2-bell-2"></i>
                            </span>
                            <span class="navi-text">Calls</span>
                        </a>
                    </li>
                    <li class="navi-item">
                        <a href="#" class="navi-link">
                            <span class="navi-icon">
                                <i class="flaticon2-gear"></i>
                            </span>
                            <span class="navi-text">Settings</span>
                        </a>
                    </li>
                    <li class="navi-separator my-3"></li>
                    <li class="navi-item">
                        <a href="#" class="navi-link">
                            <span class="navi-icon">
                                <i class="flaticon2-magnifier-tool"></i>
                            </span>
                            <span class="navi-text">Help</span>
                        </a>
                    </li>
                    <li class="navi-item">
                        <a href="#" class="navi-link">
                            <span class="navi-icon">
                                <i class="flaticon2-bell-2"></i>
                            </span>
                            <span class="navi-text">Privacy</span>
                            <span class="navi-link-badge">
                                <span class="label label-light-danger label-rounded font-weight-bold">5</span>
                            </span>
                        </a>
                    </li>
                </ul>
                <!--end::Navigation-->
            </div>
        </div>
        <!--end::Dropdowns-->
    </div>
    <!--end::Toolbar-->
</div>
@endsection
@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
         <strong>{{ session('success') }}</strong>
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
    @endif
<div class="row">
        @foreach ($datas as $data)
        <div class="col-lg-4">
            <div class="card">
                <form action="{{ route('update.header.logo', Crypt::encrypt($data->id)) }}" method="POST" enctype="multipart/form-data" class="p-5">
                    <div class="card header p-3">
                        <h4 class="text-uppercase">Change Header logo</h4>
                    </div>
                    <div class="card-body bg-secondary">
                        @csrf
                        <div class="form-group row">
                            <div class="col-lg-6 col-xl-6 m-auto">
                                <div class="image-input" id="kt_image_2">
                                    <div class="image-input-wrapper" style="background-image: url({{ asset('uploads/logo') }}/{{ $data->header_logo }}); width: 110px;height: 32px;"></div>
                                    <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change Logo">
                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                        <input type="file" name="header_logo" accept=".png">
                                        <input type="hidden" name="profile_avatar_remove">
                                    </label>
                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="" data-original-title="Change Logo">
                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                    </span>
                                </div>
                                <span class="form-text text-muted">Allowed file only types: png.</span>
                            </div>
                        </div>
                    </div>
                    <div class="card footer">
                        <button type="submit" class="btn btn-outline-success btn-block">Save Change</button>
                    </div>
                </form>
            </div>

        </div>
        <div class="col-lg-4">
            <div class="card">
                <form action="{{ route('update.footer.logo', Crypt::encrypt($data->id)) }}" method="POST" enctype="multipart/form-data" class="p-5">
                    <div class="card header p-3">
                        <h4 class="text-uppercase">Change Footer logo</h4>
                    </div>
                    @csrf
                    <div class="card-body bg-secondary">
                        <div class="form-group row">
                            <div class="col-lg-6 col-xl-6 m-auto">
                                <div class="image-input" id="kt_image_2">
                                    <div class="image-input-wrapper" style="background-image: url({{ asset('uploads/logo') }}/{{ $data->footer_logo }}); width: 110px;height: 32px;"></div>
                                    <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change Logo">
                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                        <input type="file" name="footer_logo" accept=".png">
                                        <input type="hidden" name="profile_avatar_remove">
                                    </label>
                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="" data-original-title="Change Logo">
                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                    </span>
                                </div>
                                <span class="form-text text-muted">Allowed file only types: png.</span>
                            </div>
                        </div>
                    </div>
                    <div class="card footer">
                        <button type="submit" class="btn btn-outline-success btn-block">Save Change</button>
                    </div>
                </form>
            </div>

        </div>
        <div class="col-lg-4">
            <div class="card">
                <form action="{{ route('favicon', Crypt::encrypt($data->id)) }}" method="POST" enctype="multipart/form-data" class="p-5">
                    <div class="card header p-3">
                        <h4 class="text-uppercase">Change favicon</h4>
                    </div>
                    @csrf
                    <div class="card-body bg-secondary">
                        <div class="form-group row">
                            <div class="col-lg-6 col-xl-6 m-auto">
                                <div class="image-input" id="kt_image_2">
                                    <div class="image-input-wrapper" style="background-image: url({{ asset('uploads/logo') }}/{{ $data->favicon }}); width:32px;height:32px"></div>
                                    <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change Logo">
                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                        <input type="file" name="favicon" accept=".png">
                                        <input type="hidden" name="profile_avatar_remove">
                                    </label>
                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="" data-original-title="Change Logo">
                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                    </span>
                                </div>
                                <span class="form-text text-muted">Allowed file only types: png.</span>
                            </div>
                        </div>
                    </div>
                    <div class="card footer">
                        <button type="submit" class="btn btn-outline-success btn-block">Save Change</button>
                    </div>
                </form>
            </div>

        </div>
        <div class="col-lg-4">
            <div class="card mt-5">
                <form action="{{ route('top.header', Crypt::encrypt($data->id)) }}" method="POST" class="p-5">
                    <div class="card header p-3">
                        <h4 class="text-uppercase">Change top Header Information</h4>
                    </div>
                    @csrf
                    <div class="card-body bg-secondary">
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="text" name="email" class="form-control form-control-solid" placeholder="Enter Email" value="{{ $data->email }}">
                            <span class="form-text text-danger">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label>Phone:</label>
                            <input type="text" name="phone" class="form-control form-control-solid" placeholder="Enter Phone" value="{{ $data->phone }}">
                            <span class="form-text text-danger">
                                @error('phone')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label>Store Country:</label>
                            <input type="text" name="store" class="form-control form-control-solid" placeholder="Enter Country name" value="{{ $data->store_location }}">
                            <span class="form-text text-danger">
                                @error('store')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="card footer">
                        <button type="submit" class="btn btn-outline-success btn-block">Save Change</button>
                    </div>
                </form>
            </div>

        </div>

        <div class="col-lg-8">
            <div class="card mt-5">
                <form action="{{ route('footer.info.change', Crypt::encrypt($data->id)) }}" method="POST" class="p-5">
                    <div class="card header p-3">
                        <h4 class="text-uppercase">Change Footer Information</h4>
                    </div>
                    @csrf
                    <div class="card-body bg-secondary">
                        <div class="form-group">
                            <label>Office Location:</label>
                            <input type="text" name="office_location" class="form-control form-control-solid" placeholder="Enter location" value="{{ $data->office_location }}">
                            <span class="form-text text-danger">
                                @error('office_location')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Country:</label>
                                    <input type="text" name="country" class="form-control form-control-solid" placeholder="Enter country" value="{{ $data->country }}">
                                    <span class="form-text text-danger">
                                        @error('country')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>City:</label>
                                    <input type="text" name="city" class="form-control form-control-solid" placeholder="Enter city" value="{{ $data->city }}">
                                    <span class="form-text text-danger">
                                        @error('city')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Info Email:</label>
                                    <input type="text" name="info_email" class="form-control form-control-solid" placeholder="Enter info email" value="{{ $data->info_email }}">
                                    <span class="form-text text-danger">
                                        @error('info_email')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Info Number:</label>
                                    <input type="text" name="info_number" class="form-control form-control-solid" placeholder="Enter info number" value="{{ $data->info_number }}">
                                    <span class="form-text text-danger">
                                        @error('info_number')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Footer Description:</label>
                            <textarea name="footer_description" class="form-control form-control-solid" rows="5" placeholder="Enter footer description">{{ $data->footer_description }}</textarea>
                            <span class="form-text text-danger">
                                @error('footer_description')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label>Copy Write Text:</label>
                            <input type="text" name="copyright_text" class="form-control form-control-solid" placeholder="Enter copy write text" value="{{ $data->copyright_text }}">
                            <span class="form-text text-danger">
                                @error('copyright_text')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label>Copy Write link:</label>
                            <input type="text" name="copyright_link" class="form-control form-control-solid" placeholder="https://www.example.com" value="{{ $data->copyright_link }}">
                            <span class="form-text text-danger">
                                @error('copyright_link')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="card footer">
                        <button type="submit" class="btn btn-outline-success btn-block">Save Change</button>
                    </div>
                </form>
            </div>

        </div>

        @endforeach










    </div>
@endsection
