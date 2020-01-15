<?php namespace App\Http\Controllers;

use App\Announcement;
use App\CountryContext;
use App\Promotion;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AnnouncementController extends Controller {

    function all()
    {
        $items = Announcement::orderBy('id', 'desc')->get();
        return view('announcement/list')->with(compact('items'));
    }

    function create(Request $request)
    {
        $payload = $request->all();
        $payload['for_sa'] = $payload['for_sa'] ?? 0;
        $payload['for_csa'] = $payload['for_csa'] ?? 0;
        $payload['to_email'] = $payload['to_email'] ?? 0;
        $payload['created_by'] = \Auth::user()->id;

        $ann = Announcement::create($payload);

        session()->flash('success', 'New Announcement created');

        return back();

    }

    function delete($id)
    {
        $an = Announcement::find($id);
        if ($an->delete()) {

            session()->flash('success', 'Announcement deleted');

            return back();
        }
    }

}
