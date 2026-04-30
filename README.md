# AI Sales Page Generator

## Project Overview

This project is an AI Sales Page Generator built using Laravel, Livewire, MySQL, and Gemini API.

The application allows users to register, login, create product briefs, generate structured sales page copy using an LLM API, save generated pages to the database, and preview the result as a styled landing page.

## Live Demo

Live URL:
https://sales-page-generator-production-80ea.up.railway.app

## Dummy Account

Email: reviewer@demo.com  
Password: Password123!

## Tech Stack

- Laravel
- Livewire
- Blade
- MySQL
- Gemini API
- Railway
- GitHub

## Main Features

### 1. Authentication

Users can register, login, and logout.

### 2. Product Input Form

Users can submit:

- Product or service name
- Description
- Key features
- Target audience
- Price
- Unique selling points

### 3. Sales Page Generation

The application sends the product data to Gemini API and generates:

- Headline
- Sub-headline
- Product description
- Benefits
- Features breakdown
- Social proof placeholder
- Pricing display
- Call-to-action

The output is displayed as a styled landing page, not raw text.

### 4. Saved Pages

Users can view saved pages, open previews, re-generate sales copy, and delete old pages.

### 5. Live Preview

The generated sales page is displayed in a preview mode that resembles a real landing page.

## Error Handling

If Gemini API is temporarily unavailable or busy, the system shows a friendly alert instead of crashing.

## Deployment

The application is deployed on Railway and connected to a MySQL database.

Production asset issues were handled by using HTTPS-based `APP_URL` and `ASSET_URL`, and forcing HTTPS URLs in production.