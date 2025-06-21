<?php 
namespace App\Interfaces;

interface QuestionRepositoryInterface {
    public function all();
    public function allBySubjectId($id);
    public function find($id);
    public function store(array $data);
    public function update(array $data, $id);
    public function destroy($id);
}
?>