<?php

namespace App\Http\Controllers\Admin\Site\Disciplines;

use App\Http\Requests\Admin\StoreDisciplineRequest;
use App\Http\Requests\Admin\UpdateDisciplineRequest;
use App\Models\Discipline;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DisciplineController extends Controller {

    public function index() {
        $disciplines = Discipline::orderBy('name', 'ASC')->with('parent')->get();

        return view('layouts.admin.site.disciplines.list', ['disciplines' => $disciplines]);
    }

    public function create() {
        $disciplines = Discipline::orderBy('name', 'ASC')->pluck('name', 'id')->toArray();
        $resulting_array = [null => 'No Parent'] + $disciplines;

        return view('layouts.admin.site.disciplines.create', ['disciplines' => $resulting_array]);
    }

    public function store(StoreDisciplineRequest $request) {
        $discipline = new Discipline;
        $discipline->name = $request->discipline;
        $discipline->slug = str_slug($request->discipline);
        if($request->get('parent', null) != "") {
            $discipline->parent_id = $request->get('parent', null);
        }

        $discipline->save();

        session()->flash('success_message', 'Discipline saved.');

        return redirect()->route('admin.site.disciplines');
    }

    public function show(Discipline $discipline) {
        $disciplines = Discipline::orderBy('name', 'ASC')->pluck('name', 'id')->toArray();
        $resulting_array = [null => 'No Parent'] + $disciplines;

        return view('layouts.admin.site.disciplines.single', ['disciplines' => $resulting_array, 'discipline' => $discipline]);
    }

    public function update(UpdateDisciplineRequest $request, Discipline $discipline) {
        if(in_array($request->parent, $discipline->children->pluck('id')->toArray()) || $request->parent == $discipline->id) {
            session()->flash('error_message', 'You cannot set the parent to itself or one of it\'s children.');
            return redirect()->back()->withInput();
        }

        $discipline->name = $request->discipline;
        $discipline->slug = str_slug($request->discipline);
        if($request->get('parent', null) != "") {
            $discipline->parent_id = $request->get('parent', null);
        } else {
            $discipline->parent_id = null;
        }

        $discipline->save();

        session()->flash('success_message', 'Discipline saved.');

        return redirect()->route('admin.site.disciplines');
    }

    public function destroy(Discipline $discipline) {
        $user = Auth::user();

        if(!$user->hasRole('super.admin')) {
            session()->flash('error_message', 'You do not have the necessary permissions to process this request.');
            return redirect()->back()->withInput();
        }

        $discipline->delete();

        session()->flash('success_message', 'Discipline removed.');

        return redirect()->route('admin.site.disciplines');

    }

}
