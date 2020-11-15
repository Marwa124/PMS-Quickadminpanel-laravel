<?php

namespace App\Http\Livewire;

// use Livewire\WithFileUploads;

use Livewire\Component;

class UploadPhotoWithPreview extends Component
{
    use WithFileUploads;

    public $company_logo;

    public function save()
    {
        $this->validate([
            'company_logo' => 'image|max:1024', // 1MB Max
        ]);

        $this->company_logo->store('company_logos');
    }
}
