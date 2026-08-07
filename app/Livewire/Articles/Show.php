<?php

namespace App\Livewire\Articles;

use Livewire\Component;
use App\Models\Article;

class Show extends Component
{
    public Article $article;

    public function mount($slug)
    {
        $this->article = Article::where('slug', $slug)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.articles.show')
            ->layout('components.layouts.app');
    }
}