<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service\Product\ProductServiceInterface;
use Illuminate\Http\Request;
use App\Models\ProductImage;

class ProductImageController extends Controller
{
    private $productService;

    public function __construct(ProductServiceInterface $productService)
    {
        $this -> productService = $productService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($product_id)
    {
        $product = $this -> productService ->find($product_id);
        $productImages = $product ->productImages;

        return view('backend.product.image.index' , compact('product', 'productImages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $product_id)
    {
        $data = $request->all();
    
        // Handle file upload
        if ($request->hasFile('image')) {
            try {
                $image = $request->file('image');
                $new_image = uniqid() . '_' . $image->getClientOriginalName();
                $image->move(public_path('frontend/img/products'), $new_image);
                $data['path'] = $new_image;
            } catch (\Exception $e) {
                return back()->with('notification', 'Đã có lỗi xảy ra khi tải lên hình ảnh: ' . $e->getMessage());
            }
        }
    
        // Create a new ProductImage model with the uploaded image path
        $productImage = new ProductImage();
        $productImage->product_id = $product_id;
        $productImage->path = $data['path'];
        $productImage->save();
    
        return redirect('admin/product/'.$product_id.'/image');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id,$product_image_id)
    {
        $productImage = ProductImage::find($product_image_id);

        if(!$productImage){
            return redirect()->back()->with('error', 'Product image not found.');
        }

        $file_path = public_path('frontend/img/products/'.$productImage->path);

        if(file_exists($file_path)){
            if(!unlink($file_path)){
                return redirect()->back()->with('error', 'Failed to delete product image file.');
            }
        }

        $productImage->delete();
        return redirect('admin/product/'.$product_id.'/image');
    }
}
