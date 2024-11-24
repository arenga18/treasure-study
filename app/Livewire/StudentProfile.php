<?php

namespace App\Livewire;

use App\Models\Student;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Livewire\Component;
use Illuminate\Contracts\View\View;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Notifications\Notification;
use Joaopaulolndev\FilamentEditProfile\Concerns\HasSort;
use Joaopaulolndev\FilamentEditProfile\Concerns\HasUser;

class StudentProfile extends Component implements HasForms
{
    use InteractsWithForms;
    use HasSort;
    use HasUser;

    public ?array $data = [];

    protected static int $sort = 0;

    public function mount(): void
    {
        $user = $this->getUser();

        $student = Student::where('id', $user->id)->firstOrFail();

        $this->form->fill(
            $student->only(['name', 'nisn', 'email', 'photo', 'gender', 'date_of_birth'])
        );
    }


    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Data Siswa')
                    ->aside()
                    ->description('Update data jika diperlukan')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama')
                            ->required()
                            ->maxLength(100),
                        TextInput::make('nisn')
                            ->label('NISN')
                            ->required()
                            ->readOnly(true)
                            ->maxLength(100),
                        TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255),
                        FileUpload::make('photo')
                            ->image()
                            ->imageEditor(),
                        Select::make('gender')
                            ->label('Jenis Kelamin')
                            ->options([
                                'P' => 'Perempuan',
                                'L' => 'Laki-laki',
                            ])->required(),
                        DatePicker::make('date_of_birth')
                            ->label(label: 'Tanggal Lahir')
                            ->native(false)
                            ->displayFormat('Y-m-d')
                            ->format('Y-m-d')
                            ->required(),
                    ])
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();
        $user = $this->getUser();
        $student = Student::where('id', $user->id)->firstOrFail();

        $student->update($data);

        Notification::make()
            ->success()
            ->title('Data berhasil disimpan')
            ->send();
    }

    public function render(): View
    {
        return view('livewire.student-profile');
    }
}
