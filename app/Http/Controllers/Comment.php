<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment as CommentModel;
use App\Models\User as UserModel;
use Illuminate\Support\Facades\DB;

class Comment extends Controller
{
    public function index()
    {
        $data[] = [];
        $data['template'] = 'comment/index';
        $data['comment'] = CommentModel::all()->toArray();
        $data['nguoidung'] = DB::table('comments')
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->select('comments.id', 'users.name')
            ->get();
        return view('comment', $data);
    }
}
