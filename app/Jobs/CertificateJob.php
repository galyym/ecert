<?php

namespace App\Jobs;

use App\Models\CertificateRequest;
use App\Models\Template;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use PhpOffice\PhpWord\TemplateProcessor;
use Symfony\Component\Process\Process;

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
        \Log::info('CertificateJob started!');
        $template = Template::all()->first();
        $templatePath = Storage::disk('public')->path($template->path);
        $templateProcessor = new TemplateProcessor($templatePath);
        $certNumber = CertificateRequest::get('certificate_number')->sortByDesc('certificate_number')->first();
        $certNumber = Str::padLeft(intval($certNumber->certificate_number) + 1, 5, '0');
        $uuidFileName = Str::uuid()->toString();

        $this->setValues($templateProcessor, $this->certificateRequest, $certNumber);
        \Log::info('values successfully completed!');

        if (!file_exists(Storage::disk('public')->path('generated/'.now()->year.'/'.now()->month))){
            mkdir(Storage::disk('public')->path('generated/'.now()->year.'/'.now()->month), 0755, true);
        }

        $filledDocxPath = Storage::disk('public')->path('generated/'.now()->year.'/'.now()->month.'/'.$uuidFileName.'.docx');
        $templateProcessor->saveAs($filledDocxPath);
        \Log::info('saving successfully ended!');

        $pdfPath = Storage::disk('public')->path('generated/'.now()->year.'/'.now()->month.'/'.$uuidFileName.'.pdf');
        $command = "libreoffice --headless --convert-to pdf --outdir " . dirname($pdfPath) . " " . $filledDocxPath;
        $process = \Illuminate\Support\Facades\Process::run($command);
        \Log::info('converting successfully ended!', [$process]);

        if ($process) {
            $this->certificateRequest->certificate_file = 'generated/'.now()->year.'/'.now()->month.'/'.$uuidFileName.'.pdf';
            $this->certificateRequest->status = 'confirmed';
            $this->certificateRequest->certificate_number = $certNumber;
            $this->certificateRequest->save();
            \Log::info('converting successfully ended!');
        } else {
            \Log::error('converting failed!');
        }
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
