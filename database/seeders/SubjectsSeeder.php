<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class SubjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Path to your JSON file
        $jsonPath = public_path('json/ddc.json');
        
        // Read the JSON file
        $jsonData = File::get($jsonPath);
        
        // Decode JSON data into an associative array
        $ddcData = json_decode($jsonData, true);
        
        // Iterate over the DDC data and insert it into the database
        foreach ($ddcData as $code => $classData) {
            $className = $classData['class'];
            Subject::create([
                'code' => $code,
                'name' => $className
            ]);
            
            foreach ($classData['subclasses'] as $subCode => $subClassName) {
                Subject::create([
                    'code' => $subCode,
                    'name' => $subClassName
                ]);
            }
        }
    }
}
