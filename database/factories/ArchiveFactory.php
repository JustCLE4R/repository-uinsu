<?php

namespace Database\Factories;

use App\Models\Archive;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Archive>
 */
class ArchiveFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Archive::class;

    public function definition(): array
    {
        $data = json_decode(file_get_contents(public_path('json/fakultas.json')), true);

        $fakultas = $this->faker->randomElement(array_keys($data));
        $program_studi = $this->faker->randomElement($data[$fakultas]);

        return [
            "user_id" => fake()->numberBetween(1, 3),
            "type" => fake()->word(),
            "title" => fake()->words(3, true),
            "abstract" => fake()->paragraph(2),
            "editor" => fake()->name(),
            "file" => "archives/op9UldzdnFNniThBhjNxUlmJ7wjOoFHWkP9OYonq.png",
            "penerbit" => fake()->company(),
            "tempat_terbit" => fake()->address(),
            "isbn_issn" => fake()->isbn10(),
            "official_url" => fake()->url(),
            "date" => fake()->dateTimeBetween('2000-01-01', 'now')->format('Y-m-d'),
            "volume" => fake()->numberBetween(1, 1000),
            "number" => fake()->numberBetween(1, 1000),
            "page" => fake()->numberBetween(1, 1000),
            "identification_number" => fake()->numberBetween(1, 1000),
            "journal_name" => fake()->word(3, true),
            "subject_id" => Subject::all()->random()->id,
            "nomor_klasifikasi" => fake()->numberBetween(1000000000, 9999999999),
            "fakultas" => $fakultas,
            'program_studi' => $program_studi,
            "status" => fake()->randomElement(['accepted', 'rejected', 'pending']),
            "reject_reason" => null,
            "accepted_at" => null,
        ];
    }
}
