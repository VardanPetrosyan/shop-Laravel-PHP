<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TranslationLang extends Model
{
    protected $table = 'lang_translation';
    protected $fillable = [
        'name',
        'flag',
        'folder',
        'translation',
    ];
}
