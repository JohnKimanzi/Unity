<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('chat.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $chat=Chat::create([
            'sender_id'=>$request->sender_id,
            'subject'=>$request->subject,
            'recepient_id'=>$request->recepient_id,
            'chat'=>$request->chat,
            'attachment'=>'',

        ]);
       
        $chat->date_created=isset($chat->created_at)? date('d-m-y h:i',strtotime($chat->created_at)):''; 
        return response()->json(['chat'=>$chat]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        $chosen_chat=Chat::where('recepient_id',$id)->where('sender_id', Auth::user()->id)//outgoing
        ->orWhere(function($query) use($id){
            $query->where('sender_id',$id)->where('recepient_id',Auth::user()->id);//incoming
        })->orderBy('created_at','asc')->get();

        $chosen_chat->each(function(Chat $chat){
           $chat->date_created=isset($chat->created_at)? date('d-m-y h:i',strtotime($chat->created_at)):''; 
        });
        return response()->json(['chosen_chat'=>$chosen_chat]);
    }

    public function fetch_newest_chats($user_id)
    {
        $newest_chats=Chat::where('created_at', '>', now()->subMillisecond(3000)) 
        ->where(function($query) use($user_id){
            $query->where('recepient_id',$user_id)->where('sender_id', Auth::user()->id)//outgoing
            ->orWhere(function($query) use($user_id){
                $query->where('sender_id',$user_id)->where('recepient_id',Auth::user()->id);//incoming
            });
        })
        ->orderBy('created_at','asc')->get();

        $newest_chats->each(function(Chat $chat){
           $chat->date_created=isset($chat->created_at)? date('d-m-y h:i',strtotime($chat->created_at)):''; 
        });

        // dd($newest_chats->pluck('date_created'));
        return response()->json(['newest_chats'=>$newest_chats]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function incoming_fetch($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
