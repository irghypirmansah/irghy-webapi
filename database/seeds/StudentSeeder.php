<?php

use Illuminate\Database\Seeder;
use App\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Student::create([
	        'nama' => 'irghy',
	        'jk' => 'L'
        ]);
        Student::create([
	        'nama' => 'pirmansah',
	        'jk' => 'P'
        ]);
         Student::create([
            'nama' => 'pirman',
            'jk' => 'L'
        ]);
          Student::create([
            'nama' => 'saya',
            'jk' => 'L'
        ]);
           Student::create([
            'nama' => 'dia',
            'jk' => 'P'
        ]);
            Student::create([
            'nama' => 'yang telah pergi',
            'jk' => 'P'
        ]);
            Student::create([
            'nama' => 'yang baru',
            'jk' => 'P'
        ]);
            for ($i=0; $i < 20; $i++) { 
              if ($i < 10) {
                $jk = 'L';
              }
              Student::create([
                'nama' => 'Ambyar-' . $i,
                'jk' => $jk
              ]);
            }
    }
}
