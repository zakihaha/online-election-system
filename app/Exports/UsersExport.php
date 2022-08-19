<?php

namespace App\Exports;

use App\Models\Grade;
use App\Models\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UsersExport implements FromView
{
    use Exportable;

    public function __construct(int $grade)
    {
        $this->grade = $grade;
    }

    public function view(): View
    {
        return view('exports.users', [
            'users' => User::where('grade_id', $this->grade)->get(),
            'grade' => Grade::find($this->grade),
        ]);
    }
}
