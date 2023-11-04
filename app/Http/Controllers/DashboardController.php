<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carp;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('dashboard');
    }

    public function getData() {
        $carp = Carp::all();
        $carp_array = Carp::all()->toArray();

        $carp_effective = Carp::select("employees.div")
            ->leftJoin('employees', 'carp.recipient_id', "=", "employees.id")
            ->where('carp.effectiveness', "=", "Effective")
            ->get()->toArray();
        $carp_noteffective = Carp::select("employees.div")
            ->leftJoin('employees', 'carp.recipient_id', "=", "employees.id")
            ->where('carp.effectiveness', "=", "Not Effective")
            ->get()->toArray();
            
        $carp_effective_commercial = array_keys(array_column($carp_effective, 'div'), "COMMERCIAL");
        $carp_effective_cr = array_keys(array_column($carp_effective, 'div'), "CR");
        $carp_effective_hrga = array_keys(array_column($carp_effective, 'div'), "HR&GA");
        $carp_effective_hse = array_keys(array_column($carp_effective, 'div'), "HSE");
        $carp_effective_it = array_keys(array_column($carp_effective, 'div'), "IT");
        $carp_effective_keyaccount = array_keys(array_column($carp_effective, 'div'), "KEY ACCOUNT");
        $carp_effective_operation = array_keys(array_column($carp_effective, 'div'), "OPERATION");
        $carp_effective_procurement = array_keys(array_column($carp_effective, 'div'), "PROCUREMENT");
        $carp_effective_sales = array_keys(array_column($carp_effective, 'div'), "SALES");
        $carp_effective_trucking = array_keys(array_column($carp_effective, 'div'), "TRUCKING");
        $carp_not_effective_commercial = array_keys(array_column($carp_noteffective, 'div'), "COMMERCIAL");
        $carp_not_effective_cr = array_keys(array_column($carp_noteffective, 'div'), "CR");
        $carp_not_effective_hrga = array_keys(array_column($carp_noteffective, 'div'), "HR&GA");
        $carp_not_effective_hse = array_keys(array_column($carp_noteffective, 'div'), "HSE");
        $carp_not_effective_it = array_keys(array_column($carp_noteffective, 'div'), "IT");
        $carp_not_effective_keyaccount = array_keys(array_column($carp_noteffective, 'div'), "KEY ACCOUNT");
        $carp_not_effective_operation = array_keys(array_column($carp_noteffective, 'div'), "OPERATION");
        $carp_not_effective_procurement = array_keys(array_column($carp_noteffective, 'div'), "PROCUREMENT");
        $carp_not_effective_sales = array_keys(array_column($carp_noteffective, 'div'), "SALES");
        $carp_not_effective_trucking = array_keys(array_column($carp_noteffective, 'div'), "TRUCKING");

        $carp_status_open = array_keys(array_column($carp_array, 'status'), "Open");
        $carp_status_closed = array_keys(array_column($carp_array, 'status'), "Closed");
        $carp_statis_canceled = array_keys(array_column($carp_array, 'status'), "Canceled");

        $carp_open = array_keys(array_column($carp_array, 'stage'), "Open");
        $carp_closed = array_keys(array_column($carp_array, 'stage'), "Closed");
        $carp_voided = array_keys(array_column($carp_array, 'stage'), "Voided");
        $carp_reOpen = array_keys(array_column($carp_array, 'stage'), "Re-Open");
        $carp_responded = array_keys(array_column($carp_array, 'stage'), "Responded");
        $carp_verified = array_keys(array_column($carp_array, 'stage'), "Verified");


        $dataReturn = array(
            'status_chart' => array(
                'count_open' => count($carp_status_open),
                'count_closed' => count($carp_status_closed),
                'count_canceled' => count($carp_statis_canceled),
            ),
            'effective_chart' => array(
                'effective' => array(
                    'commercial' =>  count($carp_effective_commercial),
                    'cr' =>  count($carp_effective_cr),
                    'hrga' =>  count($carp_effective_hrga),
                    'hse' =>  count($carp_effective_hse),
                    'it' =>  count($carp_effective_it),
                    'keyaccount' =>  count($carp_effective_keyaccount),
                    'operation' =>  count($carp_effective_operation),
                    'procurement' =>  count($carp_effective_procurement),
                    'sales' =>  count($carp_effective_sales),
                    'trucking' =>  count($carp_effective_trucking)
                ),
                'notEffective' => array(
                    'commercial' => count($carp_not_effective_commercial),
                    'cr' => count($carp_not_effective_cr),
                    'hrga' => count($carp_not_effective_hrga),
                    'hse' => count($carp_not_effective_hse),
                    'it' => count($carp_not_effective_it),
                    'keyaccount' => count($carp_not_effective_keyaccount),
                    'operation' => count($carp_not_effective_operation),
                    'procurement' => count($carp_not_effective_procurement),
                    'sales' => count($carp_not_effective_sales),
                    'trucking' => count($carp_not_effective_trucking),
                )
            ),
            'count_carp_open' => count($carp_open),
            'count_carp_closed' => count($carp_closed),
            'count_carp_voided' => count($carp_voided),
            'count_carp_reOpen' => count($carp_reOpen),
            'count_carp_responded' => count($carp_responded),
            'count_carp_verified' => count($carp_verified),
        );

        $headerResponse = array(
            'Content-Type' => 'application/json'
        );

        return response()->json($dataReturn, 200, $headerResponse);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
