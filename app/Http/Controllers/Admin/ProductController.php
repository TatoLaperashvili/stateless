<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Models\Product;


class ProductController extends Controller
{
  public function DeleteProduct($que){
    dd($que);
    $post = Post::where('id', $que)->first();
    if($post->product != ''){
        
    $post->product->delete();
     }
     $post->product = '';

 return response()->json(['success' => 'File Deleted']);

}
}
