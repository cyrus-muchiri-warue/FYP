<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name,
            'user_id'=>function(){
                return User::all()->random();
            },
            'desc'=>$this->faker->paragraph(3),
            'status'=>function(){
                $list=['completed','Inprogress','Cancelled'];
                return collect($list)->random();
            },
            'domain'=>function(){
                $list=['decision support','machine learnig','information  system','trasaction system'];
                return collect($list)->random();
            },
            'supervisor'=>$this->faker->firstName(),
            'estBudget'=>$this->faker->numberBetween(50000,100000),
            'amountSpent'=>$this->faker->numberBetween(35000,90000),
            'duration'=>$this->faker->randomDigit(),
            'repoUrl'=>$this->faker->url,
            'liveUrl'=>$this->faker->url,
            
            
        ];
    }
}
