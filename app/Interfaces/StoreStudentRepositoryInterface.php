<?php 
namespace App\Interfaces;

interface StoreStudentRepositoryInterface {
    public function all();
    public function find($id);
    public function store(array $data);
    public function update(array $data, $id);
    public function destroy($id);
}
?>