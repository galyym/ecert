@extends('layouts.app')

@section('title', 'Контакты - ТОО ВсеСтрой')
@section('meta_description', 'Свяжитесь с ТОО ВсеСтрой по вопросам аттестации и сертификации. Телефон: +7 (702) 912-23-00. Адрес: г. Актау, 29а мкр, 145, БЦ АБК, офис 103.')

@section('content')

<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Контакты</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Контакты</li>
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
                <h2>Свяжитесь с нами</h2>
                <p class="lead">
                    Мы всегда готовы ответить на ваши вопросы и предоставить
                    профессиональную консультацию по услугам аттестации и сертификации
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
                        <h3>Телефон</h3>
                        <p>
                            <a href="tel:+77029122300">+7 (702) 912-23-00</a>
                        </p>
                        <small>Пн-Пт: 9:00-18:00</small>
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
                        <h3>Email</h3>
                        <p>
                            <a href="mailto:ermek_ospanov@mail.ru">ermek_ospanov@mail.ru</a>
                        </p>
                        <small>Ответим в течение 24 часов</small>
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
                        <h3>Адрес</h3>
                        <p>
                            г. Актау, 29а мкр, 145<br>
                            БЦ "АБК", офис 103
                        </p>
                        <small>Республика Казахстан</small>
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
                    <h3>Наше местоположение</h3>
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
                        <p><strong>Как добраться:</strong></p>
                        <p>БЦ "АБК" находится в центральной части 29а микрорайона.
                        Удобная транспортная развязка, рядом остановки общественного транспорта.</p>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                <div class="contact-form-wrapper">
                    <h3>Быстрая связь</h3>
                    <p>Оставьте сообщение, и мы свяжемся с вами в ближайшее время</p>

                    <form class="contact-form" id="quickContactForm" novalidate>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contact_name">Имя *</label>
                                    <input type="text" class="form-control" id="contact_name" name="name" required>
                                    <div class="invalid-feedback">Пожалуйста, введите ваше имя</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contact_phone">Телефон *</label>
                                    <input type="tel" class="form-control" id="contact_phone" name="phone" required>
                                    <div class="invalid-feedback">Пожалуйста, введите номер телефона</div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="contact_email">Email</label>
                            <input type="email" class="form-control" id="contact_email" name="email">
                            <div class="invalid-feedback">Пожалуйста, введите корректный email</div>
                        </div>

                        <div class="form-group">
                            <label for="contact_subject">Тема обращения</label>
                            <select class="form-select" id="contact_subject" name="subject">
                                <option value="">Выберите тему</option>
                                <option value="attestation">Вопросы по аттестации</option>
                                <option value="accreditation">Вопросы по аккредитации</option>
                                <option value="training">Обучение и курсы</option>
                                <option value="consultation">Консультация</option>
                                <option value="other">Другое</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="contact_message">Сообщение *</label>
                            <textarea class="form-control" id="contact_message" name="message" rows="5" required placeholder="Опишите ваш вопрос подробнее..."></textarea>
                            <div class="invalid-feedback">Пожалуйста, введите сообщение</div>
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="contact_agreement" name="agreement" required>
                                <label class="form-check-label" for="contact_agreement">
                                    Я согласен на обработку персональных данных *
                                </label>
                                <div class="invalid-feedback">Необходимо согласие на обработку данных</div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg w-100">
                            <i class="bi bi-send"></i> Отправить сообщение
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
                            <h3><i class="bi bi-clock me-2"></i>График работы</h3>
                            <p class="mb-0">Мы работаем для вашего удобства</p>
                        </div>
                        <div class="col-lg-6">
                            <div class="hours-list">
                                <div class="hours-item">
                                    <span class="day">Понедельник - Пятница:</span>
                                    <span class="time">9:00 - 18:00</span>
                                </div>
                                <div class="hours-item">
                                    <span class="day">Суббота:</span>
                                    <span class="time">10:00 - 15:00</span>
                                </div>
                                <div class="hours-item">
                                    <span class="day">Воскресенье:</span>
                                    <span class="time">Выходной</span>
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
                <h2>Готовы начать аттестацию?</h2>
                <p class="lead mb-4">
                    Подайте заявку прямо сейчас или получите консультацию наших экспертов
                </p>
                <div class="cta-buttons">
                    <button onclick="openApplicationModal()" class="btn btn-primary btn-lg me-3">
                        <i class="bi bi-file-text"></i> Подать заявку
                    </button>
                    <button onclick="openSearchModal()" class="btn btn-outline-primary btn-lg">
                        <i class="bi bi-search"></i> Найти сертификат
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
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    height: 100%;
}

.contact-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
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

.map-wrapper, .contact-form-wrapper {
    background: white;
    border-radius: 15px;
    padding: 2rem;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    height: 100%;
}

.map-wrapper h3, .contact-form-wrapper h3 {
    font-size: 1.8rem;
    font-weight: 600;
    margin-bottom: 1rem;
    color: var(--heading-color);
}

.map-container {
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 3px 15px rgba(0,0,0,0.1);
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
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
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

    .map-wrapper, .contact-form-wrapper {
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
                submitBtn.innerHTML = '<i class="bi bi-hourglass-split"></i> Отправка...';
                submitBtn.disabled = true;
                
                // Собираем данные формы
                const formData = new FormData(form);
                
                // Добавляем CSRF токен
                formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
                
                // Отправляем данные на сервер
                fetch('{{ route('contact.store') }}', {
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
                        alert(data.message || 'Произошла ошибка при отправке формы');
                    }
                })
                .catch(error => {
                    console.error('Ошибка:', error);
                    alert('Произошла ошибка при отправке сообщения. Пожалуйста, попробуйте позже или свяжитесь с нами по телефону.');
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
