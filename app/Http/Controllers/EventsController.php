<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreateEventRequest;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Input;

use App\Event;

use View;
use Auth;
use \Carbon;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $events = Event::where('user_id',3)->get();
        
        return view('event.index')->with('events',$events);
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        return View::make('event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(CreateEventRequest $request)
    {
       

        $event = new Event;

       
      //  $date = date('d-m-Y',Input::get('date'));
      //   dd($date);
       // $date='2015-05-02 12:00:00';
       //$date = Carbon::CreateFromFormat('dd-mm-yyyy', Input::get('date'));
       //dd($date);
//$usableDate = $date->format('Y-m-d H:i:s');
        $event->date = $date;
        $event->name = Input::get('name');
        $event->user_id = Auth::id();
        $event->save();

        dd($event);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $event = Event::where('user_id',Auth::id())->first();
        return View::make('event.edit')->with('event',$event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
