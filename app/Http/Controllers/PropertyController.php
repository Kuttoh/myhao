<?php

namespace App\Http\Controllers;

use App\Client;
use App\County;
use App\DeveloperProperty;
use App\FinancialInstitution;
use App\PropertyApplication;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Laracasts\Flash\Flash;

class PropertyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function checkRole($slug)
    {

        return true;
    }


    public function index()
    {
        $properties  = DeveloperProperty::paginate(2);

        return view('properties.show', ['properties' => $properties]);
    }


    public function create()
    {
        $allow = hasRole('property_developer');

        if (!$allow) {
            Flash::error('Access Denied, You do not have required permissions');
            return redirect()->back();
        }

        $counties = County::pluck('name', 'id');

        return view('properties.create', ['counties' => $counties]);
    }

    public function save()
    {
        $request = request()->all();

        $path = null;
        if ($request['image']){
            $path = Storage::disk('local')->put('public/images', request()->file('image'));
        }

        $input = Arr::except($request, ['_token', 'image']);

        $property = new DeveloperProperty();
        $property->fill($input);
        $property->save();
        $property->image = $path;
        $property->update();

        Flash::success('Property Created Successfully');

        return redirect('/properties');
    }
}
