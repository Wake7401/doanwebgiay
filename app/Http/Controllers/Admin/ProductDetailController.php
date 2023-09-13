<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Service\Product\ProductServiceInterface;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
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
        $product = $this -> productService -> find($product_id);
        $productDetails = $product -> productDetails;

        return view ('backend.product.detail.index', compact('product','productDetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($product_id)
    {
        $product = $this -> productService -> find($product_id);

        return view('backend.product.detail.create',compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$product_id)
    {
        $data = $request -> all();
        ProductDetail::create($data);

        return redirect('admin/product/'.$product_id.'/detail');
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
    public function edit($product_id, $product_detail_id)
    {
        $product = $this -> productService ->find($product_id);
        $productDetail = ProductDetail::find($product_detail_id);

        return view('backend.product.detail.edit',compact('product','productDetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product_id, $product_detail_id)
    {
        $data = $request->all();
        ProductDetail::find($product_detail_id) -> update($data);

        $this -> updateQty($product_id);

        return redirect('admin/product/'.$product_id.'/detail');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id,$product_detail_id)
    {
        ProductDetail::find($product_detail_id)-> delete();

        return redirect('admin/product/'.$product_id.'/detail');
    }

    public function updateQty($product_id){
        $product = $this->productService->find($product_id);
        if (!$product) {
            // Nếu sản phẩm không tồn tại, thì trả về một thông báo lỗi hoặc thực hiện xử lý phù hợp.
            return 'Product not found';
        }
        
        $productDetails = $product->productDetails;
        if ($productDetails->isEmpty()) {
            // Nếu không có chi tiết sản phẩm nào, thì trả về một thông báo lỗi hoặc thực hiện xử lý phù hợp.
            return 'Product details not found';
        }
        
        $totalQty = $productDetails->sum('qty');
        // Kiểm tra số lượng sản phẩm có đủ để cập nhật hay không.
        // Nếu không đủ, trả về một thông báo lỗi hoặc thực hiện xử lý phù hợp.
        if ($totalQty < 1) {
            return 'Not enough quantity in stock';
        }
        
        $this->productService->update(['qty' => $totalQty], $product_id);
        return 'Quantity updated successfully';
    }
    
}
