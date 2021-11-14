<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Product;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::with('categories.parentCategory.parentCategory')
            ->orderBy('title')
            ->paginate(10);
        return view('admin.product-index', compact('products'));
    }


    public function create()
    {
        $categories = Category::with('parentCategory.parentCategory')
            ->whereHas('parentCategory.parentCategory')
            ->get();
        $products = Product::all('id', 'title');
        return view('admin.product-create', compact('categories', 'products'));
    }


    public function store(ProductCreateRequest $request)
    {
        $newImageName = time() . '-' . $request->title . '.' . $request->images->extension();
        $request->images->move(public_path('pink\images'), $newImageName);

        $product = Product::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'status' => $request->status,
            'images' => $newImageName,
            'description' => $request->description,
            'hit' => $request->hit,
            'category_id' => $request->category_id,
        ]);
        if ($request->hasFile('imgages')) {
            $files = $request->file('imgages');
            foreach ($files as $file) {
                $imageName = time() . ' ' . $file->getClientOriginalName();
                $file->move(public_path('pink\images'), $imageName);

                Gallery::create([
                    'product_id' => $product->id,
                    'imgages' => $imageName,
                ]);
            }
        }
        $product->products()->sync($request->related);
        return redirect()->route('master.product.index')->with('status', 'Новый товар успешно добавлен');
    }


    public function show(Product $product)
    {
        $product->load('categories.parentCategory.parentCategory', 'galleries');
        return view('admin.product-show', compact('product'));
    }


    public function edit(Product $product)
    {
        $categories = Category::with('parentCategory.parentCategory', 'products')
            ->whereHas('parentCategory.parentCategory')
            ->get();
        $products = Product::all('id', 'title');
        return view('admin.product-edit', compact('product', 'products', 'categories'));
    }


    public function update(ProductUpdateRequest $request, Product $product)
    {
        if ($request->hasFile('images')) {
            $file = 'pink/images/' . $product->images;
            File::delete($file);
            $newImageName = time() . '-' . $request->title . '.' . $request->images->extension();
            $request->images->move(public_path('pink\images'), $newImageName);

            $product->update([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'content' => $request->content,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'old_price' => $request->old_price,
                'status' => $request->status,
                'images' => $newImageName,
                'description' => $request->description,
                'hit' => $request->hit,
                'category_id' => $request->category_id,
            ]);
        } else {
            $product->update([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'content' => $request->content,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'old_price' => $request->old_price,
                'status' => $request->status,
                'description' => $request->description,
                'hit' => $request->hit,
                'category_id' => $request->category_id,
            ]);
        }

        if ($request->hasFile('imgages')) {
            $files = $request->file('imgages');
            foreach ($files as $file) {
                $imageName = time() . ' ' . $file->getClientOriginalName();
                $file->move(public_path('pink\images'), $imageName);
                Gallery::create([
                    'product_id' => $product->id,
                    'imgages' => $imageName,
                ]);
            }
        }
        $product->products()->sync($request->related);

        return back()->with('status', "Товар $product->title успешно редактирован");
    }


    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if (File::exists('pink/images/' . $product->images)) {
            File::delete('pink/images/' . $product->images);
        }
        $galleries = Gallery::where('product_id', $product->id)->get();

        foreach ($galleries as $gallery) {
            if (File::exists('pink/images/' . $gallery->imgages)) {
                File::delete('pink/images/' . $gallery->imgages);
            }
        }

        $product->delete();

        return redirect()->route('master.product.index')->with('status', 'Продукт успешно удален');
    }

    public function deleteImages($id)
    {
        $gallery = Gallery::findOrFail($id);
        if (File::exists('pink/images/' . $gallery->imgages)) {
            File::delete('pink/images/' . $gallery->imgages);
        }
        Gallery::find($id)->delete();


        return redirect()->back()->with('status', 'Изоброжение успешно удалено');

    }
}
