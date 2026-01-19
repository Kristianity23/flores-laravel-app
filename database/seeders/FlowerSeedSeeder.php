<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FlowerSeed;

class FlowerSeedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FlowerSeed::create([
            'seed_name' => 'Crimson Red Rose Seeds',
            'category' => 'Rose',
            'price' => 12.99,
            'quantity' => 50,
            'germination_time' => '7-14 days',
            'bloom_time' => '60-90 days',
            'description' => 'Beautiful deep crimson rose seeds perfect for any garden. These premium seeds produce stunning large blooms with rich fragrance.',
            'color' => 'Crimson Red',
            'height' => '24-36 inches',
            'status' => 'Available'
        ]);

        FlowerSeed::create([
            'seed_name' => 'Giant Golden Sunflower',
            'category' => 'Sunflower',
            'price' => 8.99,
            'quantity' => 100,
            'germination_time' => '7-10 days',
            'bloom_time' => '70-100 days',
            'description' => 'Grow towering sunflowers with golden-yellow blooms. Perfect for attracting pollinators to your garden.',
            'color' => 'Golden Yellow',
            'height' => '72-96 inches',
            'status' => 'Available'
        ]);

        FlowerSeed::create([
            'seed_name' => 'Purple Dutch Tulips',
            'category' => 'Tulip',
            'price' => 14.99,
            'quantity' => 75,
            'germination_time' => '14-21 days',
            'bloom_time' => '45-60 days',
            'description' => 'Elegant purple tulips with smooth petals. Ideal for spring gardens and cut flower arrangements.',
            'color' => 'Deep Purple',
            'height' => '18-28 inches',
            'status' => 'Available'
        ]);

        FlowerSeed::create([
            'seed_name' => 'White Daisy Flowers',
            'category' => 'Daisy',
            'price' => 6.99,
            'quantity' => 120,
            'germination_time' => '10-15 days',
            'bloom_time' => '50-70 days',
            'description' => 'Cheerful white daisies with yellow centers. Easy to grow and perfect for creating a cottage garden feel.',
            'color' => 'White with Yellow Center',
            'height' => '12-24 inches',
            'status' => 'Available'
        ]);

        FlowerSeed::create([
            'seed_name' => 'Oriental Lily Mix',
            'category' => 'Lily',
            'price' => 16.99,
            'quantity' => 40,
            'germination_time' => '14-21 days',
            'bloom_time' => '90-120 days',
            'description' => 'Premium mix of oriental lilies with exotic fragrances. Stunning trumpet-shaped blooms in various colors.',
            'color' => 'Mixed Colors',
            'height' => '36-48 inches',
            'status' => 'Available'
        ]);

        FlowerSeed::create([
            'seed_name' => 'Lavender Elegance',
            'category' => 'Lavender',
            'price' => 9.99,
            'quantity' => 85,
            'germination_time' => '14-21 days',
            'bloom_time' => '80-100 days',
            'description' => 'Beautiful aromatic lavender flowers. Perfect for drying, crafts, and adding fragrance to your garden.',
            'color' => 'Purple Lavender',
            'height' => '24-36 inches',
            'status' => 'Available'
        ]);

        FlowerSeed::create([
            'seed_name' => 'Marigold Sunshine',
            'category' => 'Marigold',
            'price' => 5.99,
            'quantity' => 150,
            'germination_time' => '5-10 days',
            'bloom_time' => '40-50 days',
            'description' => 'Bright and cheerful marigolds that bloom continuously throughout the season. Excellent for borders and containers.',
            'color' => 'Bright Orange-Yellow',
            'height' => '16-20 inches',
            'status' => 'Available'
        ]);

        FlowerSeed::create([
            'seed_name' => 'Zinnias Rainbow Mix',
            'category' => 'Zinnia',
            'price' => 7.49,
            'quantity' => 95,
            'germination_time' => '7-10 days',
            'bloom_time' => '60-90 days',
            'description' => 'Vibrant zinnia mix with a stunning array of colors. Perfect for cut flowers and adding color to any garden.',
            'color' => 'Rainbow Mix',
            'height' => '24-36 inches',
            'status' => 'Available'
        ]);

        FlowerSeed::create([
            'seed_name' => 'Peony Double Bloom',
            'category' => 'Peony',
            'price' => 18.99,
            'quantity' => 30,
            'germination_time' => '21-30 days',
            'bloom_time' => '100-120 days',
            'description' => 'Luxurious double-petaled peonies with a sweet fragrance. These perennial favorites produce large, showy blooms.',
            'color' => 'Pink and White',
            'height' => '30-42 inches',
            'status' => 'Available'
        ]);
    }
}
