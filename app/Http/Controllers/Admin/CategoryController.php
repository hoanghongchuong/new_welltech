<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Components\Recursive;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    private $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index(Request $request) {
        $type = $request->type;
        $listCategory = $this->category->getCategoryPaginate($type);
        return view('admin.category.index', compact('listCategory', 'type'));
    }
    public function create(Request $request) {
        $type = $request->type;
        $htmlOption = $this->getCategory($parent_id = '', $type);

        return view('admin.category.add', compact('htmlOption', 'type'));
    }

    public function store(Request $request) {
        $request->validate([
            'name_vi' => ['required', 'unique:categories'],
            'name_en' => ['unique:categories', 'nullable'],
        ],[
            'name_vi.required' => 'Tên danh mục là bắt buộc.',
            'name_vi.unique' => 'Tên danh mục đã tồn tại.',
        ]);
        $input = $request->all();
        $input['slug_vi'] = isset($input['name_vi']) ? Str::slug($input['name_vi']) : '';
        $input['slug_en'] = isset($input['name_en']) ? Str::slug($input['name_en']) : '';

        $this->category->create($input);
        return redirect("admin/categories")->with('success', 'Tạo mới thành công');
    }

    public function edit($id, Request $request) {
        $type = $request->type;
        $category = $this->category->findOrFail($id);
        $htmlOption = $this->getCategory($category->parent_id, $type);
        return view('admin.category.edit', compact('category', 'htmlOption', 'type'));
    }

    public function update(Request $request, $id) {
        $category = $this->category->findOrFail($id);
        $input = $request->all();
        $input['slug_vi'] = isset($input['name_vi']) ? Str::slug($input['name_vi']) : '';
        $input['slug_en'] = isset($input['name_en']) ? Str::slug($input['name_en']) : '';
        $category->update($input);
        return back()->with('success', 'Cập nhật thành công');
    }
    public function delete($id) {
        $category = $this->category->findOrFail($id);
        $category->delete();
        return response()->json([
            'code' => 200,
            'message' => 'success'
        ], 200);
    }

    public function getCategory($parent_id, $type) {
        $listCategory = $this->category->getAllCategory($type);
        $recursive = new Recursive($listCategory);
        $htmlOption = $recursive->recursive($parent_id);
        return $htmlOption;
    }
}
