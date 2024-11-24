<?php

namespace App\Providers\Filament;

use App\Filament\Siswa\Resources\Auth\Pages\CustomPage;
use App\Filament\Siswa\Resources\Dashboard\SiswaDashboard;
use App\Livewire\StudentProfile;
use App\Livewire\TracerProfile;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Joaopaulolndev\FilamentEditProfile\FilamentEditProfilePlugin;

class SiswaPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('siswa')
            ->path('siswa')
            ->login(CustomPage::class)
            ->authGuard('student')
            ->profile()
            ->colors([
                'primary' => Color::Blue,
            ])
            ->sidebarCollapsibleOnDesktop()
            ->brandName('Tracer Study')
            ->discoverResources(in: app_path('Filament/Siswa/Resources'), for: 'App\\Filament\\Siswa\\Resources')
            ->discoverPages(in: app_path('Filament/Siswa/Pages'), for: 'App\\Filament\\Siswa\\Pages')
            ->pages([
                SiswaDashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Siswa/Widgets'), for: 'App\\Filament\\Siswa\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->plugins([
                FilamentEditProfilePlugin::make()
                    ->setIcon('heroicon-o-user')
                    ->shouldShowDeleteAccountForm(false)
                    ->shouldShowEditProfileForm(false)
                    ->setNavigationGroup('Profile')
                    ->customProfileComponents([StudentProfile::class, TracerProfile::class])
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
