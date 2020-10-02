<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TreeBuilder extends Component
{

    public static $elements = [];
    public static $type, $parentId, $selected;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($categories, $type, $parentId = null, $selected = null)
    {
        self::$type = $type;
        self::$parentId = $parentId;
        self::$selected = $selected;
        self::traverse($categories);

    }


    /**
     * Create a tree
     *
     * @return Void
     */
    public static function traverse($categories, $prefix = '')
    {

        foreach ($categories as $category) {
            if (self::$selected != $category->id) {
                self::$elements[$category->id] = $prefix . $category->name;
            }
            self::traverse($category->children, $prefix . '&nbsp; &nbsp; &nbsp;');
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $data = [
            'type' => self::$type,
            'elements' => self::$elements,
            'parentId' => self::$parentId
        ];
        return view('Components.tree-builder', $data);
    }
}
