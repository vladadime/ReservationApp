<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;

class FacilitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facilities = DB::table('facilities')->get();
        $pictures = DB::table('pictures')->get();
        $programs = DB::table('programs')->get();
        $user = auth()->user();
            return Inertia::render('MyApp/pages/Home', [
                'facilities' => $facilities,
                'taverns' => $facilities->where('type', 'kafana'),
                'clubs' => $facilities->where('type', 'klub'),
                'cafes' => $facilities->where('type', 'kafic'),
                'restaurants' => $facilities->where('type', 'restoran'),
                'pictures' => $pictures,
                'user' => $user
            ]);
    }

    public function pages($page)
    {
        $facilities = DB::table('facilities')->get();
        $user = auth()->user();

        if($page == 'kafane')
            return Inertia::render('MyApp/pages/Tavern', [
                'taverns' => $facilities->where('type', 'kafana'),
            ]);
        if($page == 'kafici')
            return Inertia::render('MyApp/pages/Cafe', [
                'cafes' => $facilities->where('type', 'kafic'),
            ]);
        if($page == 'klubovi')
            return Inertia::render('MyApp/pages/Club', [
                'clubs' => $facilities->where('type', 'klub'),
            ]);
        if($page == 'restorani')
            return Inertia::render('MyApp/pages/Restaurant', [
                'restaurants' => $facilities->where('type', 'restoran'),
            ]);
        if($page == 'rezervacije' && $user)
            return Inertia::render('MyApp/pages/Reservation', [
                'taverns' => $facilities->where('type', 'kafana'),
                'clubs' => $facilities->where('type', 'klub'),
                'cafes' => $facilities->where('type', 'kafic'),
                'restaurants' => $facilities->where('type', 'restoran'),
                'user' => $user
            ]);
        if($page == 'dodaj' && $user && $user->role == 'admin')
            return Inertia::render('MyApp/pages/AddObject');
        if($page == 'dodaj-dogadjaj' && $user && $user->role == 'admin')
            return Inertia::render('MyApp/pages/AddEvent', [
                'facilities' => $facilities
            ]);
        else
            return redirect()->route('index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'type' => 'required',
            'num_seats' => 'required',
            'contact' => 'required',
            'info1' => 'required',
            'info2' => 'required',
            'address' => 'required',
            'description' => 'required',
            'file' => 'required',
        ]);

        $facility = new Facility();
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

        return response('Uspešno ste dodali novi objekat', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $facility = DB::table('facilities')->where('id', $id)->get();
        $pictures = DB::table('pictures')->where('facility_id', $id)->get();
        return Inertia::render('MyApp/pages/Facility', [
            'facility' => $facility,
            'pictures' => $pictures,
        ]);
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
        Facility::find($id)->delete();
        return response('Uspešno ste obrisali objekat', 200);
    }
}
