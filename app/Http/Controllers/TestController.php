<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Test;
use App\Models\Question;
use App\Models\Result;
use App\Models\Choice;
use App\Models\Answer;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $tests = Test::with('subject')->get();
        return view('tests.index', compact('tests'));
    }

    public function create()
    {
        $subjects = Subject::all();
        return view('tests.create', compact('subjects'));
    }





    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'subject_id' => 'required|exists:subjects,id',
            'questions.*.text' => 'required|string|max:255',
            'questions.*.choices.*.text' => 'required|string|max:255',
            'questions.*.choices.*.is_correct' => 'required|boolean',
            'questions.*.answer' => 'required|integer',
        ]);
    
        // Create a new test
        $test = new Test();
        $test->name = $request->name;
        $test->subject_id = $request->subject_id;
        $test->save();
    
        // Loop through each question
        foreach ($request->questions as $questionData) {
            $question = new Question();
            $question->question_text = $questionData['text'];
            $question->test_id = $test->id;
            $question->save();
    
            // Loop through each choice for the question
            foreach ($questionData['choices'] as $index => $choiceData) {
                $choice = new Choice();
                $choice->choice_text = $choiceData['text'];
                $choice->is_correct = $choiceData['is_correct'];
                $choice->question_id = $question->id;
                $choice->save();
    
                // Save the correct answer flag in the choice itself
                if ($index == $questionData['answer']) {
                    $choice->is_correct = true;
                    $choice->save();
                }
            }
        }
    
        return redirect()->route('tests.index')->with('success', 'Test created successfully.');
    }
    

















    public function show($id)
    {
        $test = Test::with('questions.choices')->findOrFail($id);
    
        return view('tests.show', compact('test'));
    }
    
    
    public function edit(Test $test)
    {
        $subjects = Subject::all();
        return view('tests.edit', compact('test', 'subjects'));
    }

    public function update(Request $request, Test $test)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'subject_id' => 'required|exists:subjects,id',
        ]);

        $test->update($request->only('name', 'subject_id'));

        return redirect()->route('tests.index')->with('success', 'Test updated successfully.');
    }

    public function destroy(Test $test)
    {
        $test->delete();
        return redirect()->route('tests.index')->with('success', 'Test deleted successfully.');
    }




    public function submit(Request $request, $id)
    {
        $test = Test::with('questions.choices')->findOrFail($id);
        $answers = $request->input('answers', []);
        $score = 0;
    
        foreach ($test->questions as $question) {
            if (isset($answers[$question->id])) {
                $selectedChoice = $answers[$question->id];
                $correctChoice = $question->choices->firstWhere('is_correct', true);
    
                if ($correctChoice && $correctChoice->id == $selectedChoice) {
                    $score++;
                }
            }
        }
    
        // Assuming that you are using Laravel's built-in authentication
        $user = auth()->user();
    
        // Retrieve the associated student model
        $student = $user->student;
    
        if (!$student) {
            return redirect()->route('tests.show', $test->id)->with('error', 'Student record does not exist for the authenticated user.');
        }
    
        // Save the result using the save method
        $result = new Result();
        $result->student_id = $student->id;
        $result->test_id = $test->id;
        $result->score = $score;
        $result->save();
    
        return redirect()->route('tests.show', $test->id)->with('success', 'Your answers have been submitted and scored.');
    }
    
    
}
