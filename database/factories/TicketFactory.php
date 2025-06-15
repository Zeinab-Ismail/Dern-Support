<?php

namespace Database\Factories;

use App\DeliveryMethod;
use App\Models\Employees;
use App\Models\User;
use App\TicketStatus;
use App\UserType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::pluck('id');
        $fullNames = Employees::select(DB::raw("CONCAT(first_name, ' ', last_name) AS full_name"))->pluck('full_name');
        return [
            'title' => fake()->sentence(3),
            'description' => fake()->paragraph(),
            'delivery_method' => fake()->randomElement(DeliveryMethod::cases())->value,
            'user_type' => fake()->randomElement(UserType::cases())->value,
            'status' => fake()->randomElement(TicketStatus::cases())->value,
            'user_id' => $users->random(),
            'employee' => $fullNames->random(),
            'price' => fake()->randomFloat(2, 100, 1000),
        ];
    } 
}
