<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Image;
use App\Category;
use App\Product;

class ProductsController extends Controller
{
    //
    public function addProduct(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            if(empty($data['category_id'])){
                return redirect()->back()->with('flash_message_error','Danh Mục Không Được Để Trống');
            }
            $product = new Product;
            $product->category_id = $data['category_id'];
            $product->product_name = $data['product_name'];
            $product->product_code = $data['product_code'];
            $product->product_color = $data['product_color'];
            if(!empty($data['description'])){
                $product->description = $data['description'];
            }else{
                $product->description = '';
            }
            $product->price = $data['price'];

            //Upload Image
            if($request->hasFile('image')){
                $image_tmp = $request->file('image');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,99999).'.'.$extension;
                    $large_image_path = 'images/backend_images/products/large/'.$filename;
                    $media_image_path = 'images/backend_images/products/media/'.$filename;
                    $small_image_path = 'images/backend_images/products/small/'.$filename;
                    //resize image
                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(600,600)->save($media_image_path);
                    Image::make($image_tmp)->resize(300,300)->save($small_image_path);

                    //store image name 
                    $product->image = $filename;
                }
            }
            $product->save();
            return redirect('/admin/view-product')->with('flash_message_success','Thêm Sản Phẩm Thành Công');
        }
        $categories = Category::where(['parent_id' => 0])->get();
        $categories_dropdown = "<option selected disabled> Chọn Danh Mục </option> ";
        foreach($categories as $cats){
            $categories_dropdown .= "<option value='". $cats->id ."'>". $cats->name ."</option>";
            $sub_categories = Category::where(['parent_id' => $cats->id])->get();
            foreach($sub_categories as $sub_cats){
                $categories_dropdown .= "<option value = '" .$sub_cats->id. "'>&nbsp;--&nbsp;" .$sub_cats->name."</option>";
            }
        }
        return view('admin.products.add_product')->with(compact('categories_dropdown'));
    }
    public function viewProduct(){
        $product = Product::join('categories','categories.id','=','products.category_id')->select('products.*','categories.name as cate_name')->get();
        return view('admin.products.view_product')->with(compact('product'));
    }
    public function editProduct(Request $request, $id){
        if($request->isMethod('post')){
            $data = $request->all();
            //Upload Image
            if($request->hasFile('image')){
                $image_tmp = $request->file('image');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,99999).'.'.$extension;
                    $large_image_path = 'images/backend_images/products/large/'.$filename;
                    $media_image_path = 'images/backend_images/products/media/'.$filename;
                    $small_image_path = 'images/backend_images/products/small/'.$filename;
                    //resize image
                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(600,600)->save($media_image_path);
                    Image::make($image_tmp)->resize(300,300)->save($small_image_path);
                }else{
                    $filename = $data['current_image'];
                }
            };
            Product::where(['id' => $id])->update(['category_id' => $data['category_id'],'product_name' => $data['product_name'],'product_code' => $data['product_code'],'product_color' => $data['product_color'],'description' => $data['description'],'price' => $data['price'],'image' => $filename]);
            return redirect('/admin/view-product')->with('flash_message_success','Sửa Sản Phẩm Thành Công');
        }
        $productDetails = Product::where(['id' => $id])->first();
        $categories = Category::where(['parent_id' => 0])->get();
        $categories_dropdown = "<option selected disabled> Chọn Danh Mục </option> ";
        foreach($categories as $cats){
            if($cats->id == $productDetails->category_id){
                $selected = "selected";
            }else{
                $selected = "";
            }
            $categories_dropdown .= "<option value='". $cats->id ."' ".$selected.">". $cats->name ."</option>";
            $sub_categories = Category::where(['parent_id' => $cats->id])->get();
            foreach($sub_categories as $sub_cats){
                if($sub_cats->id == $productDetails->category_id ){
                    $selected = "selected";
                }else{
                    $selected = "";
                }
                $categories_dropdown .= "<option value = '" .$sub_cats->id. "' ".$selected.">&nbsp;--&nbsp;" .$sub_cats->name."</option>";
            }
        }
        return view('admin.products.edit_product')->with(compact('productDetails','categories_dropdown'));
    }
    public function deleteImageProduct($id){
        Product::where(['id' => $id])->update(['image' => '']);
        return redirect()->back()->with('flash_message_success','Hình Ảnh Sản Phẩm Xóa Thành Công');
    }
}
