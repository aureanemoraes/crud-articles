<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Article;

class FormArticleSubmit extends Component
{

    public $title;
    public $body;

    public function save()
    {
        $this->validate([
            'title' => 'required',
            'body' => 'required'
        ]);
 
        if (Article::create($this->all()))
            redirect()->route('article.index');
    }

    public function render()
    {
        return view('livewire.form-article-submit');
    }
}
