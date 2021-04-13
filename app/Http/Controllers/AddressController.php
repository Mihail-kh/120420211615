<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressRequest;
use App\Http\Resources\AddressResource;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function index()
    {
        $addresses = Address::orderBy('name')->get();
        return AddressResource::collection($addresses);
    }
    public function store(AddressRequest $request)
    {
        $user = Auth::user();
        $user->addresses()->create($request->validated());
    }
}
