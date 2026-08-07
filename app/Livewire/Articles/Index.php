<?php
namespace App\Livewire\Articles;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $category = '';

    protected $queryString = [
        'search' => ['except' => ''],
        'category' => ['except' => ''],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingCategory()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Article::whereNotNull('published_at');

        if ($this->search) {
            $query->where(function($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                  ->orWhere('excerpt', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->category) {
            $query->where('category', $this->category);
        }

        $articles = $query->latest('published_at')->paginate(6);
        
        // Mengambil daftar kategori unik yang tersedia
        $categories = Article::whereNotNull('published_at')
            ->whereNotNull('category')
            ->distinct()
            ->pluck('category');

        return view('livewire.articles.index', [
            'articles' => $articles,
            'categories' => $categories,
        ]);
    }
}