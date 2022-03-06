<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\TranslationLang;
use Illuminate\Support\Facades\Storage;
use File;
use function MongoDB\BSON\toJSON;

class TranslationController extends Controller
{
    // ----  url practica.loc view categories.blade.php adn send variable $categories,$products

    public function translation()
    {
        $lang = TranslationLang::all();
//        $f = 'title.json';
//        $p = storage_path('..\resources\lang\\'.$f);
//        $title_table = json_decode(file_get_contents($p), true);
//        $val = array_values($title_table);
//        foreach ($lang as $language){
//            $lang = $language->folder;
//            $lang = 'ru';
//            $file = $lang.'.json';
//            $destinationPath=storage_path('..\resources\lang\\');
//            $path_ru = storage_path('..\resources\lang\\'.$file);
//            $lang = json_decode(file_get_contents($path_ru), true);
//                $lang["lang"] = '$text';
//            $keys = array_values( $lang );
//            $lang = array_combine( $val, $keys );
////            dd($lang);
//
//            File::put($destinationPath.$file, json_encode($lang));
//
//        }
        return view('admin.admin_layouts.translation',['lang'=>$lang]);
    }
    public function CreatLang(Request $request)
    {

        TranslationLang::create([
            'name'=> $request->name,
            'flag'=> $request->flag,
            'folder'=> $request->folder,
        ]);
        $path_ru = storage_path('..\resources\lang\title.json');
        $lang = json_decode(file_get_contents($path_ru), true);
        $file = $request->folder.'.json';
        $destinationPath=storage_path('..\resources\lang\\');
        File::put($destinationPath.$file, json_encode($lang));
        unset($lang);
        return redirect()->back();


    }
    public function creatJSON(Request $request)
    {
        $title =  $request->title;
        $text = $request->translation;
        $language = $request->lang;
        $file = $language.'.json';
        $destinationPath=storage_path('..\resources\lang\\');
        $path_ru = storage_path('..\resources\lang\\'.$file);
        $lang = json_decode(file_get_contents($path_ru), true);
        $lang["$title"] = $text;
        File::put($destinationPath.$file, json_encode($lang));
        unset($lang);
    }
    public function deletLang(Request $request){
        TranslationLang::where('folder', $request->folder)->delete();
        $language = $request->folder;
        $file = $language.'.json';
        $destinationPath=storage_path('..\resources\lang\\');
        $path_ru = storage_path('..\resources\lang\\'.$file);
        $lang = json_decode(file_get_contents($path_ru), true);
        File::delete($destinationPath.$file);
        unset($lang);
        return redirect()->back();
    }

}
