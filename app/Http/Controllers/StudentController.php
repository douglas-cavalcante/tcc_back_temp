<?php

namespace App\Http\Controllers;

use App\Http\Repositories\StudentRepository;
use App\Http\Repositories\StudentWalletRepository;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    private StudentRepository $studentRepository;
    private StudentWalletRepository $walletRepository;

    public function __construct(StudentRepository $studentRepository, StudentWalletRepository $walletRepository)
    {
        $this->studentRepository = $studentRepository;
        $this->walletRepository = $walletRepository;
    }

    public function balance($id)
    {
        return $this->walletRepository->studentBalance($id);
    }
}
