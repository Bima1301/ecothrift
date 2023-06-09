<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingProductRequest;
use App\Models\BookingProduct;
use App\Models\PayoutProduct;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        return view('pages.home');
    }
    public function profile(Request $request)
    {
        $user = $request->user();
        return view('pages.profile.edit', compact('user'));
    }
    public function katalog(Request $request)
    {
        $products = Product::join('categories', 'products.category_id', '=', 'categories.id')->where('categories.name', '=', $request->input('kategori'))
            ->select('products.*', 'categories.name as category_name')->where(function ($query) use ($request) {
                if ($request->has('search')) {
                    $query->where('products.name', 'like', '%' . $request->search . '%');
                }
            })
            ->get();
        foreach ($products as $product) {
            $firstImage = json_decode($product->image, true);
            $product->image = array_key_exists(0, $firstImage) ? $firstImage[0] : reset($firstImage);
        }
        // dd($products);
        $products_women = Product::with('categories')->where('category_id', 1)->where(function ($query) use ($request) {
            if ($request->has('search')) {
                $query->where('products.name', 'like', '%' . $request->search . '%');
            }
        })->get();
        foreach ($products_women as $product) {
            $firstImage = json_decode($product->image, true);
            $product->image = array_key_exists(0, $firstImage) ? $firstImage[0] : reset($firstImage);
        }
        $products_man = Product::with('categories')->where('category_id', 2)->where(function ($query) use ($request) {
            if ($request->has('search')) {
                $query->where('products.name', 'like', '%' . $request->search . '%');
            }
        })->get();
        foreach ($products_man as $product) {
            $firstImage = json_decode($product->image, true);
            $product->image = array_key_exists(0, $firstImage) ? $firstImage[0] : reset($firstImage);
        }
        $products_kids = Product::with('categories')->where('category_id', 3)->where(function ($query) use ($request) {
            if ($request->has('search')) {
                $query->where('products.name', 'like', '%' . $request->search . '%');
            }
        })->get();
        foreach ($products_kids as $product) {
            $firstImage = json_decode($product->image, true);
            $product->image = array_key_exists(0, $firstImage) ? $firstImage[0] : reset($firstImage);
        }
        $products_accessories = Product::with('categories')->where('category_id', 4)->where(function ($query) use ($request) {
            if ($request->has('search')) {
                $query->where('products.name', 'like', '%' . $request->search . '%');
            }
        })->get();
        foreach ($products_accessories as $product) {
            $firstImage = json_decode($product->image, true);
            $product->image = array_key_exists(0, $firstImage) ? $firstImage[0] : reset($firstImage);
        }
        $data = [
            'products' => $products,
            'products_women' => $products_women,
            'products_man' => $products_man,
            'products_kids' => $products_kids,
            'products_accessories' => $products_accessories,
        ];

        return view('pages.katalog', $data);
    }
    public function checkout($idProduct)
    {
        $product = Product::find($idProduct);
        $product->image = json_decode($product->image, true);
        return view('pages.checkout', compact('product'));
    }
    public function bookingProduct(BookingProductRequest $request, $idProduct)
    {
        // dd($request->all());
        $product = Product::find($idProduct);
        $validatedData = [
            'sender_name' => $request->sender_name,
            'address' => $request->address,
            'postal_code' => $request->postal_code,
            'city' => $request->city,
            'province' => $request->province,
            'district' => $request->district,
            'quantity' => $request->quantity,
            'product_id' => $idProduct,
            'total_price' => $request->quantity * $product->price,
            'code' => Str::random(8) . '-' . time(),
        ];
        if (auth()->user()) {
            $validatedData['user_id'] = auth()->user()->id;
        } else {
            $validatedData['email'] = $request->email;
            $validatedData['no_hp'] = $request->no_hp;
        }
        $booking_product = BookingProduct::create($validatedData);

        return redirect()->route('payout', $booking_product->code);
    }

    public function payout($code)
    {
        $booking = BookingProduct::where('code', $code)->first();
        $product = Product::find($booking->product_id);
        $product->image = json_decode($product->image, true);
        // dd($booking);
        return view('pages.payout', compact('booking', 'product'));
    }
    public function payoutVerify(Request $request, $code)
    {
        $booking = BookingProduct::where('code', $code)->first();
        $product = Product::find($booking->product_id);
        $booking->status = 'paid';
        $booking->save();
        $product->stock = $product->stock - $booking->quantity;
        $product->save();

        $validatedData = [
            'paid_price' => $request->paid_price,
            'payment_method' => $request->payment_method,
            'booking_product_id' => $booking->id,
        ];
        PayoutProduct::create($validatedData);
        return redirect()->route('payout.success', $booking->code);
    }
    public function payoutSuccess($code)
    {
        $booking = BookingProduct::where('code', $code)->first();
        if ($booking->status != 'paid') {
            return redirect()->back();
        }
        return view('pages.payoutSuccess');
    }

    public function updateUserProfil(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->no_hp = $request->no_hp;
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->save();
        return redirect()->back();
    }
}
