<?php

use Phalcon\Mvc\View;
use Phalcon\Mvc\Controller;
use Phalcon\Http\Request;


class PsmController extends ControllerBase
{

    //метод возвращает список ответов по переданному вопросу
    static function question_ansver($question)
    {
        $link = ControllerBase::link();
        $sql = "SELECT * FROM answer WHERE question_id={$question}";
        $link = $link->prepare($sql);
        $link->execute();
        $ansver_list = $link->fetchAll ();
        return $ansver_list;
    }

    //метод возвращает вопрос по выбранной теме в следующих параграфах либо финиш если вопросы по теме закончились
    static function article_question($article, $theme)
    {
        $link = ControllerBase::link();
        $sql = "SELECT * FROM article WHERE theme_id={$theme} AND id > {$article} LIMIT 1";
        $link = $link->prepare($sql);
        $link->execute();
        $article_theme = $link->fetchAll ();
        if (!empty($article_theme)) {
            $quest = self::question($article_theme[0]['id']);
            $quest = !empty($quest) ? $quest : self::article_question($article_theme[0]['id'], $theme);
            return $quest;
        } else {
            return 'finish';
        }
    }

    //метод возвращает вопрос по переданному параграфу
    static function question($article, $quest = 0)
    {
        $link = ControllerBase::link();
        $sql = "SELECT * FROM question WHERE id > {$quest} AND article_id = {$article} LIMIT 1";
        $link = $link->prepare($sql);
        $link->execute();
        $quest = $link->fetchAll ();
        if (!empty($quest)) {
            return $quest[0];
        } else {
            return 0;
        }

        
    }

    //происходит при нажитии кнопки ответ меняет вопрос либо увведомляет что ответ не верный или тема пройдена
    public function questionnextAction ($theme, $article, $question, $answer, $try)
    {
        $link = ControllerBase::link();
        $sql = "SELECT * FROM answer WHERE id = {$answer} LIMIT 1";
        $link = $link->prepare($sql);
        $link->execute();
        $quest = $link->fetchAll ();
        if($quest[0]['status'] != 1)
        {
            print 'error';            
            $this->view->setRenderLevel(View::LEVEL_NO_RENDER);
        } elseif ($try > 0) {
            $quest = self::question($article, $question);
            $quest = !empty($quest) ? $quest : self::article_question ($article, $theme);
            if (is_array($quest)) {
                $ansvers = self::question_ansver($quest['id']);
                $this->view->try = $try;    // количество ошибок
                $this->view->ansvers = $ansvers;    // варианты ответов
                $this->view->quest = $quest;        // вопрос
                $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
            } else {
                print $quest;
                $this->view->setRenderLevel(View::LEVEL_NO_RENDER);
            }
        } else {
            $quest = self::article_question ($article, $theme);
            if (is_array($quest)) {
                $ansvers = self::question_ansver($quest['id']);
                $this->view->try = 0;    // количество ошибок
                $this->view->ansvers = $ansvers;    // варианты ответов
                $this->view->quest = $quest;        // вопрос
                $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
            } else {
                print $quest;
                $this->view->setRenderLevel(View::LEVEL_NO_RENDER);
            }
        }
    }

    public function indexAction()
    {
    }

    //метод возвращает пораграфы по выбранной теме
    public function themeAction($theme, $name)
    {

        $link = ControllerBase::link();
        $sql = "SELECT * FROM article WHERE theme_id={$theme}";
        $link = $link->prepare($sql);
        $link->execute();
        $text_theme = $link->fetchAll();
        $quest = self::question($text_theme[0]['id'], $theme);
        if(!empty($quest)) {
            $ansvers = self::question_ansver($quest['id']);
        }
        $this->view->ansvers = $ansvers;    // варианты ответов
        $this->view->quest = $quest;        // вопрос
        $this->view->theme_name = $name;    // название темы
        $this->view->theme = $text_theme;   // порагрофы иемы
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }


}

