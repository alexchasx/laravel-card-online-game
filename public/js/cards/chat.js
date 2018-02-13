;
$(document).ready(function () {
    // $("#pac_form").submit(Send); // вешаем на форму с именем и сообщением. Событие, которое срабатывает, когда нажата кнопка "Отправить" или "Enter"
    // $("#pac_text").focus(); // пна поле ввода сообщения ставим фокус
    setInterval("Load();", 2000); //  каждые 2 секунды
});

function Load() {
    // Проверяем можем ли мы загружать сообщения. Это сделано для того, чтобы мы не начали загрузку заново, если старая загрузка ещё не закончилась.
    // if (!load_in_process) {
    //     load_in_process = true;


    $.getJSON('/provocation', {}, function (data) {
        var items = [];
        $.each(data, function (key, val) {
            items.push(val);
        });

        $('#body-provocation').html('');
        $("<div/>", {
            html: items.join("")
        }).appendTo("#body-provocation");
    });
    /*.done(function (result) { // в эту функцию в качестве параметра передаётся javascript код, который мы должны выполнить
                $("#provocation-bar").scrollTop($("#provocation-bar").get(0).scrollHeight); // прокручиваем сообщения вниз
            })*/


    // }
    //
    // load_in_process = false; // говорим что загрузка закончилась, можем теперь начать новую загрузку
};
