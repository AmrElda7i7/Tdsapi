<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function store($student_id, $session_id)
    {
        if (empty($student_id) || empty($session_id))
            return response()->json(["message" => "empty one or more parameters"], 422);
        else if (is_string($student_id) || is_string($session_id)) {
            return response()->json(["message" => "the provided id(s) are incorrect"], 422);

        }
        $student = Student::create(
            [
                'student_id' => $student_id,
                'session_id' => $session_id
            ]
        );
        return response()->json([
            'student_id' => $student_id,
            'session_id' => $session_id
        ]);
    }
    public function index()
    {
        $students = Student::all();
        return response()->json(StudentResource::collection($students));
    }
}
