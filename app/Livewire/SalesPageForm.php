<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\SalesPage;
use Illuminate\Support\Facades\Auth;

class SalesPageForm extends Component
{
    public string $product_name = '';
    public string $description = '';
    public string $features = '';
    public string $target_audience = '';
    public string $price = '';
    public string $unique_selling_points = '';

    public function saveDraft()
    {
        $this->validate([
            'product_name' => 'required|string|max:255',
            'description' => 'required|string',
            'features' => 'nullable|string',
            'target_audience' => 'nullable|string|max:255',
            'price' => 'nullable|string|max:255',
            'unique_selling_points' => 'nullable|string',
        ]);

        $salesPage = SalesPage::create([
            'user_id' => Auth::id(),
            'product_name' => $this->product_name,
            'description' => $this->description,
            'features' => $this->features,
            'target_audience' => $this->target_audience,
            'price' => $this->price,
            'unique_selling_points' => $this->unique_selling_points,
        ]);

        session()->flash('success', 'Draft sales page berhasil disimpan.');

        return redirect()->route('sales-pages.show', $salesPage->id);
    }

    public function render()
    {
        return view('livewire.sales-page-form');
    }
}