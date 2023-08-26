<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Student;
use App\Models\Province;
use App\Models\City;
use App\Models\District;

class HomeController extends Controller
{
    //
    public function index()
    {
        $role=Auth::user()->role;

        if($role=="1")
        {
            $users = User::all();
            $students = Student::all();
            // $dataProvinsi = Province::all();
            // $kotaList = City::all();
            // $kecamatan = District::all();

        return view('admin.index', compact( 'users', 'students'/*, 'dataProvinsi', 'kotaList'*/));
            // return response()->json($kecamatan);
        }

        if($role=="0")
        {
            // $students = Student::all(); // Fetch all students from the database
            // return view('student.index', ['students' => $students]);
            $user = Auth::user(); // Get the authenticated user
            $students = Student::where('user_id', $user->id)->get(); 
            // $dataProvinsi = Province::all();
            // $kotaList = City::all();            
            
        return view('student.index', compact('students'/*, 'dataProvinsi', 'kotaList'*/));
        }

        else
        {
            return "Wrong pass/username";
        }
    }

    public function addnewuser(Request $request)
    {
        $data = new User;

        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);

        $role = $request->input('role');
        $data->role = $role;

        $data->save();

        return redirect('/redirects');
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edit_user', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->input('role');

        $user->save();

        return redirect('/redirects')->with('success', 'User updated successfully');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/redirects')->with('success', 'User deleted successfully');
    }

    public function addnewstudent(Request $request)
    {
        $data = new Student;
        // $data = new Province;
        // $data = new City;
        // $dataProvinsi = Province::all();
        // $kotaList = City::all();

        $user_id=Auth::user()->id;
        $data->user_id = $user_id;

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:50000'
        ]);        

        $fileName = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/images', $fileName);
        
        // Other fields
        $data->name = $request->name;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->current_address = $request->current_address;
        $data->subdistrict = $request->subdistrict;
        $data->city = $request->city;
        $data->province = $request->province;
        $data->phone = $request->phone;
        $data->mobile = $request->mobile;
        $data->birthday = $request->birthday;
        $data->birth_city = $request->birthCity;
        $data->birth_province = $request->birthProvince;
        $data->gender = $request->gender;
        $data->status = $request->status;
        $data->religion = $request->religion;
        $data->image = $fileName;

        $nationality = $request->input('nationality');
        if ($nationality === 'Other') {
            $data->nationality = $request->input('otherNationality.value');
        } else {
            $data->nationality = $nationality;
        }

        $data->save();

        return redirect('/redirects');
    }

    public function editStudent($id)
    {
        $student = Student::findOrFail($id);
        return view('student.edit_student', compact('student'));
    }

    public function updateStudent(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $fileName = '';

        if ($request->hasFile('image')) {
          $fileName = time() . '.' . $request->image->extension();
          $request->image->storeAs('public/images', $fileName);
          if ($student->image) {
            Storage::delete('public/images/' . $student->image);
          }
        } else {
          $fileName = $student->image;
        }

        // Update the student's information based on the form data
        $student->name = $request->name;
        $student->email = $request->email;
        $student->address = $request->address;
        $student->current_address = $request->current_address;
        $student->subdistrict = $request->subdistrict;
        $student->city = $request->city;
        $student->province = $request->province;
        $student->phone = $request->phone;
        $student->mobile = $request->mobile;
        $student->birthday = $request->birthday;
        $student->birth_city = $request->birthCity;
        $student->birth_province = $request->birthProvince;
        $student->gender = $request->gender;
        $student->status = $request->status;
        $student->religion = $request->religion;
        $student->image = $fileName;
        
        // Check if "Other" nationality is selected and update accordingly
        $nationality = $request->input('nationality');
        if ($nationality === 'Other') {
            $student->nationality = $request->input('otherNationality.value');
        } else {
            $student->nationality = $nationality;
        }

        $student->save();

        return redirect('/redirects')->with('success', 'Student information updated successfully');
    }

    public function deleteStudent($id)
    {
        $student = Student::findOrFail($id);
        if($student->image){
            Storage::delete('public/images/' . $student->image);
        }
        $student->delete();

        return redirect('/redirects')->with('success', 'Student registration deleted successfully');
    }

    // public function getKota($provinsiId)
    // {
    //     $kotaList = City::where('id_provinsi', $provinsiId)->get();
    //     return response()->json($kotaList);
    // }
}
