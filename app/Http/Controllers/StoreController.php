<?php

namespace App\Http\Controllers;

use App\Http\Repositories\StoreRepository;
use App\Http\Repositories\StoreStudentRepository;
use App\Http\Repositories\StudentWalletRepository;
use Exception;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    private StoreRepository $storeRepository;
    private StoreStudentRepository $storeStudentRepository;
    private StudentWalletRepository $studentWalletRepository;

    public function __construct(
        StoreRepository $storeRepository, 
        StoreStudentRepository $storeStudentRepository,
        StudentWalletRepository $studentWalletRepository
    )
    {
        $this->storeRepository = $storeRepository;
        $this->storeStudentRepository = $storeStudentRepository;
        $this->studentWalletRepository = $studentWalletRepository;
    }

    public function all()
    {
        return $this->storeRepository->all();
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all();

            $request->validate([
                'name' => 'string|required',
                'url_cover' => 'string|required',
                'price' => 'decimal|required',
            ]);

            return $this->storeRepository->store($data);

        } catch(Exception $exception) {
            return $this->error($exception->getMessage(), 500);
        }
    }

    public function recoverItem(Request $request)
    {
        try {
            $student_balance = $this->studentWalletRepository->studentBalance($request->student_id);
            $store_item = $this->storeRepository->find($request->store_id);

            if($student_balance - $store_item->price < 0 ) { 
                return $this->error('Saldo insuficiente',500);
            }

            $store_student_data = [
                'student_id' => $request->student_id,
                'store_id' => $request->store_id,
            ];

            $store_student = $this->storeStudentRepository->store($store_student_data);

            $student_wallet_data = [
                'student_id' => $request->student_id,
                'amount' => $store_item->price,
                'type' => 'WITHDRAW',
                'description' => $request->description
            ];

            $student_wallet = $this->studentWalletRepository->store($student_wallet_data);

            return response()->json([$store_student, $student_wallet], 200);
        } catch(Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 400);
        }
    }

}
