// Модальные окна
function openApplicationModal() {
    document.getElementById('applicationModal').style.display = 'block';
    document.body.style.overflow = 'hidden'; // Блокируем прокрутку основной страницы
    loadFormData(); // Загружаем сохраненные данные
}

function closeApplicationModal() {
    saveFormData(); // Сохраняем данные перед закрытием
    document.getElementById('applicationModal').style.display = 'none';
    document.body.style.overflow = ''; // Восстанавливаем прокрутку основной страницы
}

function openSearchModal() {
    document.getElementById('searchModal').style.display = 'block';
    document.body.style.overflow = 'hidden'; // Блокируем прокрутку основной страницы
}

function closeSearchModal() {
    document.getElementById('searchModal').style.display = 'none';
    document.body.style.overflow = ''; // Восстанавливаем прокрутку основной страницы
}

// Закрытие при клике вне окна
window.addEventListener('click', function (event) {
    const applicationModal = document.getElementById('applicationModal');
    const searchModal = document.getElementById('searchModal');

    if (event.target == applicationModal) {
        closeApplicationModal();
    }
    if (event.target == searchModal) {
        closeSearchModal();
    }
});

// Хранилище данных формы
let formData = [];

// Функция обновления опций специальностей
function updateSpecialtyOptions(selectActivity, selectSpecialty) {
    const activityType = selectActivity.value;
    selectSpecialty.innerHTML = `<option value="" disabled selected>${window.messages.choose}</option>`;

    if (typeof positions !== 'undefined') {
        positions.forEach(position => {
            if (activityType && position["type"] === activityType) {
                const opt = document.createElement("option");
                opt.value = position["id"];
                opt.textContent = position["name_ru"];
                selectSpecialty.appendChild(opt);
            }
        });
    }
}

// Обработка изменений в таблице заявок
document.addEventListener('DOMContentLoaded', function () {
    const tableOrder = document.getElementById('tableOrder');
    if (tableOrder) {
        tableOrder.addEventListener('change', function (event) {
            if (event.target.classList.contains('activity_type')) {
                const row = event.target.closest('tr');
                const selectSpecialty = row.querySelector('.specialty');
                updateSpecialtyOptions(event.target, selectSpecialty);
            }
        });
    }
});

// Функция для очистки формы
function resetForm(isModal = false) {
    if (!isModal && !confirm('Вы уверены, что хотите очистить всю форму?')) return; // TODO: localize confirm

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
            select.innerHTML = `<option value="" disabled selected>${window.messages.choose}</option>`;
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
        if (firstDoc) {
            const nameInput = firstDoc.querySelector('.doc-name');
            const fileInput = firstDoc.querySelector('.doc-file');

            if (nameInput) nameInput.value = '';
            if (fileInput) fileInput.value = '';
        }
    });

    // Очищаем localStorage
    localStorage.removeItem('savedForm');
    formData = [];

    if (!isModal) alert('Форма успешно очищена!'); // TODO: localize alert
}

// Функция добавления строки
function addRow() {
    const table = document.getElementById('tableOrder');
    const rows = table.getElementsByTagName('tr');
    const newRow = rows[rows.length - 1].cloneNode(true);

    // Обновляем индексы для новой строки
    const newIndex = rows.length;
    newRow.id = `row${newIndex + 1}`;

    // Обновляем номер строки
    newRow.querySelector('td:first-child').textContent = newIndex + 1;

    // Очищаем значения
    newRow.querySelectorAll('input').forEach(input => {
        if (input.type !== 'button') input.value = '';
        if (input.type === 'hidden') return; // Не трогаем CSRF токен
    });

    newRow.querySelectorAll('select').forEach(select => {
        select.selectedIndex = 0;
        if (select.classList.contains('specialty')) {
            select.innerHTML = `<option value="" disabled selected>${window.messages.choose}</option>`;
        }
    });

    // Обновляем атрибуты name для полей
    const inputs = newRow.querySelectorAll('[name]');
    inputs.forEach(input => {
        const name = input.getAttribute('name').replace(/\[\d\]/, `[${newIndex}]`);
        input.setAttribute('name', name);
    });

    table.appendChild(newRow);
}

