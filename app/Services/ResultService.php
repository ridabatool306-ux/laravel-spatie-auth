<?php
namespace App\Services;

use App\Models\Result;

class ResultService
{
    public function getAll()
    {
        return Result::all();
    }

    public function getById($id)
    {
        return Result::findOrFail($id);
    }

    public function create($data)
    {
        $data['grade'] = $this->calculateGrade($data['marks']);
        return Result::create($data);
    }

    public function update($id, $data)
    {
        $result = Result::findOrFail($id);
        $data['grade'] = $this->calculateGrade($data['marks']);
        $result->update($data);
        return $result;
    }

    public function delete($id)
    {
        $result = Result::findOrFail($id);
        return $result->delete();
    }

    private function calculateGrade($marks)
    {
        if ($marks >= 80) return 'A';
        if ($marks >= 70) return 'B';
        if ($marks >= 60) return 'C';
        if ($marks >= 50) return 'D';
        return 'F';
    }
}

?>