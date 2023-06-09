<?php

namespace App\Http\Controllers\Admin;

use App\Components\Recursive;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    private $category;
    private $product;

    public function __construct(Category $category, Product $product)
    {
        $this->product = $product;
        $this->category = $category;
    }

    public function index(Request $request)
    {
        $keySearch = $request->get('key_search');
        $products = $this->product->getProductPaginate($keySearch);

        $viewData = [
            'title' => 'Danh sách sản phẩm',
            'breadcrumbData' => [
                0 => [
                    'active' => 'active',
                    'title' => 'Danh sách sản phẩm'
                ]
            ],
            'products' => $products,
        ];
        return view('admin.product.index', $viewData);
    }

    public function create()
    {
        $htmlOption = $this->getCategory($parent_id = '');
        $viewData = [
            'title' => 'Thêm sản phẩm',
            'breadcrumbData' => [
                0 => [
                    'active' => 'active',
                    'title' => 'Thêm sản phẩm'
                ]
            ],
            'htmlOption' => $htmlOption,
        ];
        return view('admin.product.add', $viewData);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_vi' => ['required', 'unique:products'],
            'price' => ['nullable', 'numeric', 'min:0', 'not_in:0'],
            'images' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'image_detail.*' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048']
        ], [
            'name_vi.required' => 'Tên sản phẩm là bắt buộc.',
            'name_vi.unique' => 'Tên sản phẩm đã tồn tại.',
            'image_detail.image' => 'phai la anh',
        ]);

        $input = $request->all();
        $imageDetail = [];
        $path_img = 'upload/images/product';
        if ($request->has('image')) {
            $fileImage = $request->file('image');
            $fileNameImage = time() . '_' . $fileImage->getClientOriginalName();
            $filePathImage = $path_img . '/' . $fileNameImage;
            $fileImage->move($path_img, $fileNameImage);
            $input['image'] = $filePathImage;
        }
        $input['slug_vi'] = isset($input['name_vi']) ? Str::slug($input['name_vi']) : '';
        $input['slug_en'] = isset($input['name_en']) ? Str::slug($input['name_en']) : '';
        $input['status'] = isset($input['status']) ? true : false;
        $newProduct = Product::create($input);
        if ($request->has('image_detail')) {
            foreach ($request->image_detail as $key => $image) {
                $fileImage = $image;
                $fileNameImage = time() . '_' . $fileImage->getClientOriginalName();
                $filePathImage = $path_img . '/' . $fileNameImage;
                $fileImage->move($path_img, $fileNameImage);

                $imageDetail[]['alias'] = $filePathImage;
            }
        }
        foreach ($imageDetail as $key => $image) {
            ProductImage::create(['product_id' => $newProduct->id, 'alias' => $image['alias']]);
        }

        return redirect()->route('admin.product.index')->with('success', 'Thêm thành công');
    }

    public function edit(Request $request, $id)
    {
        $product = $this->product->detailProduct($id);
        $htmlOption = $this->getCategory($product->category_id);

        $viewData = [
            'title' => 'Cập nhật sản phẩm',
            'breadcrumbData' => [
                0 => [
                    'active' => 'active',
                    'title' => 'Cập nhật sản phẩm'
                ]
            ],
            'htmlOption' => $htmlOption,
            'product' => $product,
        ];
        return view('admin.product.edit', $viewData);
    }

    public function update(Request $request, $id)
    {
        $product = $this->product->findOrFail($id);
        $input = $request->all();
        $input['category_id'] = !empty($input['category_id']) ? $input['category_id'] : 0;
        $oldImage = $product->image;
        $path_img = 'upload/images/product';
        if ($request->has('image')) {
            $fileImage = $request->file('image');
            $fileNameImage = time() . '_' . $fileImage->getClientOriginalName();
            $filePathImage = $path_img . '/' . $fileNameImage;
            $fileImage->move($path_img, $fileNameImage);
            $input['image'] = $filePathImage;
        }
        $input['slug_vi'] = isset($input['name_vi']) ? Str::slug($input['name_vi']) : '';
        $input['slug_en'] = isset($input['name_en']) ? Str::slug($input['name_en']) : '';
        $input['status'] = isset($input['status']) ? true : false;

        $product->update($input);
        if ($request->has('image')) {
            Storage::disk()->delete($oldImage);
        }
        if ($request->has('image_detail')) {
            foreach ($request->image_detail as $key => $image) {
                $fileImage = $image;
                $fileNameImage = time() . '_' . $fileImage->getClientOriginalName();
                $filePathImage = $path_img . '/' . $fileNameImage;
                $fileImage->move($path_img, $fileNameImage);

                $imageDetail[]['alias'] = $filePathImage;
            }
            foreach ($imageDetail as $key => $image) {
                ProductImage::create(['product_id' => $id, 'alias' => $image['alias']]);
            }
        }


        return redirect()->route('admin.product.index')->with('success', 'Thêm thành công');
    }

    public function delete($id)
    {
        $product = $this->product->findOrFail($id);
        $product->delete();

        return response()->json([
            'code' => 200,
            'message' => 'success'
        ], 200);
    }

    public function deleteProductImage($id)
    {
        $post = ProductImage::findOrFail($id);
        $img = $post->alias;
        Storage::disk()->delete($img);
        $post->delete();

        return response()->json([
            'code' => 200,
            'message' => 'success'
        ], 200);
    }

    public function getCategory($parent_id)
    {
        $listCategory = $this->category->getAllCategory();
        $recursive = new Recursive($listCategory);
        $htmlOption = $recursive->recursive($parent_id);
        return $htmlOption;
    }
}
