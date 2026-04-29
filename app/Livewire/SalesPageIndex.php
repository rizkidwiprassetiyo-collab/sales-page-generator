<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\SalesPage;
use Illuminate\Support\Facades\Auth;

class SalesPageIndex extends Component
{
    public function delete($id)
    {
        $salesPage = SalesPage::where('user_id', Auth::id())->findOrFail($id);
        $salesPage->delete();

        session()->flash('success', 'Sales page deleted successfully.');
    }

    public function render()
    {
        return view('livewire.sales-page-index', [
            'salesPages' => SalesPage::where('user_id', Auth::id())
                ->latest()
                ->get(),
        ]);
    }
}