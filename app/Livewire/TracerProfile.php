<?php

namespace App\Livewire;

use App\Models\Student;
use App\Models\Alumni;
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

class TracerProfile extends Component implements HasForms
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

        $alumni = $student->alumni;

        if ($alumni) {
            $this->form->fill([
                'kelas' => $alumni->kelas,
                'perguruan_tinggi' => $alumni->perguruan_tinggi,
                'jurusan' => $alumni->jurusan,
                'tahun_lulus' => $alumni->tahun_lulus,
                'sistem_seleksi' => $alumni->sistem_seleksi,
            ]);
        }
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Student Tracer')
                    ->aside()
                    ->description('Update data jika diperlukan')
                    ->schema([
                        TextInput::make('kelas'),
                        TextInput::make('perguruan_tinggi'),
                        TextInput::make('jurusan'),
                        TextInput::make('tahun_lulus')
                            ->numeric(),
                        TextInput::make('sistem_seleksi')
                    ])
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        // Ambil data dari form
        $data = $this->form->getState();

        $user = $this->getUser();

        $student = Student::where('id', $user->id)->firstOrFail();

        $alumni = Alumni::where('nisn', $student->nisn)->first();

        if ($alumni) {
            $alumni->update(array_merge($data, [
                'nama_siswa' => $student->name
            ]));
        } else {
            // Jika data alumni tidak ditemukan, buat baru
            Alumni::create(array_merge($data, [
                'nisn' => $student->nisn,
                'nama_siswa' => $student->name
            ]));
        }

        Notification::make()
            ->success()
            ->title('Data berhasil disimpan')
            ->body('Data alumni telah diperbarui.')
            ->send();
    }


    public function render(): View
    {
        return view('livewire.tracer-profile');
    }
}
