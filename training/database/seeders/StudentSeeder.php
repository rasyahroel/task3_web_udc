<?php

namespace Database\Seeders;

use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Schema::enableForeignKeyConstraints();
        // Student::truncate();
        // Schema::disableForeignKeyConstraints();

        // $data = [
        //     ['name' => 'AA', 'gender' => 'L', 'nis' => '001', 'class_id' => 1],
        //     ['name' => 'BB', 'gender' => 'P', 'nis' => '002', 'class_id' => 2],
        //     ['name' => 'CC', 'gender' => 'P', 'nis' => '003', 'class_id' => 3],
        //     ['name' => 'DD', 'gender' => 'L', 'nis' => '004', 'class_id' => 4]
        // ];

        // foreach ($data as $value) {
        //     Student::insert([
        //         'name' => $value['name'],
        //         'gender' => $value['gender'],
        //         'nis' => $value['nis'],
        //         'class_id' => $value['class_id'],
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now()
        //     ]);
        // }

        Student::factory()->count(10)->create();
    }
}
