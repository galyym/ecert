<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>ТОО ВсеСтрой</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
</head>

<body class="index-page">

<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

        <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto me-xl-0">
            <h1 class="sitename">TOO ВсеСтрой</h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="#hero" class="active">Главная страница</a></li>
                <li><a href="#about">О нас</a></li>
                <li><a href="#features">Поиск аттестата</a></li>
                <li><a href="#services">Услуги</a></li>
                <li><a href="#contact">Контакты</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <a class="btn-getstarted" href="{{ route('home') }}#about">Оставить заявку</a>

    </div>
</header>

<main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="hero-content" data-aos="fade-up" data-aos-delay="200">
                        <h1 class="mb-5">
                            Аттестация инженерно- <br>
                            технических <br>
                            <span class="accent-text">работников</span>
                        </h1>

                        <p class="mb-4 mb-md-5">
                            Аттестация инженерно-технических работников,
                            участвующих в процессе проектирования и строительства
                        </p>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="hero-image" data-aos="zoom-out" data-aos-delay="300">
                        <img src="{{ asset('assets/img/illustration-1.webp') }}" alt="Hero Image" class="img-fluid">
                    </div>
                </div>
            </div>

            <div class="row stats-row gy-4 mt-5" data-aos="fade-up" data-aos-delay="500">
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i class="bi bi-trophy"></i>
                        </div>
                        <div class="stat-content">
                            <h4>98% успешных аттестаций</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i class="bi bi-briefcase"></i>
                        </div>
                        <div class="stat-content">
                            <h4>1 000 сертифицированных инженеров</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i class="bi bi-graph-up"></i>
                        </div>
                        <div class="stat-content">
                            <h4>95% удовлетворенности клиентов</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i class="bi bi-award"></i>
                        </div>
                        <div class="stat-content">
                            <h4>5+ лет опыта</h4>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4 align-items-center justify-content-between">

                <div class="col-xl-5" data-aos="fade-up" data-aos-delay="200">
                    <h2 class="about-title">НАША КОМАНДА — ВАША НАДЕЖНОСТЬ</h2>
                    <p class="about-description">ТОО ВсеСтрой — ваш надежный партнёр в сфере аттестации и сертификации с 2013 года. Несмотря на молодой возраст, мы уже заслужили доверие сотен компаний Казахстана благодаря профессионализму, оперативности и строгому соблюдению стандартов. Каждый наш эксперт проходит ежегодную аттестацию, чтобы гарантировать вам актуальные знания и соответствие международным стандартам.</p>

                    <div class="row feature-list-wrapper">
                        <div class="col-md-6">
                            <ul class="feature-list">
                                <li><i class="bi bi-check-circle-fill"></i> Аттестация за 1 рабочих дней</li>
                                <li><i class="bi bi-check-circle-fill"></i> Лицензии I–III категорий</li>
                                <li><i class="bi bi-check-circle-fill"></i> Гарантия соответствия ГОСТ и ISO</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="feature-list">
                                <li><i class="bi bi-check-circle-fill"></i> Поддержка 24/7</li>
                                <li><i class="bi bi-check-circle-fill"></i> Соблюдение сроков</li>
                                <li><i class="bi bi-check-circle-fill"></i> Конфиденциальность данных</li>
                            </ul>
                        </div>
                    </div>

                    <div class="info-wrapper">
                        <div class="row gy-4">
                            <div class="col-lg-7">
                                <div class="contact-info d-flex align-items-center gap-2">
                                    <i class="bi bi-telephone-fill"></i>
                                    <div>
                                        <p class="contact-label">Контакты</p>
                                        <p class="contact-number">+7 (702) 912-23-00</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="image-wrapper">
                        <div class="images position-relative" data-aos="zoom-out" data-aos-delay="400">
                            <img src=" {{asset('assets/img/about-5.webp') }}" alt="Business Meeting" class="img-fluid main-image rounded-4">
                            <img src=" {{asset('assets/img/about-2.webp') }}" alt="Team Discussion" class="img-fluid small-image rounded-4">
                        </div>
                        <div class="experience-badge floating">
                            <h3>5+ лет</h3>
                            <p>Профессионализм в бизнес-услугах</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section><!-- /About Section -->

    <section id="services" class="services section light-background">

        <!-- Заголовок секции -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Услуги</h2>
            <p>Полный спектр услуг для юридических лиц и специалистов</p>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row g-4">

                <!-- Карточка: Аттестация -->
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-card">
                        <div class="icon-header d-flex align-items-center">
                            <div class="icon flex-shrink-0">
                                <i class="bi bi-file-earmark-medical"></i>
                            </div>
                            <h3>Аттестация</h3>
                        </div>
                        <ul class="service-list">
                            <li>Аттестация инженерно-технических работников (проектирование и строительство)</li>
                            <li>Аттестат на право работ в области промышленной безопасности</li>
                            <li>Экспертиза градостроительной и проектной документации</li>
                            <li>Технический и авторский надзор</li>
                            <li>Обследование надежности зданий и сооружений</li>
                        </ul>
                    </div>
                </div>

                <!-- Карточка: Аккредитация -->
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-card">
                        <div class="icon-header d-flex align-items-center">
                            <div class="icon flex-shrink-0">
                                <i class="bi bi-award"></i>
                            </div>
                            <h3>Аккредитация</h3>
                        </div>
                        <ul class="service-list">
                            <li>Аккредитация организаций в сфере управления проектами</li>
                            <li>Аккредитация для технического надзора (1-2 уровень ответственности)</li>
                            <li>Комплексная вневедомственная экспертиза объектов</li>
                        </ul>
                    </div>
                </div>

                <!-- Карточка: Лицензирование -->
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-card">
                        <div class="icon-header d-flex align-items-center">
                            <div class="icon flex-shrink-0">
                                <i class="bi bi-card-checklist"></i>
                            </div>
                            <h3>Лицензирование</h3>
                        </div>
                        <ul class="service-list">
                            <li>Изыскательская деятельность</li>
                            <li>Лицензии на проектирование I-III категорий</li>
                            <li>Лицензии на строительно-монтажные работы I-III категорий</li>
                            <li>Работы в области охраны окружающей среды</li>
                        </ul>
                    </div>
                </div>

                <!-- Карточка: Промышленная безопасность -->
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-card">
                        <div class="icon-header d-flex align-items-center">
                            <div class="icon flex-shrink-0">
                                <i class="bi bi-shield-check"></i>
                            </div>
                            <h3>Промышленная безопасность</h3>
                        </div>
                        <ul class="service-list">
                            <li>Обучение и переподготовка специалистов</li>
                            <li>Пожарно-технический минимум</li>
                            <li>Электробезопасность и работы на высоте</li>
                            <li>Программы с отрывом/без отрыва от производства</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Секция "Наши клиенты" -->
    <section class="clients-section">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Наши клиенты</h2>

            <!-- Бегущая строка с логотипами -->
            <div class="logos-scroll-container">
                <div class="logos-track">
                    <!-- Оригинальные логотипы -->
                    <div class="logo-item">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="Логотип клиента">
                    </div>
                    <div class="logo-item">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="Логотип клиента">
                    </div>
                    <div class="logo-item">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="Логотип клиента">
                    </div>
                    <div class="logo-item">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="Логотип клиента">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact section light-background">

        <!-- Заголовок секции -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Контакты</h2>
            <p>Свяжитесь с нами удобным для вас способом</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row g-4 g-lg-5">

                <!-- Контактная информация -->
                <div class="col-lg-5">
                    <div class="info-box" data-aos="fade-up" data-aos-delay="200">
                        <h3>Контактные данные</h3>

                        <!-- Адрес -->
                        <div class="info-item" data-aos="fade-up" data-aos-delay="300">
                            <div class="icon-box">
                                <i class="bi bi-geo-alt"></i>
                            </div>
                            <div class="content">
                                <h4>Наш адрес</h4>
                                <p>г. Актау, 29а мкр, 145</p>
                                <p>БЦ "АБК", офис 103</p>
                            </div>
                        </div>

                        <!-- Телефон -->
                        <div class="info-item" data-aos="fade-up" data-aos-delay="400">
                            <div class="icon-box">
                                <i class="bi bi-telephone"></i>
                            </div>
                            <div class="content">
                                <h4>Телефон</h4>
                                <p>+7 (702) 912-23-00</p>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="info-item" data-aos="fade-up" data-aos-delay="500">
                            <div class="icon-box">
                                <i class="bi bi-envelope"></i>
                            </div>
                            <div class="content">
                                <h4>Электронная почта</h4>
                                <p>ermek_ospanov@mail.ru</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Карта -->
                <div class="col-lg-7">
                    <div class="map-container" data-aos="fade-up" data-aos-delay="300">
                        <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A2a8fd567db08c1b8152f2963fb3e4ad77faf6e94191026ee87b470e59794d943&amp;source=constructor" width="736" height="407" frameborder="0"></iframe>
                    </div>
                </div>

            </div>
        </div>
    </section><!-- /Contact Section -->


    <!-- Модальное окно -->
    <div id="applicationModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>

            <h2 class="modal-title">Заявка на аттестацию</h2>

            <div class="modal-scrollable">
                <table class="responsive-table">
                    <thead>
                    <tr>
                        <th>№</th>
                        <th>* Фамилия</th>
                        <th>* Имя</th>
                        <th>Отчество</th>
                        <th>* ИИН</th>
                        <th>* Вид деятельности</th>
                        <th>* Специальность</th>
                        <th>* Телефон</th>
                        <th>Место работы</th>
                        <th>* Отправитель</th>
                        <th>Документ</th>
                    </tr>
                    </thead>
                    <tbody id="tableOrder">
                    <tr id="row1">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <td>1</td>
                        <td><input type="text" class="form-control" name="last_name" required></td>
                        <td><input type="text" class="form-control" name="first_name" required></td>
                        <td><input type="text" class="form-control" name="middle_name"></td>
                        <td><input type="text" class="form-control" name="iin" pattern="\d{12}" required></td>
                        <td>
                            <select class="form-select activity_type" name="activity_type" required>
                                <option value="" disabled selected>Выберите</option>
                                <option value="ПД">ПД</option>
                                <option value="СМР">СМР</option>
                            </select>
                        </td>
                        <td>
                            <select class="form-select specialty" name="specialty" required>
                                <option value="" disabled selected>Выберите</option>
                            </select>
                        </td>
                        <td><input type="tel" class="form-control" name="phone" required></td>
                        <td><input type="text" class="form-control" name="workplace"></td>
                        <td><input type="text" class="form-control" name="sender_name" required></td>
                        <td>
                            <div class="documents-container">
                                <div class="document-item">
                                    <input type="text"
                                           class="form-control doc-name"
                                           placeholder="Название документа"
                                           name="docName[]">
                                    <input type="file"
                                           class="form-control doc-file"
                                           name="docFile[]"
                                           accept="image/*,.pdf">
                                    <button type="button"
                                            class="btn-remove-doc"
                                            onclick="removeDocumentField(this)"
                                            style="display: none;">
                                        ×
                                    </button>
                                </div>
                            </div>
                            <button type="button"
                                    class="btn-add-doc"
                                    onclick="addDocumentField(this)">
                                + Добавить документ
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="modal-actions">
                <button type="button" class="btn btn-info" onclick="addRow()">
                    <i class="bi bi-plus-circle"></i> Добавить строку
                </button>
                <button type="button" class="btn btn-danger" onclick="resetForm()">
                    <i class="bi bi-eraser"></i> Очистить форму
                </button>
                <button type="button" class="btn btn-primary" onclick="addOrder()">
                    Отправить заявку
                </button>
            </div>
        </div>
    </div>


    <div id="searchModal" class="modal">
        <div class="modal-content" style="max-width: 500px;">
            <span class="close" onclick="closeSearchModal()">&times;</span>
            <h3 class="modal-title">Поиск аттестата</h3>

            <form id="searchForm" onsubmit="handleSearch(event)">
                <div class="form-group">
                    <label>Введите ИИН:</label>
                    <input type="text"
                           class="form-control"
                           name="iin"
                           pattern="\d{12}"
                           maxlength="12"
                           placeholder="000000000000"
                           required>
                </div>

                <div class="modal-actions">
                    <button type="submit" class="btn btn-primary">
                        Поиск
                    </button>
                </div>
            </form>
        </div>
    </div>


