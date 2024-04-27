<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
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

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'nullable|email',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100',
            'website' => 'nullable|url',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

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


    public function update(Request $request, Company $company)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'nullable|email',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100',
            'website' => 'nullable|url',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

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
