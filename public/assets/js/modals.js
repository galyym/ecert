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
    selectSpecialty.innerHTML = '<option value="" disabled selected>Выберите</option>';

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
    if (!isModal && !confirm('Вы уверены, что хотите очистить всю форму?')) return;

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

    if (!isModal) alert('Форма успешно очищена!');
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
            select.innerHTML = '<option value="" disabled selected>Выберите</option>';
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
            last_name: 'Фамилия обязательна для заполнения',
            first_name: 'Имя обязательно для заполнения',
            iin: 'ИИН должен состоять из 12 цифр',
            activity_type: 'Выберите вид деятельности',
            specialty: 'Выберите специальность',
            sender_name: 'Поле "Отправитель" обязательно для заполнения',
            workplace: 'Поле "Место работы" обязательно для заполнения',
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

            if ((nameInput?.value && !fileInput?.files[0]) ||
                (!nameInput?.value && fileInput?.files[0])) {
                errors.push(`Строка ${rowIndex + 1}: Для документа ${docIndex + 1} необходимо заполнить и название, и файл`);
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
        submitBtn.innerHTML = '<div class="spinner-border spinner-border-sm" role="status"></div> Отправка...';

        // Очищаем предыдущие ошибки
        clearErrors();

        // Валидация
        const errors = validateForm();
        if (errors.length > 0) {
            const errorMessage = errors.join('\n');
            alert(`Исправьте ошибки:\n\n${errorMessage}`);
            throw new Error('Validation failed');
        }

        const formData = new FormData();
        const rows = document.querySelectorAll('#tableOrder tr');

        // Добавляем CSRF-токен
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
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
            alert('Заявки успешно отправлены!');
            closeApplicationModal();
            resetForm(true);
        } else {
            throw new Error(result.message || 'Ошибка при отправке');
        }

    } catch (error) {
        if (error.message !== 'Validation failed') {
            console.error('Ошибка:', error);
            alert(error.message || 'Ошибка при отправке заявки');
        }
    } finally {
        submitBtn.disabled = false;
        submitBtn.innerHTML = 'Отправить заявку';
    }
}

// Функции для работы с документами
function addDocumentField(button) {
    const container = button.previousElementSibling;
    if (!container) return;

    const newItem = container.firstElementChild.cloneNode(true);

    // Очищаем все поля ввода
    newItem.querySelectorAll('input').forEach(input => {
        if (input.type === 'file') {
            // Для file input нужно создать новый элемент
            const newFileInput = input.cloneNode(true);
            newFileInput.value = '';
            input.parentNode.replaceChild(newFileInput, input);
        } else {
            input.value = '';
        }
    });

    container.appendChild(newItem);
}

function removeDocumentField(button) {
    const container = button.closest('.documents-container');
    if (!container) return;

    const items = container.querySelectorAll('.document-item');
    const documentItem = button.closest('.document-item');

    if (items.length > 1) {
        // Если документов больше одного - удаляем блок
        documentItem.remove();
    } else {
        // Если документ один - очищаем его поля
        const nameInput = documentItem.querySelector('.doc-name');
        const fileInput = documentItem.querySelector('.doc-file');

        if (nameInput) nameInput.value = '';
        if (fileInput) {
            // Для file input создаем новый элемент для полной очистки
            const newFileInput = fileInput.cloneNode(true);
            newFileInput.value = '';
            fileInput.parentNode.replaceChild(newFileInput, fileInput);
        }
    }
}

function removeRow(button) {
    const row = button.closest('tr');
    const rows = document.querySelectorAll('#tableOrder tr');

    if (rows.length === 1) {
        alert('Нельзя удалить последнюю строку!');
        return;
    }

    if (confirm('Вы уверены, что хотите удалить эту строку?')) {
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
        showSearchError(iinInput, 'ИИН должен состоять из 12 цифр');
        return;
    }

    try {
        // Показываем индикатор загрузки
        const searchBtn = form.querySelector('button[type="submit"]');
        const originalText = searchBtn.innerHTML;
        searchBtn.disabled = true;
        searchBtn.innerHTML = '<div class="spinner-border spinner-border-sm" role="status"></div> Поиск...';

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
        searchBtn.innerHTML = 'Поиск';
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