</main>

<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>

<!-- Main JS File -->
<script src="{{ asset('assets/js/main.js') }}"></script>

<script>
    // Динамическое дублирование логотипов
    document.addEventListener('DOMContentLoaded', function() {
        const track = document.querySelector('.logos-track');
        const originalLogos = track.innerHTML;

        // Клонируем оригинальные логотипы 2 раза
        track.innerHTML = originalLogos + originalLogos + originalLogos;

        // Рассчитываем скорость анимации
        const logoCount = track.children.length;
        const duration = logoCount * 3; // 3s per logo set

        track.style.animationDuration = `${duration}s`;
    });
</script>

<script>
    // Открытие модального окна
    document.querySelector('.btn-getstarted').addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('applicationModal').style.display = 'block';
    });

    // Закрытие модального окна
    document.querySelector('.close').addEventListener('click', function() {
        document.getElementById('applicationModal').style.display = 'none';
    });

    // Закрытие при клике вне окна
    window.onclick = function(event) {
        if (event.target == document.getElementById('applicationModal')) {
            document.getElementById('applicationModal').style.display = 'none';
        }
    }

    // select

    const positions = @json($positions);

    // Функция обновления опций специальностей
    function updateSpecialtyOptions(selectActivity, selectSpecialty) {
        const activityType = selectActivity.value;
        selectSpecialty.innerHTML = '<option value="" disabled selected>Выберите</option>';
        console.log(positions, activityType)

        positions.forEach(position => {
            if (activityType && position["type"] === activityType) {
                const opt = document.createElement("option");
                opt.value = position["name_kk"];
                opt.textContent = position["name_kk"];
                selectSpecialty.appendChild(opt);
            }
        });
    }

    document.getElementById('tableOrder').addEventListener('change', function(event) {
        if (event.target.classList.contains('activity_type')) {
            const row = event.target.closest('tr');
            const selectSpecialty = row.querySelector('.specialty');
            updateSpecialtyOptions(event.target, selectSpecialty);
        }
    });

    // Функция для очистки формы
    function resetForm() {
        if (!confirm('Вы уверены, что хотите очистить всю форму?')) return;

        // Удаляем все строки, кроме первой
        const table = document.getElementById('tableOrder');
        while (table.rows.length > 1) {
            table.deleteRow(1);
        }

        // Сбрасываем значения в первой строке
        const firstRow = document.getElementById('row1');
        firstRow.querySelectorAll('input').forEach(input => {
            if (input.type !== 'button') input.value = '';
        });
        firstRow.querySelectorAll('select').forEach(select => {
            select.selectedIndex = 0;
            if (select.classList.contains('specialty')) {
                select.innerHTML = '<option value="" disabled selected>Выберите</option>';
            }
        });

        // Удаляем все документы, кроме первого
        const docContainers = document.querySelectorAll('.documents-container');
        docContainers.forEach(container => {
            while (container.children.length > 1) {
                container.lastChild.remove();
            }
            // Сбрасываем первый документ
            const firstDoc = container.firstElementChild;
            firstDoc.querySelector('.doc-name').value = '';
            firstDoc.querySelector('.doc-file').value = '';
            firstDoc.querySelector('.btn-remove-doc').style.display = 'none';
        });

        // Очищаем localStorage
        localStorage.removeItem('savedForm');
        formData = [];

        alert('Форма успешно очищена!');
    }
