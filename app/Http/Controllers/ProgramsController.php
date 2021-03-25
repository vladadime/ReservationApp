<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Program;

class ProgramsController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'name' => 'required',
        //     'description' => 'required',
        //     'facility_id' => 'required',
        //     'date' => 'required'
        // ]);

        $program = new Program();
        $program->name = $request->name;
        $program->event_date = $request->date;
        $program->description = $request->description;
        $program->facility_id = $request->facility_id;

        $program->save();

        return response('Uspešno ste dodali novi dogadjaj', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        if (auth()->user() && auth()->user()->role == 'admin') {
            $facility = DB::table('facilities')->where('id', $id)->get();
            return Inertia::render('MyApp/pages/EditObject', [
                'facility' => $facility
            ]);
        }
        else return redirect()->route('index');
    }

    public function update(Request $request)
    {
        $facility = Facility::find($request->id);
        // $request->validate([
        //     'name' => 'required',
        //     'type' => 'required',
        //     'num_seats' => 'required',
        //     'contact' => 'required',
        //     'info' => 'required',
        //     'address' => 'required',
        //     'description' => 'required',
        // ]);

        $facility->name = $request->name;
        $facility->type = $request->type;
        $facility->num_seats = $request->num_seats;
        $facility->contact = $request->contact;
        $facility->info = 'Radni dan: ' . $request->info1 . ' Vikend: ' . $request->info2;
        $facility->address = $request->address;
        $facility->description = $request->description;
        if($request->file()) {
            $file_name = $request->file->getClientOriginalName();
            $file_path = $request->file('file')->storeAs('assets/profile_images', $file_name, 'public');

            $facility->profile_image = '/' . $file_path;
        }

        $facility->save();

        return response('Uspešno ste izmenili novi objekat', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Facility::find($id)->delete();
        return response('Uspešno ste obrisali objekat', 200);
    }
}

