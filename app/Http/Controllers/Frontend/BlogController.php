<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Service\Blog\BlogServiceInterface;
use App\Service\BlogComment\BlogCommentServiceInterface;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private $blogService;
    private $blogCommentService;
    public function __construct(BlogServiceInterface $blogService, BlogCommentServiceInterface $blogCommentService)
    {
        $this -> blogService = $blogService;
        $this -> blogCommentService = $blogCommentService;
    }

    public function index(){
        $blogs = $this -> blogService -> all();

        return view('frontend.blog.index', compact('blogs'));
    }

    public function show($id){
        $blog = $this->blogService->find($id);
        return view('frontend.blog.show', compact('blog'));
    }    

    public function postComment(Request $request){
        $this -> blogCommentService -> create($request ->all());
        return redirect()->back();
    }
    
}
