<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service\Blog\BlogServiceInterface;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private $blogService;
    public function __construct(BlogServiceInterface $blogService)
    {
        $this -> blogService = $blogService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = $this -> blogService -> all();

        return view('backend.blog.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request -> all();
        // Handle file upload
        if ($request->hasFile('image')) {
            try {
                $image = $request->file('image');
                $new_image = uniqid() . '_' . $image->getClientOriginalName();
                $image->move(public_path('frontend/img/blog'), $new_image);
                $data['image'] = $new_image;
            } catch (\Exception $e) {
                return back()->with('notification', 'Đã có lỗi xảy ra khi tải lên hình ảnh: ' . $e->getMessage());
            }
        }
        $this -> blogService -> create($data);

        return redirect('admin/blog');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = $this -> blogService -> find($id);
        return view('backend.blog.edit', compact('blog'));
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
        $data = $request -> all();
        // Handle file upload
        if ($request->hasFile('image')) {
            try {
                $image = $request->file('image');
                $new_image = uniqid() . '_' . $image->getClientOriginalName();
                $image->move(public_path('frontend/img/blog'), $new_image);

                if (!empty($data['image'])) {
                    $old_image_path = public_path('frontend/img/blog/' . $data['image']);
                    if (file_exists($old_image_path)) {
                        unlink($old_image_path);
                    }
                }

                $data['image'] = $new_image;
            } catch (\Exception $e) {
                return back()->with('notification', 'Đã có lỗi xảy ra khi tải lên hình ảnh: ' . $e->getMessage());
            }
        }
        $this -> blogService -> update($data, $id);

        return redirect('admin/blog');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this -> blogService ->delete($id);
        if (!empty($data['image'])) {
            $old_image_path = public_path('frontend/img/blog/' . $data['image']);
            if (file_exists($old_image_path)) {
                unlink($old_image_path);
            }
        }

        return redirect('admin/blog');
    }
}
