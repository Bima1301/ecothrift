<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'categories' => Category::all()
        ];
        return view('pages.product.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        // dd($request->all());
        $validateData = [
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'size' => $request->size,
            'date_product' => $request->date_product,
            'stock' => $request->stock,
        ];
        $image_array = [];
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $key => $image) {
                $image_array[$key] = $image->store('product');
            }
        }
        $validateData['image'] = json_encode($image_array);
        $validateData['user_id'] = auth()->user()->id;
        $product = Product::create($validateData);
        return redirect()->route('katalog')->with('success', 'Product berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product->image = json_decode($product->image, true);
        return view('pages.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        if (auth()->user()->id != $product->user_id) {
            return abort(403);
        }
        $product->image = json_decode($product->image, true);
        $data = [
            'product' => $product,
            'categories' => Category::all()
        ];
        return view('pages.product.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $validateData = [
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'size' => $request->size,
            'date_product' => $request->date_product,
            'stock' => $request->stock,
        ];
        $image_array = [];
        // if ($request->hasFile('image')) {
        //     foreach ($request->file('image') as $key => $image) {
        //         $image_array[$key] = $image->store('product');
        //     }
        // }
        $new_image = array_filter($request->image, fn ($value) => !is_null($value));
        $old_image = json_decode($product->image, true);
        foreach ($old_image as $key => $image) {
            if (!in_array($image, $new_image)) {
                Storage::delete($image);
            }
        }

        foreach ($new_image as $key => $image) {
            if (is_string($image)) {
                $image_array[$key] = $image;
            } else {
                $image_array[$key] = $image->store('product');
            }
        }
        $validateData['image'] = json_encode($image_array);
        $validateData['user_id'] = auth()->user()->id;
        $product->update($validateData);
        return redirect()->route('katalog')->with('success', 'Product berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if (auth()->user()->id != $product->user_id) {
            return abort(403);
        }
        $image = json_decode($product->image, true);
        foreach ($image as $key => $value) {
            Storage::delete($value);
        }
        $product->delete();
        return redirect()->route('katalog')->with('success', 'Product berhasil dihapus');
    }
}
