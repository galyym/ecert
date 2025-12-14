<!-- Модальное окно заявки на аттестацию -->
<div id="applicationModal" class="modal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content application-modal-content">

            <!-- Modal Header -->
            <div class="modal-header application-modal-header">
                <div class="modal-header-content">
                    <div class="modal-icon-wrapper">
                        <i class="bi bi-file-earmark-text"></i>
                    </div>
                    <div class="modal-title-wrapper">
                        <h2 class="modal-title mb-0">{{ __('messages.application_title') }}</h2>
                        <p class="modal-subtitle mb-0 d-none d-sm-block">{{ __('messages.application_subtitle') }}</p>
                    </div>
                </div>
                <button type="button" class="btn-close-modern" onclick="closeApplicationModal()" aria-label="Close">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body application-modal-body">
                <div class="application-info-banner d-none d-sm-flex">
                    <i class="bi bi-info-circle"></i>
                    <span>{{ __('messages.fields_required') }}</span>
                </div>

                <div class="modal-scrollable">
                    <table class="responsive-table application-table">
                        <thead>
                            <tr>
                                <th class="col-number">№</th>
                                <th class="col-required">* {{ __('messages.last_name') }}</th>
                                <th class="col-required">* {{ __('messages.first_name') }}</th>
                                <th class="d-none d-md-table-cell">{{ __('messages.middle_name') }}</th>
                                <th class="col-required">* {{ __('messages.iin') }}</th>
                                <th class="col-required">* {{ __('messages.activity_type') }}</th>
                                <th class="col-required">* {{ __('messages.specialty') }}</th>
                                <th class="d-none d-md-table-cell">{{ __('messages.phone') }}</th>
                                <th class="d-none d-md-table-cell">{{ __('messages.workplace') }}</th>
                                <th class="col-required">* {{ __('messages.sender') }}</th>
                                <th>{{ __('messages.document') }}</th>
                                <th class="col-actions">{{ __('messages.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody id="tableOrder">
                            <tr id="row1" class="table-row">
                                <td class="row-number">1</td>
                                <td><input type="text" class="form-control" name="last_name" placeholder="{{ __('messages.last_name') }}" required></td>
                                <td><input type="text" class="form-control" name="first_name" placeholder="{{ __('messages.first_name') }}" required></td>
                                <td class="d-none d-md-table-cell"><input type="text" class="form-control" name="middle_name" placeholder="{{ __('messages.middle_name') }}"></td>
                                <td><input type="text" class="form-control" name="iin" pattern="\d{12}" maxlength="12" placeholder="123456789012" oninput="this.value = this.value.replace(/\D/g, '').substring(0, 12)" required></td>
                                <td>
                                    <select class="form-select activity_type" name="activity_type" required>
                                        <option value="" disabled selected>{{ __('messages.choose') }}</option>
                                        <option value="ПД">ПД</option>
                                        <option value="СМР">СМР</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="form-select specialty" name="specialty" required>
                                        <option value="" disabled selected>{{ __('messages.choose') }}</option>
                                    </select>
                                </td>
                                <td class="d-none d-md-table-cell">
                                    <input type="tel"
                                        class="form-control phone-mask"
                                        name="phone"
                                        placeholder="+7 (___) ___-__-__"
                                        maxlength="18"
                                        oninput="formatPhone(this)">
                                </td>
                                <td class="d-none d-md-table-cell"><input type="text" class="form-control" name="workplace" placeholder="{{ __('messages.company_name') }}"></td>
                                <td><input type="text" class="form-control" name="sender_name" placeholder="{{ __('messages.sender_full_name') }}" required></td>
                                <td>
                                    <div class="documents-container">
                                        <div class="document-item">
                                            <input type="text"
                                                class="form-control doc-name"
                                                placeholder="{{ __('messages.document_name') }}"
                                                name="docName[]">
                                            <input type="file"
                                                class="form-control doc-file"
                                                name="docFile[]"
                                                accept="image/*,.pdf">
                                            <button type="button"
                                                class="btn-remove-doc"
                                                onclick="removeDocumentField(this)"
                                                title="{{ __('messages.delete_document') }}">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <button type="button"
                                        class="btn-add-doc"
                                        onclick="addDocumentField(this)">
                                        <i class="bi bi-plus-circle"></i> {{ __('messages.add_document') }}
                                    </button>
                                </td>

                                <td class="actions-cell">
                                    <button type="button"
                                        class="btn-remove-row"
                                        onclick="removeRow(this)"
                                        title="{{ __('messages.delete_row') }}">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer application-modal-footer">
                <div class="footer-actions-left d-flex gap-2">
                    <button type="button" class="btn btn-outline-secondary btn-sm-mobile" onclick="addRow()" title="{{ __('messages.add_row') }}">
                        <i class="bi bi-plus-circle"></i> <span class="d-none d-sm-inline">{{ __('messages.add_row') }}</span>
                    </button>
                    <button type="button" class="btn btn-outline-danger btn-sm-mobile" onclick="resetForm()" title="{{ __('messages.clear_form') }}">
                        <i class="bi bi-eraser"></i> <span class="d-none d-sm-inline">{{ __('messages.clear_form') }}</span>
                    </button>
                </div>
                <div class="footer-actions-right">
                    <button type="button" class="btn btn-primary btn-submit btn-sm-mobile" onclick="addOrder()">
                        <i class="bi bi-send"></i> <span>{{ __('messages.send_application') }}</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Модальное окно поиска аттестата -->
<!-- Модальное окно поиска аттестата -->
<div id="searchModal" class="modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 24px; overflow: hidden;">
            <div class="modal-header border-0 p-4 bg-light">
                <h3 class="modal-title fs-4 fw-bold text-corporate-navy mb-0">
                    <i class="bi bi-search text-corporate-blue me-2"></i>
                    {{ __('messages.search_certificate') }}
                </h3>
                <button type="button" class="btn-close" onclick="closeSearchModal()" aria-label="Close"></button>
            </div>

            <div class="modal-body p-3 p-md-4">
                <form id="searchForm" onsubmit="handleSearch(event)">
                    <div class="text-center mb-2">
                        <div class="d-inline-flex align-items-center justify-content-center bg-light rounded-circle mb-2" style="width: 60px; height: 60px;">
                            <i class="bi bi-person-vcard text-corporate-blue" style="font-size: 2rem;"></i>
                        </div>
                        <h4 class="fw-bold text-corporate-navy mb-1">{{ __('messages.check_certificate') }}</h4>
                        <p class="text-muted small mb-0">{{ __('messages.enter_iin') }}</p>
                    </div>

                    <div class="mb-3">
                        <label for="iinInput" class="form-label text-muted fw-bold d-block text-center mb-1">{{ __('messages.enter_iin') }}</label>
                        <input type="text"
                            class="form-control form-control-lg border-2"
                            id="iinInput"
                            name="iin"
                            pattern="\d{12}"
                            maxlength="12"
                            placeholder="{{ __('messages.iin_placeholder') }}"
                            style="border-radius: 12px; font-size: 1.2rem; letter-spacing: 2px; text-align: center;"
                            oninput="this.value = this.value.replace(/\D/g, '').substring(0, 12)"
                            required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 py-2 rounded-pill fw-bold shadow-corporate-hover">
                        {{ __('messages.check_status') }}
                        <i class="bi bi-arrow-right ms-2"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@if(isset($positions))
<script>
    const positions = @json($positions);
</script>
@endif

@push('scripts')
<script>
    // Localized messages for JS
    window.messages = {
        delete_row_confirm: "{{ __('messages.delete_row_confirm') ?? 'Are you sure you want to delete this row?' }}",
        delete_doc_confirm: "{{ __('messages.delete_doc_confirm') ?? 'Are you sure you want to delete this document?' }}",
        fill_required: "{{ __('messages.fill_required') ?? 'Please fill in all required fields' }}",
        choose: "{{ __('messages.choose') }}",
        document_name: "{{ __('messages.document_name') }}",
        delete_document: "{{ __('messages.delete_document') }}",
        add_document: "{{ __('messages.add_document') }}",
        delete_row: "{{ __('messages.delete_row') }}",
        iin_invalid: "{{ __('messages.iin_invalid') ?? 'Invalid IIN' }}",
        error_title: "{{ __('messages.error') ?? 'Error' }}",
        success_title: "{{ __('messages.success') ?? 'Success' }}",
    };
</script>
<script src="{{ asset('assets/js/modals.js') }}"></script>
<script>
    function formatPhone(input) {
        if (input.value === '-') {
            return;
        }

        let value = input.value.replace(/\D/g, ''); // Удаляем все нецифровые символы
        let formattedValue = '';

        // Если ничего не введено, очищаем
        if (!value) {
            input.value = '';
            return;
        }

        // Если первая цифра 7, 8 или другая - всегда начинаем с 7
        if (['7', '8'].includes(value[0])) {
            value = value.substring(1);
        }

        // Ограничиваем длину до 10 цифр (без кода страны)
        value = value.substring(0, 10);

        // Формируем маску
        formattedValue = '+7';

        if (value.length > 0) {
            formattedValue += ' (' + value.substring(0, 3);
        }
        if (value.length >= 4) {
            formattedValue += ') ' + value.substring(3, 6);
        }
        if (value.length >= 7) {
            formattedValue += '-' + value.substring(6, 8);
        }
        if (value.length >= 9) {
            formattedValue += '-' + value.substring(8, 10);
        }

        input.value = formattedValue;
    }
</script>
@endpush