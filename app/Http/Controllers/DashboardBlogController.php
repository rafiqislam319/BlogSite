<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardBlogController extends Controller
{
    public function index(){
        return PostResource::collection(Post::where('user_id', Auth()->user()->id)->latest()->get());
    }
}
