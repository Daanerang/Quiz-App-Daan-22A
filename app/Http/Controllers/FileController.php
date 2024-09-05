<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use Illuminate\Support\Facades\Validator;

class FileController extends Controller
{
    public function uploadQuestions(Request $request)
    {
        // Valideer het bestand
        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:csv,json|max:2048',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Krijg het bestand
        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();

        // Verwerk JSON of CSV
        if ($extension === 'json') {
            $this->processJson($file);
        } elseif ($extension === 'csv') {
            $this->processCsv($file);
        }

        return back()->with('success', 'Vragen succesvol geüpload.');
    }

    // Verwerk JSON-bestand
    private function processJson($file)
    {
        $data = json_decode(file_get_contents($file), true);
        foreach ($data as $questionData) {
            Question::create([
                'question_text' => $questionData['question_text'],
                'question_type' => $questionData['question_type'],
                'options' => json_encode($questionData['options'] ?? []),
                'correct_answer' => $questionData['correct_answer'],
            ]);
        }
    }

    // Verwerk CSV-bestand
    private function processCsv($file)
    {
        $csvData = array_map('str_getcsv', file($file));
        foreach ($csvData as $row) {
            Question::create([
                'question_text' => $row[0],
                'question_type' => $row[1],
                'options' => isset($row[2]) ? json_encode(explode('|', $row[2])) : null,
                'correct_answer' => $row[3],
            ]);
        }
    }
}
