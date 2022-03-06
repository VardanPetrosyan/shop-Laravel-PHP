<?php

namespace App\Http\Controllers;

use App\InfoProduct;
use App\Product;
use App\TranslationLang;
use Illuminate\Http\Request;
use App\Http\Requests\CategorieRequest;
use App\Http\Requests\ProductRequest;
use App\Category;
use DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Type;
use Illuminate\Database\Eloquent\Model;
use File;

class CategoryController extends Controller
{

// ----  url practica.loc view categories.blade.php adn send variable $categories,$products

    public function index()
    {

        $categories = Category::whereNull('category_id')
            ->with('childrenCategories')
            ->get();
        $products = Product::all();

        return view('categories', ['categories'=>$categories, 'products'=>$products]);
    }


//----insert parent and child category into 'Categories' table using the Category model

    public function categorie_Add(CategorieRequest $request){
        if($request->id != 'null'){
           $id =  $request->id;
        }else{
            $id = Null;
        }
//        $file = 'title.json';
//        $destinationPath = storage_path('..\resources\lang\\');
//        $path = storage_path('..\resources\lang\\'.$file);
//        $lang = json_decode(file_get_contents($path), true);
//        $lang[$request->categori_name] = $request->categori_name;
//        File::put($destinationPath.$file, json_encode($lang));
        $translation_table = TranslationLang::all();
        foreach ($translation_table as $language){
            $lang = $language->folder;
            $file = $lang.'.json';
            $destinationPath=storage_path('..\resources\lang\\');
            $path_ru = storage_path('..\resources\lang\\'.$file);
            $lang = json_decode(file_get_contents($path_ru), true);
            $lang[$request->categori_name] = $request->categori_name;
            File::put($destinationPath.$file, json_encode($lang));

        }
        Category::create([
            'name' => $request->categori_name,
            'category_id'=> $id,
            'role' => $request->role,
        ]);
        return redirect()->back();

    }

//    ---- remove parent and child categories(products) withe categories and products tables
    public function categorie_Remove(Request $request){
        Category::where('id', $request->id)->delete();
        Category::where('category_id', $request->id)->delete();
        Product::where('parent_id', $request->id)->delete();
        return redirect()->back();

    }

//----- url practica.loc/addProduct view addProduct.blade.php and send variable $categories,$products

    public function addProduct()
    {
        $categories = Category::whereNull('category_id')
            ->with('childrenCategories')
            ->get();
        $products = Product::all();
        return view('add_product', ['categories'=>$categories,'products'=>$products]);
    }

    //----insert parent and child product into 'product' and 'categories' tables using the Category and Product models
    //-- copy img to /img folder and crypt name

    public function product_Add(ProductRequest $request){
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/img');
            $name = Crypt::encrypt($name);
            $image->move($destinationPath, $name);
        }else{
            $name = null;
        }
        $translation_table = TranslationLang::all();
        foreach ($translation_table as $language){
            $lang = $language->folder;
            $file = $lang.'.json';
            $destinationPath=storage_path('..\resources\lang\\');
            $path_ru = storage_path('..\resources\lang\\'.$file);
            $lang = json_decode(file_get_contents($path_ru), true);
            $lang[$request->product_name] = $request->product_name;
            $lang[$request->product_description] = $request->product_description;
            File::put($destinationPath.$file, json_encode($lang));

        }
        Product::create([
            'parent_id'=>$request->id,
            'img' => $name,
            'name' => $request->product_name,
            'descriptions' => $request->product_description,
            'price' => $request->price,
        ]);
        Category::create([
            'name' => $request->product_name,
            'category_id'=>$request->id,
            'role' => $request->role,
        ]);

