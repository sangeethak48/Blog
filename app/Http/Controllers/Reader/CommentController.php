<?php

namespace App\Http\Controllers\Reader;

use App\Http\Controllers\Controller;
use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required'
        ]);

        Comments::create([
            'user_id' => Auth::id(),
            'post_id' => $id,
            'comment' => $request->comment
        ]);

        return back();
    }

    public function destroy($id)
    {
        $comment = Comments::findOrFail($id);

        if ($comment->user_id == Auth::id()) {
            $comment->delete();
        }

        return back();
    }
}