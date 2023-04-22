
// yandex map

// Функция ymaps.ready() будет вызвана, когда
// загрузятся все компоненты API, а также когда будет готово DOM-дерево.

ymaps.ready(function(){
    // Создание карты.
    var myMap = new ymaps.Map("map", {
        // Координаты центра карты.
        // Порядок по умолчнию: «широта, долгота».
        // Чтобы не определять координаты центра карты вручную,
        // воспользуйтесь инструментом Определение координат.
        center: [55.728593960096184,37.69287788227844],
        // Уровень масштабирования. Допустимые значения:
        // от 0 (весь мир) до 19.
        zoom: 18,
        controls: ['routeButtonControl','typeSelector', 'zoomControl', 'trafficControl', 'fullscreenControl']

    });
    myMap.behaviors.disable('scrollZoom');

    var control = myMap.controls.get('routeButtonControl');

    // Откроем панель для построения маршрутов.
    control.state.set('expanded', false);



    var myPlacemark = new ymaps.Placemark([55.728593960096184,37.69287788227844], {
        // Хинт показывается при наведении мышкой на иконку метки.
        iconCaption: 'ООО «ЕСА-МСМ»',
        balloonContentHeader: 'ООО «ЕСА-МСМ»',
        // Балун откроется при клике по метке.
        balloonContent: 'Шредирование бумаги </br><i class="fa fa-map-marker-alt"></i> УЛ. СКОТОПРОГОННАЯ, Д. 29/1, ЭТАЖ 2, ПОМ./ОФ. XVI/226</br><i class="fa fa-phone"></i> 8 (963) 684-72-61</br><i class="fa fa-phone"></i> 8 (916) 290-00-50'
    });

// После того как метка была создана, ее
// можно добавить на карту.
    myMap.geoObjects.add(myPlacemark);

});
