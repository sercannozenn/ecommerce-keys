<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCreateRequest;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Services\ProductService;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class ProductController extends Controller
{
    public ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): View
    {
        $paginate = !$request->paginate || $request->paginate > 100 ? 5 : $request->paginate;

        return view('admin.products.index', [
            'records' => $this->productService->getAllProductsPaginate($paginate)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $categories = Category::all();

        return view('admin.products.create-edit', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCreateRequest $request)
    {
        $data = $request->only('product_name', 'quantity', 'price', 'category_id', 'is_active', 'images', 'product_short_description', 'product_description');
        $images = $request->only('images');

        $this->productService->save($data, $images);

        Session::flash('result', ['message' => 'Product saved.', 'title' => 'Success']);
        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id): View
    {
        $record = $this->productService->getByIdWithRelation($id);
        $categories = Category::all();
        return view('admin.products.create-edit', compact('record', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductCreateRequest $request, $id)
    {
        $data = $request->only('product_name', 'quantity', 'price', 'category_id', 'is_active', 'images', 'product_short_description', 'product_description');
        $images = $request->only('images');
        $this->productService->updateById($data, $images, $id);

        Session::flash('result', ['message' => 'Product updated.', 'title' => 'Success']);
        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->productService->deleteById($id);

        Session::flash('result', ['message' => 'Product deleted.', 'title' => 'Success']);
        return redirect()->route('admin.products.index');
    }

    public function featureImage(Request $request, $productID, $imageID)
    {
        ProductImage::query()
            ->where('product_id', $productID)
            ->update([
                'feature_image' => 0
            ]);
        ProductImage::query()
            ->where('id', $imageID)
            ->update([
                'feature_image' => 1
            ]);

        Session::flash('result', ['message' => 'Feature image change.', 'title' => 'Success']);
        $route = route('admin.products.edit', ['product' => $productID]) . '#product-images';
        return redirect($route);
    }

    public function deleteImage(Request $request, $productID, $imageID)
    {
        $imagesCount=ProductImage::query()
            ->where('product_id', $productID)
            ->count();
        $image = ProductImage::findOrFail($imageID);
        if ($imagesCount > 1)
        {
            $image->delete();
            Session::flash('result', ['message' => 'Delete image.', 'title' => 'Success']);
        }
        else
        {
            Session::flash('result', ['message' => 'The last image cannot be deleted.', 'title' => 'Info']);
        }

        $route = route('admin.products.edit', ['product' => $productID]) . '#product-images';
        return redirect($route);
    }
}
