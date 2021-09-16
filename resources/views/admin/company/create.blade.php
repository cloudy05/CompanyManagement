@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Create an Employee') }}
                </div>

                <div class="card-body">
                    @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('companies.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label class="font-weight-semibold" for="name">{{ __('Company Name') }}:</label>
                            <input type="text" class="form-control {{ $errors->has('name')?'is-invalid':'is-valid' }}" id="name" name="name" value="{{ old('name') }}" required autofocus placeholder="{{ __('Enter company name') }}">
                            @error('name')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-semibold" for="email">{{ __('Email') }}:</label>
                            <input type="email" class="form-control {{ $errors->has('email')?'is-invalid':'is-valid' }}" id="email" name="email" value="{{ old('email') }}" required autofocus placeholder="{{ __('Enter company E-mail address') }}">

                            @error('email')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-semibold" for="website">{{ __('Website') }}:</label>
                            <input type="text" class="form-control {{ $errors->has('website')?'is-invalid':'is-valid' }}" id="website" name="website" value="{{ old('website') }}" required autofocus placeholder="{{ __('Enter url of company website') }}">

                            @error('website')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-semibold" for="logo">{{ __('Logo') }}: (Minimum Resolution:100x100, Aspect Ratio: 1:1, and max image size less then 2mb)</label>
                            <input type="file" name="logo" class="form-control" id="logo" accept="image/png,image/jpg,image/jpeg">

                            @error('logo')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="d-flex align-items-center justify-content-between">
                                <button class="btn btn-primary">{{ __('Create') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection