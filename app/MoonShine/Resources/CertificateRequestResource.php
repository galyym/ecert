<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Template;
use Illuminate\Database\Eloquent\Model;
use App\Models\CertificateRequest;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use MoonShine\ImportExport\Contracts\HasImportExportContract;
use MoonShine\ImportExport\Traits\ImportExportConcern;
use MoonShine\Laravel\Enums\Action;
use MoonShine\Laravel\Handlers\Handler;
use MoonShine\Laravel\Http\Responses\MoonShineJsonResponse;
use MoonShine\Laravel\MoonShineRequest;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Support\Enums\ToastType;
use MoonShine\Support\ListOf;
use MoonShine\UI\Components\ActionButton;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\Date;
use MoonShine\UI\Fields\File;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Text;
use PhpOffice\PhpWord\TemplateProcessor;
use Ramsey\Uuid\UuidInterface;

/**
 * @extends ModelResource<CertificateRequest>
 */
class CertificateRequestResource extends ModelResource implements HasImportExportContract
{
    use ImportExportConcern;

    protected string $model = CertificateRequest::class;

    protected string $title = 'CertificateRequests';

    protected function activeActions(): ListOf
    {
        return parent::activeActions()
            ->except(Action::CREATE, Action::DELETE, Action::MASS_DELETE);
    }

    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Text::make(__('certificate.surname'), 'last_name'),
            Text::make(__('certificate.name'), 'first_name'),
            Text::make(__('certificate.iin'), 'iin')->sortable(),
            Text::make(__('certificate.phone'), 'phone')->sortable(),
            Text::make('Статус', 'status'),
            Text::make(__('certificate.sender_name'), 'sender_name')->sortable(),
            Text::make(__('certificate.certificate_number'), 'certificate_number')->sortable(),
            File::make(__('certificate.certificate_file'), 'certificate_file'),
            Date::make('Дата создания', 'created_at')->sortable()->format('d.m.Y H:i:s'),
        ];
    }

    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function formFields(): iterable
    {
        return [
            Box::make([
                ID::make(),
                Text::make(__('certificate.surname'), 'last_name'),
                Text::make(__('certificate.name'), 'first_name'),
                Text::make(__('certificate.patronymic'), 'middle_name'),
                Text::make(__('certificate.iin'), 'iin'),
                Text::make(__('certificate.activity_type'), 'activity_type'),
                Text::make(__('certificate.specialty'), 'specialty'),
                Text::make(__('certificate.phone'), 'phone'),
                Text::make(__('certificate.workplace'), 'workplace'),
                Text::make(__('certificate.sender_name'), 'sender_name'),
                Text::make(__('certificate.document'), 'document'),
                Text::make('Chat ID', 'chat_id')->disabled(),
                Text::make('Статус', 'status'),
                Text::make(__('certificate.certificate_number'), 'certificate_number')->disabled(),
                File::make(__('certificate.certificate_file'), 'certificate_file')->removable(),
                Text::make('User ID', 'user_id')->disabled(),
            ])
        ];
    }

    /**
     * @return list<FieldContract>
     */
    protected function detailFields(): iterable
    {
        return [
            ID::make(),
            Text::make(__('certificate.surname'), 'last_name'),
            Text::make(__('certificate.name'), 'first_name'),
            Text::make(__('certificate.patronymic'), 'middle_name'),
            Text::make(__('certificate.iin'), 'iin'),
            Text::make(__('certificate.activity_type'), 'activity_type'),
            Text::make(__('certificate.specialty'), 'specialty'),
            Text::make(__('certificate.phone'), 'phone'),
            Text::make(__('certificate.workplace'), 'workplace'),
            Text::make(__('certificate.sender_name'), 'sender_name'),
            Text::make(__('certificate.document'), 'document'),
            Text::make('Chat ID', 'chat_id'),
            Text::make('Статус', 'status'),
            Text::make(__('certificate.certificate_number'), 'certificate_number')->disabled(),
            File::make(__('certificate.certificate_file'), 'certificate_file')->disk('public'),
            Text::make('User ID', 'user_id'),
        ];
    }

    /**
     * @param CertificateRequest $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }

    protected function filters(): iterable
    {
        return [
            Text::make(__('certificate.iin'), 'iin'),
            Text::make(__('certificate.sender_name'), 'sender_name'),
            Text::make(__('certificate.certificate_number'), 'certificate_number'),
            Text::make(__('certificate.workplace'), 'workplace'),
            Date::make('Дата создания', 'created_at')
        ];
    }

    protected function import(): ?Handler
    {
        return null;
    }

    protected function exportFields(): iterable
    {
        return [
            ID::make(),
            Text::make(__('certificate.surname'), 'last_name'),
            Text::make(__('certificate.patronymic'), 'middle_name'),
            Text::make(__('certificate.iin'), 'iin'),
            Text::make(__('certificate.activity_type'), 'activity_type'),
            Text::make(__('certificate.specialty'), 'specialty'),
            Text::make(__('certificate.phone'), 'phone'),
            Text::make(__('certificate.workplace'), 'workplace'),
            Text::make(__('certificate.sender_name'), 'sender_name'),
            Text::make(__('certificate.certificate_number'), 'certificate_number'),
            File::make(__('certificate.certificate_file'), 'certificate_file'),
        ];
    }

    public function afterExported(mixed $item): mixed
    {
        dd(123);
    }

    protected function detailButtons(): ListOf
    {
        if ($this->item->status !== 'confirmed') {
            return parent::detailButtons()
                ->add(ActionButton::make(__('moonshine::buttons.accept'))
                    ->method('acceptCertificateRequest')
                )
                ->add(ActionButton::make(__('moonshine::buttons.Reject'))
                    ->method('rejectCertificateRequest')
                );
        } else {
            return parent::detailButtons();
        }
    }

    public function acceptCertificateRequest(MoonShineRequest $request): MoonShineJsonResponse
    {
        $certificateRequest = CertificateRequest::find($request->getItemID());

        if ($certificateRequest->certificate_file) {
            return MoonShineJsonResponse::make()->toast(__('certificate.certificate_exists'), ToastType::ERROR);
        }

        $template = Template::all()->first();
        $templatePath = Storage::disk('public')->path($template->path);
        $templateProcessor = new TemplateProcessor($templatePath);
        $certNumber = CertificateRequest::get('certificate_number')->sortByDesc('certificate_number')->first();
        $certNumber = Str::padLeft(intval($certNumber->certificate_number) + 1, 5, '0');
        $uuidFileName = Str::uuid()->toString();

        $this->setValues($templateProcessor, $certificateRequest, $certNumber);

        if (!file_exists(Storage::disk('public')->path('generated/'.now()->year.'/'.now()->month))){
            mkdir(Storage::disk('public')->path('generated/'.now()->year.'/'.now()->month), 0755, true);
        }

        $filledDocxPath = Storage::disk('public')->path('generated/'.now()->year.'/'.now()->month.'/'.$uuidFileName.'.docx');
        $templateProcessor->saveAs($filledDocxPath);

        $pdfPath = Storage::disk('public')->path('generated/'.now()->year.'/'.now()->month.'/'.$uuidFileName.'.pdf');
        $command = "libreoffice --headless --convert-to pdf --outdir " . dirname($pdfPath) . " " . $filledDocxPath;
        $output = null;
        $code = null;
        exec($command, $output, $code);

        if ($code === 0) {
            $certificateRequest->certificate_file = 'generated/'.now()->year.'/'.now()->month.'/'.$uuidFileName.'.pdf';
            $certificateRequest->status = 'confirmed';
            $certificateRequest->certificate_number = $certNumber;
            $certificateRequest->save();
            return MoonShineJsonResponse::make()->toast("Success", ToastType::SUCCESS);
        } else {
            $errorMessage = __('certificate.pdf_error');
            $errorMessage .= __('certificate.command_output') . implode("\n", $output);
            return MoonShineJsonResponse::make()->toast($errorMessage, ToastType::ERROR);
        }
    }

    public function rejectCertificateRequest(MoonShineRequest $request): MoonShineJsonResponse
    {
        $certificateRequest = CertificateRequest::find($this->getItemID());
        $certificateRequest->status = 'reject';
        $certificateRequest->save();
        return MoonShineJsonResponse::make()->toast("Success", ToastType::SUCCESS);
    }

    private function setValues(TemplateProcessor $templateProcessor, Model $certificateRequest, $certNumber): void
    {
        $templateProcessor->setValue('cert_no', "KZ29VVV00019826");
        $templateProcessor->setValue('full_name_kz', sprintf("%s %s %s", $certificateRequest->last_name, $certificateRequest->first_name, $certificateRequest->middle_name));
        $templateProcessor->setValue('full_name_ru', sprintf("%s %s %s", $certificateRequest->last_name, $certificateRequest->first_name, $certificateRequest->middle_name));
        $templateProcessor->setValue('number_doc', $certNumber);
        $templateProcessor->setValue('position_kz', $certificateRequest->specialty);
        $templateProcessor->setValue('position_ru', $certificateRequest->specialty);
        $templateProcessor->setValue('city_date_kz', sprintf("Астана қаласы %s.%s.%s жылы", now()->day, now()->month, now()->year));
        $templateProcessor->setValue('city_date_ru', sprintf("город Астана %s.%s.%s года", now()->day, now()->month, now()->year));
    }
}
