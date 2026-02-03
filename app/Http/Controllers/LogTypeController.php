<?php

namespace App\Http\Controllers;

use App\Models\LogType;
use App\Http\Requests\StoreLogTypeRequest;
use App\Http\Requests\UpdateLogTypeRequest;

class LogTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $logTypes = LogType::all();
        return view('logTypes.index', compact('logTypes'));
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
    public function store(StoreLogTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(LogType $logType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LogType $logType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLogTypeRequest $request, LogType $logType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LogType $logType)
    {
        //
    }
}
