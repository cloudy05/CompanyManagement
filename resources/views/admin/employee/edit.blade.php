@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Edit an Employee') }}
                </div>

                <div class="card-body">
                    @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('employees.update', $employee->id) }}">
                        @csrf
                        {{ method_field('PATCH') }}

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="font-weight-semibold" for="first_name">{{ __('First Name') }}:</label>
                                    <input type="text" class="form-control {{ $errors->has('fisrt_name')?'is-invalid':'is-valid' }}" id="first_name" name="first_name" value="{{ old('first_name', $employee->first_name) }}" required autofocus placeholder="{{ __('Enter employee first name') }}">
                                    @error('first_name')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="font-weight-semibold" for="last_name">{{ __('Last Name') }}:</label>
                                    <input type="text" class="form-control {{ $errors->has('last_name')?'is-invalid':'is-valid' }}" id="last_name" name="last_name" value="{{ old('last_name', $employee->last_name) }}" required autofocus placeholder="{{ __('Enter employee last name') }}">
                                    @error('last_name')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-semibold" for="email">{{ __('Email') }}:</label>
                            <input type="email" class="form-control {{ $errors->has('email')?'is-invalid':'is-valid' }}" id="email" name="email" value="{{ old('email', $employee->email) }}" required autofocus placeholder="{{ __('Enter employee E-mail address') }}">
                            @error('email')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-semibold" for="phone">{{ __('Phone') }}:</label>
                            <input type="text" class="form-control {{ $errors->has('phone')?'is-invalid':'is-valid' }}" id="phone" name="phone" value="{{ old('phone', $employee->phone) }}" autofocus placeholder="{{ __('Enter employee phone number') }}">
                            @error('phone')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-semibold" for="company">{{ __('Company') }}:</label>
                            <select class="form-control" aria-label="Select company" id="company" name="company">
                                <option selected>Select company</option>
                                @foreach($companies as $company)
                                <option value="{{ $company->id }}" {{ $employee->company_id != $company->id ?: 'selected' }}>{{ $company->name }}</option>
                                @endforeach
                            </select>
                            @error('company')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="d-flex align-items-center justify-content-between">
                                <button class="btn btn-primary">{{ __('Update') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection