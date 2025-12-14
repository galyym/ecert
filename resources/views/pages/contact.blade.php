@extends('layouts.app')

@section('title', 'Контакты - ТОО ВсеСтрой')
@section('meta_description', 'Свяжитесь с ТОО ВсеСтрой по вопросам аттестации и сертификации. Телефон: +7 (702) 912-23-00. Адрес: г. Актау, 29а мкр, 145, БЦ АБК, офис 103.')

@section('content')

<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>{{ __('messages.contacts_title') }}</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('messages.home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('messages.contacts_title') }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- Contact Information -->
<section class="contact-info section">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2>{{ __('messages.contact_us_title') }}</h2>
                <p class="lead">
                    {{ __('messages.contact_us_desc') }}
                </p>
            </div>
        </div>

        <div class="row g-4">
            <!-- Phone -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="contact-item">
                    <div class="contact-icon">
                        <i class="bi bi-telephone"></i>
                    </div>
                    <div class="contact-content">
                        <h3>{{ __('messages.phone_label') }}</h3>
                        <p>
                            <a href="tel:+77029122300">+7 (702) 912-23-00</a>
                        </p>
                        <small>{{ __('messages.work_schedule') }}</small>
                    </div>
                </div>
            </div>

            <!-- Email -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="contact-item">
                    <div class="contact-icon">
                        <i class="bi bi-envelope"></i>
                    </div>
                    <div class="contact-content">
                        <h3>{{ __('messages.email_label') }}</h3>
                        <p>
                            <a href="mailto:ermek_ospanov@mail.ru">ermek_ospanov@mail.ru</a>
                        </p>
                        <small>{{ __('messages.email_response_time') }}</small>
                    </div>
                </div>
            </div>

            <!-- Address -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="contact-item">
                    <div class="contact-icon">
                        <i class="bi bi-geo-alt"></i>
                    </div>
                    <div class="contact-content">
                        <h3>{{ __('messages.address_label') }}</h3>
                        <p>
                            {!! __('messages.address_val') !!}
                        </p>
                        <small>{{ __('messages.country_val') }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map and Contact Form -->
<section class="contact-details section light-background">
    <div class="container" data-aos="fade-up">
        <div class="row gy-5">

            <!-- Map -->
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <div class="map-wrapper">
                    <h3>{{ __('messages.location_title') }}</h3>
                    <div class="map-container">
                        <iframe
                            src="https://yandex.ru/map-widget/v1/?um=constructor%3A2a8fd567db08c1b8152f2963fb3e4ad77faf6e94191026ee87b470e59794d943&amp;source=constructor"
                            width="100%"
                            height="400"
                            frameborder="0"
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                    <div class="map-info mt-3">
                        <p><strong>{{ __('messages.how_to_get') }}:</strong></p>
                        <p>{{ __('messages.location_desc') }}</p>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                <div class="contact-form-wrapper">
                    <h3>{{ __('messages.quick_contact_title') }}</h3>
                    <p>{{ __('messages.quick_contact_desc') }}</p>

                    <form class="contact-form" id="quickContactForm" novalidate>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contact_name">{{ __('messages.form_name') }}</label>
                                    <input type="text" class="form-control" id="contact_name" name="name" required>
                                    <div class="invalid-feedback">{{ __('messages.error_name') }}</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contact_phone">{{ __('messages.form_phone') }}</label>
                                    <input type="tel" class="form-control" id="contact_phone" name="phone" required>
                                    <div class="invalid-feedback">{{ __('messages.error_phone') }}</div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="contact_email">{{ __('messages.email_label') }}</label>
                            <input type="email" class="form-control" id="contact_email" name="email">
                            <div class="invalid-feedback">{{ __('messages.error_email') }}</div>
                        </div>

                        <div class="form-group">
                            <label for="contact_subject">{{ __('messages.form_subject') }}</label>
                            <select class="form-select" id="contact_subject" name="subject">
                                <option value="">{{ __('messages.select_subject') }}</option>
                                <option value="attestation">{{ __('messages.subject_attestation') }}</option>
                                <option value="accreditation">{{ __('messages.subject_accreditation') }}</option>
                                <option value="training">{{ __('messages.subject_training') }}</option>
                                <option value="consultation">{{ __('messages.subject_consultation') }}</option>
                                <option value="other">{{ __('messages.subject_other') }}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="contact_message">{{ __('messages.form_message') }}</label>
                            <textarea class="form-control" id="contact_message" name="message" rows="5" required placeholder="{{ __('messages.placeholder_message') }}"></textarea>
                            <div class="invalid-feedback">{{ __('messages.error_message') }}</div>
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="contact_agreement" name="agreement" required>
                                <label class="form-check-label" for="contact_agreement">
                                    {{ __('messages.form_agreement') }}
                                </label>
                                <div class="invalid-feedback">{{ __('messages.error_agreement') }}</div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg w-100">
                            <i class="bi bi-send"></i> {{ __('messages.form_send_btn') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Working Hours -->
<section class="working-hours section">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="hours-card">
                    <div class="row align-items-center">
                        <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0">
                            <h3><i class="bi bi-clock me-2"></i>{{ __('messages.working_hours_title') }}</h3>
                            <p class="mb-0">{{ __('messages.working_for_convenience') }}</p>
                        </div>
                        <div class="col-lg-6">
                            <div class="hours-list">
                                <div class="hours-item">
                                    <span class="day">{{ __('messages.mon_fri') }}</span>
                                    <span class="time">9:00 - 18:00</span>
                                </div>
                                <div class="hours-item">
                                    <span class="day">{{ __('messages.sat') }}</span>
                                    <span class="time">10:00 - 15:00</span>
                                </div>
                                <div class="hours-item">
                                    <span class="day">{{ __('messages.sun') }}</span>
                                    <span class="time">{{ __('messages.day_off') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-contact section light-background">
    <div class="container" data-aos="fade-up">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <h2>{{ __('messages.ready_to_start_attestation') }}</h2>
                <p class="lead mb-4">
                    {{ __('messages.apply_now_desc') }}
                </p>
                <div class="cta-buttons">
                    <button onclick="openApplicationModal()" class="btn btn-primary btn-lg me-3">
                        <i class="bi bi-file-text"></i> {{ __('messages.apply_btn') }}
                    </button>
                    <button onclick="openSearchModal()" class="btn btn-outline-primary btn-lg">
                        <i class="bi bi-search"></i> {{ __('messages.find_certificate') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
    .contact-item {
        background: white;
        border-radius: 15px;
        padding: 2rem;
        text-align: center;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 100%;
    }

    .contact-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    }

    .contact-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, var(--accent-color), #1a5490);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        margin: 0 auto 1.5rem;
    }

    .contact-content h3 {
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: var(--heading-color);
    }

    .contact-content p {
        margin-bottom: 0.5rem;
        font-size: 1.1rem;
    }

    .contact-content a {
        color: var(--accent-color);
        text-decoration: none;
        font-weight: 500;
    }

    .contact-content a:hover {
        text-decoration: underline;
    }

    .contact-content small {
        color: #666;
        font-style: italic;
    }

    .map-wrapper,
    .contact-form-wrapper {
        background: white;
        border-radius: 15px;
        padding: 2rem;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        height: 100%;
    }

    .map-wrapper h3,
    .contact-form-wrapper h3 {
        font-size: 1.8rem;
        font-weight: 600;
        margin-bottom: 1rem;
        color: var(--heading-color);
    }

    .map-container {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 3px 15px rgba(0, 0, 0, 0.1);
    }

    .map-info {
        background: #f8f9fa;
        border-radius: 10px;
        padding: 1rem;
    }

    .contact-form .form-group {
        margin-bottom: 1.5rem;
    }

    .contact-form label {
        font-weight: 500;
        margin-bottom: 0.5rem;
        color: var(--heading-color);
    }

    .contact-form .form-control,
    .contact-form .form-select {
        border: 2px solid #e9ecef;
        border-radius: 8px;
        padding: 0.75rem 1rem;
        font-size: 1rem;
        transition: border-color 0.3s ease;
    }

    .contact-form .form-control:focus,
    .contact-form .form-select:focus {
        border-color: var(--accent-color);
        box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
    }

    .contact-form .form-control.is-invalid {
        border-color: #dc3545;
    }

    .contact-form .form-check-input {
        margin-top: 0.25rem;
    }

    .contact-form .form-check-label {
        font-size: 0.9rem;
        color: #666;
    }

    .hours-card {
        background: white;
        border-radius: 15px;
        padding: 2rem;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    }

    .hours-card h3 {
        font-size: 1.8rem;
        font-weight: 600;
        color: var(--heading-color);
        margin-bottom: 0.5rem;
    }

    .hours-list {
        space-y: 0.5rem;
    }

    .hours-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.5rem 0;
        border-bottom: 1px solid #eee;
    }

    .hours-item:last-child {
        border-bottom: none;
    }

    .hours-item .day {
        font-weight: 500;
        color: var(--heading-color);
    }

    .hours-item .time {
        color: var(--accent-color);
        font-weight: 500;
    }

    .cta-buttons .btn {
        margin: 0.5rem;
    }

    @media (max-width: 768px) {
        .page-header h1 {
            font-size: 2rem;
        }

        .contact-item {
            margin-bottom: 2rem;
        }

        .map-wrapper,
        .contact-form-wrapper {
            padding: 1.5rem;
            margin-bottom: 2rem;
        }

        .hours-item {
            flex-direction: column;
            align-items: flex-start;
            text-align: left;
        }

        .hours-item .time {
            margin-top: 0.25rem;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('quickContactForm');

        if (form) {
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                // Простая валидация
                let isValid = true;
                const requiredFields = form.querySelectorAll('[required]');

                requiredFields.forEach(field => {
                    if (!field.value.trim()) {
                        field.classList.add('is-invalid');
                        isValid = false;
                    } else {
                        field.classList.remove('is-invalid');
                    }
                });

                // Проверка email если заполнен
                const emailField = form.querySelector('[name="email"]');
                if (emailField.value && !isValidEmail(emailField.value)) {
                    emailField.classList.add('is-invalid');
                    isValid = false;
                }

                if (isValid) {
                    // Показываем индикатор загрузки
                    const submitBtn = form.querySelector('button[type="submit"]');
                    const originalText = submitBtn.innerHTML;
                    submitBtn.innerHTML = '<i class="bi bi-hourglass-split"></i> {{ __("messages.sending") }}';
                    submitBtn.disabled = true;

                    // Собираем данные формы
                    const formData = new FormData(form);

                    // Добавляем CSRF токен
                    formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

                    // Отправляем данные на сервер
                    fetch('{{ route("contact.store") }}', {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.status) {
                                // Успешная отправка
                                alert(data.message);
                                form.reset();
                                form.querySelectorAll('.is-invalid').forEach(field => {
                                    field.classList.remove('is-invalid');
                                });
                            } else {
                                // Ошибки валидации
                                if (data.errors) {
                                    // Показываем ошибки валидации
                                    Object.keys(data.errors).forEach(field => {
                                        const input = form.querySelector(`[name="${field}"]`);
                                        if (input) {
                                            input.classList.add('is-invalid');
                                            const feedback = input.parentNode.querySelector('.invalid-feedback');
                                            if (feedback) {
                                                feedback.textContent = data.errors[field][0];
                                            }
                                        }
                                    });
                                }
                                alert(data.message || '{{ __("messages.send_error") }}');
                            }
                        })
                        .catch(error => {
                            console.error('Ошибка:', error);
                            alert('{{ __("messages.send_error") }}');
                        })
                        .finally(() => {
                            // Восстанавливаем кнопку
                            submitBtn.innerHTML = originalText;
                            submitBtn.disabled = false;
                        });
                }
            });
        }
    });

    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
</script>
@endpush