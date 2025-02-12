<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Models\CertificateRequest;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use MoonShine\Laravel\Http\Responses\MoonShineJsonResponse;
use MoonShine\Laravel\MoonShineRequest;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Support\ListOf;
use MoonShine\UI\Components\ActionButton;
use MoonShine\UI\Components\Layout\Box;
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
            Text::make('Файл сертификата', 'certificate_file'),
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
                Text::make('Chat ID', 'chat_id'),
                Text::make('Статус', 'status'),
                Text::make('Номер сертификата', 'certificate_number'),
                Text::make('Файл сертификата', 'certificate_file'),
                Text::make('User ID', 'user_id'),
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
            Text::make('Файл сертификата', 'certificate_file'),
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
        return parent::detailButtons()
            ->add(ActionButton::make('Accept')
                ->method('acceptCertificateRequest')
            );
    }

    public function acceptCertificateRequest(MoonShineRequest $request): MoonShineJsonResponse
    {
        $certificateRequest = CertificateRequest::find($request->getItemID());


        $templatePath = Storage::disk('public')->path('example.docx');
        $templateProcessor = new TemplateProcessor($templatePath);

        $this->setValues($templateProcessor, $certificateRequest);

        if (!file_exists(Storage::disk('public')->path('generated/'.now()->year.'/'.now()->month))){
            mkdir(Storage::disk('public')->path('generated/'.now()->year.'/'.now()->month), 0755, true);
        }
        $filledDocxPath = Storage::disk('public')->path('generated/'.now()->year.'/'.now()->month.'/'.Str::uuid().'.docx');
        $templateProcessor->saveAs($filledDocxPath);

        $pdfPath = Storage::disk('public')->path('generated/'.now()->year.'/'.now()->month.'/'.Str::uuid().'.pdf');
        $command = "libreoffice --headless --convert-to pdf --outdir " . dirname($pdfPath) . " " . $filledDocxPath;
        $output = null;
        $code = null;
        exec($command, $output, $code);

        if ($code === 0) {
            return MoonShineJsonResponse::make(['success']);
        } else {
            $errorMessage = "Ошибка при создании PDF (код: $code). ";
            $errorMessage .= "Вывод команды: " . implode("\n", $output);
            return MoonShineJsonResponse::make(['error']);
        }
    }

    private function setValues(TemplateProcessor $templateProcessor, $certificateRequest): void
    {
        $templateProcessor->setValue('{{no_cert}}', "KZ29VVV00019826");
        $templateProcessor->setValue('{{full_name_kz}}', sprintf("%s %s %s", $certificateRequest->las_name, $certificateRequest->name, $certificateRequest->first_name));
        $templateProcessor->setValue('{{full_name_ru}}', sprintf("%s %s %s", $certificateRequest->las_name, $certificateRequest->name, $certificateRequest->first_name));
        $templateProcessor->setValue('{{status_kz}}', $certificateRequest->status);
        $templateProcessor->setValue('{{status_ru}}', $certificateRequest->status);
        $templateProcessor->setValue('{{doc_no}}', $certificateRequest->certificate_number);
        $templateProcessor->setValue('{{doc_no}}', $certificateRequest->certificate_number);
        $templateProcessor->setValue('{{position_kz}}', $certificateRequest->specialty);
        $templateProcessor->setValue('{{position_ru}}', $certificateRequest->specialty);
        $templateProcessor->setValue('{{city_date_kz}}', sprintf("Астана қаласы %s.$%s.%s жылы", now()->day, now()->month, now()->year));
        $templateProcessor->setValue('{{city_date_ru}}', sprintf("город Астана %s.%s.%s года", now()->day, now()->month, now()->year));
    }
}
