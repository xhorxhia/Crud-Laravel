<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Departament;
use DB;

class AdminDepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexDep()
    {
        $deps = Departament::orderBy('id', 'asc')->paginate(5);
        return view('admin.indexDep')->with('deps', $deps);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createDep()
    {
        return view('admin.createDep');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeDep(Request $request)
    {
        //validimi
        $this->validate($request,[
            'name'=>'required'
        
        ]);

        //ruajtja ne db
        $dep = new Departament;

        $dep->name = $request->name;

        $dep->save();

        return redirect('/indexDep');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showDep($id)
    {
        $deps = User::find($id);
       return view('admin.indexDep')->with('deps', $deps);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
      */ 
    public function editDep($id)  //(Departament $dep)
    {
        $dep=Departament::find($id);
        // return view('admin.editDep', compact('dep'));
        return view('admin.editDep')->with('dep', $dep);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 
    public function updateDep(Request $request, $id)
    {  
        // print_r("testttt");
        //  dd($request->all());
        $this->validate($request,[
            'name'=>'required'
        
        ]);

        $dep = Departament::find($id);

        $dep->name = $request->input('name');

        $dep->save();

        return redirect('/indexDep');
       
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyDep($id)
    {
        $dep = Departament::find($id);
        if($dep != null){
            $dep->delete();
            return redirect('/indexDep');
        }
        return redirect('/indexDep');
    }

    
    // public function listUsers(Request $request, $name)
    // {
    //     $dep=Departament::find($name);
    //     $users = User::where('dep_id','!=', $dep)->get();
       
    //     // print_r($users);
    //     return view('admin.listUsers')->with('users', $users);

    // }


    // public function listUsers($id)
    // {    
    //      $dep= Departament::find($id);
    //     //  print_r($dep);
    //     //  exit;

    //      $users=DB::table('users')->where('id_departament','!=', $dep)->get();
    //     //  print_r($users);
    //     //   exit;
    //      return view('admin.listUsers', compact('users'));
      
    // }


    public function listUsers(Departament $dep){

        $users=User::where('id_departament', $dep->id)->get();

        return view('admin.listUsers', compact('users', 'dep'));
    }

}
