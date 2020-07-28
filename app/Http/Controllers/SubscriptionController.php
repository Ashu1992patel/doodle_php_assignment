<?php

namespace App\Http\Controllers;

use App\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $book_id)
    {
        try {
            $subscription = Subscription::create([
                'user_id' => auth()->user()->id,
                'book_id' => $book_id
            ]);

            if (isset($subscription)) {
                return redirect('books')->with('success', 'Congratulation!! You Have Subscribed This Book!!');
            } else {
                return redirect()->back()->with('error', 'Oops...!! Something Went Wrong !!');
            }
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', 'Oops...!! Something Went Wrong !!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function show(Subscription $subscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscription $subscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscription $subscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscription $subscription, $id)
    {
        try {
            $subscription = Subscription::where(['user_id' => auth()->user()->id, 'book_id' => $id])->first();
            $subscription->delete();
            return redirect()->back()->with('success', 'Book Has Been Un-subscribed Successfully !!');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', 'Oops...!! Something Went Wrong !!');
        }
    }
}