        return redirect()->back();

    }

    //    ---- remove parent and child categories,products(info_product) withe categories,products and info_products tables

    public function product_Remove(Request $request){

        if(is_array($request->product_array))
        {
            $translation_table = TranslationLang::all();
            if($request->product == 'save'){

                foreach ($request->product_array as $req) {
                    dd($request->product_array);
                    $id = Product::where('name',$req)->get();
                    $destinationPath = public_path('img');
                    $name = $id[0]["img"];
                    unlink("$destinationPath/$name");
                    if ($request->hasFile('img')) {
                        $image = $req->file('img');
                        $name = time() . '.' . $image->getClientOriginalExtension();
                        $destinationPath = public_path('/img');
                        $name = Crypt::encrypt($name);
                        $image->move($destinationPath, $name);
                    } else {
                        $name = null;
                    }

                    foreach ($translation_table as $language){
                        $lang = $language->folder;
                        $file = $lang.'.json';
                        $destinationPath=storage_path('..\resources\lang\\');
                        $path_ru = storage_path('..\resources\lang\\'.$file);
                        $lang = json_decode(file_get_contents($path_ru), true);
                        $lang[$req->product_name] = $req->product_name;
                        $lang[$req->product_description] = $req->product_description;
                        File::put($destinationPath.$file, json_encode($lang));

                    }
                    Product::ubdate([
                        'parent_id' => $req->id,
                        'img' => $name,
                        'name' => $req->product_name,
                        'descriptions' => $req->product_description,
                        'price' => $req->price,
                    ]);
                }
            } else{

                foreach ($request->product_array as $req){
                    $id = Product::where('name',$req)->get();
                    $destinationPath = public_path('img');
                    $name = $id[0]["img"];
                    unlink("$destinationPath/$name");
                    DB::delete('delete from categories where name = ?',[$req]);
                    DB::delete('delete from products where name = ?',[$req]);
                    DB::delete('delete from info_product where parent_id = ?',[ $id[0]["id"]]);
                }
            }
        }else{
            if($request->product == 'save'){
                $id = Product::where('name',$request->product_name)->get();
                if ($request->hasFile('img')) {
                    $destinationPath = public_path('img');
                    $name = $id[0]["img"];
                    if($name){
                        unlink("$destinationPath/$name");
                    }
                    $image = $request->file('img');
                    $name = time() . '.' . $image->getClientOriginalExtension();
                    $destinationPath = public_path('/img');
                    $name = Crypt::encrypt($name);
                    $image->move($destinationPath, $name);
                } else {
                    $name = $id[0]->img;
                }
                $translation_table = TranslationLang::all();
                foreach ($translation_table as $language){
                    $lang = $language->folder;
                    $file = $lang.'.json';
                    $destinationPath=storage_path('..\resources\lang\\');
                    $path_ru = storage_path('..\resources\lang\\'.$file);
                    $lang = json_decode(file_get_contents($path_ru), true);
                    $lang[$request->edit_product_name] = $request->edit_product_name;
                    $lang[$request->product_description] = $request->product_description;
                    File::put($destinationPath.$file, json_encode($lang));

                }
                Category::where('name',$request->product_name)->update([
                    'name' => $request->edit_product_name,
                    'category_id' => $request->id,
                ]);

                Product::where('name',$request->product_name)->update([
                    'parent_id' => $request->id,
                    'name' => $request->edit_product_name,
                    'descriptions' => $request->product_description,
                    'img' => $name,
                    'price' => $request->price,
                ]);
            } else{

                $id = Product::where('name', $request->product_name)->get();
                $destinationPath = public_path('img');
                $name = $id[0]["img"];
                unlink("$destinationPath/$name");
                DB::delete('delete from categories where name = ?', [$request->product_name]);
                DB::delete('delete from products where name = ?', [$request->product_name]);
                DB::delete('delete from info_product where parent_id = ?', [$id[0]["id"]]);
            }
        }
        unset($lang);
        return redirect()->back();

    }

    public function showProduct(Request $request)
    {
        $categories = Category::whereNull('category_id')
            ->with('childrenCategories')
            ->get();
        if($request->categorie){
            $categoryIds = Category::where('category_id', $parentId = Category::where('name', $request->categorie)
                ->value('id'))
                ->pluck('id')
                ->push($parentId)
                ->all();
            $products_info = Product::whereIn('parent_id', $categoryIds)->get();

            return view('product_categories_show.category', ['categories'=>$categories,'products_info'=>$products_info]);

        }else {
            $productIds = Product::where('parent_id', $parentId = Product::where('name', $request->product)
                ->value('id'))
                ->pluck('id')
                ->push($parentId)
                ->all();
            $products_info_ubdate = InfoProduct::whereIn('parent_id', $productIds)->get();
            $products_info = Product::where('name', $request->product)->get();

            return view('product_categories_show.product', ['categories'=>$categories,'products_info'=>$products_info,'products_info_ubdate'=>$products_info_ubdate]);
        }


    }

//    ------------------------- insert info products in table info product  table using the InfoProduct model

    public function Product_Info_add(Request $request)

    {

        $request->validate([

            'addmore.*.title' => 'required',
            'addmore.*.description' => 'required',

        ]);

        foreach ($request->addmore as $key => $value) {
            $translation_table = TranslationLang::all();
            foreach ($translation_table as $language){
                $lang = $language->folder;
                $file = $lang.'.json';
                $destinationPath=storage_path('..\resources\lang\\');
                $path_ru = storage_path('..\resources\lang\\'.$file);
                $lang = json_decode(file_get_contents($path_ru), true);
                $lang[$value['title']] = $value['title'];
                $lang[$value['description']] = $value['description'];
                File::put($destinationPath.$file, json_encode($lang));

            }
            InfoProduct::create([
                        'parent_id' => $value['parent_id'],
                        'title' => $value['title'],
                        'description' => $value['description'],
        ]);

        }

        return back()->with('success', 'Record Created Successfully.');

    }


}