// Сохранение данных формы
function saveFormData() {
    formData = [];
    const rows = document.querySelectorAll('#tableOrder tr');

    rows.forEach((row, index) => {
        const docs = [];
        row.querySelectorAll('.document-item').forEach(doc => {
            const nameInput = doc.querySelector('.doc-name');
            const fileInput = doc.querySelector('.doc-file');
            if (nameInput && fileInput) {
                docs.push({
                    name: nameInput.value,
                    file: fileInput.value
                });
            }
        });

        const data = {
            last_name: row.querySelector('[name="last_name"]')?.value || '',
            first_name: row.querySelector('[name="first_name"]')?.value || '',
            middle_name: row.querySelector('[name="middle_name"]')?.value || '',
            iin: row.querySelector('[name="iin"]')?.value || '',
            activity_type: row.querySelector('[name="activity_type"]')?.value || '',
            specialty: row.querySelector('[name="specialty"]')?.value || '',
            phone: row.querySelector('[name="phone"]')?.value || '',
            workplace: row.querySelector('[name="workplace"]')?.value || '',
            sender_name: row.querySelector('[name="sender_name"]')?.value || '',
            documents: docs
        };
        formData.push(data);
    });

    localStorage.setItem('savedForm', JSON.stringify(formData));
}

// Загрузка данных формы
function loadFormData() {
    const savedData = localStorage.getItem('savedForm');
    if (savedData) {
        formData = JSON.parse(savedData);
        // Здесь можно добавить логику восстановления формы
        // но для простоты оставим пустой
    }
}

// Функция для валидации данных
function validateForm() {
    const errors = [];
    const rows = document.querySelectorAll('#tableOrder tr');

    // Проверка каждой строки
    rows.forEach((row, rowIndex) => {
        // Обязательные поля
        const requiredFields = {
            last_name: window.messages.fill_required, // Simplified for now
            first_name: window.messages.fill_required,
            iin: 'ИИН должен состоять из 12 цифр', // TODO: localize
            activity_type: window.messages.choose,
            specialty: window.messages.choose,
            sender_name: window.messages.fill_required,
            workplace: window.messages.fill_required,
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
                errors.push(`Строка ${rowIndex + 1}: ${window.messages.iin_invalid}`);
            }
        });

        // Проверка документов
        const docItems = row.querySelectorAll('.document-item');
        docItems.forEach((doc, docIndex) => {
            const nameInput = doc.querySelector('.doc-name');
            const fileInput = doc.querySelector('.doc-file');

            if ((nameInput?.value && !fileInput?.files[0]) ||
                (!nameInput?.value && fileInput?.files[0])) {
                errors.push(`Строка ${rowIndex + 1}: ${window.messages.document_name}`); // Simplified
            }
        });
    });

    return errors;
}

function clearErrors() {
    document.querySelectorAll('.error-message').forEach(el => el.remove());
    document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
}

// Функция для отправки данных
async function addOrder() {
    const submitBtn = document.querySelector('#applicationModal .btn-primary');
    if (!submitBtn) return;

    try {
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<div class="spinner-border spinner-border-sm" role="status"></div>';

        // Очищаем предыдущие ошибки
        clearErrors();

        // Валидация
        const errors = validateForm();
        if (errors.length > 0) {
            const errorMessage = errors.join('\n');
            alert(`${window.messages.error_title}:\n\n${errorMessage}`);
            throw new Error('Validation failed');
        }

        const formData = new FormData();
        const rows = document.querySelectorAll('#tableOrder tr');

        // Добавляем CSRF-токен
        let csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

        try {
            // Пытаемся обновить токен перед отправкой
            const tokenResponse = await fetch('/refresh-csrf-token');
            if (tokenResponse.ok) {
                const tokenData = await tokenResponse.json();
                if (tokenData.token) {
                    csrfToken = tokenData.token;
                    // Обновляем мета-тег для будущих запросов
                    document.querySelector('meta[name="csrf-token"]')?.setAttribute('content', csrfToken);
                }
            }
        } catch (e) {
            console.warn('Не удалось обновить CSRF токен:', e);
        }

        if (csrfToken) {
            formData.append('_token', csrfToken);
        }

        // Собираем данные
        rows.forEach((row, index) => {
            // Основные поля
            const fields = [
                'last_name', 'first_name', 'middle_name', 'iin',
                'activity_type', 'specialty', 'phone', 'workplace', 'sender_name'
            ];

            fields.forEach(field => {
                const input = row.querySelector(`[name="${field}"]`);
                if (input) {
                    formData.append(`requests[${index}][${field}]`, input.value.trim());
                }
            });

            // Документы
            row.querySelectorAll('.document-item').forEach((doc, docIndex) => {
                const nameInput = doc.querySelector('.doc-name');
                const fileInput = doc.querySelector('.doc-file');

                if (nameInput?.value && fileInput?.files[0]) {
                    formData.append(`requests[${index}][documents][${docIndex}][name]`, nameInput.value.trim());
                    formData.append(`requests[${index}][documents][${docIndex}][file]`, fileInput.files[0]);
                }
            });
        });

        // Определяем URL для отправки
        const base = document.querySelector('base')?.href || '/';
        const submitUrl = base + 'cert-request';


        // Отправка данных
        const response = await fetch(submitUrl, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        });

        const result = await response.json();

        if (result.status) {
            alert(window.messages.success_title);
            closeApplicationModal();
            resetForm(true);
        } else {
            throw new Error(result.message || 'Ошибка при отправке');
        }

    } catch (error) {
        if (error.message !== 'Validation failed') {
            console.error('Ошибка:', error);
            alert(error.message || window.messages.error_title);
        }
    } finally {
        submitBtn.disabled = false;
        submitBtn.innerHTML = window.messages.send_application;
    }
}

