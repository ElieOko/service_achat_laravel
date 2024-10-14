<?php

namespace App\Http\Controllers;

use App\Http\Resources\SupplierCollection;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Supplier::all();
        if($data->count() != 0 ){
            return new SupplierCollection($data);
        }
        return response()->json([
            "message"=>"Ressource not found",
        ],400);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'workspace' =>'required|int',
            'display_name' => 'required|string',
            'first_name'=> 'string',
            'middle_name'=> 'string',
            'last_name'=> 'string',
            'company_name'=> 'string',
            'email'=> 'string',
            'phone_number'=> 'string',
            'note'=> 'string',
        ]);
        if($validator->stopOnFirstFailure()->fails()){
            return response()->json([
                'message' => $validator,
             ],403);
        }  
        $field = $validator->validated();
        Supplier::create([
            'workspace'  => $field['workspace'],
            'first_name'=> $field['first_name'],
            'middle_name'=> $field['middle_name'],
            'last_name'=> $field['last_name'],
            // 'company_name'=> $field['company_name'],
            // 'email'=> $field['email'],
            // 'phone_number'=> $field['phone_number'],
            // 'note'=> $field['note'],
            'display_name'=> $field['display_name']
        ]);
        response()->json([
            'message' => "Enregistrement réussi avec succès",
         ],201);

    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        //
    }
}
