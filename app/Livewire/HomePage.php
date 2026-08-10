<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Service;
use App\Models\Experience;
use App\Models\Contact;

class HomePage extends Component
{
    public $name = '';
    public $email = '';
    public $message = '';

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email',
        'message' => 'required|min:5',
    ];

    public function submitContact()
    {
        $this->validate();

        Contact::create([
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->message,
        ]);

        session()->flash('success', 'Pesan Anda berhasil dikirim!');

        $this->reset(['name', 'email', 'message']);
    }
 public function render()
{
    return view('livewire.home-page', [
        'projects' => Project::latest()->get(),
        'skills' => Skill::orderBy('category')->orderBy('proficiency_percentage', 'desc')->get(),
        'services' => Service::latest()->get(),
        'experiences' => Experience::orderBy('start_date', 'desc')->get(),
    ]);
}
}