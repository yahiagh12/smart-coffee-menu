#!/bin/bash
# Setup script for Café Virtuel

echo "=========================================="
echo "  ☕ Café Virtuel - Setup Script"
echo "=========================================="
echo ""

# Check if vendor folder exists
if [ ! -d "vendor" ]; then
    echo "📦 Installing Composer dependencies..."
    composer install
else
    echo "✅ Vendor folder already exists"
fi

echo ""
echo "📊 Setting up database..."

# Create database
php bin/console doctrine:database:create --if-not-exists

echo ""
echo "🔄 Running migrations..."

# Run migrations
php bin/console doctrine:migrations:migrate --no-interaction

echo ""
echo "=========================================="
echo "  ✅ Setup Complete!"
echo "=========================================="
echo ""
echo "🌐 Access the application at:"
echo "   - Client:  http://localhost:8000"
echo "   - Admin:   http://localhost:8000/admin"
echo ""
echo "📊 Database: var/app.db (SQLite)"
echo ""
echo "To start the server, run:"
echo "   symfony server:start"
echo "   or"
echo "   php -S 127.0.0.1:8000 -t public"
echo ""
