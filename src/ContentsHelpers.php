<?php
namespace Stephane888\LaravelBlogs;

use Illuminate\Http\Request;
use App\EmtTitle;
use Stephane888\LaravelBlogs\App\Repositories\LaravelBlogsUtilities;

trait ContentsHelpers {

  private $error_message = '';

  public function ContentsStore($content_type_id, Request $request)
  {
    $this->validate($request, [
      'title' => 'bail|required|between:1,255'
    ]);

    if (! $this->validContentType($content_type_id)) {
      return redirect()->back()->withWarning($this->error_message);
    }
    $ModelTable = new EmtTitle();
    LaravelBlogsUtilities::buildDatasFormsAndSave($ModelTable, $this->formAddContents(), $request);
    return redirect()->back()->withSuccess("Nouveau article ajouté : $request->title");
  }

  /**
   * Permet de verifier que c'est un type de contenu.
   * Que l'utilisateur à des droits d'ecritures.
   * De sauvegarder les logs, en cas d'echecs.
   *
   * @param int $content_type_id
   */
  protected function validContentType(int $content_type_id)
  {
    return $content_type_id;
  }

  public function ContentsUpdate($content_type_id, Request $request)
  {
    $this->validate($request, [
      'name' => 'bail|required|between:3,200'
    ]);
    EmtTitle::where('id', $n)->update([
      'name' => $request->name,
      'public' => (! empty($request->public)) ? 1 : 0,
      'status' => (! empty($request->status)) ? 1 : 0
    ]);
    return redirect()->back()->withSuccess(" Contenu mis à jour : $request->name ");
  }

  protected function formAddContents($data = null)
  {
    $forms = [
      [
        'label' => 'Titre de l\'article',
        'name' => 'title',
        'old' => ''
      ],
      [
        'label' => 'Courte description',
        'name' => 'summary',
        'type' => 'textarea'
      ],
      [
        'label' => 'Description',
        'name' => 'body',
        'type' => 'html_area'
      ],
      [
        'label' => 'Publier l\'article ',
        'name' => 'status',
        'type' => 'checkbox',
        'old' => 1
      ],
      [
        'label' => 'Date de publication',
        'name' => 'active_at',
        'type' => 'dateheure',
        'old' => date('d/n/Y H:m')
      ]
    ];
    if ($data) {
      return $this->applyValueToForm($forms, $data);
    } else {
      return $forms;
    }
  }

  /**
   *
   * @return string[]|boolean[]|string[][][]|boolean[][][]
   */
  protected function LinkContents()
  {
    return [
      'title' => 'Articles <i class="right fas fa-angle-left"></i>',
      'link' => '/admin/contents',
      'active' => false,
      'class' => '',
      'html' => true,
      'icon_before' => '<i class="nav-icon fas fa-list"></i>',
      'icon_after' => '',
      'external' => false,
      'tag' => 'p',
      'niveau' => '0',
      'routeName' => 'LaravelBlogs::Content',
      'submenu' => [
        [
          'title' => 'Listes des articles ',
          'link' => '/admin/contents',
          'active' => false,
          'class' => '',
          'icon_before' => '<i class="far fa-circle nav-icon"></i>',
          'icon_after' => '',
          'external' => false,
          'tag' => 'p',
          'attrib' => '',
          'routeName' => 'LaravelBlogs::Content'
        ],
        [
          'title' => 'Ajouter un article',
          'link' => route('LaravelBlogs::ContentTypeList'),
          'active' => false,
          'class' => '',
          'icon_before' => '<i class="far fa-circle nav-icon"></i>',
          'icon_after' => '',
          'external' => false,
          'tag' => 'p',
          'attrib' => '',
          'routeName' => 'LaravelBlogs::ContentAdd'
        ]
      ]
    ];
  }
}