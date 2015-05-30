<?php
/**
 * Created by PhpStorm.
 * User: Josh
 * Date: 23/1/2015
 * Time: 1:24 πμ
 */

namespace Application\Model;

class FieldAttribute {
    private $name;

    private $type;

    private $visible;

    private $formattedName;

    public function __construct($name,$formattedName = "",$type = "text",$visible = true){
        $this->name = $name;
        $this->formattedName = $formattedName;
        $this->type = $type;
        $this->visible = $visible;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return boolean
     */
    public function isVisible()
    {
        return $this->visible;
    }

    /**
     * @param boolean $visible
     */
    public function setVisible($visible)
    {
        $this->visible = $visible;
    }

    /**
     * @return mixed
     */
    public function getFormattedName()
    {
        if($this->formattedName == "")
            $this->formattedName = ucwords(join(' ',preg_split('/(?=[A-Z])/',$this->name)));
        return $this->formattedName;
    }

    /**
     * @param mixed $formattedName
     */
    public function setFormattedName($formattedName)
    {
        $this->formattedName = $formattedName;
    }



}