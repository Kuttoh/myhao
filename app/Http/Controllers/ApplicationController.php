<?php

namespace App\Http\Controllers;

use App\Client;
use App\DeveloperProperty;
use App\FinancialInstitution;
use App\PropertyApplication;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class ApplicationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $property = DeveloperProperty::findOrFail($id);

        $financialInstitutions = FinancialInstitution::pluck('name', 'id');

        return view('properties.apply', [
            'property' => $property,
            'financialInstitutions' => $financialInstitutions,
        ]);
    }

    public function save()
    {
        $input = request()->all();

        $client = Client::where('user_id', Auth::id())->first();

        if (!$client){
            Flash::error('Please log in as a client to make applications');
            return redirect()->back();
        }

        $input = Arr::except($input, ['_token']);

        $application = new PropertyApplication();
        $application->fill($input);
        $application->client_id = $client->id;
        $application->date_of_application = Carbon::today()->toDateString();
        $application->progress_id = 1;
        $application->save();

        Flash::success('Property Application Sent Successfully');

        return redirect('/properties');
    }

    public function show()
    {
        $applications = PropertyApplication::all();

        return view('properties.applications.show', ['applications' => $applications]);
    }
}
