<?php

namespace App\Http\Controllers;

use App\Models\Refund;
use Illuminate\Http\Request;
use Auth;

class RefundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Refund::latest()->paginate(5);
    
        return view('refunds.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Models\Refund  $refund
     * @return \Illuminate\Http\Response
     */
    public function create(Refund $refund)
    {
        $state_options = Refund::getPossibleEnumValues('state');
        return view('refunds.create',compact('state_options'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['user_id'] = Auth::id();

        $request->validate([
            'company' => 'required',
            'num_fly' => 'required',
            'num_booking' => 'required',
            'reason' => 'required',
            'state' => 'required',
            'user_id' => 'required',
        ]);
    
        Refund::create($request->all());
     
        return redirect()->route('refunds.index')
                        ->with('success','refund request created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Refund  $refund
     * @return \Illuminate\Http\Response
     */
    public function show(Refund $refund)
    {
        return view('refunds.show',compact('refund'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Refund  $refund
     * @return \Illuminate\Http\Response
     */
    public function edit(Refund $refund)
    {
        
        $state_options = Refund::getPossibleEnumValues('state');
        return view('refunds.edit',compact('refund','state_options'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Refund  $refund
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Refund $refund)
    {
        $request->validate([
            'company' => 'required',
            'num_fly' => 'required',
            'num_booking' => 'required',
            'reason' => 'required',
            'state' => 'required',
        ]);
    
        $refund->update($request->all());
    
        return redirect()->route('refunds.index')
                        ->with('success','refund request updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Refund  $refund
     * @return \Illuminate\Http\Response
     */
    public function destroy(Refund $refund)
    {
        $refund->delete();
    
        return redirect()->route('refunds.index')
                        ->with('success','refund request deleted successfully');
    }
}
