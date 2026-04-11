<?php

namespace App\Http\Controllers;

// use App\Models\Result;
use App\Services\ResultService;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    protected $service;

    public function __construct(ResultService $service){
        $this->service =$service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $results=$this->service->getAll();
        return view('results.index',compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('results.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->service->create($request->all());
        return redirect()->route('results.index')->with('success','Result Added');
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
        $result=$this->service->getById($id);
        return view('results.edit',compact('result'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->service->update($id, $request->all());
        return redirect()->route('results.index')->with('success','Result Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->service->delete($id);
        return redirect()->route('results.index')->with('success','Result Deleted');
    }
}
