<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Jobs\CertificateJob;
use App\Models\CertificateRequest;
use MoonShine\ImportExport\Contracts\HasImportExportContract;
use MoonShine\ImportExport\Traits\ImportExportConcern;
use MoonShine\Laravel\Enums\Action;
use MoonShine\Laravel\Fields\Relationships\BelongsTo;
use MoonShine\Laravel\Handlers\Handler;
use MoonShine\Laravel\Http\Responses\MoonShineJsonResponse;
use MoonShine\Laravel\MoonShineRequest;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Support\Enums\ToastType;
use MoonShine\Support\ListOf;
use MoonShine\UI\Components\ActionButton;
use MoonShine\UI\Components\Boolean;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\Date;
use MoonShine\UI\Fields\File;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Json;
use MoonShine\UI\Fields\Select;
use MoonShine\UI\Fields\Switcher;
use MoonShine\UI\Fields\Text;

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
                BelongsTo::make(__('certificate.specialty'), 'specialties', resource: PositionResource::class),
                Text::make(__('certificate.phone'), 'phone'),
                Text::make(__('certificate.workplace'), 'workplace'),
                Text::make(__('certificate.sender_name'), 'sender_name'),
                Text::make(__('certificate.document'), 'document'),
                Text::make('Chat ID', 'chat_id'),
                Select::make('Статус', 'status')->options(['confirmed' => 'confirmed', 'new' => 'new']),
                Text::make(__('certificate.certificate_number'), 'certificate_number'),
                File::make(__('certificate.certificate_file'), 'certificate_file')->removable(),
                Text::make('User ID', 'user_id')->disabled(),
                Text::make('Код доступа', 'access_code'),
                Date::make('Updated date', 'created_at'),
                Switcher::make('Use updated date', 'use_updated_at'),
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
            BelongsTo::make(__('certificate.specialty'), 'specialties', resource: PositionResource::class),
            Text::make(__('certificate.phone'), 'phone'),
            Text::make(__('certificate.workplace'), 'workplace'),
            Text::make(__('certificate.sender_name'), 'sender_name'),
            Text::make('Chat ID', 'chat_id'),
            Text::make('Статус', 'status'),
            Text::make(__('certificate.certificate_number'), 'certificate_number'),
            File::make(__('certificate.certificate_file'), 'certificate_file')->disk('public'),
            Text::make('User ID', 'user_id'),
            Text::make('Код доступа', 'access_code'),
            Json::make('Документы', 'document')->fields([
                    Text::make('Name', 'name'),
                    File::make('Path', 'path')
            ])
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
            Text::make(__('certificate.name'), 'first_name'),
            Text::make(__('certificate.patronymic'), 'middle_name'),
            Text::make(__('certificate.iin'), 'iin'),
            Text::make(__('certificate.activity_type'), 'activity_type'),
            BelongsTo::make(__('certificate.specialty'), 'specialties', resource: PositionResource::class),
            Text::make(__('certificate.phone'), 'phone'),
            Text::make(__('certificate.workplace'), 'workplace'),
            Text::make(__('certificate.sender_name'), 'sender_name'),
            Text::make('Код доступа', 'access_code'),
            Text::make(__('certificate.certificate_number'), 'certificate_number'),
            File::make(__('certificate.certificate_file'), 'certificate_file'),
        ];
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

        if (in_array($certificateRequest->status, ['new'])) {
            CertificateJob::dispatch($certificateRequest);
            $certificateRequest->status = 'converting';
            $certificateRequest->save();
            return MoonShineJsonResponse::make()->toast("Ваш документ поставлен в очередь на конвертацию. Как только процесс завершится, мы вам сообщим.", ToastType::SUCCESS);
        } elseif ($certificateRequest->status == 'confirmed'){
            return MoonShineJsonResponse::make()->toast('Вы уже получили свой сертификат');
        }
        return MoonShineJsonResponse::make()->toast("Ваш документ уже в очереди на обработку. Как только конвертация завершится, мы вас оповестим.", ToastType::INFO);
    }

    public function rejectCertificateRequest(MoonShineRequest $request): MoonShineJsonResponse
    {
        $certificateRequest = CertificateRequest::find($this->getItemID());
        $certificateRequest->status = 'reject';
        $certificateRequest->save();
        return MoonShineJsonResponse::make()->toast("Success", ToastType::SUCCESS);
    }

    protected function search(): array

    {
        return ['iin', 'phone', 'certificate_number', 'last_name', 'first_name'];
    }
}
