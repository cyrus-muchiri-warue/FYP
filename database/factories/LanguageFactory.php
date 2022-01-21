<?php

namespace Database\Factories;

use App\Models\Language;
use Illuminate\Database\Eloquent\Factories\Factory;

class LanguageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Language::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
             $name=[
                 'python',
                 'javascript',
                 'ruby',
                 'javascript',
                 'java',
                 'vue js',
                 'mathlab',
                 'jupyter',
                 'php',
                 'tailwindcss',
                 'sass css',
                 'css',
                ' react js',
                 'node js',
             ];

        return [
            //
            'name'=>collect($name)->random(),
            'imageUrl'=>$this->faker->imageUrl(),
            'desc'=>$this->faker->realText()
        ];
    }
}
