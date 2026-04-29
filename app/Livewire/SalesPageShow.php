<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\SalesPage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SalesPageShow extends Component
{
    public SalesPage $salesPage;

    public function mount($id)
    {
        $this->salesPage = SalesPage::where('user_id', Auth::id())->findOrFail($id);
    }

    public function generateAiCopy()
{
    $prompt = "
You are a professional direct-response copywriter.

Create a high-converting sales page based only on the real product data provided below.

Product Name: {$this->salesPage->product_name}
Description: {$this->salesPage->description}
Features: {$this->salesPage->features}
Target Audience: {$this->salesPage->target_audience}
Price: {$this->salesPage->price}
Unique Selling Points: {$this->salesPage->unique_selling_points}

Return valid JSON with exactly these keys:
headline
subheadline
product_description
benefits
features_breakdown
social_proof
pricing_display
call_to_action

Formatting rules:
- benefits must be an array of strings
- features_breakdown must be an array of strings
- social_proof must be a short paragraph string
- pricing_display must be a short persuasive pricing string
- call_to_action must be a short CTA sentence

Strict rules:
- Return valid JSON only
- No markdown
- No code block
- Do not include any extra keys
- Do not use placeholders
- Do not write things like [Target Audience Placeholder], [Price Placeholder], [Description Placeholder], or [Unique Selling Point Placeholder]
- Use the actual product data provided above
- If some field is short or unclear, still write the best possible final sales copy using the available data
- Make the tone persuasive, clear, natural, and ready to display to end users
";

    try {
        $response = Http::withHeaders([
            'x-goog-api-key' => env('GEMINI_API_KEY'),
            'Content-Type' => 'application/json',
        ])
            ->connectTimeout(8)
            ->timeout(18)
            ->post(
                'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent',
                [
                    'contents' => [
                        [
                            'parts' => [
                                ['text' => $prompt]
                            ]
                        ]
                    ]
                ]
            );
    } catch (\Throwable $e) {
        Log::error('Gemini request exception', [
            'sales_page_id' => $this->salesPage->id,
            'message' => $e->getMessage(),
        ]);

        session()->flash('error', 'Gemini is temporarily unavailable. Please check your internet connection or try again in a few minutes.');
        return;
    }

    if (! $response->successful()) {
        Log::error('Gemini request failed', [
            'sales_page_id' => $this->salesPage->id,
            'status' => $response->status(),
            'body' => $response->body(),
        ]);

        if (in_array($response->status(), [429, 503])) {
            session()->flash('error', 'Gemini is temporarily busy due to high demand. Please try again in a few minutes.');
            return;
        }

        session()->flash('error', 'AI generation failed. Please verify your API key and try again.');
        return;
    }

    $text = data_get($response->json(), 'candidates.0.content.parts.0.text');

    if (! $text) {
        session()->flash('error', 'Gemini returned an empty response. Please try again.');
        return;
    }

    $cleanText = trim($text);
    $cleanText = preg_replace('/^```json\s*/i', '', $cleanText);
    $cleanText = preg_replace('/^```\s*/', '', $cleanText);
    $cleanText = preg_replace('/\s*```$/', '', $cleanText);
    $cleanText = trim($cleanText);

    $data = json_decode($cleanText, true);

    if (! is_array($data)) {
        Log::error('Gemini response is not valid JSON', [
            'sales_page_id' => $this->salesPage->id,
            'response' => $text,
        ]);

        session()->flash('error', 'Gemini returned an unexpected format. Please try generating again.');
        return;
    }

    $this->salesPage->update([
        'headline' => $data['headline'] ?? null,
        'subheadline' => $data['subheadline'] ?? null,
        'product_description' => $data['product_description'] ?? null,
        'benefits' => $data['benefits'] ?? null,
        'features_breakdown' => $data['features_breakdown'] ?? null,
        'social_proof' => $data['social_proof'] ?? null,
        'pricing_display' => $data['pricing_display'] ?? null,
        'call_to_action' => $data['call_to_action'] ?? null,
        'raw_ai_response' => $cleanText,
    ]);

    $this->salesPage->refresh();

    session()->flash('success', 'Sales copy generated successfully.');
}

    public function render()
    {
        return view('livewire.sales-page-show');
    }
}   