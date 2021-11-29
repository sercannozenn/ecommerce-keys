<?php

namespace App\Services;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\File;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductService
{
    public Product $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function getAllProductsPaginate(int $paginate = 10, string $sort = null): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        $sort = $this->prepareSort($sort);
        return $this->product::query()
            ->with(['category', 'featureImage'])
            ->has('category')
            ->has('featureImage')
            ->orderBy($sort[0], $sort[1])
            ->paginate($paginate);
    }

    public function getAllProducts()
    {
        return $this->product::with(['category'])
            ->orderBy('product_id', 'DESC')
            ->get();
    }

    public function getProductsForHomePage()
    {
        return $this->product::query()
            ->with(['featureImage', 'category'])
            ->has('featureImage')
            ->has('category')
            ->limit(8)
            ->orderBy('product_id', 'DESC')
            ->get();
    }

    public function getById(int $id)
    {
        return $this->product::query()
            ->where('product_id', $id)
            ->firstOrFail();
    }

    public function getByIdWithRelation(int $id)
    {
        return $this->product::query()
            ->with(['images'])
            ->where('product_id', $id)
            ->firstOrFail();
    }

    public function getBySlugWithRelation(string $slug)
    {
        return $this->product::query()
            ->with(['category', 'featureImage', 'images'])
            ->where('slug', $slug)
            ->firstOrFail();

    }

    public function save(array $data, array $images): Product
    {
        $data = $this->prepareData($data);
        $this->product = $this->product->create($data);

        if (!empty($images))
        {
            $images = $images['images'];
            $this->saveProductImage($images);
        }

        return $this->product;
    }

    public function updateById(array $data, array $images, int $productID): Product
    {
        $data = $this->prepareData($data);
        $product = $this->getById($productID);
        $this->setProduct($product);
        $this->product->update($data);

        if (!empty($images))
        {
            $images = $images['images'];
            $this->saveProductImage($images);
        }

        return $this->product;
    }

    public function setProduct(Product $product): ProductService
    {
        $this->product = $product;
        return $this;
    }

    public function saveProductImage(array $images)
    {
        foreach ($images as $key => $image)
        {
            $fileName = $image->getClientOriginalName();
            $realName = Str::slug(pathinfo($fileName, PATHINFO_FILENAME)) . '_' . time();
            $extension = $image->getClientOriginalExtension();
            $finalName = $realName . '.' . $extension;
            $path = 'images/products/';
            $data = [
                'product_id' => $this->product->product_id,
                'image' => 'storage/' . $path . $this->product->product_id . '/' . $finalName
            ];
            if ($key === array_key_first($images))
            {
                $data['feature_image'] = 1;
            }
            ProductImage::create($data);
            Storage::putFileAs('public/' . $path . $this->product->product_id . '/', new File($image), $finalName);
        }

    }

    public function slugControl(string $slug, int $productID = null): string
    {
        $slugFind = $this->product::query()
            ->where('slug', $slug)
            ->where(function ($query) use ($productID)
            {
                if (!is_null($productID))
                {
                    $query->where('product_id', '!=', $productID);
                }
            })
            ->first();

        if ($slugFind)
        {
            $slug = $this->slugControl($slug . '-' . rand(1, 9999));
        }
        return $slug;
    }

    public function prepareData(array $data): array
    {
        $data['slug'] = $this->slugControl(Str::slug($data['product_name']));
        $data['product_code'] = Str::orderedUuid();

        return $data;
    }

    public function deleteById(int $id)
    {
        $product = $this->getById($id);
        $product->delete();
    }

    public function prepareSort(string $sort = null): array
    {
        switch ($sort)
        {
            case 'asc':
                return ['product_name', 'ASC'];
            case 'desc':
                return ['product_name', 'DESC'];
            case 'ascPrice':
                return ['price', 'ASC'];
            case 'descPrice':
                return ['price', 'DESC'];
            default:
                return ['product_id', 'DESC'];
        }
    }
}
