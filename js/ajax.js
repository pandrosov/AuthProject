$( document ).ready(function() {
    $("#btn").click(
        function(){
            sendAjaxForm('result_form', 'ajax_form', 'action_ajax_signup.php');
            return false; 
        }
    );
    $("#btn1").click(
        function(){
            sendAjaxForm('result_form', 'login_form', 'action_ajax_login.php');
            return false; 
        }
    );
});
 
function sendAjaxForm(result_form, ajax_form, url) {
    jQuery.ajax({
        url:     url, //url страницы (action_ajax_form.php)
        type:     "POST", //метод отправки
        dataType: "html", //формат данных
        data: jQuery("#"+ajax_form).serialize(),  // Сеарилизуем объект
        success: function(response) { //Данные отправлены успешно
            result = jQuery.parseJSON(response);
            if( result.test == 'OK' ){
                document.getElementById(ajax_form).reset();
            }
            if( result.test == 'GO' ){
                window.location.href = 'index.php';
            }
      
            document.getElementById(result_form).innerHTML = result.status;
        },
        error: function(response) { // Данные не отправлены
            document.getElementById(result_form).innerHTML = "Ошибка. Данные не отправленны.";
        }
    });
}