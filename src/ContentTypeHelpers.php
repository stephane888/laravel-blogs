<?php
namespace Stephane888\LaravelBlogs;

use Illuminate\Http\Request;
use App\EmtContentType;
use Illuminate\Support\Str;

trait ContentTypeHelpers {

  public function ContentTypeStore(Request $request)
  {
    $this->validate($request, [
      'name' => 'bail|required|between:3,200'
    ]);

    $_EmtContentType = new EmtContentType();

    $_EmtContentType->public = (! empty($request->public)) ? 1 : 0;

    $_EmtContentType->status = (! empty($request->status)) ? 1 : 0;

    $_EmtContentType->name = $request->name;
    $name_machine = Str::slug($_EmtContentType->name);
    $_EmtContentType->name_machine = $name_machine;
    $_EmtContentType->save();

    return redirect()->back()->withSuccess("Nouveau type d'article ajouté : $_EmtContentType->name");
  }

  public function ContentTypeUpdate($n, Request $request)
  {
    $this->validate($request, [
      'name' => 'bail|required|between:3,200'
    ]);
    EmtContentType::where('id', $n)->update([
      'name' => $request->name,
      'public' => (! empty($request->public)) ? 1 : 0,
      'status' => (! empty($request->status)) ? 1 : 0
    ]);
    return redirect()->back()->withSuccess(" Contenu mis à jour : $request->name ");
  }

  protected function formAddContentType($data = null)
  {
    $forms = [
      [
        'label' => 'Type d\'article',
        'name' => 'name',
        'old' => ''
      ],
      [
        'label' => 'Status',
        'name' => 'status',
        'type' => 'checkbox',
        'old' => 1
      ],
      [
        'label' => 'Public',
        'name' => 'public',
        'type' => 'checkbox',
        'old' => 1
      ]
    ];
    if ($data) {
      return $this->applyValueToForm($forms, $data);
    } else {
      return $forms;
    }
  }

  /**
   * Permet de recuperer tout le contenu de la table content type.
   */
  protected function getContentTypeAll($status = null)
  {
    if (is_null($status)) {
      return EmtContentType::all();
    } else {
      return EmtContentType::Where('status', $status)->get();
    }
  }

  public function getActiveContentTypeAll()
  {
    return $this->getContentTypeAll(1);
  }

  /**
   *
   * @return string[]|boolean[]|string[][][]|boolean[][][]
   */
  protected function LinkContentType()
  {
    return [
      'title' => 'Type d\'articles <i class="right fas fa-angle-left"></i>',
      'link' => '/admin/content-type',
      'active' => false,
      'class' => '',
      'html' => true,
      'icon_before' => '<i class="nav-icon fas fa-cubes"></i>',
      'icon_after' => '',
      'external' => false,
      'tag' => 'p',
      'routeName' => 'LaravelBlogs::ListContentType',
      'niveau' => '0',
      'submenu' => [
        [
          'title' => "Listes de type d'articles",
          'link' => '/admin/content-type',
          'active' => false,
          'class' => '',
          'icon_before' => '<i class="far fa-circle nav-icon"></i>',
          'icon_after' => '',
          'external' => false,
          'tag' => 'p',
          'attrib' => '',
          'routeName' => 'LaravelBlogs::ListContentType'
        ],
        [
          'title' => 'Ajouter un type d\'article',
          'link' => '/admin/content-type/add',
          'active' => false,
          'class' => '',
          'icon_before' => '<i class="far fa-circle nav-icon"></i>',
          'icon_after' => '',
          'external' => false,
          'tag' => 'p',
          'attrib' => '',
          'routeName' => 'LaravelBlogs::ListContentTypeAdd'
        ]
      ]
    ];
  }
}