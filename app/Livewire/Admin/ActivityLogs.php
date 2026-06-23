<?php

namespace App\Livewire\Admin;

use App\Models\ActivityLog;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class ActivityLogs extends Component
{
    use WithPagination;

    #[Title('Activity Logs')]

    public function render()
    {
        return view('livewire.admin.activity-logs', [
            'logs' => ActivityLog::with('user')->latest()->paginate(50),
        ])->layout('components.layouts.admin');
    }
}
