<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Departaments;
use App\User;


class AdminUserController extends Controller
{
    //     /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexUser()
    {   // perzgjedh listen e gjithe userave
        //$admins = User::where('isAdmin', '1')->get();

        $admins=User::orderBy('id', 'desc')->paginate(5); // per pagination
        return view('admin.indexAdmin')->with('admins', $admins);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createUser()
    {
        return view('admin.createUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeUser(Request $request)
    {    //dd($request->all());
       
        //validimi
        $this->validate($request,[
            'name'=>'required',
            'isAdmin'=>'required',
            'id_departament'=>'required',
            'email'=>'required',
            'password'=> 'required|string|min:8|confirmed'
        ]);

        // ruajtja ne db
        $admin = new User;

        $admin->name = $request->name;
        $admin->isAdmin = $request->isAdmin;
        $admin->id_departament = $request->id_departament;
        $admin->email = $request->email;
        $admin->password = Hash::make($request['password']);
   
        $admin->save();
//print_r($admin);
        return redirect('indexAdmin');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showUser($id)
    {
       $admins = User::find($id);
       return view('admin.indexAdmin')->with('admins', $admins);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editUser(User $admin)
    {
        // $admin = User::find($id);
        return view('admin.editUser', compact('admin'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateUser(Request $request, $id )
    {    //dd($request->all());
        // validimi
        // $admin = User::find($id);

        // $this->validate($request,[
        //     'name'=>'required',
        //     'isAdmin' => 'required',
        //     'id_departament'=> 'required',
        //     'email' => 'required',
        //     'password'=>'required|string|min:8|confirmed'
        // ]);

        // ruajtja e ndryshimeve ne db
        $admin = User::find($id);

        // $admin->name = request('name');
        // $admin->isAdmin = request('isAdmin');
        // $admin->id_departament = request('id_departament');
        // $admin->email = request('email');
        // $admin->password = Hash::make(request('password'));

        $admin->name = $request->input('name');
        $admin->isAdmin = $request->input('isAdmin');
        $admin->id_departament = $request->input('id_departament');
        $admin->email = $request->input('email');
        $admin->password = Hash::make($request['password']);

        $admin->save();
         
        // $admin->update(request(['name', 'isAdmin' ,'id_departament',
        // 'email','password']));


        return redirect('/indexAdmin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyUser($id)
    {
        $admin = User::find($id);
        if($admin != null){ 
        $admin->delete();
        return redirect('indexAdmin')->with(['message'=> 'Successfully deleted!!']);
    }
    redirect('indexAdmin')->with(['message'=> 'Wrong id']);

    }

    // public function mario(){
    //     return view('admin.createDep');
    // }


    
}