// Функции для работы с документами
function addDocumentField(button) {
    const container = button.previousElementSibling;
    if (!container) return;

    const firstItem = container.querySelector('.document-item-wrapper');
    if (!firstItem) return;

    const newItem = firstItem.cloneNode(true);

    // Генерируем уникальный ID для нового file input
    const timestamp = Date.now();
    const random = Math.floor(Math.random() * 1000);
    const newId = `docFile_${timestamp}_${random}`;

    // Очищаем все поля ввода
    newItem.querySelectorAll('input').forEach(input => {
        if (input.type === 'file') {
            // Для file input нужно создать новый элемент
            const newFileInput = input.cloneNode(true);
            newFileInput.value = '';
            newFileInput.id = newId;
            input.parentNode.replaceChild(newFileInput, input);

            // Обновляем label для нового file input
            const label = newItem.querySelector('.file-input-label');
            if (label) {
                label.setAttribute('for', newId);
                label.classList.remove('file-selected');
                const fileNameText = label.querySelector('.file-name-text');
                if (fileNameText) {
                    fileNameText.textContent = window.messages?.choose_file || 'Выбрать файл';
                }
                const icon = label.querySelector('i');
                if (icon) {
                    icon.className = 'bi bi-upload';
                }
            }
        } else {
            input.value = '';
            input.title = '';
        }
    });

    container.appendChild(newItem);

    // Инициализируем обработчик для нового file input
    initFileInputHandler(newItem.querySelector('.doc-file'));
}

function removeDocumentField(button) {
    const container = button.closest('.documents-container');
    if (!container) return;

    const items = container.querySelectorAll('.document-item-wrapper');
    const documentItem = button.closest('.document-item-wrapper');

    if (items.length > 1) {
        // Если документов больше одного - удаляем блок
        documentItem.remove();
    } else {
        // Если документ один - очищаем его поля
        const nameInput = documentItem.querySelector('.doc-name');
        const fileInput = documentItem.querySelector('.doc-file');
        const fileLabel = documentItem.querySelector('.file-input-label');

        if (nameInput) {
            nameInput.value = '';
            nameInput.title = '';
        }

        if (fileInput) {
            // Для file input создаем новый элемент для полной очистки
            const newFileInput = fileInput.cloneNode(true);
            newFileInput.value = '';
            fileInput.parentNode.replaceChild(newFileInput, fileInput);

            // Инициализируем обработчик для нового file input
            initFileInputHandler(newFileInput);
        }

        if (fileLabel) {
            fileLabel.classList.remove('file-selected');
            const fileNameText = fileLabel.querySelector('.file-name-text');
            if (fileNameText) {
                fileNameText.textContent = window.messages?.choose_file || 'Выбрать файл';
            }
            const icon = fileLabel.querySelector('i');
            if (icon) {
                icon.className = 'bi bi-upload';
            }
        }
    }
}

// Инициализация обработчика изменения файла
function initFileInputHandler(fileInput) {
    if (!fileInput) return;

    fileInput.addEventListener('change', function () {
        const container = this.closest('.file-input-container');
        if (!container) return;

        const label = container.querySelector('.file-input-label');
        const fileNameText = label?.querySelector('.file-name-text');
        const icon = label?.querySelector('i');

        if (this.files && this.files.length > 0) {
            const fileName = this.files[0].name;
            if (fileNameText) {
                fileNameText.textContent = fileName;
                fileNameText.title = fileName;
            }
            if (label) {
                label.classList.add('file-selected');
            }
            if (icon) {
                icon.className = 'bi bi-check-circle-fill';
            }
        } else {
            if (fileNameText) {
                fileNameText.textContent = window.messages?.choose_file || 'Выбрать файл';
                fileNameText.title = '';
            }
            if (label) {
                label.classList.remove('file-selected');
            }
            if (icon) {
                icon.className = 'bi bi-upload';
            }
        }
    });
}

