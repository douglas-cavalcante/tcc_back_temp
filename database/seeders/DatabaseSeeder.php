<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(SizeCompanySeeder::class);
        $this->call(CategoryCompanySeeder::class);
        $this->call(TypeCompanySeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PositionSeeder::class);
        $this->call(BenefitSeeder::class);
        $this->call(FacilityPcdSeeder::class);
        $this->call(PersonalityTestSeeder::class);
    }
}
