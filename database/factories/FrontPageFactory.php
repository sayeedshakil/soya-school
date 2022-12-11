<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\FrontPage;

class FrontPageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FrontPage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'headerNameEn' => $this->faker->word,
            'headerNameBn' => $this->faker->word,
            'headTeacherImage' => $this->faker->word,
            'headTeacherName' => $this->faker->word,
            'latestNewsText' => $this->faker->text,
            'is_active' => $this->faker->boolean,
            'published_at' => $this->faker->dateTime(),
        ];
    }
}
