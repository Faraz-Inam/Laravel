<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\students;

class StudentsController extends Controller
{
    public function welcome(){
        return view('welcome');
    }
    public function form(){
        return view('form');
    }

    public function create(Request $request){
        $image = time().'.'.$request->image->extension();
        $request->image->move(public_path('product_images'), $image);

        $create = new students();
        $create->name = $request['name'];
        $create->email = $request['email'];
        $create->image = $image;
        $create->save();

        return redirect('read')->withSuccess('Congratilations!');
    }
    public function read(){
        $records = students::all();
        $details = compact('records');
        return view('read')->with($details);
    }

    public function delete($id){
        $std_id = students::find($id);
        $std_id->delete();
        return back()->withYes('Record Deleted');
    }
    public function edit($id){
        $std_id = students::find($id);
        return view('edit', ['std_id'=> $std_id]);
    }

    public function update($id, Request $request){
    $update = students::find($id);
    $image = time().'.'.$request->image->extension();
    $request->image->move(public_path('product_images'), $image);

    // Update the name and email
    $update->name = $request['name'];
    $update->email = $request['email'];
    $update->image = $image;

    $update->save();
    return redirect('read')->with('success', 'Student updated successfully!');
}   
}
