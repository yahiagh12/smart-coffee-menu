@echo off
REM Setup script for Cafe Virtuel on Windows

echo ==========================================
echo   [94m[CAFE VIRTUEL - SETUP WINDOWS[0m
echo ==========================================
echo.

REM Check if vendor folder exists
if not exist "vendor\" (
    echo [92m[INSTALLING COMPOSER DEPENDENCIES...][0m
    composer install
    if errorlevel 1 (
        echo [91mERROR: Composer install failed![0m
        pause
        exit /b 1
    )
) else (
    echo [92m[VENDOR FOLDER ALREADY EXISTS][0m
)

echo.
echo [92m[SETTING UP DATABASE...][0m

REM Create database
call php bin/console doctrine:database:create --if-not-exists

echo.
echo [92m[RUNNING MIGRATIONS...][0m

REM Run migrations
call php bin/console doctrine:migrations:migrate --no-interaction

echo.
echo ==========================================
echo   [92m[SETUP COMPLETE!][0m
echo ==========================================
echo.
echo [96m[ACCESS THE APPLICATION AT:][0m
echo   - Client:  http://localhost:8000
echo   - Admin:   http://localhost:8000/admin
echo.
echo [96m[DATABASE INFO:][0m
echo   - Type: SQLite3
echo   - Location: var/app.db
echo.
echo [96m[TO START THE SERVER, RUN:][0m
echo   symfony server:start
echo   or
echo   php -S 127.0.0.1:8000 -t public
echo.
pause
