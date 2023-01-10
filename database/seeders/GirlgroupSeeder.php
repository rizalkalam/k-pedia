<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GirlgroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            [
                'group_name'=>'Blackpink',
                'group_description'=>'BLACKPINK (블랙핑크; stylized as BLΛƆKPIИK ) is a four-member girl group formed by YG Entertainment. They debuted on August 8, 2016 with their digital single album "Square One ". On May 31, YG',
                'group_image'=>'blackpink.jpg',
            ],

            [
                'group_name'=>'Twice',
                'group_description'=>'TWICE (트와이스) is a nine-member girl group under JYP Entertainment. Formed through the reality show SIXTEEN, they debuted on October 20, 2015 with the mini album The Story Begins. In December',
                'group_image'=>'twice.jpg',
            ],

            [
                'group_name'=>'Ive',
                'group_description'=>'IVE (아이브) is a six-member girl group under Starship Entertainment. They debuted on December 1, 2021 with their single album “Eleven ”. Their name is an abbreviation for "I Have".',
                'group_image'=>'ive.jpg',
            ],
        ])->each(function ($girlgroup){
            DB::table('girlgroups')->insert($girlgroup);
        });
    }
}