</script>

<script>
    // Хранилище данных
    let formData = [];

    // Функция добавления строки
    function addRow() {
        const table = document.getElementById('tableOrder');
        const rows = table.getElementsByTagName('tr');
        const newRow = rows[rows.length - 1].cloneNode(true);

        // Очистка значений и обновление номера
        const newNumber = rows.length + 1;
        newRow.id = `row${newNumber}`;
        newRow.querySelector('td:first-child').textContent = newNumber;
        newRow.querySelectorAll('input').forEach(input => input.value = '');
        newRow.querySelectorAll('select').forEach(select => {
            select.selectedIndex = 0;
            if(select.classList.contains('specialty')) {
                select.innerHTML = '<option value="" disabled selected>Выберите</option>';
            }
        });

        table.appendChild(newRow);
    }

    // Сохранение данных
    function saveFormData() {
        formData = [];
        document.querySelectorAll('#tableOrder tr').forEach((row, index) => {
            const docs = [];
            row.querySelectorAll('.document-item').forEach(doc => {
                docs.push({
                    name: doc.querySelector('.doc-name').value,
                    file: doc.querySelector('.doc-file').value
                });
            });

            const data = {
                last_name: row.querySelector('.last_name').value,
                first_name: row.querySelector('.first_name').value,
                middle_name: row.querySelector('.middle_name').value,
                iin: row.querySelector('.iin').value,
                activity_type: row.querySelector('.activity_type').value,
                specialty: row.querySelector('.specialty').value,
                phone: row.querySelector('.phone').value,
                workplace: row.querySelector('.workplace').value,
                sender_name: row.querySelector('.sender_name').value,
                docFile: row.querySelector('.docFile').value,
                documents: docs
            };
            formData.push(data);
        });
        localStorage.setItem('savedForm', JSON.stringify(formData));
    }

    // Загрузка данных
    function loadFormData() {
        const savedData = localStorage.getItem('savedForm');
        if (savedData) {
            formData = JSON.parse(savedData);
            formData.forEach((data, index) => {
                if (index > 0) addRow();
                const row = document.getElementById(`row${index + 1}`);

                // Загрузка документов
                if(data.documents) {
                    const container = row.querySelector('.documents-container');
                    container.innerHTML = '';
                    data.documents.forEach((doc, i) => {
                        if(i > 0) addDocumentField(row.querySelector('.btn-add-doc'));
                        const docItem = container.querySelector('.document-item:last-child');
                        docItem.querySelector('.doc-name').value = doc.name;
                        docItem.querySelector('.doc-file').value = doc.file;
                    });
                }
            });
        }
    }

    // Модифицированные функции открытия/закрытия
    document.querySelector('.btn-getstarted').addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('applicationModal').style.display = 'block';
        loadFormData(); // Загружаем данные при открытии
    });

    document.querySelector('.close').addEventListener('click', function() {
        saveFormData(); // Сохраняем перед закрытием
        document.getElementById('applicationModal').style.display = 'none';
    });

    // Функция для валидации данных
    function validateForm() {
        const errors = [];
        const rows = document.querySelectorAll('#tableOrder tr');

        // Проверка каждой строки
        rows.forEach((row, rowIndex) => {
            // Обязательные поля
            const requiredFields = {
                last_name: 'Фамилия обязательна для заполнения',
                first_name: 'Имя обязательно для заполнения',
                iin: 'ИИН должен состоять из 12 цифр',
                activity_type: 'Выберите вид деятельности',
                specialty: 'Выберите специальность',
                phone: 'Телефон обязателен для заполнения',
                workplace: 'Место работы обязательно для заполнения'
            };

            // Проверка обязательных полей
            Object.entries(requiredFields).forEach(([field, message]) => {
                const element = row.querySelector(`[name="${field}"]`);
                const value = element?.value.trim();

                if (!value) {
                    errors.push(`Строка ${rowIndex + 1}: ${message}`);
                }

                // Специальная проверка для ИИН
                if (field === 'iin' && value && !/^\d{12}$/.test(value)) {
                    errors.push(`Строка ${rowIndex + 1}: ИИН должен содержать ровно 12 цифр`);
                }
            });

            // Проверка документов
            const docItems = row.querySelectorAll('.document-item');
            docItems.forEach((doc, docIndex) => {
                const nameInput = doc.querySelector('.doc-name');
                const fileInput = doc.querySelector('.doc-file');

                if ((nameInput.value && !fileInput.files[0]) ||
                    (!nameInput.value && fileInput.files[0])) {
                    errors.push(`Строка ${rowIndex + 1}: Для документа ${docIndex + 1} необходимо заполнить и название, и файл`);
                }
            });
        });

        return errors;
    }

    // Функция для отправки данных
    async function addOrder() {
        const submitBtn = document.querySelector('.btn-primary');
        try {
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<div class="spinner-border spinner-border-sm" role="status"></div> Отправка...';

            // Валидация формы
            const validationErrors = validateForm();
            if (validationErrors.length > 0) {
                throw new Error(validationErrors.join('\n'));
            }

            // Проверка CSRF-токена
            const csrfMeta = document.querySelector('meta[name="csrf-token"]');
            if (!csrfMeta) {
                throw new Error('CSRF token not found');
            }
            const csrfToken = csrfMeta.content;

            const formData = new FormData();
            const rows = document.querySelectorAll('#tableOrder tr');

            // Добавляем CSRF-токен
            formData.append('_token', csrfToken);

            // Собираем данные
            rows.forEach((row, rowIndex) => {
                // Основные поля
                const fields = [
                    'last_name', 'first_name', 'middle_name', 'iin',
                    'activity_type', 'specialty', 'phone', 'workplace', 'sender_name'
                ];

                fields.forEach(field => {
                    const element = row.querySelector(`[name="${field}"]`);
                    if (element) {
                        formData.append(field, element.value.trim());
                    }
                });

                // Документы
                row.querySelectorAll('.document-item').forEach((doc, docIndex) => {
                    const nameInput = doc.querySelector('.doc-name');
                    const fileInput = doc.querySelector('.doc-file');

                    if (nameInput.value && fileInput.files[0]) {
                        formData.append(`documents[${docIndex}][name]`, nameInput.value.trim());
                        formData.append(`documents[${docIndex}][file]`, fileInput.files[0]);
                    }
                });
            });

            // Отправка данных
            const response = await axios.post('{{ route("cert_request") }}', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            });

            if (response.data.success) {
                alert('Заявка успешно отправлена!');
                document.getElementById('applicationModal').style.display = 'none';
                resetForm();
            } else {
                throw new Error(response.data.message || 'Ошибка сервера');
            }
        } catch (error) {
            console.error('Ошибка:', error);
            alert(error.response?.data?.message || error.message || 'Ошибка при отправке');
        } finally {
            submitBtn.disabled = false;
            submitBtn.innerHTML = 'Отправить заявку';
        }
    }

    function addDocumentField(button) {
        const container = button.previousElementSibling;
        const newItem = container.firstElementChild.cloneNode(true);
        newItem.querySelectorAll('input').forEach(input => input.value = '');

        // Показываем кнопку удаления для новых элементов
        newItem.querySelector('.btn-remove-doc').style.display = 'block';

        container.appendChild(newItem);
    }

    function removeDocumentField(button) {
        const container = button.closest('.documents-container');
        const items = container.querySelectorAll('.document-item');

        if(items.length > 1) {
            if(confirm('Удалить этот документ?')) {
                button.closest('.document-item').remove();
            }
        }
    }
</script>

<script>

    // Открытие модалки поиска
    document.querySelector('a[href="#features"]').addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('searchModal').style.display = 'block';
    });

    // Закрытие модалки
    function closeSearchModal() {
        document.getElementById('searchModal').style.display = 'none';
    }

    // Обработка отправки формы
    function handleSearch(e) {
        e.preventDefault();
        const iin = e.target.iin.value;

        // Здесь добавить логику поиска
        console.log('Поиск по ИИН:', iin);

        // Закрыть модалку после отправки
        closeSearchModal();
    }

    // Закрытие при клике вне окна
    window.onclick = function(event) {
        if (event.target == document.getElementById('searchModal')) {
            closeSearchModal();
        }
    }

</script>

</body>

</html>
