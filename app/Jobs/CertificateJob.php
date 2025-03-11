<?php

namespace App\Jobs;

use App\Models\CertificateRequest;
use App\Models\Position;
use App\Models\Template;
use Google\Client;
use Google\Service\Docs;
use Google\Service\Drive;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CertificateJob implements ShouldQueue
{
    use Queueable;

    protected $certificateRequest;

    /**
     * Create a new job instance.
     */
    public function __construct($certificateRequest)
    {
        $this->certificateRequest = $certificateRequest;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $client = new Client();
        $client->setAuthConfig(storage_path('app/google-credentials.json'));
        $client->addScope([Docs::DOCUMENTS, Drive::DRIVE]);
        $client->setSubject(config('google.google.docs_email'));
        $documentId = config('google.google.docs_id');

        try {
            $certNumber = CertificateRequest::get('certificate_number')->sortByDesc('certificate_number')->first();
            $certNumber = Str::padLeft(intval($certNumber->certificate_number) + 1, 5, '0');

            // Замена текста в Google Docs
            $docsService = new Docs($client);
            $driveService = new Drive($client);

            $copy = new Drive\DriveFile([
                'name' => 'Certificate Copy - ' . time()
            ]);

            $copiedFile = $driveService->files->copy(
                $documentId,
                $copy,
                ['fields' => 'id']
            );
            $documentIdCopy = $copiedFile->id;

            $requests = $this->setValues($this->certificateRequest, $certNumber);

            $docsService->documents->batchUpdate($documentIdCopy, new \Google\Service\Docs\BatchUpdateDocumentRequest([
                'requests' => $requests,
            ]));

            // Экспорт в PDF через Google Drive API
            $driveService = new Drive($client);
            $response = $driveService->files->export($documentIdCopy, 'application/pdf', ['alt' => 'media']);

            if (!file_exists(Storage::disk('public')->path('generated/'.now()->year.'/'.now()->month))){
                mkdir(Storage::disk('public')->path('generated/'.now()->year.'/'.now()->month), 0755, true);
            }
            $uuidFileName = Str::uuid()->toString();
            $pdfPath = 'generated/'.now()->year.'/'.now()->month.'/'.$uuidFileName.'.pdf';


            // Сохранение PDF
            $isSuccess = Storage::disk('public')->put($pdfPath, $response->getBody());
            $driveService->files->delete($documentIdCopy);
            if ($isSuccess) {
                $this->certificateRequest->certificate_file = 'generated/'.now()->year.'/'.now()->month.'/'.$uuidFileName.'.pdf';
                $this->certificateRequest->status = 'confirmed';
                $this->certificateRequest->certificate_number = $certNumber;
                $this->certificateRequest->save();
                \Log::info('converting successfully ended!');
            } else {
                \Log::error('converting failed!');
            }
        } catch (\Exception $e) {
            \Log::error("Ошибка: " . $e->getMessage());
        }
    }

    private function setValues(Model $certificateRequest, $certNumber): array
    {
        if ($certificateRequest->activity_type == 'ПД') {
            $activityTypeRu = 'проектной';
            $activityTypeKz = 'жобалау';
        } else {
            $activityTypeRu = 'строительной';
            $activityTypeKz = 'құрылыс';
        }

        $specialty = Position::find($certificateRequest->specialty_id);

        return [
            new \Google\Service\Docs\Request([
                'replaceAllText' => [
                    'containsText' => ['text' => '${cert_no}', 'matchCase' => true],
                    'replaceText' => 'KZ29VVV00019826',
                ]
            ]),
            new \Google\Service\Docs\Request([
                'replaceAllText' => [
                    'containsText' => ['text' => '${full_name_kz}', 'matchCase' => true],
                    'replaceText' => sprintf("%s %s %s", $certificateRequest->last_name, $certificateRequest->first_name, $certificateRequest->middle_name),
                ]
            ]),
            new \Google\Service\Docs\Request([
                'replaceAllText' => [
                    'containsText' => ['text' => '${full_name_ru}', 'matchCase' => true],
                    'replaceText' => sprintf("%s %s %s", $certificateRequest->last_name, $certificateRequest->first_name, $certificateRequest->middle_name),
                ]
            ]),
            new \Google\Service\Docs\Request([
                'replaceAllText' => [
                    'containsText' => ['text' => '${number_doc}', 'matchCase' => true],
                    'replaceText' => $certNumber,
                ]
            ]),
            new \Google\Service\Docs\Request([
                'replaceAllText' => [
                    'containsText' => ['text' => '${position_kz}', 'matchCase' => true],
                    'replaceText' => $specialty->name_kk,
                ]
            ]),
            new \Google\Service\Docs\Request([
                'replaceAllText' => [
                    'containsText' => ['text' => '${position_ru}', 'matchCase' => true],
                    'replaceText' => $specialty->name_ru,
                ]
            ]),
            new \Google\Service\Docs\Request([
                'replaceAllText' => [
                    'containsText' => ['text' => '${city_date_kz}', 'matchCase' => true],
                    'replaceText' => sprintf("Ақтау қаласы %02d.%02d.%s жылы", now()->day, now()->month, now()->year),
                ]
            ]),
            new \Google\Service\Docs\Request([
                'replaceAllText' => [
                    'containsText' => ['text' => '${city_date_ru}', 'matchCase' => true],
                    'replaceText' => sprintf("город Актау %02d.%02d.%s года", now()->day, now()->month, now()->year),
                ]
            ]),
            new \Google\Service\Docs\Request([
                'replaceAllText' => [
                    'containsText' => ['text' => '${activity_type_ru}', 'matchCase' => true],
                    'replaceText' => $activityTypeRu,
                ]
            ]),
            new \Google\Service\Docs\Request([
                'replaceAllText' => [
                    'containsText' => ['text' => '${activity_type_kk}', 'matchCase' => true],
                    'replaceText' => $activityTypeKz,
                ]
            ]),
        ];
    }
}
