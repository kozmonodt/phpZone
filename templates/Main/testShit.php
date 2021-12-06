<?php



if (isset($_REQUEST ['text'])){
//if (($_REQUEST ['route'])==='lalala'){

//указываем, что тип возвращаемого документа javascript
    header ('Content-Type: text/javascript');
    $text = isset($_REQUEST ['text']) ? $_REQUEST ['text'] : '';
    if (strlen($text)< 5){
        echo 'var js_ErrCode = true;' . "\n";
        echo 'var js_ErrMsg = "Ошибка, не переворачиваю";' . "\n";
    }
    else{
        echo 'var js_ErrCode = false;' . "\n";
        echo 'var js_ErrMsg = "Ошибок нет, переворачиваю";' . "\n";
    }
    echo 'var js_Result = "'.strrev ($text) .'"; ' . "\n";
    echo 'makeLoadComplete ();' . "\n";
    exit;
}
?>
<html>
<head>

    <script type="text/javascript" language="javascript">
        // функция возврата, вызываемая когда php-скрипт вернет данные    браузеру
        function makeLoadComplete(){
            var dv_Result = document.getElementById ('dv_Result');
            // проверяем код завершения переворота строки
            if (js_ErrCode){
            // если ошибка, то выводим текст сообщения об ошибке
                dv_Result.innerHTML = js_ErrMsg;
                dv_Result.style.color = 'red';
            }
            // если все удачно, то выводим результат в подготовленный блок div
            else{
                dv_Result.innerHTML = js_Result;
                dv_Result.style.color = 'green';
            }
        }
        function create_script() {
            var elScript = document.createElement( 'script' );
            var str_for_rev = document.getElementById('str_for_rev');
            // и отправляем запрос
            //elScript.src='<?//=$_SERVER["PHP_SELF"]?>//?text='+str_for_rev.value;
            elScript.src='/js/alert2.js.php';
            // elScript.src="/index.php?route=lalala";
            alert('<?=$_SERVER["PHP_SELF"]?>?text='+str_for_rev.value);
            document.body.appendChild( elScript );
        }


        /**/

        function loadScript() {
            var script = document.createElement('script');
            script.type = 'text/javascript';
            script.src = 'https://maps.googleapis.com/maps/api/js?sensor=false&callback=initialize';
            document.body.appendChild(script);
            console.log('loadScript');
        }

        function initialize() {
            console.log('initialize');
        }

        window.onload = loadScript;

    </script>
</head>
<body onload="attachScript('script1','translate.php?word=apple')">
<!–блок для вывода результата -->
<div id="dv_Result" style="">Result ...</div>
Введите в поле некоторый текст:
<input type="text" id="str_for_rev" value="text value" /> <br />
И нажмите на кнопку, чтобы выполнить его переворачивание:
<input type="button" onclick="create_script()" value="Revert !"/>
</body>
</html>