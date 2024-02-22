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
        $data['nguoidung'] = DB::select("SELECT `comment`.`id`, `users`.`name`, `comment`.`content`, `comment`.`reply_user_id` FROM `comment` INNER JOIN `users` ON `comment`.`user_id` = `users`.`id` WHERE `comment`.`reply_user_id` = 0");
        $data['nguoidung'] = collect($data['nguoidung'])->toArray();
        //dd($data['nguoidung'] );
        return view('comment', $data);
    }
    public function post(){
        CommentModel::create($_POST);
        return redirect('/comment');
    }
}
