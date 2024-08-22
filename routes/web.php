<?php

use App\Events\UserRegisterd;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Jobs\SendMail;
use App\Models\Post;
use App\Models\User;
use App\Models\Product;
use App\Models\KhachHang;
use App\Models\LuongQuocHoi;
use App\Models\DucQuoc;

use App\Mail\PostPublished;
use App\DataTables\UsersDataTable;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $products = KhachHang::find(1);
    return view('ashop', ['products' => $products]);
});
Route::get('/duc_quoc', function () {
    $DucQuoc = DucQuoc::all();
    return view('ashop', ['duc_quoc' => $DucQuoc]);
});

Route::get('/khachhang', function () {
    $KhachHang = KhachHang::all();
    return view('ashop_list', ['KhachHang' => $KhachHang]);
});

Route::get('/luongquochoi', function () {
    $LuongQuocHoi = LuongQuocHoi::all();
    return view('ashop_list', ['luongquochoi' => $LuongQuocHoi]);
});

Route::get('/product/{id}', function ($id) {
    $product = Product::find($id);
    if (!$product) {
        abort(404, 'Product not found');
    }
    return view('ashop_detail', [
        'product' => $product,
        'flag' => 1
    ]);
});


Route::get('login', [App\Http\Controllers\LoginController::class, 'handleLogin'])->name('login');
Route::get('register', [App\Http\Controllers\LoginController::class, 'register'])->name('register');;
