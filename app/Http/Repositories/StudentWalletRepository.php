<?php

namespace App\Http\Repositories;

use App\Interfaces\StudentWalletRepositoryInterface;
use App\Models\StudentsWallets;

class StudentWalletRepository implements StudentWalletRepositoryInterface
{

    public function all()
    {
        return StudentsWallets::all();
    }

    public function store($data)
    {
        return StudentsWallets::create($data);
    }

    //TODO
    public function studentBalance($id)
    {
        $deposits_sum = StudentsWallets::where('student_id', $id)
            ->where('type', 'DEPOSIT')->sum('amount');
        
        $withdraw_sum = StudentsWallets::where('student_id', $id)
            ->where('type', 'WITHDRAW')->sum('amount');
        
        return $deposits_sum - $withdraw_sum;
    }

    public function find($id)
    {
        return StudentsWallets::findOrFail($id);
    }

    public function update($data, $id)
    {
        return StudentsWallets::whereId($id)->update($data);
    }

    public function destroy($id)
    {
        StudentsWallets::destroy($id);
    }
}

?>
