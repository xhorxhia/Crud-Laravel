<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Departament;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'email'=>'required',
            //'dep_id'=>'nullable',
            'number'=>'required',
            'cover_image'=>'image|nullable|max:1999'
         ]);

         if($request->hasFile('cover_image')){

            //emri i img bashk me cfare perfundon
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            
            //marrim vetem emrin
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            
            //marrin vtm prapashtesen
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            //emri i img si do te ruhet
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            
            //upload img
            $path = $request->file('cover_image')->storeAs('public/cover_image',$fileNameToStore);
        }
        else{
            $fileNameToStore = 'noimage.jpg';
        }

      //create employee and store to DB
         $user = new User;
       

         $user->name = $request->input('name');
         $user->email = $request->input('email');
         //$employee->dep_id = $request->input('dep_id');
         $user->tel = $request->input('number');
         $user->cover_image = $fileNameToStore;

         $user->save();

         // redirect to another page
         //return redirect('employees/profile')->with('success', 'Profile created');

         return redirect()->route('users.show', $user->id); // te con te funx shows
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {  
        $user = User::find($id);
        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   //dd($request->all());
        
        // validimi i te dhenave
        $this->validate($request, [
            'name'=>'required',
            'email'=>'required',
            'number'=>'required',
            'cover_image'=>'image|nullable|max:1999'
         ]);
         if($request->hasFile('cover_image')){

          //emri i img bashk me cfare perfundon
          $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
          
          //marrim vetem emrin
          $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
          
          //marrin vtm prapashtesen
          $extension = $request->file('cover_image')->getClientOriginalExtension();

          //emri i img si do te ruhet
          $fileNameToStore = $filename.'_'.time().'.'.$extension;
         
          //upload img
          $path = $request->file('cover_image')->storeAs('public/cover_image',$fileNameToStore);
          
      }
      else{
          $fileNameToStore = 'noimage.jpg';
      }
      
      $user = User::find($id);

      $user->name = $request->input('name');
      $user->email = $request->input('email');
      $user->tel = $request->input('number');
      $user->cover_image = $fileNameToStore;

      $user->save();
      
      

        // redirect with flash data to employees.show
        //  return redirect('users.show',$users->id)->with('success', 'Profile unpated successfully!');
        return redirect()->route('users.show', $user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      
        $user = User::find($id);
        $user->delete();
        return redirect('/');
    }
}
