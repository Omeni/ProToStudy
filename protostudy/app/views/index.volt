<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>ProToStudy</title>

        <link rel="stylesheet" href="/css/alertify.core.css">
        <link rel="stylesheet" href="/css/alertify.default.css">
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/myautocomplete.css">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/animate.css">


        <script src="/js/jquery-1.11.1.min.js"></script>
        <script src="/js/moment-with-locales.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/jquery.cookie.js"></script>
        <script src="/js/bootstrap-datetimepicker.min.js"></script>
        <script src="/js/jquery.md5.js"></script>
        <script src="/js/json2.js"></script>
        <script src="/js/jquery.maskedinput.js"></script>
        <script src="/js/myautocomplete.js"></script>
        <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
        <script src="/js/script_lk.js"></script>
        <script src="/js/alertify.min.js"></script>
    </head>
    <body class="" data-page='index'>
        <div class="container-fluid">
            <div class="page-header">
                <nav class="navbar navbar-fixed-top" role="navigation">
                        <div class="nav-menu-btn">
                            <span class="spin-up"></span>
                            <span class="spin-down"></span>
                        </div>
                        <div class="navbar-inner">
                            <div class="navbar-header">
                                <div class="logo">
                                    <a class="navbar-brand" href="/"><img class="img-responsive" src="/img/logo.png" /></a>
                                </div>
                            </div>
                        </div>
                    </nav>
                    <!--Sidebar-->                
                    <aside class="sidebar" role="navigation">
                            <ul class="nav hidden-lg hidden-md" id="side-menu">         
                                <li class="row nav-btn">
                                    <div class="nav-menu-btn">
                                        <span class="spin-up"></span>
                                        <span class="spin-mid"></span>
                                        <span class="spin-down"></span>
                                    </div>
                                </li>
                            </ul>
                           <!--  <div class="logo-bg">
                                    <a class="navbar-brand" href="/"><img class="img-responsive" src="/img/logo.png" /></a>
                            </div> -->
                            <!-- рекурсивно выводим менюшку -->
                            {%- macro menu_load(lvl) %}
                                {% for key, value in lvl %}
                                    <li><a data-id="{{ value['id']}}" data-page="{{ value['page'] }}">{{ key }}</a>
                                        {% if value['lvl'] is defined %}
                                            <ul class="nav nav-pills nav-stacked fadeOutDown fadeInDown" data-parent="{{ value['parent'] }}">
                                                {{ menu_load(value['lvl']) }}
                                            </ul>
                                        {% endif %}
                                    </li>
                                {% endfor %}
                            {%- endmacro %}
                            <!-- рекурсивно выводим менюшку конец -->

                            <div class="list-wrap">

                                <ul class="nav menu1 nav-pills nav-stacked">
                                    {{ menu_load(menu) }}
                                </ul>


                            </div>
                    </aside>
                </div>
                <div class="wrap cont">
                    {{ content() }}
                    <div class="anima">
                        <div class="windows8">
                                <div class="wBall" id="wBall_1">
                                        <div class="wInnerBall"></div>
                                </div>
                                <div class="wBall" id="wBall_2">
                                        <div class="wInnerBall"></div>
                                </div>
                                <div class="wBall" id="wBall_3">
                                        <div class="wInnerBall"></div>
                                </div>
                                <div class="wBall" id="wBall_4">
                                        <div class="wInnerBall"></div>
                                </div>
                                <div class="wBall" id="wBall_5">
                                        <div class="wInnerBall"></div>
                                </div>
                        </div>
                    </div>
                 </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Изменение данных</h4>
              </div>
              <div class="modal-body">
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="modalorder" data-backdrop='static' role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
              </div>
              <div class="modal-body">
              </div>
            </div>
          </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="mobile-load" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">БУДЬ МОБИЛЬНЫМ скачай приложение </h4>
              </div>
              <div class="modal-body">
                <div class="mobile-prog">
                      <div class="mobile-prog-link">
                        <a href="https://play.google.com/store/apps/details?id=ru.mak72.vezitaxi">
                          <img src="/img/Gplay_button.png">
                        </a>
                      </div>
                      <br>
                      <div class="mobile-prog-link">
                        <a href="https://itunes.apple.com/ru/app/vezitaksi-zakaz-taksi/id1019170566?mt=8">
                          <img src="/img/appstore_button.png">
                        </a>
                      </div>
                  </div> 
              </div>
            </div>
          </div>
        </div>
        <div class="clr"></div>
        </body>
</html>
