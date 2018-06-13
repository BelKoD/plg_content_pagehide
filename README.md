# plg_content_pagehide
Параметр отображения компонента в шаблоне (показать/скрыть)

Задача: Скрыть вывод результата работы компонента в шаблоне сайта на Joomla 3.x.

Решение: Использовать данный плагин.

Скачиваете, устанавливаете и публикуете плагин "Меню/шаблон - Параметр отображения компонента в шаблоне (показать/скрыть)".
Далее в пункте меню типа "Компонент" во вкладке "Параметры страницы" будет доступен радио-переключатель "Показывать результат работы компонента в шаблоне?".
По-умолчанию значение "Да".

Далее в шаблоне сайта находим строку:

<jdoc:include type="component" />

Скорее всего потебуется захватить обкружающие ее html теги, чтобы не убрать отображение данного блока.

Делаем следующую модификацию в шаблоне:

<?php $pagehide_show = $menu->getActive()->getParams()->get('pagehide_show', 1); ?>
<?php if($pagehide_show==1) : ?>
<div class="wrapper b_content">
<jdoc:include type="component" />
<div class="clearfix"></div>
</div>
<?php endif; ?>

В нужном вам меню отключаем вывод компонента и он не отображается на сайте.
