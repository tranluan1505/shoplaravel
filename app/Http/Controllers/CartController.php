<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
//Them thu vien
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CartController extends Controller
{
    public function save_cart(Request $request){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();

        $productId = $request->productid_hidden;
        $quantity = $request->qty;

        $product_info = DB::table('tbl_product')->where('product_id',$productId)->first();
        //Cart::add('293ad', 'Product 1', 1, 9.99, 550);
        //$data = DB::table()
        //Cart::destroy();
        Cart::add('293ad', 'Product 1', 1, 9.99, 550);
        return view('pages.cart.show_cart')->with('category', $cate_product)->with('brand', $brand_product);
    }
}
