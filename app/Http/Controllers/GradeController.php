<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Models\Grade;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class GradeController extends Controller
{
    public function index()
    {
        $grades = Grade::orderBy('major', 'asc')->get();
        return view('grades.index', compact('grades'));
    }

    public function show(Grade $grade)
    {
        $grade->load('users');
        return view('grades.show', compact('grade'));
    }

    public function create()
    {
        return view('grades.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'year' => 'required|in:X,XI,XII',
            'major' => 'required',
            'subclass' => 'required|integer',
            'total' => 'required|integer',
        ]);

        Grade::create($request->all());
        return redirect()->route('grades.index');
    }

    public function edit(Grade $grade)
    {
        return view('grades.edit', compact('grade'));
    }

    public function update(Grade $grade, Request $request)
    {
        $request->validate([
            'year' => 'required|in:X,XI,XII',
            'major' => 'required',
            'subclass' => 'required|integer',
            'total' => 'required|integer',
        ]);

        $grade->update($request->all());
        return redirect()->route('grades.index');
    }

    public function destroy(Grade $grade)
    {
        $grade->delete();
        return redirect()->route('grades.index');
    }

    public function generate(Grade $grade)
    {
        $data = [];
        for ($i=0; $i < $grade->total; $i++) {
            array_push($data, [
                'username' => $i + 1 . $grade->year . $grade->major . $grade->subclass . \Str::upper(\Str::random(2)),
                'role' => 'student',
                'password' => bcrypt('airlangga2022'),
            ]);
        }

        $grade->users()->createMany($data);

        return redirect()->route('grades.show', $grade);
    }

    public function export(Grade $grade)
    {
        return (new UsersExport($grade->id))->download("Akun {$grade->year}{$grade->major}{$grade->subclass}.xlsx");
    }
}
