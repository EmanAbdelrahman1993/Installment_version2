<?php

namespace App\Http\Controllers;

use App\Installments;
use Illuminate\Http\Request;
use Validator;
use DateTime;

class InstallmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $all_installments = Installments::where('user_id', $user_id)->paginate(5);
//         foreach($all_installments as $one_installment) {
//             $current_date = date("m");
//             $last_month = date('m', strtotime($one_installment->last_month));
//             if ($last_month == $current_date) {
//                 $danger = 1;
//             }
//             else {
//                 $danger = 0;
//             }
//         }
        //dd($danger);

        return view('dashboard.pages.Installments.index')->with(array('all_installments' => $all_installments));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pages.Installments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_name' => 'required|string',
            'price_before_interest' => 'required',
            'interest' => 'required',
            'price_per_month' => 'required',
            'start_month' => 'required',
            'last_month_money' => '',
            'client_name' => 'required|string',
            'client_mobile' => 'required',
            'description' => 'required|string',
        ]);


        $inst = new Installments();
        $inst->user_id = auth()->user()->id;
        $inst->product_name = $request->product_name;
        $inst->client_name = $request->client_name;
        $inst->client_mobile = $request->client_mobile;
        $inst->description = $request->description;
        $inst->price_before_interest = $request->price_before_interest;
        $inst->interest = $request->interest;
        $inst->price_after_interest = $request->price_after_interest;
        $inst->price_per_month = $request->price_per_month;
        $inst->start_month = $request->start_month;
        $inst->price_last_month = $request->last_month_money;
        if ($request->last_month_money == "0")
            $inst->month_no = $request->month_no;
        else
            $inst->month_no = $request->month_no + 1;

        $inst->last_month = date('Y-m-d', strtotime("$request->start_month +  $inst->month_no month"));
        $inst->save();
        session()->flash('success', 'Installment Added Successfully');
        return redirect('Installments');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Installments $installments
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $one_installment = Installments::find($id);
        return view('dashboard.pages.Installments.show')->with('one_installment', $one_installment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Installments $installments
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $one_installment = Installments::find($id);
        return view('dashboard.pages.Installments.edit')->with('one_installment', $one_installment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Installments $installments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'product_name' => 'required|string',
            'price_before_interest' => 'required',
            'interest' => 'required',
            'price_per_month' => 'required',
            'start_month' => 'required',
            'last_month_money' => '',
            'client_name' => 'required|string',
            'client_mobile' => 'required',
            'description' => 'required|string',
        ]);


        $inst = Installments::find($id);
        $inst->user_id = auth()->user()->id;
        $inst->product_name = $request->product_name;
        $inst->client_name = $request->client_name;
        $inst->client_mobile = $request->client_mobile;
        $inst->description = $request->description;
        $inst->price_before_interest = $request->price_before_interest;
        $inst->interest = $request->interest;
        $inst->price_after_interest = $request->price_after_interest;
        $inst->price_per_month = $request->price_per_month;
        $inst->start_month = $request->start_month;
        $inst->price_last_month = $request->last_month_money;
        if ($request->last_month_money == "0")
            $inst->month_no = $request->month_no;
        else
            $inst->month_no = $request->month_no + 1;
        $inst->last_month = date('Y-m-d', strtotime("$request->start_month +  $inst->month_no month"));

        $inst->save();
        session()->flash('success', 'Installment Updated Successfully');
        return redirect('Installments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Installments $installments
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Installments::find($id)->delete();
        session()->flash('success', 'Installment Deleted Successfully');
        return redirect('Installments');
    }

    public function reports()
    {
        $user_id = auth()->user()->id;
        $all_installments = Installments::where('user_id', $user_id)->paginate(5);
        $total_sales = 0;
        foreach ($all_installments as $one_installment) {
            $total_sales = $total_sales + $one_installment->price_after_interest;
        }

        $real_payments = 0;
        foreach ($all_installments as $one_installment) {
            $real_payments = $real_payments + $one_installment->price_before_interest;
        }

        $profits = 0;
        foreach ($all_installments as $one_installment) {
            $profits = $profits + ($one_installment->price_after_interest - $one_installment->price_before_interest);
        }

        $collected_amount_this_month = 0;
        $current_date = date("m");


        foreach ($all_installments as $one_installment) {

            $last_month = date('m', strtotime($one_installment->last_month));
            //dd($last_month);
            if ($last_month == $current_date)
                $collected_amount_this_month = $collected_amount_this_month + $one_installment->price_last_month;

            else
                $collected_amount_this_month = $collected_amount_this_month + $one_installment->price_per_month;

        }


        return view('dashboard.pages.Installments.reports')->with(array('total_sales' => $total_sales, 'real_payments' => $real_payments, 'profits' => $profits, 'collected_amount_this_month' => $collected_amount_this_month));
    }

    public function archive()
    {
        $user_id = auth()->user()->id;
        $installemnts_archived = Installments::onlyTrashed('id', 'asc')->paginate(5);
        return view('dashboard.pages.Installments.archive')->with('installemnts_archived', $installemnts_archived);
    }


}
