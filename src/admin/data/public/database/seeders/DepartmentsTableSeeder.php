<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dept = \App\Department::first();

        for($i=1;$i <= 50; $i++){
            $newDept = $dept->replicate();
            $newDept->name = $newDept->name. ' '.$i;
            $newDept->save();
        }

    }
}