// Инициализация при загрузке страницы - обновление title для doc-name и обработчики файлов
document.addEventListener('DOMContentLoaded', function () {
    // Инициализируем все существующие file inputs
    document.querySelectorAll('.doc-file').forEach(initFileInputHandler);

    // Добавляем обработчик для обновления title при вводе названия документа
    document.addEventListener('input', function (e) {
        if (e.target.classList.contains('doc-name')) {
            e.target.title = e.target.value;
        }
    });
});

function removeRow(button) {
    const row = button.closest('tr');
    const rows = document.querySelectorAll('#tableOrder tr');

    if (rows.length === 1) {
        alert(window.messages.delete_row_confirm);
        return;
    }

    if (confirm(window.messages.delete_row_confirm)) {
        row.remove();
        updateRowNumbers();
    }
}

function updateRowNumbers() {
    const rows = document.querySelectorAll('#tableOrder tr');
    rows.forEach((row, index) => {
        const firstCell = row.querySelector('td:first-child');
        if (firstCell) {
            firstCell.textContent = index + 1;
        }
        row.id = `row${index + 1}`;
    });
}

// Поиск сертификатов
async function handleSearch(e) {
    e.preventDefault();
    const form = e.target;
    const iinInput = form.querySelector('[name="iin"]');
    const iin = iinInput.value.trim();

    // Очищаем предыдущие результаты
    const existingResults = form.querySelector('.search-results');
    if (existingResults) {
        existingResults.remove();
    }

    // Валидация ИИН
    if (!/^\d{12}$/.test(iin)) {
        showSearchError(iinInput, window.messages.iin_invalid);
        return;
    }

    try {
        // Показываем индикатор загрузки
        const searchBtn = form.querySelector('button[type="submit"]');
        const originalText = searchBtn.innerHTML;
        searchBtn.disabled = true;
        searchBtn.innerHTML = '<div class="spinner-border spinner-border-sm" role="status"></div>';

        // Отправляем запрос
        const response = await fetch(`/check-cert?iin=${iin}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        });

        const result = await response.json();

        // Создаем контейнер для результатов
        const resultsDiv = document.createElement('div');
        resultsDiv.className = 'search-results mt-3';

        if (result.status && result.data && result.data.length > 0) {
            // Отображаем найденные сертификаты
            resultsDiv.innerHTML = `
                <div class="certificate-list">
                    ${result.data.map(cert => `
                        <div class="certificate-item mb-2 p-3 border rounded">
                            <div class="certificate-info">
                                ${cert.certificate_date ? `
                                    <div class="cert-date mb-1">
                                        <i class="bi bi-calendar"></i>
                                        <strong>Дата выдачи:</strong> ${new Date(cert.certificate_date).toLocaleDateString()}
                                    </div>
                                ` : ''}

                                <div class="cert-specialty mb-2">
                                    <strong>Специальность:</strong> ${cert.specialty || 'Не указано'}
                                </div>

                                <a href="${cert.certificate_file}"
                                   class="btn btn-primary w-100 py-2"
                                   download="Сертификат_${cert.certificate_number}.pdf">
                                    <i class="bi bi-file-pdf me-2"></i>
                                    Скачать сертификат
                                </a>
                            </div>
                        </div>
                    `).join('')}
                    <div style="height: 100px;"></div> <!-- Отступ для прокрутки -->
                </div>
            `;
        } else {
            resultsDiv.innerHTML = `
                <div class="alert alert-info mb-0">
                    <i class="bi bi-info-circle"></i>
                    Сертификаты с указанным ИИН не найдены
                </div>
            `;
        }

        form.appendChild(resultsDiv);

        // Восстанавливаем кнопку
        searchBtn.disabled = false;
        searchBtn.innerHTML = originalText;

    } catch (error) {
        console.error('Ошибка поиска:', error);
        const errorDiv = document.createElement('div');
        errorDiv.className = 'alert alert-danger mt-3';
        errorDiv.innerHTML = '<i class="bi bi-exclamation-circle"></i> Ошибка при выполнении поиска';
        form.appendChild(errorDiv);

        // Восстанавливаем кнопку
        const searchBtn = form.querySelector('button[type="submit"]');
        searchBtn.disabled = false;
        searchBtn.innerHTML = originalText;
    }
}

function showSearchError(input, message) {
    // Удаляем предыдущие ошибки
    const existingError = input.parentNode.querySelector('.invalid-feedback');
    if (existingError) {
        existingError.remove();
    }

    const error = document.createElement('div');
    error.className = 'invalid-feedback d-block';
    error.textContent = message;
    input.classList.add('is-invalid');
    input.parentNode.appendChild(error);

    // Удаляем сообщение при новом вводе
    input.addEventListener('input', function () {
        input.classList.remove('is-invalid');
        error.remove();
    }, { once: true });
}
