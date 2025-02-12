<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Models\CertificateRequest;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use MoonShine\Laravel\Enums\Action;
use MoonShine\Laravel\Http\Responses\MoonShineJsonResponse;
use MoonShine\Laravel\MoonShineRequest;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Support\Enums\HttpMethod;
use MoonShine\Support\Enums\ToastType;
use MoonShine\Support\ListOf;
use MoonShine\UI\Components\ActionButton;
use MoonShine\UI\Components\FormBuilder;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\File;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Text;
use PhpOffice\PhpWord\TemplateProcessor;

/**
 * @extends ModelResource<CertificateRequest>
 */
class CertificateRequestResource extends ModelResource
{
    protected string $model = CertificateRequest::class;

    protected string $title = 'CertificateRequests';

//    protected bool $detailInModal = true;

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
            Text::make('Фамилия', 'last_name'),
            Text::make('Имя', 'first_name'),
            Text::make('ИИН', 'iin'),
            Text::make('Телефон', 'phone'),
            Text::make('Chat ID', 'chat_id'),
            Text::make('Статус', 'status'),
            Text::make('Номер сертификата', 'certificate_number'),
            File::make('Файл сертификата', 'certificate_file'),
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
                Text::make('Фамилия', 'last_name'),
                Text::make('Имя', 'first_name'),
                Text::make('Отчество', 'middle_name'),
                Text::make('ИИН', 'iin'),
                Text::make('Вид деятельности', 'activity_type'),
                Text::make('Специальность', 'specialty'),
                Text::make('Телефон', 'phone'),
                Text::make('Место работы', 'workplace'),
                Text::make('Имя отправителя', 'sender_name'),
                Text::make('Документ', 'document'),
                Text::make('Chat ID', 'chat_id')->disabled(),
                Text::make('Статус', 'status'),
                Text::make('Номер сертификата', 'certificate_number')->disabled(),
                File::make('Файл сертификата', 'certificate_file')->removable(),
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
            Text::make('Фамилия', 'last_name'),
            Text::make('Имя', 'first_name'),
            Text::make('Отчество', 'middle_name'),
            Text::make('ИИН', 'iin'),
            Text::make('Вид деятельности', 'activity_type'),
            Text::make('Специальность', 'specialty'),
            Text::make('Телефон', 'phone'),
            Text::make('Место работы', 'workplace'),
            Text::make('Имя отправителя', 'sender_name'),
            Text::make('Документ', 'document'),
            Text::make('Chat ID', 'chat_id'),
            Text::make('Статус', 'status'),
            Text::make('Номер сертификата', 'certificate_number'),
            File::make('Файл сертификата', 'certificate_file')->disk('public'),
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

    protected function detailButtons(): ListOf
    {
        if ($this->item->status !== 'confirmed') {
            return parent::detailButtons()
                ->add(ActionButton::make('Accept')
                    ->method('acceptCertificateRequest')
                )
                ->add(ActionButton::make('Reject')
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
            return MoonShineJsonResponse::$statusTexts[208];
        }

        $templatePath = Storage::disk('public')->path('example.docx');
        $templateProcessor = new TemplateProcessor($templatePath);

        $this->setValues($templateProcessor, $certificateRequest);

        if (!file_exists(Storage::disk('public')->path('generated/'.now()->year.'/'.now()->month))){
            mkdir(Storage::disk('public')->path('generated/'.now()->year.'/'.now()->month), 0755, true);
        }

        $uuidFileName = Str::uuid();
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
            $certificateRequest->save();
            return MoonShineJsonResponse::make()->toast("Success", ToastType::ERROR);
        } else {
            $errorMessage = "Ошибка при создании PDF (код: $code). ";
            $errorMessage .= "Вывод команды: " . implode("\n", $output);
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

    private function setValues(TemplateProcessor $templateProcessor, $certificateRequest): void
    {
        $templateProcessor->setValue('{{no_cert}}', "KZ29VVV00019826");
        $templateProcessor->setValue('{{full_name_kz}}', sprintf("%s %s %s", $certificateRequest->las_name, $certificateRequest->name, $certificateRequest->first_name));
        $templateProcessor->setValue('{{full_name_ru}}', sprintf("%s %s %s", $certificateRequest->las_name, $certificateRequest->name, $certificateRequest->first_name));
        $templateProcessor->setValue('{{status_kz}}', $certificateRequest->status);
        $templateProcessor->setValue('{{status_ru}}', $certificateRequest->status);
        $templateProcessor->setValue('{{doc_no}}', $certificateRequest->certificate_number);
        $templateProcessor->setValue('{{position_kz}}', $certificateRequest->specialty);
        $templateProcessor->setValue('{{position_ru}}', $certificateRequest->specialty);
        $templateProcessor->setValue('{{city_date_kz}}', sprintf("Астана қаласы %s.$%s.%s жылы", now()->day, now()->month, now()->year));
        $templateProcessor->setValue('{{city_date_ru}}', sprintf("город Астана %s.%s.%s года", now()->day, now()->month, now()->year));
    }
}
