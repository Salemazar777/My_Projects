<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;
use Auth;
class UnitController extends Controller
{
    public function UnitAll()
    {
        $unit = Unit::latest()->get();
        return view('backend.unit.unit_all',compact('unit'));
    }

    public function UnitAdd()
    {
        return view('backend.unit.unit_add');
    }

    public function UnitStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        Unit::create([
            'name' => $request->name,
            'created_by' => Auth::user()->id,
        ]);
        return redirect()->route('unit.all');
    }

    public function UnitEdit($id)
    {
        $unit = Unit::find($id);
        return view('backend.unit.unit_edit',compact('unit'));
    }

    public function UnitUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required|string'
        ]);
        $unit_id = $request->id;
        Unit::find($unit_id)->update([
            'name' => $request->name,
            'updated_by' => Auth::user()->id,
        ]);
        return redirect()->route('unit.all');
    }

    public function UnitDelete($id)
    {
        Unit::find($id)->delete();
        return redirect()->route('unit.all'); 
    }
}
