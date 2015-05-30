<?php
/**
 * Created by PhpStorm.
 * User: Josh
 * Date: 11/17/14
 * Time: 12:27 AM
 */

namespace Application\Model;


class Action {
    private $class;

    private $id;

    private $href;

    private $text;

    private $title;

    public function __construct($class,$id,$text,$title, $href = false){
        $this->class = $class;
        $this->id = $id;
        $this->text = $text;
        $this->title = $title;
        $this->href = $href;
    }

    public function generate(){
        $tag = "<a";
        $tag .= $this->href ? ' href="' . $this->href . '"' : ' href="#"';
        $tag .= $this->class ? ' class="' . $this->class . '"' : '';
        $tag .= $this->id ? ' id="' . $this->id . '"' : '';
        $tag .= $this->title ? ' title="' . $this->title . '"' : '';
        $tag .= $this->text ? '>' . $this->text : '>';
        $tag .= "</a>";
        return $tag;
    }

    /**
     * @param mixed $class
     */
    public function setClass($class)
    {
        $this->class = $class;
    }

    /**
     * @return mixed
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @param mixed $href
     */
    public function setHref($href)
    {
        $this->href = $href;
    }

    /**
     * @return mixed
     */
    public function getHref()
    {
        return $this->href;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }


} 