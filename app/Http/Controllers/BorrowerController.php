<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Borrower;
use Illuminate\Support\Str;
use App\Jobs\SendEmail;
use Carbon\Carbon;
use App\Http\Requests\BorrowerRequest;


class BorrowerController extends Controller
{

    public function __construct()
    {
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['borrower'] = Borrower::all();
        return view('borrower.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('borrower.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BorrowerRequest $request)
    {
        $validated = $request->validated();

        $steps = array_map(function(){ return rand(0,99); }, array_fill(0, 5, null));

        $data = $request->all();

        $borrower = new Borrower();

        // there is two ways to add in db one is this I have commented the code and other I used fill form
        // $borrower->step = $data['step'];
        // $borrower->steps = json_encode($steps);
        // $borrower->login_id = Str::uuid()->toString();
        // $borrower->monthly_sales = $data['monthly_sales'];
        // $borrower->monthly_expenses = $data['monthly_expenses'];
        // $borrower->other_financing = $data['other_financing'];
        // $borrower->other_financing_amount = $data['other_financing_amount'];
        // $borrower->legal_business_name = $data['legal_business_name'];
        // $borrower->business_physical_address = $data['business_physical_address'];
        // $borrower->business_physical_city = $data['business_physical_city'];
        // $borrower->business_physical_province = $data['business_physical_province'];
        // $borrower->business_physical_postal = $data['business_physical_postal'];
        // $borrower->email = $data['email'];
        // $borrower->created_at = Carbon::now()->format('Y-m-d H:i:s');
        // $borrower->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        // $borrower->dob = Carbon::parse($data['dob'])->format('Y-m-d');

        $borrower->fill($request->all());
        $borrower->steps = json_encode($steps);

        $result = $borrower->save();

        if($result){
            // added to job table and created job to process through jobs table
            dispatch(new SendEmail(['name'=> $data['legal_business_name'], 'email' => $data['email']]))->onConnection('database');
        }

        
        return redirect('/borrower')->with('success', 'Record added successfully! Confirmation mail sent on your email.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['borrower'] = Borrower::where('id', $id)->first();
        if(!is_null($data['borrower']))
            return view('borrower.edit', $data); 
        
        return redirect('/borrower')->with('error', 'You are trying with wrong data.');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BorrowerRequest $request, $id)
    {

        $validated = $request->validated();

        $borrower = Borrower::find($id);
        
        $data = $request->all();
        $steps = array_map(function(){ return rand(0,99); }, array_fill(0, 5, null));
        // there is two ways to update in db one is this I have commented the code and other I used fill form
        // $borrower->update([
        //     'step' => $data['step'],
        //     'monthly_sales' => $data['monthly_sales'],
        //     'monthly_expenses' => $data['monthly_expenses'],
        //     'other_financing' => $data['other_financing'],
        //     'other_financing_amount' => $data['other_financing_amount'],
        //     'legal_business_name' => $data['legal_business_name'],
        //     'business_physical_address' => $data['business_physical_address'],
        //     'business_physical_city' => $data['business_physical_city'],
        //     'business_physical_province' => $data['business_physical_province'],
        //     'business_physical_postal' => $data['business_physical_postal'],
        //     'email' => $data['email'],
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'dob' => Carbon::parse($data['dob'])->format('Y-m-d')

        // ]);

        $borrower->fill($request->all());
        $borrower->steps = json_encode($steps);

        $borrower->update();

        return redirect('/borrower')->with('success', 'Record updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $borrower = Borrower::find($id);
        $borrower->delete();
        return redirect('/borrower')->with('success', 'Record deleted successfully!');
    }
}
