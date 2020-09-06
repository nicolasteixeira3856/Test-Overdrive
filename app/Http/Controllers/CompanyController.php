<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Company;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response as FacadeResponse;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return (new Response)->setContent(view('dashboard.companies.index')->with('companies', $companies));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return (new Response)->setContent(view('dashboard.companies.create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'logo' => 'image|mimes:jpeg,png,jpg|max:2048'
        ], [
            'name.required' => 'Name is required',
            'email.required' => 'E-mail is required',
            'logo.max' => 'Upload an image up to 2MB'
        ]);
        $fileName = null;
        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            $uniqIdName = uniqid(date('HisYmd'));
            $extension = $request->logo->extension();
            $fileName = $uniqIdName.'.'.$extension;
            $request->file('logo')->storeAs('public', $fileName);
        }
        $company = new Company();
        $company->name = $request->name;
        $company->email = $request->email;
        $company->logo = $fileName;
        $company->website = $request->website ?? null;
        $company->save();

        Session::flash('success', 'Successfully created company!');
        return Redirect::route('companies');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return (new Response)->setContent(view('dashboard.companies.edit')->with('company', $company));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'logo' => 'image|mimes:jpeg,png,jpg|max:2048'
        ], [
            'name.required' => 'Name is required',
            'email.required' => 'E-mail is required',
            'logo.max' => 'Upload an image up to 2MB'
        ]);
        $fileName = $company->logo;
        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            $uniqIdName = uniqid(date('HisYmd'));
            $extension = $request->logo->extension();
            $fileName = $uniqIdName.'.'.$extension;
            $request->file('logo')->storeAs('public', $fileName);
            Storage::delete('public/'.$company->logo);
        }
        $company->name = $request->name;
        $company->email = $request->email;
        $company->logo = $fileName;
        $company->website = $request->website ?? null;
        $company->save();

        Session::flash('success', 'Successfully edited company!');
        return Redirect::route('companies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->logo !== null ?? Storage::delete('public/'.$company->logo);
        $company->delete();
        return FacadeResponse::json('Company deleted', 200);
    }
}
