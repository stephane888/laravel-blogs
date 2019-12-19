<?php
namespace Stephane888\LaravelBlogs;

trait Helpers {
  use ContentTypeHelpers;
  use ContentsHelpers;

  protected function buildManuAside()
  {
    return [
      [
        'title' => 'Tableau de bord <i class="right fas fa-angle-left"></i>',
        'link' => '/admin',
        'html' => true,
        'active' => false,
        'class' => '',
        'icon_before' => '<i class="nav-icon fas fa-tachometer-alt"></i>',
        'icon_after' => false,
        'external' => false,
        'tag' => 'p',
        'attrib' => '',
        'niveau' => '0',
        'submenu' => [
          [
            'title' => 'Active Page',
            'link' => '#',
            'active' => false,
            'class' => '',
            'icon_before' => '<i class="far fa-circle nav-icon"></i>',
            'icon_after' => '',
            'external' => false,
            'tag' => 'p'
          ],
          [
            'title' => 'Inactive Page',
            'link' => '#',
            'active' => false,
            'class' => '',
            'icon_before' => '<i class="far fa-circle nav-icon"></i>',
            'icon_after' => '',
            'external' => false,
            'tag' => 'p'
          ]
        ]
      ],
      $this->LinkContentType(),
      $this->LinkContents()
    ];
  }

  protected function applyValueToForm($forms, $datas)
  {
    foreach ($forms as $key => $value) {
      if (isset($datas[$value['name']])) {
        $forms[$key]['old'] = $datas[$value['name']];
      }
    }
    return $forms;
  }

  protected function buildTestmenu()
  {
    return [
      [
        'title' => '<i class="fas fa-bars"></i>',
        'link' => '#',
        'html' => true,
        'active' => false,
        'class' => '',
        'icon_before' => '',
        'icon_after' => '',
        'external' => false,
        'tag' => false,
        'attrib' => 'data-widget="pushmenu"'
      ],
      [
        'title' => 'Home',
        'link' => '#',
        'active' => false,
        'class' => '',
        'icon_before' => '',
        'icon_after' => '',
        'external' => false,
        'tag' => false,
        'attrib' => ''
      ],
      [
        'title' => 'Contact',
        'link' => '#',
        'active' => false,
        'class' => '',
        'icon_before' => '',
        'icon_after' => '',
        'external' => false,
        'tag' => false,
        'attrib' => ''
      ]
    ];
  }
}