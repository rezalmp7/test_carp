<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Carp;
use App\Models\Employee;
use App\Models\Category;
use App\Models\CategoriesCarp;
use App\Events\NotificationEvent;


class CarpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carp = Carp::all();
        event(new NotificationEvent('hello world'));
        return view('carp.index', compact('carp'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::all();
        $categories = Category::all();

        return view('carp.tambah', compact(
            'employees',
            'categories'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $carp = Carp::create([
            'carp_code' => $request->carpCode,
            'initiator_id' => $request->initiator,
            'recipient_id' => $request->recipient,
            'verified_by' => $request->verifiedBy,
            'due_date' => $request->dueDate,
            'effectiveness' => $request->effectiveness,
            'status_date' => $request->statusDate,
            'stage' => $request->stage,
            'status' => $request->status
        ]);

        foreach($request->categories as $item) {
            CategoriesCarp::create([
                'carp_id' => $carp->id,
                'category_id' => $item
            ]);
        }

        return redirect(url('/carp'));
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
        $carp = Carp::find($id);
        $categoriCarp = CategoriesCarp::where('carp_id', $id)->get()->pluck('category_id')->toArray();
        $employees = Employee::all();
        $categories = Category::all();

        return view('carp.edit', compact(
            'carp',
            'categoriCarp',
            'employees',
            'categories'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);
        $carp = Carp::whereId($id)->update([
            'carp_code' => $request->carpCode,
            'initiator_id' => $request->initiator,
            'recipient_id' => $request->recipient,
            'verified_by' => $request->verifiedBy,
            'due_date' => $request->dueDate,
            'effectiveness' => $request->effectiveness,
            'status_date' => $request->statusDate,
            'stage' => $request->stage,
            'status' => $request->status
        ]);
        CategoriesCarp::where('carp_id', $id)->delete();
        foreach($request->categories as $item) {
            CategoriesCarp::create([
                'carp_id' => $id,
                'category_id' => $item
            ]);
        }

        return redirect(url('/carp'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        Carp::whereId($id)->delete();
        return redirect(url('/carp'));
    }
}
