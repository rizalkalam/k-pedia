<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MemberSeeder extends Seeder
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
                'name'=>'Lalisa Manobal',
                'age'=>25,
                'birth_place'=>'Buriram Thailand',
                'birth_date'=>'1997-03-27',
                'image'=>'lisa.jpg',
                'group_id'=>1,
            ],

            [
                'name'=>'Im Na-yeon (임나연)',
                'age'=>27,
                'birth_place'=>'Seoul, South Korea',
                'birth_date'=>'1995-09-22',
                'image'=>'nayeon.jpg',
                'group_id'=>2,
            ],

            [
                'name'=>'Kim Ga-eul (김가을)',
                'age'=>20,
                'birth_place'=>'Bupyeong-dong, Bupyeong-gu, Incheon, South Korea',
                'birth_date'=>'2002-09-24',
                'image'=>'gaeul.jpg',
                'group_id'=>3,
            ],
        ])->each(function ($member){
            DB::table('members')->insert($member);
        });
    }
}
