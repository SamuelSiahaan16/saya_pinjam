<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Loan;
use Filament\Tables;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput; 
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;   
use App\Filament\Resources\LoanResource\Pages; 

class LoanResource extends Resource
{
    protected static ?string $model = Loan::class;

    protected static ?string $navigationIcon = 'heroicon-o-square-3-stack-3d';

    protected static ?string $navigationGroup = 'Pengajuan';

    protected static ?string $navigationLabel = 'Peminjam';

    public static function getNavigationBadge(): ?string
    {
        $query = static::getTableQuery();

        return number_format($query->count());
    }

    protected static function getTableQuery(): Builder
    {
        $user = Auth::user();

        if ($user->role == 'admin') {
            return static::getModel()::query();
        } else {
            return static::getModel()::query()
                ->whereHas('customer', function (Builder $query) use ($user) {
                    $query->where('city_district', $user->city);
                });
        }
    }

    public static function form(Form $form): Form
    {
        $model = $form->model->getAttributes(); 

        $commonFields = [
            Section::make()
                ->columnSpan(2)
                ->schema([
                    Select::make('customer_id')->relationship('customer', 'full_name')->label('Nama Peminjam'),
                    Select::make('customer_id')->relationship('customer', 'occupation')->label('Pekerjaan'),
                    Select::make('customer_id')->relationship('customer', 'id_number')->label('No KTP'),
                    Select::make('customer_id')->relationship('customer', 'phone_number')->label('Nomor Telepon'),
                    Select::make('customer_id')->relationship('customer', 'mother_name')->label('Nama Ibu'),
                    Select::make('customer_id')->relationship('customer', 'city_district')->label('Kota/Kabupaten'),
                    Select::make('customer_id')->relationship('customer', 'date_birthday')->label('Tanggal Lahir'),
                ]),
            Section::make()
                ->columnSpan(1)
                ->schema([
                    TextInput::make('monthly_salary')
                        ->prefix('Rp.')
                        ->numeric()
                        ->inputMode('decimal') 
                        ->label('Penghasilan'),
                    TextInput::make('loan_amount')
                        ->prefix('Rp.')
                        ->numeric()
                        ->inputMode('decimal') 
                        ->label('Pengajuan Permintaan'),
                    TextInput::make('loan_term')->label('Pengajuan Tenor(Bulan)'),
                ]), 
        ];
        $spek = [ 
            Section::make()
                ->columnSpan(3)
                ->schema([
                    FileUpload::make('id_photo_path')->label('Foto KTP'),
                    FileUpload::make('selfie_photo_path')->label('Selfie'), 
                ]),
        ];

        switch ($model['type_loan']) {
            case 'Karyawan Swasta':
                $specificFields = [
                    Section::make()
                    ->schema([ 
                        TextInput::make('company_name')->label('Tempat Bekerja'),
                        TextInput::make('work_duration')->label('Lama Bekerja(Bulan)'),
                        TextInput::make('position')->label('Jabatan Pekerjaan'),
                    ]),
                ];
                break;
            case 'Agunan Kendaraan':
                $specificFields = [
                    Section::make()
                    ->schema([ 
                        TextInput::make('car_type')->label('Tipe Kendaraan'),
                        TextInput::make('car_brand')->label('Merk Kendaraan'),
                        TextInput::make('car_model')->label('Model Kendaraan'),
                        TextInput::make('car_year')->label('Tahun Kendaraan'),
                        TextInput::make('car_license_plate')->label('Plat Kendaraan'),
                    ]),
                ];
                break;
            case 'Agunan Sertifikat':
                $specificFields = [
                    Section::make()
                    ->schema([ 
                        TextInput::make('property_type')->label('Properti'),
                        TextInput::make('certificate_type')->label('Jenis Properti'),
                        TextInput::make('property_address')->label('Alamat Properti'), 
                    ]),
                ];
                break;
            case 'Guru PNS':
                $specificFields = [
                    Section::make()
                    ->schema([ 
                        TextInput::make('company_name')->label('Nama Tempat Mengajar'),
                        TextInput::make('work_duration')->label('Lama Bekerja(Bulan)'),
                        TextInput::make('position')->label('Jabatan Pekerjaan'),  
                    ]),
                ];
                break;
            case 'Pegawai Negeri':
                $specificFields = [
                    Section::make()
                    ->schema([ 
                        TextInput::make('company_name')->label('Nama Instansi'),
                        TextInput::make('work_duration')->label('Lama Bekerja(Bulan)'),
                        TextInput::make('position')->label('Jabatan Pekerjaan'),  
                        TextInput::make('institution')->label('Golongan/Pangkat'),  
                    ]),
                ];
                break;
            default:
                $specificFields = [];
                break;
        }

        return $form
            ->schema([
                Card::make()
                    ->schema([
                        Grid::make()
                            ->columns(3)
                            ->schema(array_merge($commonFields, $specificFields, $spek)),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('customer.full_name')
                    ->searchable()
                    ->label('Nama Pemohon'),
                TextColumn::make('customer.city_district')
                    ->searchable()
                    ->label('Kota/Kabupaten'),
                TextColumn::make('customer.id_number')
                    ->searchable()
                    ->label('No KTP'),
                TextColumn::make('type_loan')
                    ->searchable()
                    ->label('Tipe Peminjam'),
                TextColumn::make('monthly_salary') 
                    ->numeric() 
                    ->prefix('Rp. ')
                    ->label('Penghasilan'),
                TextColumn::make('loan_amount')
                    ->numeric()
                    ->prefix('Rp. ')
                    ->label('Pengajuan Pinjaman'), 
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLoans::route('/'),
            'create' => Pages\CreateLoan::route('/create'),
            'edit' => Pages\EditLoan::route('/{record}/edit'),
        ];
    }
}