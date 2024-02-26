<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\CommentPosted;
use Illuminate\Support\Facades\Mail;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|integer',
            'email' => 'email',
            'message' => 'required|string|max:1000',
        ]);

        $comment = new Comment([
            'product_id' => $validated['product_id'],
            'email' => $validated['email'],
            'content' => $validated['message'],
        ]);
        $comment->save();

        Mail::to('20031003@itcelaya.edu.mx')
            ->send(new CommentPosted($comment));

        return back()->with('success', 'Comment posted successfully and email notification sent.');
    }
}
