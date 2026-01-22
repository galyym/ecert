<!-- Подключение SweetAlert2 -->
<script src="{{ asset('assets/vendor/sweetalert2/sweetalert2.all.min.js') }}"></script>

<script>
    function confirmRejectWithComment(event, form) {
        event.preventDefault(); // Отменяем стандартное поведение формы

        Swal.fire({
            title: 'Вы уверены?',
            text: "Вы собираетесь отклонить запрос. Укажите причину:",
            input: 'text',
            inputPlaceholder: 'Введите комментарий...',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Отклонить',
            cancelButtonText: 'Отмена',
            preConfirm: (comment) => {
                if (!comment) {
                    Swal.showValidationMessage('Комментарий обязателен');
                }
                return comment;
            }
        }).then((result) => {
            if (result.isConfirmed) {
                // Добавляем комментарий в скрытое поле формы
                const commentInput = document.createElement('input');
                commentInput.type = 'hidden';
                commentInput.name = 'reject_comment';
                commentInput.value = result.value;
                form.appendChild(commentInput);

                // Отправляем форму
                form.submit();
            }
        });
    }
</script>