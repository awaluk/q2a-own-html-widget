<?php

abstract class own_html_widget_base
{
    protected $identifier_prefix = 'own_html_widget_';

    protected $identifiers = [1, 2, 3];

    abstract public function get_identifier();

    public function allow_template($template)
    {
        return true;
    }

    public function allow_region($region)
    {
        return true;
    }

    public function output_widget($region, $place, $themeobject, $template, $request, $qa_content)
    {
        $content = qa_opt($this->identifier_prefix . $this->get_identifier());
        $themeobject->output($content);
    }

    public function admin_form()
    {
        $saved = qa_clicked('own_html_save');
        if ($saved) {
            foreach ($this->identifiers as $identifier) {
                qa_opt($this->identifier_prefix . $identifier, qa_post_text($this->identifier_prefix . $identifier));
            }
        }

        $fields = [];
        foreach ($this->identifiers as $identifier) {
            $fields[] = [
                'label' => "<strong>{$identifier}: </strong>" . qa_lang_html('own_html/input_label'),
                'type' => 'textarea',
                'value' => qa_opt($this->identifier_prefix . $identifier),
                'tags' => 'name="' . $this->identifier_prefix . $identifier . '"',
                'rows' => 8
            ];
        }

        return [
            'ok' => $saved ? qa_lang_html('own_html/saved_info') : null,
            'fields' => $fields,
            'buttons' => [
                [
                    'label' => qa_lang_html('own_html/save_button'),
                    'tags' => 'name="own_html_save"'
                ],
            ]
        ];
    }
}
