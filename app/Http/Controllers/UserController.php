<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use DataTables;

class UserController extends Controller
{
    
/*
     handle yajra datatable views and data
     */
    public function dataTableLogic(Request $request)
    {
        if ($request->ajax()) {
            $users = User::select('*');
            return datatables()->of($users)
                ->make(true);
        }
          
        return view('userdatatable');
    }
    
     // Delete User
    public function destroy(User $user) {
        $user->delete();
        return redirect('/home')->with('success', 'User deleted successfully');
    }
    
     // Show Edit Form
     public function edit(User $user) {
        return view('edit', ['user' => $user]);
    }

    // Update User Data
    public function update(Request $request, User $user) {
        // Make sure logged in user is owner
       
        
        $formFields = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email']
           
        ]);

      //  $formFields->password=sha1($formFields->password);
        $user->update($formFields);

        return back()->with('message', 'User updated successfully!');
    }
    

}
