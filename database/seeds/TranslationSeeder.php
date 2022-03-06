<?php

use Illuminate\Database\Seeder;
use App\TranslationLang;
class TranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('lang_translation')->delete();

        \DB::table('lang_translation')->insert(array (
            0 =>
                array (
                    'name' => 'title',
                    'flag' => 'title',
                    'folder' => 'title',
                ),
            1 =>
                array (
                    'name' => 'United States of America',
                    'flag' => 'https://restcountries.eu/data/usa.svg',
                    'folder' => 'US',
                ),
        ));
    }
}
