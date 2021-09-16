@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Companies') }}
                    <a href="{{ route('companies.create') }}" class="btn btn-primary btn-sm float-right">{{ __('Add') }}</a>
                </div>

                <div class="card-body">
                    @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Logo</th>
                                    <th>Company Name</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($companies as $company)
                                <tr>
                                    <td>{{ $company->id }}</td>
                                    <td><img src="{{ asset('storage/companiesLogos/'.$company->logo) }}" height="100px" width="100px" alt="None"></td>
                                    <td><a href="{!! Str::startsWith($company->website, ['https://', 'http://']) ? $company->website : 'http://' . $company->website !!}" target="_blank">{{ $company->name }}</a></td>
                                    <td>{{ $company->email }}</td>
                                    <td>
                                        <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-success btn-sm">{{ __('Edit') }}</a>
                                        <form action="{{ route('companies.destroy', $company->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger btn-sm">{{ __('Delete') }}</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4">{{ $companies->links() }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection