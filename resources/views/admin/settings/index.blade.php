@extends('layouts.app')

@section('content')

<div class="card shadow border-0">

    <div class="card-header">
        <h4>CMS Settings</h4>
    </div>

    <div class="card-body">

        @if(session('success'))

            <div class="alert alert-success">
                {{ session('success') }}
            </div>

        @endif

        <form action="{{ route('settings.update') }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label>Website Name</label>

                    <input type="text"
                        name="site_name"
                        value="{{ $setting->site_name ?? '' }}"
                        class="form-control">

                </div>

                <div class="col-md-6 mb-3">

                    <label>Email</label>

                    <input type="email"
                        name="email"
                        value="{{ $setting->email ?? '' }}"
                        class="form-control">

                </div>

                <div class="col-md-6 mb-3">

                    <label>Phone</label>

                    <input type="text"
                        name="phone"
                        value="{{ $setting->phone ?? '' }}"
                        class="form-control">

                </div>

                <div class="col-md-6 mb-3">

                    <label>Logo</label>

                    <input type="file"
                        name="logo"
                        class="form-control">

                </div>

                <div class="col-md-12 mb-3">

                    @if(!empty($setting->logo))

                        <img src="{{ asset('uploads/settings/'.$setting->logo) }}"
                            width="120">

                    @endif

                </div>

                <div class="col-md-12 mb-3">

                    <label>Address</label>

                    <textarea name="address"
                        class="form-control"
                        rows="3">{{ $setting->address ?? '' }}</textarea>

                </div>

                <div class="col-md-12 mb-3">

                    <label>Footer Text</label>

                    <textarea name="footer_text"
                        class="form-control"
                        rows="3">{{ $setting->footer_text ?? '' }}</textarea>

                </div>

                <div class="col-md-6 mb-3">

                    <label>Meta Title</label>

                    <input type="text"
                        name="meta_title"
                        value="{{ $setting->meta_title ?? '' }}"
                        class="form-control">

                </div>

                <div class="col-md-6 mb-3">

                    <label>Meta Description</label>

                    <input type="text"
                        name="meta_description"
                        value="{{ $setting->meta_description ?? '' }}"
                        class="form-control">

                </div>

                <div class="col-md-4 mb-3">

                    <label>Facebook</label>

                    <input type="text"
                        name="facebook"
                        value="{{ $setting->facebook ?? '' }}"
                        class="form-control">

                </div>

                <div class="col-md-4 mb-3">

                    <label>Twitter</label>

                    <input type="text"
                        name="twitter"
                        value="{{ $setting->twitter ?? '' }}"
                        class="form-control">

                </div>

                <div class="col-md-4 mb-3">

                    <label>Instagram</label>

                    <input type="text"
                        name="instagram"
                        value="{{ $setting->instagram ?? '' }}"
                        class="form-control">

                </div>

            </div>

            <button class="btn btn-primary">
                Update Settings
            </button>

        </form>

    </div>

</div>

@endsection