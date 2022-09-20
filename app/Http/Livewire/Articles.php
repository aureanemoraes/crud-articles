<?php

namespace App\Http\Livewire;

use App\Models\Article;

use Livewire\Component;

class Articles extends Component
{
    public $articles, $title, $body, $article_id;

    public function render()
    {
        $this->articles = Article::orderBy('created_at', 'desc')->get();

        return view('livewire.articles');
    }

    public function store() {
        $data_valid = $this->validate([
            'title'     => 'required',
            'body'      => 'required'
        ]);

        Article::create($data_valid);

        session()->flash('message', 'Save.');

        $this->cancel();
    }

    public function loadData($id) {
        // $this->cancel();
        
        $model =                Article::findOrFail($id);
        $this->article_id =     $model->id;
        $this->title =          $model->title;
        $this->body =           $model->body;
    }

    public function cancel() {
        $this->resetInputFieds();
        $this->resetValidation();
        $this->emit('closeModal');
    }

    public function update() {
        $data_valid = $this->validate([
            'title'     => 'required',
            'body'      => 'required'
        ]);

        if ($this->article_id) {
            $model = Article::findOrFail($this->article_id);
            $model->update([
                'title' => $this->title,
                'body' => $this->body
            ]);


            $this->cancel();
            session()->flash('message', 'Updated.');

        }
    }

    public function delete() {
        if ($this->article_id) {
            $model = Article::findOrFail($this->article_id);
            $model->delete();
            $this->cancel();
            session()->flash('message', 'Deleted.');
        }
    }

    private function resetInputFieds() {
        $this->title = '';
        $this->body = '';
    }
}
