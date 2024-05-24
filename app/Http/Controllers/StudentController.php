<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $student = Student::where('user_id', $user->id)->first(); 
        
        return view('dash.profile', compact('user', 'student'));
    }



    public function edit()
    {
        $user = Auth::user(); 
    
        return view('dash.profileedit', compact('user'));
    }
    
    

    public function update(Request $request)
    {



         
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:students,email,' . auth()->user()->id,
            'phone' => 'nullable|string|max:15',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $user = auth()->user();
    
        // Retrieve the student if exists
        $student = Student::where('email', $request->input('email'))->first();
    
        if ($student) {
            // Update existing student
            $student->name = $request->input('name');
            $student->phone = $request->input('phone');
            $student->user_id = $user->id;
    
            // Handle profile image upload
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = date('YmdHi') . '_' . $image->getClientOriginalName();
                $image->move(public_path('upload/student_postimage'), $filename);
                $student->image = $filename;
            }
    

            
            $student->save();
    
            return redirect()->route('profile')->with('success', 'Student profile updated successfully.');
        } else {
            // Create new student
            $student = new Student();
            $student->name = $request->input('name');
            $student->email = $request->input('email');
            $student->phone = $request->input('phone');
            $student->payment_id = $user->payment_id;
            $student->user_id = $user->id;
    
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = date('YmdHi') . '_' . $image->getClientOriginalName();
                $image->move(public_path('upload/student_postimage'), $filename);
                $student->image = $filename;
            }

            
    
            $student->save();
    
            return redirect()->route('profile')->with('success', 'New student added successfully.');
        }
    


}    }