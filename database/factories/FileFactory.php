<?php

namespace Database\Factories;

use App\Models\File;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class FileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = File::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $list=[
            'chapter 1.docx',
            'chapter 2.docx',
            'chapter 3.docx',
            'chapter 4.docx',
            'chapter 5.docx',
            'chapter 6.docx'
        ];
        $list1=[
            'chapter 1',
            'chapter 2',
            'chapter 3',
            'chapter 4',
            'chapter 5',
            'chapter 6'
        ];
        return [
            'name'=>collect($list)->random(),
            'project_id'=>function(){
                return Project::all()->random();
            },
            'chapter'=>collect($list1)->random(),
            
            
        ];
    }
}
