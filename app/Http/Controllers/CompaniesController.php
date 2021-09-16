<?php

namespace App\Http\Controllers;

use App\Http\Requests\Company\CreateCompany;
use App\Http\Requests\Company\UpdateCompany;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view('admin.company.index', ['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCompany $request)
    {
        $image_name = time() . '_' . Str::random(5) . '.' . $request->logo->extension();
        $request->logo->storeAs('companiesLogos', $image_name, 'public');

        $company = new Company();
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;
        $company->logo = $image_name;
        $company->save();

        return redirect()->back()->with('success', 'Company created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('admin.company.edit', ['company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompany $request, Company $company)
    {
        if ($request->hasFile('logo')) {
            if (Storage::exists('public/companiesLogos/' . $company->logo)) {
                Storage::delete('public/companiesLogos/' . $company->logo);
            }

            $image_name = time() . '_' . Str::random(5) . '.' . $request->logo->extension();
            $request->logo->storeAs('companiesLogos', $image_name, 'public');
            $company->logo = $image_name;
        }

        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;
        $company->update();

        return redirect()->back()->with('success', 'Company updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->back()->with('success', 'Company deleted successfully!');
    }
}
