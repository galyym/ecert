<?php

namespace App\Http\Controllers;

use App\Http\Requests\CertificateRequest;
use App\Models\Position;
use App\Models\Service;
use App\Models\News;
use App\Models\Project;
use App\Models\AboutContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
    public function index()
    {
        $positions = Position::all()->toArray();
        
        // Получаем данные для главной страницы
        $heroContent = AboutContent::getBySection('hero');
        $aboutContent = AboutContent::getBySection('about');
        $statistics = AboutContent::getBySection('statistics');
        
        // Получаем активные услуги
        $services = Service::where('is_active', true)
            ->orderBy('sort_order')
            ->take(4)
            ->get();
            
        // Получаем последние новости
        $latestNews = News::published()
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();
            
        // Получаем рекомендуемые проекты
        $featuredProjects = Project::featured()
            ->published()
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
        
        return view('pages.home', compact(
            'positions',
            'heroContent', 
            'aboutContent',
            'statistics',
            'services',
            'latestNews',
            'featuredProjects'
        ));
    }
    
    public function about()
    {
        $aboutContent = AboutContent::getBySection('about');
        $teamContent = AboutContent::getBySection('team');
        $historyContent = AboutContent::getBySection('history');
        $missionContent = AboutContent::getBySection('mission');
        $certificatesContent = AboutContent::getBySection('certificates');
        
        return view('pages.about', compact(
            'aboutContent',
            'teamContent', 
            'historyContent',
            'missionContent',
            'certificatesContent'
        ));
    }
    
    public function services()
    {
        $services = Service::where('is_active', true)
            ->orderBy('category')
            ->orderBy('sort_order')
            ->get()
            ->groupBy('category');
            
        return view('pages.services', compact('services'));
    }
    
    public function contact()
    {
        $positions = Position::all()->toArray();
        return view('pages.contact', compact('positions'));
    }

    public function certRequest(CertificateRequest $request)
    {
        $validData = $request->validated();

        foreach ($validData['requests'] as $value) {
            $addRequest = \App\Models\CertificateRequest::create([
                'last_name' => $value['last_name'],
                'first_name' => $value['first_name'],
                'middle_name' => $value['middle_name'] ?? null,
                'iin' => $value['iin'],
                'activity_type' => $value['activity_type'],
                'specialty' => $value['specialty'],
                'specialty_id' => $value['specialty'],
                'phone' => $value['phone'],
                'workplace' => $value['workplace'] ?? null,
                'sender_name' => $value['sender_name'] ?? null,
                'document' => $value['document'] ?? null,
                'status' => "new",
                'chat_id' => 0
            ]);

            if (isset($value['documents']) && is_array($value['documents'])) {
                $fileData = [];

                foreach ($value['documents'] as $doc) {
                    if (isset($doc['file']) && $doc['file'] instanceof \Illuminate\Http\UploadedFile) {
                        $datePath = date('Y/m/d'); // Формируем путь по дате
                        $uploadPath = Storage::disk('public')->path("uploads/{$datePath}");

                        if (!file_exists($uploadPath)) {
                            mkdir($uploadPath, 0777, true);
                        }

                        $filename = time() . '_' . uniqid() . '.' . $doc['file']->getClientOriginalExtension();
                        $doc['file']->move($uploadPath, $filename);

                        $fileData[] = [
                            'name' => $doc['name'] ?? 'Без названия',
                            'path' => "uploads/{$datePath}/{$filename}"
                        ];
                    }
                }

                $addRequest->document = $fileData;
                $addRequest->save();
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Заявка успешно отправлена'
        ]);
    }

    public function checkCert(Request $request)
    {
        $cert = \App\Models\CertificateRequest::where('iin', $request->iin)
            ->where('status', 'confirmed')
            ->get();

        $result = [];
        if ($cert->isNotEmpty()) {
            foreach ($cert as $value) {
                $result[] = [
                    'certificate_number' => $value->certificate_number,
                    'certificate_date' => $value->certificate_date,
                    'certificate_file' => \Storage::disk('public')->url($value->certificate_file),
                    'specialty' => Position::find($value->specialty_id)->name_ru ?? null,
                ];
            }
        }

        if ($result) {
            return response()->json([
                'status' => true,
                'message' => 'Заявка найдена',
                'data' => $result
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Заявка не найдена'
            ]);
        }
    }
}
