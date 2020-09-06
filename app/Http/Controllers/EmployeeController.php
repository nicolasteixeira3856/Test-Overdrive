<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response as FacadeResponse;
use App\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::with('company')->paginate(10);
        return (new Response)->setContent(view('dashboard.employees.index')->with('employees', $employees));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return (new Response)->setContent(view('dashboard.employees.create')->with('companies', $companies));
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
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'company' => 'required|exists:App\Company,id_company',
            'email' => 'required|max:255',
            'phone' => 'required|max:255'
        ], [
            'firstname.required' => 'First name is required',
            'firstname.max' => 'First name max size is 255',
            'lastname.required' => 'Last name is required',
            'lastname.max' => 'Last name max size is 255',
            'company.required' => 'Company is required',
            'company.exists' => "Company does not exist",
            'email.required' => 'E-mail is required',
            'email.max' => 'E-mail max size is 255',
            'phone.required' => 'Phone is required',
            'phone.max' => 'Phone max size is 255'
        ]);
        $employee = new Employee();
        $employee->first_name = $request->firstname;
        $employee->last_name = $request->lastname;
        $employee->idfk_company = $request->company;
        $employee->first_name = $request->firstname;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->save();

        Session::flash('success', 'Successfully created employee!');
        return redirect()->route('employees');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $companies = Company::all();
        return (new Response)->setContent(view('dashboard.employees.edit')->with(['employee' => $employee, 'companies' => $companies]));
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
        $employee = Employee::findOrFail($id);
        $request->validate([
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'company' => 'required|exists:App\Company,id_company',
            'email' => 'required|max:255',
            'phone' => 'required|max:255'
        ], [
            'firstname.required' => 'First name is required',
            'firstname.max' => 'First name max size is 255',
            'lastname.required' => 'Last name is required',
            'lastname.max' => 'Last name max size is 255',
            'company.required' => 'Company is required',
            'company.exists' => "Company does not exist",
            'email.required' => 'E-mail is required',
            'email.max' => 'E-mail max size is 255',
            'phone.required' => 'Phone is required',
            'phone.max' => 'Phone max size is 255'
        ]);
        $employee->first_name = $request->firstname;
        $employee->last_name = $request->lastname;
        $employee->idfk_company = $request->company;
        $employee->first_name = $request->firstname;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->save();

        Session::flash('success', 'Successfully edited employee!');
        return redirect()->route('employees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return FacadeResponse::json('Employee deleted', 200);
    }
}
