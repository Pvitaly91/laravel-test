<?php

namespace Tests\\Feature;

use App\\Models\\News;
use Illuminate\\Foundation\\Testing\\RefreshDatabase;
use Tests\\TestCase;

class NewsTest extends TestCase
{
    use RefreshDatabase;

    public function test_news_index_is_accessible(): void
    {
        News::factory()->create();
        $response = $this->get('/news');
        $response->assertStatus(200);
    }

    public function test_news_show_is_accessible(): void
    {
        $news = News::factory()->create();
        $response = $this->get('/news/' . $news->id);
        $response->assertStatus(200);
    }
}
