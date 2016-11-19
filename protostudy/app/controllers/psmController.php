<?php

use Phalcon\Mvc\View;
use Phalcon\Mvc\Controller;
use Phalcon\Http\Request;


class PsmController extends ControllerBase
{

    static function question_ansver($question)
    {
        $link = ControllerBase::link();
        $sql = "SELECT * FROM answer WHERE question_id={$question}";
        $link = $link->prepare($sql);
        $link->execute();
        $ansver_list = $link->fetchAll ();
        return $ansver_list;
    }

    static function article_question($article, $theme)
    {
        $link = ControllerBase::link();
        $sql = "SELECT * FROM article WHERE theme_id={$theme} AND id > {$article} LIMIT 1";
        $link = $link->prepare($sql);
        $link->execute();
        $article_theme = $link->fetchAll ();
        if (!empty($article_theme)) {
            return $article_theme[0]['id'];
        } else {
            return 'finish';
        }
    }

    static function question($article, $theme, $try = 0, $quest = 0)
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
        // if(empty($quest)) {
        //     $article = self::article_question($article, $theme);
        //     if($article != 'finish') {
        //         return self::question($article, $theme, $try, $quest);
        //     } else {
        //         return $article;
        //     }
        // } elseif (!empty($quest) && $try != 0) {
        //     question()
        // }

        
    }

    public function indexAction()
    {
    }

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

