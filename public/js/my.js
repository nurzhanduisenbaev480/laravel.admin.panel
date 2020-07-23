$('.delete').click(function () {
    let deleteQuestion = confirm('Подтвердить действие?');
    if (!deleteQuestion){
        return false;
    }
});
$('.redact').click(function () {
    let deleteQuestion = confirm('Подтвердить действие?');
    return false;
});
$('.deletebd').click(function () {
    let deleteQuestion = confirm('Подтвердить действие?');
    if (deleteQuestion){
        let deleteQuestion2 = confirm('ВЫ СОБИРАЕТЕСЬ УДАЛИТЬ ЗАКАЗ ИЗ БД, ВЫ УВЕРЕНЫ?');
        if (!deleteQuestion2) return false;
    }
    if (!deleteQuestion) return false;
});

