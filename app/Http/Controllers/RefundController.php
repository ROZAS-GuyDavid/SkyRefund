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
        $reason_1_options = Refund::getPossibleEnumValues('reason_1');
        $reason_2_options = Refund::getPossibleEnumValues('reason_2');
        $has_reason_options = Refund::getPossibleEnumValues('has_reason');
        $reason_4_options = Refund::getPossibleEnumValues('reason_4');
        $status_options = Refund::getPossibleEnumValues('status');
        return view('refunds.create',compact('status_options','reason_1_options','reason_2_options','has_reason_options','reason_4_options'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request['user_id'] = Auth::id();

        $request->validate([
            'user_id' => 'required',
            'flight_from' => 'required',
            'flight_to' => 'required',
            'direct_flight' => 'required',
            'reason_1' => 'required',
            'reason_2' => 'required',
            'has_reason' => 'required',
            'reason_4' => 'required',
            'comment' => 'required',
            'email' => 'required',
            'flight_date' => 'required',
            'Airlines' => 'required',
            'flight_num' => 'required',
            'booking_num' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'birthdate' => 'required',
            'comfirm_email' => 'required',
            'adress' => 'required',
            'city' => 'required',
            'country' => 'required',
            'phone' => 'required',
            // 'status' => 'required',
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
        
        $reason_1_options = Refund::getPossibleEnumValues('reason_1');
        $reason_2_options = Refund::getPossibleEnumValues('reason_2');
        $has_reason_options = Refund::getPossibleEnumValues('has_reason');
        $reason_4_options = Refund::getPossibleEnumValues('reason_4');
        $status_options = Refund::getPossibleEnumValues('status');
        return view('refunds.edit',compact('refund','status_options','reason_1_options','reason_2_options','has_reason_options','reason_4_options'));
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
            'flight_from' => 'required',
            'flight_to' => 'required',
            'direct_flight' => 'required',
            'reason_1' => 'required',
            'reason_2' => 'required',
            'has_reason' => 'required',
            'reason_4' => 'required',
            'comment' => 'required',
            'email' => 'required',
            'flight_date' => 'required',
            'Airlines' => 'required',
            'flight_num' => 'required',
            'booking_num' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'birthdate' => 'required',
            'comfirm_email' => 'required',
            'adress' => 'required',
            'city' => 'required',
            'country' => 'required',
            'phone' => 'required',
            // 'status' => 'required',
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
