<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Http\Request;

class SeoController extends Controller
{
    public function show(Request $request)
    {
        $groups = config('seo.groups', []);
        $seo = $request->all();

        return view('seo', compact('groups', 'seo'));
    }

    public function randomize()
    {
        $faker = Factory::create();

        $values =
            $this->getRandomCommon($faker)
          + $this->getRandomOpenGraph($faker)
          + $this->getRandomTwitter($faker);

        return redirect()->route('show', $values);
    }

    protected function getRandomCommon($faker)
    {
        return [
            'title' => $faker->sentence(),
            'description' => $faker->paragraph(),
            'author' => $faker->name,
            'keywords' => implode(',', $faker->words()),
            'canonical' => url('/'),
        ];
    }

    protected function getRandomOpenGraph($faker)
    {
        return [
            'og-title' => $faker->sentence(),
            'og-description' => $faker->paragraph(),
            'og-type' => 'summary',
            'og-url' => url('/'),
            'og-sitename' => $faker->sentence(),
            'og-image' => $faker->imageUrl(600, 600, 'cats'),
            'og-image-type' => 'image/jpeg',
            'og-image-width' => 600,
            'og-image-height' => 600,
        ];
    }

    protected function getRandomTwitter($faker)
    {
        return [
            'twitter-card' => 'summary',
            'twitter-site' => $faker->sentence(),
            'twitter-url' => url('/'),
            'twitter-title' => $faker->sentence(),
            'twitter-description' => $faker->paragraph(),
            'twitter-image' => $faker->imageUrl(600, 600, 'cats'),
        ];
    }
}
