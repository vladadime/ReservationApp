<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\Picture;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;

class PicturesController extends Controller
{
    public function index()
    {

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'file' => 'required',
        ]);

        $picture = new Picture();
        $picture->facility_id = $request->facility_id;
        if($request->file()) {
            $file_name = $request->file->getClientOriginalName();
            $file_path = $request->file('file')->storeAs('assets/pictures', $file_name, 'public');

            $picture->picture_url = '/' . $file_path;
        }

        $picture->save();

        return response('Uspešno ste dodali novu sliku', 201);
    }

    public function edit($id)
    {
        if (auth()->user() && auth()->user()->role == 'admin') {
            $facility = Facility::find($id);
            $pictures = DB::table('pictures')->where('facility_id', $id)->get();
            return Inertia::render('MyApp/pages/EditGallery', [
                'facility' => $facility,
                'pictures' => $pictures,
            ]);
        }
        else return redirect()->route('index');
    }

    public function destroy($id)
    {
        Picture::find($id)->delete();
        return response('Uspešno ste obrisali sliku', 200);
    }
}
