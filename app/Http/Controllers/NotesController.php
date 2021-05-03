<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class NotesController extends Controller
{
    function createNote(Request $request)
    {
        try{
            $note = Note::create([
                'user_id' => $request->input('user_id'),
                'title' => $request->input('title'),
                'content' => $request->input('content')
            ]);
            return response(json_encode($note), 201);
        } catch (\Illuminate\Database\QueryException $exception){
            $errorInfo = $exception->errorInfo;
            return response(json_encode($errorInfo), 500);
        }
    }

    function updateTitle(Request $request, $id)
    {
        try{
            $newTitle = $request->input('newTitle');

            $note =  Note::where('id', $id)->first();
            $note->title=$newTitle;
            $note->save();

            return response(json_encode("Title was sucessfully updated"),200);
        } catch (\Exception $exception){
            $errorInfo = $exception->getMessage();
            return response(json_encode($errorInfo), 500);
        }
    }

    function updateContent(Request $request, $id)
    {
        try{
            $newContent = $request->input('newContent');

            $note =  Note::where('id', $id)->first();
            $note->content=$newContent;
            $note->save();

            return response(json_encode("Content was sucessfully updated"),200);
        } catch (\Exception $exception){
            $errorInfo = $exception->getMessage();
            return response(json_encode($errorInfo), 500);
        }
    }

    function deleteNote($id)
    {
        try{
            $note =  Note::where('id', $id)->first();
            $note->delete();

            return response(json_encode("Note deleted sucessfully"),200);
        } catch (\Exception $exception){
            $errorInfo = $exception->getMessage();
            return response(json_encode($errorInfo), 500);
        }
    }

    function getAllNotes($id)
    {
        $notes = Note::where('user_id', $id)->get(['id','title','content']);
        return response(json_encode($notes->toArray()),200);
    }
}
