<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Message;
use App\events\MessageSent;
use Alert;
use User;

class ChatController extends Controller
{
    public function index()
    {
       
        return view('chat');
        dd($request->all());
    }
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Fetch all messages
     *
     * @return Message
     */
    public function fetchMessages()
    {     //print_r("test"); // gabim
        //   exit;
        //   dd($request->all()); 
         return Message::with('user')->get();
       
        
    }
    /**
     * Persist message to database
     *
     * @param  Request $request
     * @return Response
     */
    public function sendMessage(Request $request)
    {
        $user = Auth::user();
        $message = $user->messages()->create([
            'message' => $request->input('message')
        
        ]);
        broadcast(new MessageSent($user, $message))->toOthers();
        // // return ['status' => 'Message Sent!'];


        // $this->validate($request,[
        //     'message'=>'required'
        //     ]);

            $user=Auth::user();
            $message = $user->messages()->create([
        'message' => $request->input('message')]);

        // $message->save();


        broadcast(new MessageSent($user, $message))->toOthers();
         return ['status' => 'Message Sent!'];
        // return response()->json(['status' => 'Message Sent!']);
    }
}
    
//  Message::create([
//             'message'     => $request->input('message')
            
//         ])->read()
//             ->messages()->create([
//                 'user_id' => $user->id
                
//             ]);
//        print_r("testtt");   ///////// okkk, $id
//          exit;
       
      