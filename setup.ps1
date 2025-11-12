#!/usr/bin/env pwsh

# Café Virtuel - Setup Script for Windows PowerShell
# Run: .\setup.ps1

Write-Host "`n========================================" -ForegroundColor Cyan
Write-Host "   ☕ CAFE VIRTUEL - SETUP (Windows)   " -ForegroundColor Cyan
Write-Host "========================================`n" -ForegroundColor Cyan

# Check if composer is installed
$composerCheck = & where composer 2>$null
if (-not $composerCheck) {
    Write-Host "❌ Composer is not installed globally!" -ForegroundColor Red
    Write-Host "   Please install Composer from: https://getcomposer.org/" -ForegroundColor Yellow
    Read-Host "   Press Enter to continue anyway"
}

# Check if vendor folder exists
if (-not (Test-Path "vendor")) {
    Write-Host "📦 Installing Composer dependencies..." -ForegroundColor Green
    & composer install
    
    if ($LASTEXITCODE -ne 0) {
        Write-Host "❌ Composer install failed!" -ForegroundColor Red
        exit 1
    }
} else {
    Write-Host "✅ Vendor folder already exists" -ForegroundColor Green
}

Write-Host "`n"
Write-Host "📊 Setting up SQLite3 database..." -ForegroundColor Green

# Create database
Write-Host "   Creating database..." -ForegroundColor Cyan
& php bin/console doctrine:database:create --if-not-exists

Write-Host "`n"
Write-Host "🔄 Running migrations..." -ForegroundColor Green

# Run migrations
& php bin/console doctrine:migrations:migrate --no-interaction

Write-Host "`n"
Write-Host "========================================" -ForegroundColor Cyan
Write-Host "   ✅ SETUP COMPLETE!                   " -ForegroundColor Green
Write-Host "========================================`n" -ForegroundColor Cyan

Write-Host "🌐 Access the application at:" -ForegroundColor Yellow
Write-Host "   - Client:  http://localhost:8000" -ForegroundColor Cyan
Write-Host "   - Admin:   http://localhost:8000/admin" -ForegroundColor Cyan

Write-Host "`n📊 Database Information:" -ForegroundColor Yellow
Write-Host "   - Type: SQLite3" -ForegroundColor Cyan
Write-Host "   - Location: var\app.db" -ForegroundColor Cyan

Write-Host "`n📚 Documentation:" -ForegroundColor Yellow
Write-Host "   - Database: DATABASE.md" -ForegroundColor Cyan
Write-Host "   - Project: README.md" -ForegroundColor Cyan

Write-Host "`n▶️  To start the server, run one of:" -ForegroundColor Green
Write-Host "   symfony server:start" -ForegroundColor Cyan
Write-Host "   or" -ForegroundColor Gray
Write-Host "   php -S 127.0.0.1:8000 -t public" -ForegroundColor Cyan

Write-Host "`n"
Read-Host "Press Enter to exit"
