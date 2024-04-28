<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::query()->latest()->paginate(10);
        return view('pages.companies.index', compact('companies'));
    }

    public function create()
    {
        return view('pages.companies.add');
    }

    public function store(CompanyRequest $request)
    {
        $company = new Company();
        $company->name = $request->name;
        $company->email = $request->email;

        if ($request->hasFile('logo')) {
            $extension = $request->logo->getClientOriginalExtension();
            $filename = Str::random(6) . '.' . $extension;
            $filePath = 'logos/' . '/' . $filename;
            Storage::disk('public')->put($filePath, file_get_contents($request->logo));
            $company->logo = 'logos/' . $filename;
        }

        $company->website = $request->website;
        $company->save();

        return redirect()->route('companies.index')->with('success', 'Company created successfully.');
    }

    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }

    public function edit(Company $company)
    {
        return view('pages.companies.edit', compact('company'));
    }


    public function update(CompanyRequest $request, Company $company)
    {

        $company->name = $request->name;
        $company->email = $request->email;

        if ($request->hasFile('logo')) {
            $extension = $request->logo->getClientOriginalExtension();
            $filename = Str::random(6) . '.' . $extension;
            $filePath = 'logos/' . '/' . $filename;
            Storage::disk('public')->put($filePath, file_get_contents($request->logo));
            $company->logo = 'logos/' . $filename;
        }

        $company->website = $request->website;
        $company->save();

        return redirect()->route('companies.index')->with('success', 'Company updated successfully.');
    }

    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Company deleted successfully.');
    }
}
