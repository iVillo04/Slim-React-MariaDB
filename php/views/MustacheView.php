<?php

/**
 * Mustache configurato per lavorare con i partials
 */

class MustacheView extends Mustache_Engine
{
    protected $data = [];

    function render($template_name, $ext = ".html")
    {
        //template
        $template = file_get_contents(__DIR__ . '/..' . Config::$mustache['loader'] . $template_name . $ext);

        //partial loader
        parent::setPartialsLoader(new Mustache_Loader_FilesystemLoader(
            __DIR__ . '/..' . Config::$mustache['partials_loader'],
            [
                'extension' => $ext
            ]
        ));
        return parent::render($template, $this->data);
    }

    function setData($data)
    {
        $this->data = $data;
    }
}
