<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    //
    public function addCategory(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $category = new Category();
            $category->name = $data['category_name'];
            $category->parent_id = $data['parent_id'];
            $category->description = $data['description'];
            $category->url = $data['url'];
            $category->save();
            return redirect('/admin/view-category')->with('flash_message_success','Thêm Danh Mục Thành Công');
        }
        $parent_cate = Category::where(['parent_id' => 0])->get();
        return view('admin.categories.add_category')->with(compact('parent_cate'));
    }
    public function viewCategory(){
        $category = Category::get();
        return view('admin.categories.view_category')->with(compact('category'));
    }
    public function editCategory(Request $request , $id){
        if($request->isMethod('post')){
            $data = $request->all();
            Category::where(['id' => $id])->update(['name' => $data['category_name'],'parent_id' =>$data['parent_id'], 'description' => $data['description'],'url' => $data['url']]);
            return redirect('/admin/view-category')->with('flash_message_success','Sửa Danh Mục Thành Công');
        }
        $cateDetails = Category::where(['id' => $id])->first();
        $parent_cate = Category::where(['parent_id' => 0])->get();
        return view('admin.categories.edit_category')->with(compact('cateDetails','parent_cate'));
    }
    public function deleteCategory($id){
        if(!empty($id)){
            Category::where(['id' => $id])->delete();
            return redirect()->back()->with('flash_message_success','Xóa Danh Mục Thành Công');
        }
    }
}

