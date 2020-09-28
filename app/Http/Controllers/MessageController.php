<?php

namespace App\Http\Controllers;

use App\Message;
use App\Mail\MessageReceived;
use App\Exports\MessageExport;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel as Excel;

class MessageController extends Controller
{

    public function export_excel(){

        return Excel::download(new MessageExport,'list_export.xlsx');
    }
    public function export_pdf(){
        
        $messages = Message::all();

        $pdf = PDF::loadView('exports.messages',compact('messages'));

        return $pdf->download('list_messages.pdf');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $messages = Message::with('subject')->get();
        $message = Message::with('subject')->find(1);
        //dd($message->subject->desc);

        return view('lists.messages',[
            'messages' => $messages,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $create_message = Message::create([
                'subject_id' => $request->subject_id,
                'body' => $request->body,
                'fromName' => $request->fromName,
                'fromEmail' => $request->fromEmail,            
                'toEmail' => $request->toEmail,            
                'dateEmail' => $request->dateEmail,
                'spamScore' => $request->spamScore,
    
            ]);

            // $message_id = $create_message->id;

            $message = Message::with('subject')->find($create_message->id);

            Mail::to('vicomser.claudio@gmail.com')->send( new MessageReceived($message));
            
            $message = [
                'code' => 'ok',
                'message' => $create_message,
            ];

            

            return response()->json($create_message,200);

        } catch (\Exceptioni $error) {
            return response()->json($error,400);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
