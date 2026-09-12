<?php

namespace App\Livewire\Articles;

use Livewire\Component;
use App\Models\Article;
use App\Models\ArticleRating;

class Show extends Component
{
    public Article $article;
    public ?int $userRating = null;
    public float $ratingAverage = 0;
    public int $ratingCount = 0;

    public function mount($slug)
    {
        $this->article = Article::where('slug', $slug)->firstOrFail();
        $this->loadRatings();
    }

    public function rate(int $star)
    {
        if ($this->userRating || $star < 1 || $star > 5) {
            return;
        }

        ArticleRating::firstOrCreate(
            [
                'article_id' => $this->article->id,
                'ip_address' => request()->ip(),
            ],
            ['rating' => $star]
        );

        $this->loadRatings();
    }

    protected function loadRatings(): void
    {
        $this->ratingAverage = (float) $this->article->ratings()->avg('rating');
        $this->ratingCount = $this->article->ratings()->count();
        $this->userRating = $this->article->ratings()
            ->where('ip_address', request()->ip())
            ->value('rating');
    }

    public function render()
    {
        return view('livewire.articles.show')
            ->layout('components.layouts.app');
    }
}