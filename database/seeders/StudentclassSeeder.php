<?php

namespace Database\Seeders;

use App\Models\Studentclass;
use Illuminate\Database\Seeder;

class StudentclassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Studentclass::create(['name'=>'Play(প্লে)']);
        // Studentclass::create(['name'=>'Nursery(নার্সারী)']);
        // Studentclass::create(['name'=>'One(প্রথম)']);
        // Studentclass::create(['name'=>'Two(দ্বিতীয়)']);
        // Studentclass::create(['name'=>'Three(তৃতীয়)']);
        // Studentclass::create(['name'=>'Four(চতুর্থ)']);
        // Studentclass::create(['name'=>'Five(পঞ্চম)']);
        // Studentclass::create(['name'=>'Six(ষষ্ঠ)']);
        // Studentclass::create(['name'=>'Seven(সপ্তম)']);
        // Studentclass::create(['name'=>'Eight(অষ্টম)']);
        // Studentclass::create(['name'=>'Nine(নবম)']);
        // Studentclass::create(['name'=>'Ten(দশম)']);

        Studentclass::create(['name'=>'Play']);
        Studentclass::create(['name'=>'Nursery']);
        Studentclass::create(['name'=>'One']);
        Studentclass::create(['name'=>'Two']);
        Studentclass::create(['name'=>'Three']);
        Studentclass::create(['name'=>'Four']);
        Studentclass::create(['name'=>'Five']);
        Studentclass::create(['name'=>'Six']);
        Studentclass::create(['name'=>'Seven']);
        Studentclass::create(['name'=>'Eight']);
        Studentclass::create(['name'=>'Nine']);
        Studentclass::create(['name'=>'Ten']);
    }
}
