<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notes;
use Validator;
class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return notes[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index()
    {
        return Notes::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function store(Request $request)
    {

        #TODO valodator
        $post = Notes::create([
            "title" => $request->title,
            "description" => $request->description
        ]);

        return [
            "status" => true,
            "post" => $post
        ];

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response|object
     */
    public function show($id)
    {
        $post = Notes::find($id);
        if (!$post) {
            return response()->json([
                "status" => false,
                "message" => "Post not found"
            ])->setStatusCode(404);
        }

        return $post;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response|object
     */
    public function update(Request $request, $id)
    {
        $post = Notes::find($id);
        $post->update([
            "title" => $request->title,
            "description" => $request->description]);

        if (!$post) {
            return response()->json([
                "status" => false,
                "message" => "Post not found"
            ])->setStatusCode(404);
        }
        return $post;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return int
     */
    public function destroy($id)
    {
        return Notes::find($id)->delete();
    }
}
